// DEVELOPER AND DESIGNER TEXT ANIMATION
export  function carrerAnimation() {
    // Check if the current page is not 'works.php' or 'index.php'
    // if (!window.location.pathname.includes("works.php") && !window.location.pathname.includes("index.php")) {
  
  
        // GSAP ANIMATION
        const skillPath = ["Developer_", "Designer_"];
        let cursor = gsap.to('.blinkCursor', {opacity: 0, ease:"power2.inOut", repeat:-1});
        cursor;
        
  
        let textEdit = gsap.timeline({repeat: -1});
        skillPath.forEach(skillPath => {
            let tl = gsap.timeline({
                repeat: 1, 
                yoyo:true, 
                repeatDelay:2});
            tl.to('.text', {
                duration:1, 
                text: skillPath});
                textEdit.add(tl);
        });
        
  }
// }