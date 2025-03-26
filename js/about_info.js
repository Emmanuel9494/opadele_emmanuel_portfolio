// about Tabs
export  function aboutInfo() {
   

    
        const tabs = document.querySelectorAll(".abt-tab");
    
        tabs.forEach((tab) => {
            const head = tab.querySelector(".abt-head");
    
            head.addEventListener("click", () => {
                tab.classList.toggle("active");
    
                const note = tab.querySelector(".abt-note");
                if (tab.classList.contains("active")) {
                    note.style.display = "block";
    
                    gsap.from(note, {
                        opacity: 1,
                        y: -10,
                        duration: 1
                    });
                } else {
                    note.style.display = "none";
                }
            });
        });
    }
    
