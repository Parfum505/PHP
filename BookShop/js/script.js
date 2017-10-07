/* slideToggle */
function slideToggle(animationClass){
	var content = this.parentNode.querySelector('.content');
	content.classList.toggle(animationClass);
}
/* Open/close class 'content' in terms_conditions */
document.addEventListener('click', function (e) {
	if (e.target.className == 'slideToggle') {
		e.preventDefault();
		slideToggle.call(e.target, 'show');
		var arrow = e.target.querySelectorAll('.fa');
		arrow[0].classList.toggle('hidden');
		arrow[1].classList.toggle('hidden');
		// console.log(arrow);
	}
});
/* Open/close nav_main in mobile version */
document.querySelector('.nav_btn_mobile').addEventListener('click', function (e) {
	slideToggle.call(this,'show');
});
/* Switch panel 'Category' in aside */
document.querySelector('.vertical_word').addEventListener('click', function () {
	document.querySelector('.aside_nav').classList.toggle('visible');

});



