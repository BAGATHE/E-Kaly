var login_label = document.getElementById("login"); 
var register_label = document.getElementById("register"); 
var login_container = document.getElementById("login-container");
var register_container = document.getElementById("register-container");

function clickLogin(){
    login_container.style.display = 'flex';
    register_container.style.display = 'none';
}

login_label.addEventListener('click', () => {
    clickLogin();
});

function clickRegister(){
    login_container.style.display = 'none';
    register_container.style.display = 'flex';
}

register_label.addEventListener('click', () => {
    clickRegister();
});