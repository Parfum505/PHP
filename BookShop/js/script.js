/* slideToggle */
function slideToggle(){
	var content = this.target.parentNode.querySelector('.content');
	content.classList.toggle('show');
}

document.addEventListener('click', function (e) {

	if (e.target.className == 'slideToggle') {
		e.preventDefault();
		slideToggle.call(e);
	}
});





