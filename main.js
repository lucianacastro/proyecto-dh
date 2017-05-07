$('.logout').on('click',function(event) {
	$.ajax({
		method: 'POST', 
		url: 'logout.php' 
	}).done(function() {
		document.location.href = 'login.php';
	});
	event.preventDefault();
})
