$(document).ready(function () {

	// 	FORM

		// show/hide form
	$('.fa-plus').on('click', function (){
		$('.form').slideToggle(300, function(){
			$('.form input').focus();
		});
	});
		// submit form
	$('.form input').on("keypress", function(event){
		if (event.which === 13) {
			$text = $(this).val();
			var res = $text.match(/^[\w\d]/);
			if (!res) {
				$(this).parent().prepend("<p class='error'>Please input your To-Do</p>");
				$('.error').slideUp(3000, function(){
					//$(this).slideUp(2000);
				});
			} else {console.log($text);}
		$(this).val("");

		}

	});

	// TO_DO LIST

		// decorate list
	$('.container').on('click', 'li', function (){
		$(this).toggleClass('completed');
	});
		// delete list
	$('.container li').on('click', 'span', function (event){
		$(this).parent().slideUp(500, function(){
			$(this).remove();
		});
		event.stopPropagation();
	});












});