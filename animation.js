const element = document.querySelectorAll('[id=fade]');
const menuToggle = document.querySelectorAll('[id=menuToggle]');
let menuToggled = false;
const menu = document.getElementById('menu');

window.onload = function(){
    element.forEach((el) => {
        el.style.opacity = 1;
        el.classList.remove("translate-x-full", "-translate-y-full");
    });
}

menuToggle.forEach((el) => {
    el.addEventListener('click', function(event){
        if(!menuToggled){
            menuToggled = true;
            menu.classList.remove("translate-x-full");
        } else {
            menuToggled = false;
            menu.classList.add("translate-x-full")
        }
    })
});