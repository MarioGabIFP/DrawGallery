let registerNav = document.getElementById("menu_register");
let loginNav = document.getElementById("menu_login");

loginNav.onclick = function() {
    document.getElementById("login").classList = "border-bottom border-start border-end";
    loginNav.classList = "nav-link active";

    document.getElementById("register").classList = "visually-hidden";
    registerNav.classList = "nav-link";
}

registerNav.onclick = function() {    
    document.getElementById("login").classList = "visually-hidden";
    loginNav.classList = "nav-link";

    document.getElementById("register").classList = "border-bottom border-start border-end";
    registerNav.classList = "nav-link active"
}