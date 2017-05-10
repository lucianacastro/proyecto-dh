$('.logout').on('click',function(event) {
	$.ajax({
		method: 'POST', 
		url: 'logout.php' 
	}).done(function() {
		document.location.href = 'login.php';
	});
	event.preventDefault();
})

$(document).ready(function() {
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
});


