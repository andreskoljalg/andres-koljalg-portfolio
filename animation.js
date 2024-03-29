const slide = document.querySelectorAll('[id=slide]');
const menuToggle = document.querySelectorAll('[id=menuToggle]');
const menu = document.getElementById('menu');
let menuToggled = false;

window.onpageshow = function(){
    document.body.style.opacity = 1;
    slide.forEach((el) => {
        el.style.opacity = 1;
        el.classList.remove("translate-x-full", "-translate-y-full", "translate-y-[100vh]", "translate-x-[100vw]");
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

function delay (URL) {
    document.body.style.opacity = 0;
    setTimeout( function() { window.location = URL }, 500 );
}