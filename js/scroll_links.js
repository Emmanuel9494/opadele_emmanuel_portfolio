// Scroll Links
export function scrollLinks(){
    gsap.registerPlugin(ScrollTrigger);
    gsap.registerPlugin(ScrollToPlugin);
  
    const navLinks = document.querySelectorAll("#head-nav .link-scroll");
    const navButtons = document.querySelectorAll(".btn-scroll");
  
    function scrollLink(e) {
        e.preventDefault(); 
        console.log(e.currentTarget.hash);
        const selectedLink = e.currentTarget.hash;
        gsap.to(window, { duration: 1, scrollTo: { y: selectedLink, offsetY: 100 } });
    }
  
    function buttonLink(e) {
        e.preventDefault();  // If needed to prevent the default behavior (in case of <a> links)
        console.log("yo button clicked");
  
        // Get the target section from the data-target attribute
        const selectedLink = e.currentTarget.getAttribute('data-target');
        gsap.to(window, { duration: 1, scrollTo: { y: selectedLink, offsetY: 100 } });
    }
  
    // Add event listeners to the navLinks (anchor links)
    navLinks.forEach((link) => {
        link.addEventListener("click", scrollLink);
    });
  
    // Add event listeners to the navButtons (buttons with data-target attribute)
    navButtons.forEach(button => {
        button.addEventListener("click", buttonLink);
    });
  
  }