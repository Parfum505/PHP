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
	}
});
/* Open/close nav_main in mobile version */
document.querySelector('.nav_btn_mobile').addEventListener('click', function (e) {
	slideToggle.call(this,'show');
});
/* Switch class 'active' in nav_main */
document.querySelector('.nav_main').addEventListener('click', function (e) {
	document.querySelector('.nav_main .active').classList.remove('active');
	e.target.classList.add('active');
});



