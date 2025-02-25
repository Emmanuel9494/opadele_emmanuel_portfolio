export  function indexAnimation() {
   // Intro Animation
   if (window.location.pathname.includes("index.html")){

    const t1 = gsap.timeline();

    t1.fromTo(
        ".red-dot",
        { opacity: 1 },
        { opacity: 0, duration: 1, ease: "power2.out" }
      );
      
      t1.fromTo(
        ".white-dot",
        { opacity: 1, },
        { opacity: 0, duration: .5, ease: "power2.out" }
      );
      
    
    const t2 = gsap.timeline({ paused: true }); // Pause t2 to start manually
    
    // Animation for .circle, brackets, and slashes
    t2.fromTo(
        ".circle",
        { opacity: 0, scale: 0 },
        { opacity: 1, scale: 1, duration: .5, ease: "back.out(2)" }
        
      )
      .fromTo(
        ".left-bracket",
        { opacity: 0, x: -100 },
        { opacity: 1, x: 0, duration: .5, ease: "back.out(2)" }
      )
      .fromTo(
        ".right-bracket",
        { opacity: 0, x: 100 },
        { opacity: 1, x: 0, duration: .5, ease: "back.out(2)" }
        
      )
      .fromTo(
        ".left-slash",
        { opacity: 0, x: -100 },
        { opacity: 1, x: 0, duration: .5, ease: "back.out(1.5)" },1
        
      )
      .fromTo(
        ".right-slash",
        { opacity: 0, x: 100 },
        { opacity: 1, x: 0, duration: .5, ease: "back.out(2)", onComplete:animation2done
        },1
      );

      function animation2done(){
        window.location.href = "main_home.php";

      }
    
    // Start t2 after t1 completes
    t1.eventCallback("onComplete", () => t2.play());
    

   
}
}