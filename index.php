<!DOCTYPE html>
<html lang="en">
<?php
 $cell=0;
//connect to the running database server and the specific database
require_once('includes/connect.php');

//create a query to run in SQL
// $query = 'SELECT project_id AS procases, project_title, project_info_text, main_images FROM projects';

$stmt = $connect->prepare("SELECT project_id AS procases, project_title, project_info_text, main_images FROM projects");

$stmt->execute();

//run the query to get back the content
// $results = mysqli_query($connect,$query);
?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="images/red-Logo.svg"  rel="icon" type="image/svg+xml">
        <link href="css/reset.css" rel="stylesheet">
        <link href="css/grid.css" rel="stylesheet">
        <link href="css/main.css" rel="stylesheet">
        <title>E.O Opadele</title>
        <!-- Script Start-->
        <script defer src="https://unpkg.com/lenis@1.1.10/dist/lenis.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
        <script defer src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
        <script defer type="module" src="js/main.js"></script> 
        <!-- Script End -->
</head>
<body>
    <h1 class="hidden">Welcome to Emmanuel Opadele's Portfolio</h1>
    <div class="bg-tex"></div>
    
    <div id="top-nav" class="grid-con col-span-full">
        <section id="header" class=" full-width-grid-con grid-con ">
            <h2 class="hidden">Emmanuel's Portfolio Home Page</h2>

         <!-- Mobile Menu Icon -->
         <div class="container-mobile-top-logo no-use2 col-start-1 col-span-1">
             <img src="images/mobile-menu-icon.svg" alt="menu">
         </div>

        <!-- Mobile Logo -->
        <div class="mobilie-top-logo no-use2 col-start-2 col-span-2 m-col-start-4">
         <a href="intro.html">
             <img src="images/red-Logo.svg" alt="menu">
         </a>
      </div>
    
        <!-- Header Navigation -->
        <div id="head-nav" class=" mb-nav l-col-start-3 l-col-span-5 m-col-start-3 m-col-end-10">
            <ul>
                <li><a href="index.php">Home</a></li>
				<li id="work-select" class="arrow-icon"><a href="#">Works</a>
                    <div class="sub-menu1 full-width-grid-con">
                         <ul class="">
                         <?php
                            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                                echo '<li><a href="works.php?id=' . $row['procases'] . '">' . $row['project_title']. '</a></li>';
                            }
                            $stmt = null;
                        ?>
            
                             <li><a href="#beyond">Beyond This Site</a></li>  
                          </ul>
                      </div>
                </li>
				<li><a href="#main-about" class="link-scroll">About</a></li>
				<li><a href="#contact" class="link-scroll">Contact</a></li>
                <li class="no-tblet"><a href="assets/cv-test.docx" download="cv-test.docx">Download CV</a></li>
                <li><a href="#beyond" class="link-scroll">Beyond This Site</a></li>
                <p class="no-tblet">2024 Emmanuel Opadele</p>
            </ul>
        </div>
        <!-- Resume button  -->
        <div id="cv-resume" class="no-use l-col-start-8 l-col-span-2 m-col-start-8 m-col-span-2">
            <button><p><a href="assets/cv-test.docx" download="cv-test.docx">Download CV</a></p></button>
        </div>
        </section>
    </div>
    <!-- HERO SECTION -->
    <section id="hero-main" class="grid-con">
        <h2 class="hidden"> Portfolio Biography</h2>
       
       
        <picture class=" col-span-full">
            <source srcset="images/dsk-hero.svg" media="(min-width: 1280px)">
            <source srcset="images/tb-hero.svg"  media="(min-width: 768px)">
            <source srcset="images/mb-hero.svg" >
            <!-- Fallback for browsers that do not support <picture> -->
            <img src="images/mb-hero-letter.svg" alt="Responsive image">
        </picture>
            <div  id="intro-text" class="col-span-full l-col-start-3">
                <div id="intro-names">
                    <h2 class="first-name">Emmanuel</h2>
                    <h2 class="last-name">Opadele</h2>
                </div>
                <h3 class="text"><span class="blinkCursor">_</span></h3>
                <p class="intro-bio">My passion merges innovation and technology as I blend creativity with technical skill to craft solutions that are both functional and visually captivating.</p>
                </div>

                <div  class=" cta-work l-col-start-6">
                    <button class="click-button"><p><a href="">Let's Work</a></p></button>
                </div>
     </section>
     <!-- WORKS COMPLETED -->
     <section id="works" class="grid-con">
                <h2 class="hidden">Completed Works byEmmanuel Opadele</h2>
                <h3 class="col-span-full">Work Completed</h3>
                <?php
                // mysqli_data_seek($stmt, 0);
                $stmt = $connect->prepare("SELECT project_id AS procases, project_title, project_info_text, main_images FROM projects");

                $stmt->execute();

                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
   
    
        $cell=$cell+1;
        /* the modulo operator % returns any remainder of dividing 2 numbers. For even numbers it returns 0 */
        if($cell % 2 > 0) {
            echo ' <div class="mini-works col-start-1 col-span-2 left m-col-start-1 m-col-span-6">';  
        }else{
            echo '<div class="mini-works  col-start-3 col-span-2 right m-col-start-7 m-col-span-6" >';
        }
        echo 
        '<img src="images/'.$row['main_images'].'" alt="'.$row['project_title'].'">
                                <h4>'.$row['project_title'].'</h4>
                                <p class="tb-works">'.$row['project_info_text'].'</p>
                                <div  class=" cta-work ">
                                    <button class="click-button"><p><a href="works.php?id=' . $row['procases'] . '">Learn More</a></p></button>
                                </div>
                            </div>';
}
$stmt = null;
?>
                
                    <!-- <div class="mini-works col-start-1 col-span-2 left m-col-start-1 m-col-span-6">
                        <img src="images/zima-main-logo.png" alt="Zima Rebrand">
                        <h4>Zima Rebrand</h4>
                        <p class="tb-works">This project was part of my academic deliverables, where I was tasked with rebranding Zima, a beer energy drink, to enhance its market presence and drive sales. The rebrand focused on developing a fresh, modern identity that resonates with the target audience while positioning the product as a competitive choice in the beverage industry.</p>
                        <div  class=" cta-work ">
                            <button class="click-button"><p><a href="">Learn More</a></p></button>
                        </div>
                    </div>
                    <div class="mini-works  col-start-3 col-span-2 right m-col-start-7 m-col-span-6" >
                        <img src="images/kavorka-main-logo.png" alt="Kavorka Cosmetics">
                        <h4>Zima Rebrand</h4>
                        <p>This project was part of my academic deliverables, where I was tasked with rebranding Zima, a beer energy drink, to enhance its market presence and drive sales. The rebrand focused on developing a fresh, modern identity that resonates with the target audience while positioning the product as a competitive choice in the beverage industry.</p>
                        <div  class=" cta-work ">
                            <button class="click-button"><p><a href="">Learn More</a></p></button>
                        </div>
                    </div> -->
               </section>
     <!-- Image Slides -->
      <div id="slider-container" class="grid-con">
      <section id="main-slider" class="col-span-full m-col-span-full">
        <div class="slider">
            <!-- Buttons -->
            <div class="slides col-span-full m-col-span-full">
                <input type="radio" name="radio-btn" id="radio1">
                <input type="radio" name="radio-btn" id="radio2">
                <input type="radio" name="radio-btn" id="radio3">
                <input type="radio" name="radio-btn" id="radio4">
                <input type="radio" name="radio-btn" id="radio5">
                <!--  -->
                <div class="slide first">
                    <img src="images/brand-mockup2.png" alt="">
                </div>
                <div class="slide">
                    <img src="images/zima-4-cans.png" alt="">
                </div>
                <div class="slide">
                    <img src="images/kavorka-ad2.png" alt="">
                </div>
                <div class="slide">
                    <img src="images/zima-dark-label.png" alt="">
                </div>
                <div class="slide">
                    <img src="images/brand-mockup.png" alt="">
                </div>
            </div>
            <div class="navigation-manual col-span-full">
                <label for="radio1" class="manual-btn"></label>
                <label for="radio2" class="manual-btn"></label>
                <label for="radio3" class="manual-btn"></label>
                <label for="radio4" class="manual-btn"></label>
                <label for="radio5" class="manual-btn"></label>
            </div>
        </div>
      </section>
      </div>
      <!-- Skill Switch -->
       <section id="brand-name" class="grid-con">
        <h2 class="hidden"> Skills and Services</h2>
      
        <div class="f-named col-start-1 col-span-1">
            <span>E</span>
            <span>m</span>
            <span>m</span>
            <span>a</span>
            <span>n</span>
            <span>u</span>
            <span>e</span>
            <span>l</span>
        </div>
        <div class="l-named col-start-4 col-span-1 m-col-start-11 m-col-span-1">
            <span>O</span>
            <span>p</span>
            <span>a</span>
            <span>d</span>
            <span>e</span>
            <span>l</span>
            <span>e</span>
        </div>
       </section>
        <!-- skill switch -->
       
        <div id="index-text-switch" class="grid-con">
           
            <p class="top-text-switch col-span-full">Ux / Ui Designer</p>
            <p class="middle-text-switch col-span-full">Developer</p>
            <p class="bottom-text-switch col-span-full">2D / 3D Artist</p>
            </div>
            
                 <!--Video Reel Section  -->
        
            <section id="reel-box" class="col-span-4 ">
                <h2 class="hidden"> Emmanuel's Porfolio Video reels</h2>
                <video id="video-player" controls preload="metadata" poster="images/e-o-placeholder.png" play>
                    <source src="videos/opadele_emmanuel_demo-reel-2024.mp4" type="video/mp4">
                    <source src="videos/opadele_emmanuel_demo-reel-2024.webm" type="video/webm">
                    <p>Anyways Your browser does not support this video don't ask why buy a new device</p>
                </video>
                <!-- Count down circle -->
                <div id="countdown-circle">
                    <span id="countdown-text">0</span>
                </div>
                <!-- custom video control -->
                <div id="video-controls" class="hidden video-controls ">
                    <img src="images/ctrl-left.svg" alt="left Bracket ignore" id="ctrl-left">
                    <button id="play-button"><img src="images/ctrl-play.svg" alt="Play button"></button>
                    <button id="pause-button"><img src="images/ctrl-pause.svg" alt="Pause button"></button>
                    <button id="stop-button"><img src="images/ctrl-stop.svg" alt="stop button"></button>
                    <img src="images/ctrl-right.svg" alt="right bracket ignore" id="ctrl-right">
                    <img src="images/ctrl-volume.svg" alt="volume button" id="volume">
                    <input type="range" id="change-vol" step="0.05" min="0" max="1" value="0.2">
                    <button id="full-screen"><img src="images/ctrl-expand.svg" alt="Full Screen button"></button>
                </div>
            </section>
            <!-- Experience Section -->
             <section id="xp-rience" class="grid-con">
                <h2 class="hidden"> Skills and Services based On My Experience</h2>
                <h3 class="xp-head col-span-full">Experience</h3>
                <h4 class="xp-sub-head col-span-full">Front-end / Back-End Developer</h4>
                <div class="xp-note-container col-span-full">
                    <img src="images/left-arrow-icon.svg" alt="Left Arrow" class="left-arrow">
                    <p class="xp-note">As an experienced front-end and back-end developer, I deliver innovative, user-centric solutions. My expertise in design, coding languages, and commitment to excellence consistently elevate digital experiences.</p>
                    <img src="images/right-arrow-icon.svg" alt="right Arrow" class="right-arrow">
                </div>
             </section>
             <!-- divider -->
              <div class="full-width-grid-con">
                <hr class="col-span-full">
              </div>
              
                    <!-- About Section -->
                     <section id="main-about" class="grid-con main-about">
                        <h2 class="col-span-full">About</h2>
                        <div  class=" social-logo col-span-full">
                            <img src="images/fb-logo.svg" alt="Emmanuel's Facebook Page">
                            <img src="images/insta-logo.svg" alt="Emmanuel's Instagram Page">
                            <img src="images/x-logo.svg" alt="Emmanuel's x Page">
                            <img src="images/linkdin-logo.svg" alt="Emmanuel's Linkden Page">
                        </div>
                        <p class="col-span-full">[ . Full Stack Dev. Creator. Visual Engineer .] <br> Let's Work!</p>
                        <!-- tabs -->
                        <div class=" abt-tab col-span-full">
                            <p class="abt-head">Who Am I?</p>
                            <p class="abt-note">My passion merges innovation and technology as I blend creativity with technical skill to craft solutions that are both functional and visually captivating.</p>
                         </div>
                         <div class=" abt-tab col-span-full">
                            <p class="abt-head">Certificates</p>
                            <p class="abt-note">In Progress...</p>
                         </div>
                         <div class=" abt-tab col-span-full">
                            <p class="abt-head">Lifestyle</p>
                            <p class="abt-note">Life driven by curiosity and exploration, constantly seeking to bridge the gap between functionality and aesthetics.</p>
                         </div>
                     </section>
            <!-- Beyond Site Section -->
             <section id="beyond" class="grid-con">
                <h2 class="col-span-full">Beyond This Site</h2>
                <img src="images/globe-icon.svg" alt="globe Icon" class="col-span-full icon">
                <p class="col-span-full b-notes">[ "Exploring these pages reveals more of my work and supports my creative journey. Each visit fuels the passion behind these projects making every click part of something greater." ]</p>
                <p class="my-name col-span-full">Emmanuel Opadele</p>
                <div class="beyond-ad col-start-1 col-span-2 m-col-start-1 m-col-span-3">
                    <img src="images/otm-pic-logo.png" alt="otm-logo">
                    <button class="click-button"><p><a href="#">optimum Pictures</a></p></button>
                </div>
                <div class="beyond-ad col-start-3 col-span-2 m-col-start-4 m-col-span-3">
                    <img src="images/hando-logo.png" alt="hando-logo">
                    <button class="click-button"><p><a href="#">Hando Entertaiment</a></p></button>
                </div>
                <div class="beyond-ad col-start-1 col-span-2 m-col-start-7 m-col-span-3">
                    <img src="images/kcr-logo.png" alt="kcr-logo">
                    <button class="click-button"><p><a href="#">Coderedoc Studios</a></p></button>
                </div>
                <div class="beyond-ad col-start-3 col-span-2 m-col-start-10 m-col-span-3">
                    <img src="images/otm-pic-logo.png" alt="otm-logo">
                    <button class="click-button"><p><a href="#">optimum Pictures</a></p></button>
                </div>
             </section>
             <!-- Contact Section -->
              <section id="contact" class="grid-con">
                <h2 class="hidden">How To Reach Emmanuel Opadele</h2>
                <h3 class="col-span-full">Contact</h3>
                <img src="images/email-icon.svg" alt="email Icon" class="email col-span-full">
                <p class="col-span-full">[ . Full Stack Dev. Creator. Visual Engineer .] <br> Let's Work!</p>
                <!-- Contact form -->
                <div class="col-span-full">

                    <form method="post" action="sendmail.php">
                    <label for="first_name">First Name: </label>
                    <input type="text" name="first_name" id="first_name">
                    <br><br>
                    <label for="last_name">Last Name: </label>
                    <input type="text" name="last_name" id="last_name">
                    <br><br>
                    <label for="email">Email: </label>
                    <input type="text" name="email" id="email">
                    <br><br>
                    <label for="comments">Messages: </label>
                    <textarea name="comments" id="comments" placeholder="comment here"></textarea>
                    <br><br>
                    <input type="submit" value="send">
                    </form>

                    </div>  
              </section>
              <!-- Footer -->
               <footer class="grid-con">
                <h2 class="hidden">Thanks In advance</h2>
                <p class="col-start-1 col-span-2 m-col-start-3 m-col-span-4 p1">You Have an Idea?</p>
                <p class="col-start-3 col-span-2 m-col-start-7 col-span-3 p2">Let's Work</p>
                <hr class="col-span-full trig-hr">
                <img src="images/red-Logo.svg" alt="Emmanuel's brand Logo" class="footer-logo col-span-full trig-logo">
                <p class="col-span-full advance trig-adv">Thanks in Advance</p>
                <p class="col-span-full footer-note">Disclaimer: The works and projects on this site are for portfolio purposes only and may not reflect current availability or pricing. Trademarks and brands mentioned belong to their respective owners. For collaborations or inquiries, please contact me directly.</p>
                <div  class=" social-logo col-span-full">
                    <img src="images/fb-logo.svg" alt="Emmanuel's Facebook Page">
                    <img src="images/insta-logo.svg" alt="Emmanuel's Instagram Page">
                    <img src="images/x-logo.svg" alt="Emmanuel's x Page">
                    <img src="images/linkdin-logo.svg" alt="Emmanuel's Linkden Page">
                </div>
                <p class="col-span-full rights">©2024 Emmanuel Opadele<br>All Rights Reserved—Privacy Policy.</p>
                <p class="col-span-full dand">[ . Developer And Designer .]</p>
               </footer> 
</body>
</html>