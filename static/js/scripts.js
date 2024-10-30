jQuery(document).ready(function($){
	$('.wpcfaq-question').click(function(e){
		$(this).siblings('.wpcfaq-answer').slideToggle();
		e.preventDefault();
	});
});