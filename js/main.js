(function () {
  // Check if the current page is 'index.html'
  if (window.location.pathname.includes("index.html")) {

      console.log("JAVA SCRIPT RUNNING!");
      
      // VARIABLES
      const menuButton = document.querySelector(".container-mobile-top-logo");
      const menuNav = document.querySelector("#head-nav");
      const works = document.querySelector("#work-select");
      const themeSelect = document.querySelector("#theme-select");
      const subMenu1 = document.querySelector(".sub-menu1");
      const subMenu2 = document.querySelector(".sub-menu2");
      

      // GSAP ANIMATION
     
      

      // FUNCTIONS
      function swapMenuIcon() {
          menuButton.classList.toggle("container-mobile-top-logo-swap");
          menuNav.classList.toggle("mb-nav");
          console.log("Menu Triggered");
          if (menuButton.classList.contains("container-mobile-top-logo-swap")) {
              // Slide down and fade in
              gsap.fromTo("#head-nav", {
                  y: -50,      
                  opacity: 0       
              }, {
                  duration: 2,    
                  y: 0,            
                  opacity: 1,      
                  ease: "power2.out" 
              });
          }
  }

      function revealWorks() {
          subMenu1.classList.toggle("show");
  
      }


     

      // EVENTS
      menuButton.addEventListener("click", swapMenuIcon);
      works.addEventListener("click", revealWorks);
     
}})();