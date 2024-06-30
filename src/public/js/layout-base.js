document.getElementById("hamburger-menu").addEventListener("click",function(){
    var nav_menu = document.getElementById("full-screen-menu");
    if(nav_menu.style.display === "flex"){
        nav_menu.style.display = "none";
    }else{
        nav_menu.style.display = "flex";
    }
});

document.getElementById("close-button").addEventListener("click",function(){
    var nav_menu = document.getElementById("full-screen-menu");
    if(nav_menu.style.display === "flex"){
        nav_menu.style.display = "none";
    }else{
        nav_menu.style.display = "flex";
    }
});
