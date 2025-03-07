export  function smoothScroll() {
    if (window.location.pathname.includes("index.php") || (window.location.pathname.includes("works.php"))){
    gsap.registerPlugin(ScrollTrigger);
  
    // Lenis smooth website scrolling---gsap
    const lenis = new Lenis()
    
    lenis.on('scroll', ScrollTrigger.update)
    
    gsap.ticker.add((time) => {
        lenis.raf(time * 1000)
    })
    
    gsap.ticker.lagSmoothing(0)
  }}