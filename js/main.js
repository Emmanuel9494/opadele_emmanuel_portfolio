(function () {
  // Check if the current page is 'index.html'
  if (window.location.pathname.includes("index.html")) {

      console.log("JAVA SCRIPT RUNNING!");
      
      // VARIABLES
      const menuButton = document.querySelector(".container-mobile-top-logo");
      const menuNav = document.querySelector("#head-nav");
      const works = document.querySelector("#work-select");
      const subMenu1 = document.querySelector(".sub-menu1");
     
      

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


// DEVELOPER AND DESIGNER TEXT ANIMATION
(function () {
  // Check if the current page is 'intro.html'
  if (window.location.pathname.includes("index.html")) {


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
      
}})();

// CUSTOM VIDEO
(function () {
  const player = document.querySelector('video');
const videoControls = document.querySelector('#video-controls');
const playerButton = document.querySelector('#play-button');
const pauseButton = document.querySelector('#pause-button');
const stopButton = document.querySelector('#stop-button');
const volumeSlider = document.querySelector('#change-vol');
const fullScreen = document.querySelector('#full-screen');
const videoContainer = document.querySelector('#reel-box');
const soundButton = document.querySelector('#volume');
// 4. // video Count Down 
const video = document.querySelector('#video-player');
const countdownText = document.querySelector('#countdown-text');
let countdownInterval;
let timeRemaining = 0;


player.controls = false;
videoControls.classList.remove('hidden');


// Functions
function playVideo(){
    console.log("Play Button Clicked")
    player.play();
    startCountdown();
}

function pauseVideo(){
    console.log("Pause button Clicked")
    player.pause();
    clearInterval(countdownInterval); 
}

function stopVideo(){
    console.log("Stop button Clicked")
    player.pause();
    player.currentTime = 1;
    video.currentTime = 0;
    clearInterval(countdownInterval);
    timeRemaining = Math.floor(video.duration); // Reset countdown to full duration
    countdownText.textContent = timeRemaining;
}

function screenPauseEtPlay(){
    if (player.paused) {
        player.play();  // If video is paused, play it
        startCountdown(); // Start the countdown
      } else {
        player.pause();  // If video is playing, pause it
        clearInterval(countdownInterval); // Stop countdown when the video ends
      }
}
function changeVolume(){
    console.log(volumeSlider.value); 
    console.log('Volume changing');
    player.volume = volumeSlider.value;
    if (volumeSlider.value == 0) {
        player.muted = true; // If slider is set to 0, mute the video
        soundButton.src = 'images/icon-volume-mute.svg'; // Change to muted icon
    } else {
        player.muted = false; // Unmute if slider changes to non-zero
        player.volume = volumeSlider.value; // Set video volume to slider value
        soundButton.src = 'images/ctrl-volume.svg'; // Change back to unmuted icon
    }
}
function toggleFullScreen(){
    console.log('Full Screen Toggled');
    if(document.fullscreenElement){
        document.exitFullscreen();
    } else if(document.webkitFullScreenElement){
        document.webkitexitFullscreen();

    } else if(videoContainer.webkitRequestFullscreen){
        videoContainer.webkitRequestFullscreen();
    } else {
        videoContainer.requestFullscreen();
    }
}
function showControls(){
    console.log('video controls hidden');
    videoControls.classList.remove('hide');
}
function hideControls(){
    if(player.paused){
        return;
    }
    videoControls.classList.add('hide');
}
function muteOrUnmute() {
    
    if (player.muted) {
        player.muted = false; // Unmute the video
        volumeSlider.value = player.volume; // Update slider to current volume
        soundButton.src = 'images/ctrl-volume.svg'; 
        console.log('Sound On');
    } else {
        player.muted = true; // Mute the video
        volumeSlider.value = 0; // Set slider to 0
        soundButton.src = 'images/icon-volume-mute.svg'; 
        console.log('Sound Off');
    }
}
// 4. // video Count Down
// Countdown timer
function startCountdown() {
    clearInterval(countdownInterval); // Ensure no multiple intervals
    countdownInterval = setInterval(() => {
      timeRemaining = Math.floor(video.duration - video.currentTime);
      countdownText.textContent = timeRemaining;
      
      if (timeRemaining <= 0) {
        clearInterval(countdownInterval); // Stop countdown when the video ends
      }
    }, 1000); // Update every second
  }
// Load video metadata to get the video duration
video.addEventListener('loadedmetadata', () => {
    timeRemaining = Math.floor(video.duration); // Get total video duration in seconds
    countdownText.textContent = timeRemaining; // Display the initial duration in the circle
  });


  // Custom video control Events
playerButton.addEventListener("click", playVideo);
pauseButton.addEventListener("click", pauseVideo);
stopButton.addEventListener("click", stopVideo);
player.addEventListener("click", screenPauseEtPlay);
volumeSlider.addEventListener("change", changeVolume);
fullScreen.addEventListener("click", toggleFullScreen);
videoControls.addEventListener("mouseenter", showControls);
videoControls.addEventListener("mouseleave", hideControls);
player.addEventListener("mouseenter", showControls);
player.addEventListener("mouseleave", hideControls);
soundButton.addEventListener("click", muteOrUnmute);

})();

// Experience Loop
(function () {
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

})();

