$(function() {

	if (localStorage.getItem('href')) {
		$('#theme').attr('href', localStorage.getItem('href'));	
	}

	/* Navegación */
	$('.logout').on('click',function(event) {
		$.ajax({
			method: 'POST', 
			url: 'logout.php' 
		}).done(function() {
			document.location.href = 'login.php';
		});
		event.preventDefault();
	});

	var change = false;
	$('.nav li a').each(function(index){
		if (this.href.trim() == window.location) {
			$(this).parent().addClass("active");
			change = true;
		}
	});
	if(!change) {
		$('.nav li:first').addClass("active");
	}


	/* Validaciones en register form */
	$('input#name').on('keyup', function() {
		// this es el elemento del dom, el input
		var input = this;
		// $this es el elemento de jquery, el input
		var $input = $(this);
		// busco el .form-group más cercano hachia arriba en la jerarquía del DOM
		var $formGroup = $input.closest('.form-group');

		var isValid = validateName($input.val());
		$formGroup.toggleClass('has-error', !isValid);
		$formGroup.toggleClass('has-success', isValid);
	});

	$('input#lastname').on('keyup', function() {
		// this es el elemento del dom, el input
		var input = this;
		// $this es el elemento de jquery, el input
		var $input = $(this);
		// busco el .form-group más cercano hacia arriba en la jerarquía del DOM
		var $formGroup = $input.closest('.form-group');

		var isValid = validateName($input.val());
		$formGroup.toggleClass('has-error', !isValid);
		$formGroup.toggleClass('has-success', isValid);
	});

	$('select#teamName').on('blur', function() {
		// $this es el elemento de jquery, el select
		var $select = $(this);
		// busco el .form-group más cercano hacia arriba en la jerarquía del DOM
		var $formGroup = $select.closest('.form-group');

		var isValid = validateTeam($select.val());
		$formGroup.toggleClass('has-error', !isValid);
		$formGroup.toggleClass('has-success', isValid);
	});

	$('input#email').on('keyup', function() {
		// this es el elemento del dom, el input
		var input = this;
		// $this es el elemento de jquery, el input
		var $input = $(this);
		// busco el .form-group más cercano hacia arriba en la jerarquía del DOM
		var $formGroup = $input.closest('.form-group');

		var isValid = validateEmail($input.val());
		$formGroup.toggleClass('has-error', !isValid);
		$formGroup.toggleClass('has-success', isValid);
	});

	$('input#email').on('blur', function() {
		// $this es el elemento de jquery, el input
		var $input = $(this);
		// busco el .form-group más cercano hacia arriba en la jerarquía del DOM
		var $formGroup = $input.closest('.form-group');

		// validación asincrónica
		validateEmailUnique($input.val(), function(isValid) {
			isValid = isValid && validateEmail($input.val()); // vuelve a chequear formato
			$formGroup.toggleClass('has-error', !isValid);
			$formGroup.toggleClass('has-success', isValid);
		});
	});

	$('input#password').on('keyup', function() {
		// $this es el elemento de jquery, el input
		var $input = $(this);
		// busco el .form-group más cercano hacia arriba en la jerarquía del DOM
		var $formGroup = $input.closest('.form-group');

		var isValid = validatePassword($input.val());
		$formGroup.toggleClass('has-error', !isValid);
		$formGroup.toggleClass('has-success', isValid);
	});

	$('input#repeatPassword').on('keyup', function() {
		// $this es el elemento de jquery, el input
		var $inputRepeat = $(this);
		var $input = $('input#password');
		// busco el .form-group más cercano hacia arriba en la jerarquía del DOM
		var $formGroup = $inputRepeat.closest('.form-group');

		var isValid = validateRepeatPassword($inputRepeat.val(), $input.val());
		$formGroup.toggleClass('has-error', !isValid);
		$formGroup.toggleClass('has-success', isValid);
	});

	/* Themes changes*/
	$('#original').click(function(){
		$('#theme').attr('href', 'stylesheet.css');
		localStorage.setItem('href', 'stylesheet.css');
	});

	$('#fort').click(function(){
		$('#theme').attr('href', 'stylesheet-fort.css');
		localStorage.setItem('href', 'stylesheet-fort.css');
	});

	$('#ortigoza').click(function(){
		$('#theme').attr('href', 'stylesheet-ortigoza.css');
		localStorage.setItem('href', 'stylesheet-ortigoza.css');
	});

	$('#peron').click(function(){
		$('#theme').attr('href', 'stylesheet-peron.css');
		localStorage.setItem('href', 'stylesheet-peron.css');
	});

	/* Contador de usuarios */
	renderUserCount();
	setInterval(renderUserCount, 30000);
	
});



function validateName(value) {
	return value.length > 2;
}

function validateTeam(value) {
	return value !== '';
}

function validateEmail(value) {
	var emailRegex = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return emailRegex.test(value);
}

function validateEmailUnique(value, callback) {
	$.ajax({
		method: 'GET', 
		url: 'userAvailability.php?email=' + value,
	}).done(function(res) {
		var isValid = res.available;
		callback(isValid);
	});
	// esta función no puede retornar si es válido o no, porque todavía no lo sabe, es asíncrona
}

function validatePassword(value) {
	return value.length > 4;
}

function validateRepeatPassword(valueRepeat, value) {
	return valueRepeat === value ;
}

function getUsersCount(callback) {
	$.ajax({
		method: 'GET', 
		url: 'userCount.php',
	}).done(function(res) {
		var total = res.total;
		callback(total);
	});
}

function renderUserCount() {
	getUsersCount(function(total) {
		$('#number_users').text('Ya somos ' + total + ' usuarios!')
	});
}




