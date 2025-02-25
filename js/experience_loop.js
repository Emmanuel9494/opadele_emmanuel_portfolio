// Experience Loop
export  function experienceLoop() {
    if (window.location.pathname.includes('main_home.php')) {
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


function skills(skill) {
  subHead.textContent = experiences[skill].title;
  note.textContent = experiences[skill].note;
}

leftArrow.addEventListener("click", () => {
  xpCount = (xpCount - 1 + experiences.length) % experiences.length;
  skills(xpCount);
});

rightArrow.addEventListener("click", () => {
  xpCount = (xpCount + 1) % experiences.length;
  skills(xpCount);
});

skills(xpCount);
    }

}