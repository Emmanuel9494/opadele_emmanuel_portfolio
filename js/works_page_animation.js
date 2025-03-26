// Animations and Scroll Triggers Works page
export  function worksPageAnimation() {
    if (window.location.pathname.includes("works.php")){
        gsap.registerPlugin(ScrollTrigger);
        gsap.registerPlugin(ScrollToPlugin);
        const tl = gsap.timeline();

        tl.fromTo(
          ".comp-head",
          { opacity: 0 },
          { opacity: 1, duration: .5, ease: "power2.out" }
        );
        
        tl.fromTo(
          ".comp-title",
          { opacity: 0, y: 100 },
          { opacity: 1, duration: .5, y: 0, ease: "back.out(1.7)" }
        );
        tl.fromTo(
            ".comp-sub-title",
            { opacity: 0, y: 100 },
            { opacity: 1, duration: .5, y: 0, ease: "power2.out" }
          );
          tl.fromTo(
            ".comp-sub-head",
            { opacity: 0, y: 100 },
            { opacity: 1, duration: .5, y: 0, ease: "back.out(1.7)" }
          );
          tl.fromTo(
            ".comp-date",
            { opacity: 0, y: 100 },
            { opacity: 1, duration: .5, y: 0, ease: "power2.out" }
          );
          tl.fromTo(
            ".comp-cta",
            { opacity: 0, y: 100 },
            { opacity: 1, duration: .5, y: 0, ease: "back.out(1.7)" }
          );
        //   Image Galleery Slider
        gsap.from(".ws1", {
            scrollTrigger: {
              trigger: ".ws1",
              start: "top 80%",
              toggleActions: "play reverse play reverse",
              markers: false 
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "power1.out"
          });
            //   Project Info
        gsap.from("#p-info", {
            scrollTrigger: {
              trigger: "#p-info",
              start: "top 80%",
              toggleActions: "play reverse play reverse",
              markers: false 
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "back.out(1.7)"
          });
            //   Show Image
        gsap.from(".ws2", {
            scrollTrigger: {
              trigger: ".ws2",
              start: "top 80%",
              toggleActions: "play reverse play reverse",
              markers: false 
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "back.out(1.7)"
          });
       
          
         
        // //   Experience animation
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
        //       markers: false
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
              toggleActions: "play reverse play reverse",
              markers: false
            },
            opacity: 0,
            y: 100,
            duration: 1,
            ease: "power1.out"
          });
           //   Beyond Note
        // gsap.from(".beyond-ad", {
        //     scrollTrigger: {
        //       trigger: "#beyond",
        //       start: "40% 80%",
        //       toggleActions: "play reverse play reverse",
        //       markers: false
        //     },
        //     opacity: 0,
        //     y: 100,
        //     duration: 1,
        //     ease: "power1.out"
        //   });
            //   Beyond notes
        // gsap.from(".b-notes", {
        //     scrollTrigger: {
        //       trigger: ".b-notes",
        //       start: "top 80%",
        //       toggleActions: "play reverse play reverse",
        //       markers: false 
        //     },
        //     opacity: 0,
        //     y: 100,
        //     duration: 1,
        //     ease: "back.out(1.7)"
        //   });
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
}