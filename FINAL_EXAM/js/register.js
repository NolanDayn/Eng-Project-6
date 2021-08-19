var userName = document.getElementById('userName');
var password = document.getElementById('password');
var email = document.getElementById('email');

var userName_ErrorMsg = document.getElementById('usernameError');
var password_ErrorMsg = document.getElementById('passwordError');
var email_ErrorMsg = document.getElementById('emailError');

const form = document.getElementById('form');
var submitButton = document.getElementById('submitButton');

form.addEventListener('change', (event) => {
	validateInputs();
});

function validateInputs(){
	var validEmail = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/.test(email.value);
	
	var userTooSmall = (userName.value.length < 7);
	var passTooSmall = (password.value.length < 7);
	
	userName_ErrorMsg.innerHTML = userTooSmall ? "7 character minimum" : "";
	password_ErrorMsg.innerHTML = passTooSmall ? "7 character minimum": "";
	email_ErrorMsg.innerHTML = !validEmail ? "Please Enter a valid email":"";
	
	submitButton.disabled = userTooSmall || passTooSmall || !validEmail;
}