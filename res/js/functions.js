let registerNav = document.getElementById("menu_register");
let loginNav = document.getElementById("menu_login");
let mediaNav = document.getElementById("menu_media");
let miPostNav = document.getElementById("menu_post");
let misPostsNav = document.getElementById("menu_misPost");
let nPostNav = document.getElementById("menu_nPost");

if (loginNav != null){
    loginNav.onclick = function() {
        document.getElementById("login").classList = "border-bottom border-start border-end";
        loginNav.classList = "nav-link active";
    
        document.getElementById("register").classList = "visually-hidden";
        registerNav.classList = "nav-link";
    }
}

if (registerNav != null){
    registerNav.onclick = function() {    
        document.getElementById("login").classList = "visually-hidden";
        loginNav.classList = "nav-link";
    
        document.getElementById("register").classList = "border-bottom border-start border-end";
        registerNav.classList = "nav-link active"
    }
}

if (miPostNav != null){
    miPostNav.onclick = function() {
        document.getElementById("media").classList = "visually-hidden";
        miPostNav.classList = "nav-link active";
    
        document.getElementById("post").classList = "";
        mediaNav.classList = "nav-link link-dark"
    }
}

if (mediaNav != null){
    mediaNav.onclick = function() {    
        document.getElementById("media").classList = "";
        miPostNav.classList = "nav-link link-dark";
    
        document.getElementById("post").classList = "visually-hidden";
        mediaNav    .classList = "nav-link active";
    }
}

if (nPostNav != null){
    nPostNav.onclick = function() {    
        document.getElementById("nuePost").classList = "border-bottom border-start border-end";
        nPostNav.classList = "nav-link active";
    
        document.getElementById("postList").classList = "visually-hidden";
        misPostsNav.classList = "nav-link link-dark";
    }
}

if (misPostsNav != null){
    misPostsNav.onclick = function() {    
        document.getElementById("nuePost").classList = "visually-hidden";
        nPostNav.classList = "nav-link link-dark";
    
        document.getElementById("postList").classList = "table-responsive border-bottom border-start border-end";
        misPostsNav.classList = "nav-link active";
    }
}