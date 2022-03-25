const element = document.querySelectorAll('[id=fade]')

window.onload = function(){
    element.forEach((el) => {
        el.style.opacity = 1;
        el.classList.remove("translate-x-full");
    });
}