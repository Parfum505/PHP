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
			var text = $(this).val();
			var res = text.match(/^[\w\d]/);
				// validate input
			if (!res) {
				$(this).parent().prepend("<p class='error'><span>Please input your To-Do</span></p>");
				$('.error span').animate({opacity: 0}, 2500, function(){
					$('.error').slideUp(400, function(){
						$('.error').remove();
					});
				});
				// send POST request
			} else {
				var date = new Date();
				var dataString = "name="+ text+"&start_date="+date;
				$.post('data/functions.php', dataString, function(html){
					$('.container ul').prepend(html);
				});
			}
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