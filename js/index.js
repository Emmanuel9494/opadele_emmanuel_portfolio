// Animations and Scroll Triggers index page
export  function mainPageAnimation() {
  // if (!window.location.pathname.includes("works.php") && !window.location.pathname.includes("index.php")) {
        gsap.registerPlugin(ScrollTrigger);
        gsap.registerPlugin(ScrollToPlugin);
        const tl = gsap.timeline();

        tl.fromTo(
          "#intro-text",
          { opacity: 0 },
          { opacity: 1, duration: .5, ease: "power2.out" }
        );
        
        tl.fromTo(
          ".intro-bio",
          { opacity: 0, y: 100 },
          { opacity: 1, duration: 1, y: 0, ease: "power2.out" }
        );
        tl.fromTo(
            ".cta-work",
            { opacity: 0, y: 100 },
            { opacity: 1, duration: 1, y: 0, ease: "power2.out" }
          );
        //   Image Galleery Slider
        // gsap.from("#slider-container", {
        //     scrollTrigger: {
        //       trigger: "#slider-container",
        //       start: "top 80%",
        //       toggleActions: "play reverse play reverse",
        //       markers: false 
        //     },
        //     opacity: 0,
        //     y: 100,
        //     duration: 1,
        //     ease: "power1.out"
        //   });
        //   text Switching
        gsap.from("#index-text-switch", {
            scrollTrigger: {
              trigger: "#index-text-switch",
              start: "top 80%",
              toggleActions: "play reverse play reverse",
              markers: false
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "power1.out"
          });
          
          //   Image Galleery Slider2
        gsap.from("#slider-container", {
            scrollTrigger: {
              trigger: "#slider-container",
              start: "top 80%",
              toggleActions: "play reverse play reverse",
              markers: false 
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "power1.out"
          });
        //   Experience animation
        // const tl2 = gsap.timeline({
        //     scrollTrigger: {
        //       trigger: ".xp-head",
        //       start: "top 80%",
        //       toggleActions: "play reverse play reverse",
        //       markers: false
        //     }
        //   });
          
        //   tl2.fromTo(
        //     ".xp-head",
        //     { opacity: 0 },
        //     { opacity: 1, duration: 1, ease: "power3.out" }
        //   );
          
        //   tl2.fromTo(
        //     ".xp-sub-head",
        //     { opacity: 0, x: 100 },
        //     { opacity: 1, duration: .5, x: 0, ease: "power3.out" }
        //   );
          
        //   tl2.fromTo(
        //     ".xp-note-container",
        //     { opacity: 0, y: 100 },
        //     { opacity: 1, duration: 1, y: 0, ease: "expo.out" }
        //   );
 //   Works Completed
        // gsap.from(".mini-works", {
        //     scrollTrigger: {
        //       trigger: ".mini-works",
        //       start: "top 80%",
        //       toggleActions: "play reverse play reverse",
        //       markers: true
        //     },
        //     opacity: 0,
        //     y: 100,
        //     duration: 1,
        //     ease: "power1.out"
        //   });
          //   About Section
        gsap.from("#main-about", {
            scrollTrigger: {
              trigger: "#main-about",
              start: "top 80%",
              toggleActions: "play reverse play none",
              markers: false
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "power1.out"
          });
           //   Beyond Note
        gsap.from(".beyond-ad", {
            scrollTrigger: {
              trigger: "#beyond",
              start: "40% 80%",
              toggleActions: "play reverse play reverse",
              markers: false
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "power1.out"
          });
           //   P1 and P2
        const tl3 = gsap.timeline({
            scrollTrigger: {
              trigger: ".trig-hr",
              start: "30% 60%",
              toggleActions: "play reverse play reverse",
              markers: false
            }
          });
          tl3.fromTo(
            ".trig-hr",
            { opacity: 0, height:0 },
            { opacity: 1, duration: 1, height:165 ,ease: "power3.out" }
          );
          tl3.fromTo(
            ".trig-logo",
            { opacity: 0},
            { opacity: 1, duration: 1, ease: "power3.out" }
          );
          
          tl3.fromTo(
            ".p1",
            { opacity: 0, x: -100 },
            { opacity: 1, duration: 1,x: 0, ease: "power3.out" }
          );
          
          tl3.fromTo(
            ".p2",
            { opacity: 0, x: 100 },
            { opacity: 1, duration: 1, x: 0, ease: "power3.out" }
          );
    }
// }