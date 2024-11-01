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

document.querySelectorAll('.scroll-container').forEach(container => {
    let isDown = false;
    let startX;
    let scrollLeft;
    let animation;
  
    const scrollContent = container.querySelector('.scroll-content');
    const scrollWidth = scrollContent.scrollWidth / 2;
  
    // Function to update animation based on scroll position
    function updateAnimation() {
      const scrollPercentage = (container.scrollLeft % scrollWidth) / scrollWidth * 100;
      scrollContent.style.animation = `${container.classList.contains('scroll-left') ? 'scroll-left' : 'scroll-right'} 30s linear infinite`;
      scrollContent.style.animationDelay = `-${scrollPercentage * 0.3}s`; // 0.3s per percentage point
    }
  
    // Mouse events for desktop
    container.addEventListener('mousedown', e => {
      isDown = true;
      container.classList.add('active');
      scrollContent.style.animationPlayState = 'paused';
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });
  
    container.addEventListener('mouseleave', () => {
      if (isDown) {
        isDown = false;
        container.classList.remove('active');
        updateAnimation();
      }
    });
  
    container.addEventListener('mouseup', () => {
      isDown = false;
      container.classList.remove('active');
      updateAnimation();
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
      scrollContent.style.animationPlayState = 'paused';
      startX = e.touches[0].pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
    });
  
    container.addEventListener('touchend', () => {
      isDown = false;
      updateAnimation();
    });
  
    container.addEventListener('touchmove', e => {
      if (!isDown) return;
      const x = e.touches[0].pageX - container.offsetLeft;
      const walk = (x - startX);
      container.scrollLeft = scrollLeft - walk;
    });
  });