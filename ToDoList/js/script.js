$(document).ready(function () {

	// 	FORM

		// show/hide form
	$('.fa-plus').on('click', function (){
		$('.form').slideToggle(300, function(){
			$('.form input').focus();
		});
	});
		// submit form
	$('.form form').on("submit", function(){
			var text = $('.form input').val();
			var res = text.match(/^[\w\d]/);
				// validate input
			if (!res) {
				$(this).parent().prepend("<p class='error'><span>Please input your To-Do</span></p>");
				$('.error span').animate({opacity: 0}, 2500, function(){
					$('.error').slideUp(400, function(){
						$('.error').remove();
					});
				});
				return false;
			} else {
				return true;
			}
	});

	// TO_DO LIST

		// decorate list, change done date
	$('.container').on('click', 'li', function (){
		$(this).toggleClass('completed');
		var id = $(this).children('.trash').attr('id');
		$.post('data/functions.php', 'change=1&id='+id, function(data){
			// console.log(data);
			id = "#"+id;
			var done_date;
			if (data) {
				done_date = "done: "+data;
			} else {
				done_date = data;
			}
			$(id).siblings('.date').children('.done').html(done_date);
		});
	});
		// delete list
	$('.container').on('click', 'li .trash', function (event){
		$(this).parent().slideUp(500, function(){
			$(this).remove();
		});
		var id = $(this).attr('id');
		$.post('data/functions.php', 'del=1&id='+id, function(data){
			console.log(data);
		});
		event.stopPropagation();
	});












});