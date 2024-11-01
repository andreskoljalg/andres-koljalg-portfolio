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

ddocument.querySelectorAll('.scroll-container').forEach(container => {
    let isDown = false;
    let startX;
    let scrollLeft;
  
    // Function to pause animation
    function pauseAnimation() {
      container.querySelector('.scroll-content').style.animationPlayState = 'paused';
    }
  
    // Function to resume animation
    function resumeAnimation() {
      container.querySelector('.scroll-content').style.animationPlayState = 'running';
    }
  
    // Mouse events for desktop
    container.addEventListener('mousedown', e => {
      isDown = true;
      container.classList.add('active');
      pauseAnimation();
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });
  
    container.addEventListener('mouseleave', () => {
      if (isDown) {
        isDown = false;
        container.classList.remove('active');
        resumeAnimation();
      }
    });
  
    container.addEventListener('mouseup', () => {
      isDown = false;
      container.classList.remove('active');
      resumeAnimation();
    });
  
    container.addEventListener('mousemove', e => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - container.offsetLeft;
      const walk = (x - startX);
      container.scrollLeft = scrollLeft - walk;
    });
  
    // Touch events for mobile
    container.addEventListener('touchstart', e => {
      isDown = true;
      pauseAnimation();
      startX = e.touches[0].pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });
  
    container.addEventListener('touchend', () => {
      isDown = false;
      resumeAnimation();
    });
  
    container.addEventListener('touchmove', e => {
      if (!isDown) return;
      const x = e.touches[0].pageX - container.offsetLeft;
      const walk = (x - startX);
      container.scrollLeft = scrollLeft - walk;
    });
  });