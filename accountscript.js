let inputValidator = {
    "mail": false,
    "username": false,
    "password": false,
    "passwordconfirm" : false
}

document.getElementById('mail').addEventListener('input', (event) => {
    inputValidator["mail"] = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(event.target.value);
    isFormValid();
});

document.getElementById('username').addEventListener('input', (event) => {
    inputValidator["username"] = /^[a-zA-Z0-9-_]{3,20}$/.test(event.target.value);
    isFormValid();
});
document.getElementById('password').addEventListener('input', (event) => {
    inputValidator["password"] = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[^a-zA-Z\d\s]).{8,}$/.test(event.target.value);
    isFormValid();
});

password = document.getElementById('password');

document.getElementById('passwordconfirm').addEventListener('input', (event) => {
    inputValidator["passwordconfirm"] = (document.getElementById('password').value == event.target.value);
    isFormValid();
});


let submit = document.getElementById('login-submit');
let error = document.getElementById('error');


function isFormValid() {
    // submit.disabled = !Object.keys(inputValidator).every((item) => {return inputValidator[item] === true});
    
    if(!inputValidator["mail"]){
        error.textContent = "> Invalid E-Mail adress";
        error.title = "";
    } else if (!inputValidator["username"]) {
        error.textContent = "> Invalid username \u24D8";
        error.title = "Username must be between 3 and 20 characters, and cannot contain special characters.";
    } else if (!inputValidator["password"]) {
        error.textContent = "> Invalid password \u24D8";
        error.title = "Password must contain a lower case letter, an upper case letter, a digit, a special character and at least 8 characters.";
    } else if (!inputValidator["passwordconfirm"]) {
        error.textContent = "> Passwords dont match";
        error.title = "";
    } else {
        error.textContent = "";
        error.title = "";
        submit.disabled = false;
        return;
    }
    submit.disabled = true;
}