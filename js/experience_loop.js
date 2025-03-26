// Experience Loop
document.addEventListener('DOMContentLoaded', () => {
    const experiences = [
        {
            title: "Front-end / Back-End Developer",
            note: "As an experienced front-end and back-end developer, I deliver innovative, user-centric solutions. My expertise in design, coding languages, and commitment to excellence consistently elevate digital experiences."
        },
        {
            title: "UX/UI Designer",
            note: "As a UX/UI Designer, I create intuitive and user-focused interfaces. I balance aesthetics with functionality, leveraging design tools and user feedback to craft meaningful digital experiences."
        },
        {
            title: "3D Artist",
            note: "As a 3D Artist, I bring ideas to life with detailed modeling, rendering, and animation. My work enhances branding, product visualization, and immersive digital models."
        }
    ];

    let xpCount = 0; 
    const subHead = document.querySelector(".xp-sub-head");
    const note = document.querySelector(".xp-note");
    const leftArrow = document.querySelector(".left-arrow");
    const rightArrow = document.querySelector(".right-arrow");

    // Add transition classes
    function addTransitionClasses() {
        subHead.style.transition = 'opacity 0.3s ease';
        note.style.transition = 'opacity 0.3s ease';
    }

    // Remove transition classes after animation
    function removeTransitionClasses() {
        setTimeout(() => {
            subHead.style.transition = '';
            note.style.transition = '';
        }, 300);
    }

    function updateContent(skill) {
        // Fade out
        subHead.style.opacity = '0';
        note.style.opacity = '0';

        // Update content after fade out
        setTimeout(() => {
            subHead.textContent = experiences[skill].title;
            note.textContent = experiences[skill].note;
            
            // Fade in
            subHead.style.opacity = '1';
            note.style.opacity = '1';
        }, 300);
    }

    function skills(skill) {
        addTransitionClasses();
        updateContent(skill);
        removeTransitionClasses();
    }

    // Add click handlers with debounce
    let isTransitioning = false;

    function handleArrowClick(direction) {
        if (isTransitioning) return;
        
        isTransitioning = true;
        
        if (direction === 'left') {
            xpCount = (xpCount - 1 + experiences.length) % experiences.length;
        } else {
            xpCount = (xpCount + 1) % experiences.length;
        }
        
        skills(xpCount);
        
        setTimeout(() => {
            isTransitioning = false;
        }, 300);
    }

    // Only add event listeners if elements exist
    if (leftArrow && rightArrow) {
        leftArrow.addEventListener("click", () => handleArrowClick('left'));
        rightArrow.addEventListener("click", () => handleArrowClick('right'));
        
        // Initialize content
        skills(xpCount);
    }
});
    

