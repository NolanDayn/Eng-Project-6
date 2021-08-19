var userName = document.getElementById('userName');
var password = document.getElementById('password');
var userName_ErrorMsg = document.getElementById('usernameError');
var password_ErrorMsg = document.getElementById('passwordError');
const form = document.getElementById('form');
var submitButton = document.getElementById('submitButton');

form.addEventListener('focusout', (event) => {
	validateInputs();
});

function validateInputs(){	
	var hasUpperCase = /[A-Z]/.test(password.value);
	var hasNumeric = /\d/.test(password.value);
	var userTooSmall = (userName.value.length < 7);
	var passTooSmall = (password.value.length < 7);
	
	userName_ErrorMsg.innerHTML = userTooSmall ? "7 character minimum" : "";
	password_ErrorMsg.innerHTML = passTooSmall ? "7 character minimum": (!hasNumeric || !hasUpperCase) ? "Must have at least 1 uppercase and 1 number":"";

	submitButton.disabled = !hasUpperCase || !hasNumeric || userTooSmall || passTooSmall;
}