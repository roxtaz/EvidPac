$(document).ready(function(){
	$('input[type=text]').clearDefault();
	// $('input#password').dPassword({
	// 	duration: 2000
	// });
	// TODO De implementat ascunderea caraterelor parolei tastate in stil iPhone
		// $('ul.submenu').hide();
		// $('.active').ready(function(){
		// 	$('ul.submenu').slideDown(500);
		// 	return false;
		// });
		
	$('ul.dropdown li ul li a.last').parent().addClass('li-rounded');
    
    $('#password').dPassword({duration: 2000});
});

(function($){
	$.fn.clearDefault = function(){
		return this.each(function(){
			var default_value = $(this).val();
			$(this).focus(function(){
				if ($(this).val() == default_value) $(this).val("");
			});
			$(this).blur(function(){
				if ($(this).val() == "") $(this).val(default_value);
			});
		});
	};
})(jQuery);