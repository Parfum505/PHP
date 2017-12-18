/* slideToggle */
function slideToggle(animationClass){
	var content = this.parentNode.querySelector('.content');
	content.classList.toggle(animationClass);
}

document.addEventListener('click', function (e) {
	/* Open/close class 'content' in terms_conditions */
	if (e.target.className == 'slideToggle') {
		e.preventDefault();
		slideToggle.call(e.target, 'show');
		var arrow = e.target.querySelectorAll('.fa');
		arrow[0].classList.toggle('hidden');
		arrow[1].classList.toggle('hidden');
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
function validateText(id, errors){
	if(document.getElementById(id).value == '') {
		errors.push(id);
	}
}
function validateEmail(id, errors){
	var email = document.getElementById(id).value;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(email == '' || !mailformat.test(email)) {
		errors.push(id);
	}
}
function showFormErrors(errors){
	for (var i = 0; i < errors.length; i++) {
		document.getElementById(errors[i]).classList.add('formError');
	}
}
function removeClassFormError(){
	var classErrors = document.querySelectorAll('.formError');
	if(classErrors.length){
		for (var i = 0; i < classErrors.length; i++) {
			document.getElementById(classErrors[i].id).classList.remove('formError');
		}
	}
}
function validateContactsForm(form){
	removeClassFormError();
	var errors = [];
	validateText('name', errors);
	validateEmail('email', errors);
	validateText('subject', errors);
	validateText('message', errors);
	if(errors.length){
		showFormErrors(errors);
		return false;
	}else return true;
}


