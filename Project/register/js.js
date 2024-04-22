//Simple password checking system. The check is done on backend too, but on frontend this is the visual part.

const errors = [
	"Felhasználónévnek legalább 4 karakter hosszúnak kell lennie.",
	"Felhasználónév nem lehet hoszabb 30 karakternél.",
	"A jelszó minimum 8 karekter kell hogy legyen.",
	"A jelszó tartalmazzon számot.",
	"A jelszó tartalmazzon nagy betűt.",
	"A jelszavaknak egyezniük kell.",
	"Az emailnek valósnak kell lennie"
];

const username = document.getElementById("username");
const password = document.getElementById("pass");
const password2 = document.getElementById("pass2");
const email = document.getElementById("email");
const register = document.getElementById("regbtn");
const errordisplay = document.getElementById("errmsg");

function set_error(id) {
	errordisplay.innerText = errors[id];
	register.disabled = true;
}

function validate() {
	const _username = username.value;
	if(_username.length < 4) {
		set_error(0);
		return;
	}
	if(_username.length > 30) {
		set_error(1);
		return;
	}
	const _password = password.value;
	if(_password.length < 8) {
		set_error(2);
		return;
	}
	if(!_password.match(/\d/)) {
		set_error(3);
		return;
	}
	if(!_password.match(/[A-Z]/)) {
		set_error(4);
		return;
	}
	const _password2 = password2.value;
	if(_password !== _password2) {
		set_error(5);
		return;
	}
	const _email = email.value;
	if(!_email.match(/^.+@.+[.].+$/)) {
		set_error(6);
		return;
	}
	errordisplay.innerText = "";
	register.disabled = false;
}

username.addEventListener("keyup", validate);
password.addEventListener("keyup", validate);
password2.addEventListener("keyup", validate);
email.addEventListener("keyup", validate);