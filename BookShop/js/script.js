/* slideToggle */
function slideToggle(animationClass){
	var content = this.parentNode.querySelector('.content');
	content.classList.toggle(animationClass);
}

document.addEventListener('click', function (e) {
	if (e.target.className == 'slideToggle') {
		e.preventDefault();
		slideToggle.call(e.target, 'show');
	}
});
document.querySelector('.nav_btn_mobile').addEventListener('click', function (e) {
	// var content = this.parentNode.querySelector('.content');
	// content.classList.toggle('show');
	slideToggle.call(this,'show');

});




