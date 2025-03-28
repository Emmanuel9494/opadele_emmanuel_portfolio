<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect.php');


$query = 'SELECT projects.project_id AS procases, project_title, client_name, year, month, GROUP_CONCAT(DISTINCT multimedia.media_name) AS images, 
    project_info_text, GROUP_CONCAT(DISTINCT technologies.tech_name) AS tech_name, collaboration, solution_info, problem_info FROM multimedia, projects, projects_techs, technologies WHERE projects.project_id = multimedia.project_id AND projects.project_id = projects_techs.project_id AND technologies.tech_id = projects_techs.tech_id AND projects.project_id = :project_id GROUP BY projects.project_id';


// $results = mysqli_query($connect, $query);
$stmt = $connect->prepare($query);
$project_id = $_GET['id'];
$stmt->bindParam(':project_id', $project_id , PDO::PARAM_INT);

$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

$stmt = null;

// $row = mysqli_fetch_assoc($results);

$image_array = explode(',', $row['images']);
$tech_array = explode(',', $row['tech_name']);

// Debugging: Visually Checking each image result for project ID
// echo '<pre style="color: white;">';
// print_r($image_array);
// echo '</pre>';

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
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/TextPlugin.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollToPlugin.min.js"></script>
    <script defer type="module" src="js/main.js"></script> 
    <!-- Script End -->
</head>
<body>
    <h1 class="hidden">Welcome to Emmanuel Opadele's Portfolio</h1>
    <div class="bg-tex"></div>
    
    <div id="top-nav" class="full-width-grid-con grid-con ">
        <section id="header">
            <h2 class="hidden">Emmanuel's Portfolio Home Page</h2>

         <!-- Mobile Menu Icon -->
         <div class="container-mobile-top-logo no-use2 col-start-1 col-span-1">
             <img src="images/mobile-menu-icon.svg" alt="menu">
         </div>

        <!-- Mobile Logo -->
        <div class="mobilie-top-logo no-use2 col-start-2 col-span-2 m-col-start-4">
         <a href="index.php">
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
        // $query_list = 'SELECT project_id AS procases, project_title FROM projects';
        // $results_list = mysqli_query($connect, $query_list);

$stmt2 = $connect->prepare("SELECT project_id AS procases, project_title FROM projects");

$stmt2->execute();

// while ($row_list = mysqli_fetch_array($results_list)) {
    while ($row_list = $stmt2->fetch(PDO::FETCH_ASSOC)) {
    echo '<li><a href="works.php?id=' . $row_list['procases'] . '">' . $row_list['project_title'] . '</a></li>';
}
?>
                        
            
                             <li><a href="#beyond">Beyond This Site</a></li>  
                          </ul>
                      </div>
                </li>
				<li><a href="#main-about" class="link-scroll no-tblet">About</a></li>
				<li><a href="#contact" class="link-scroll">Contact</a></li>
                <li class="no-tblet"><a href="documents/emmanuelopadeleresume.pdf" target="_blank" download="emmanuelopadeleresume.pdf">Download CV</a></li>
                <li><a href="#beyond" class="link-scroll">Beyond This Site</a></li>
                <p class="no-tblet">2024 Emmanuel Opadele</p>
            </ul>
        </div>
        <!-- Resume button  -->
        <div id="cv-resume" class="no-use l-col-start-8 l-col-span-2 m-col-start-8 m-col-span-2">
            <button><p><a href="documents/opadele_emmanuel_resume.docx" download="opadele_emmanuel_resume.docx">Download CV</a></p></button>
        </div>
        </section>
    </div>
    <!-- HERO SECTION -->
     
    <?php
echo '
<section id="work-hero-main" class="grid-con">
    <h2 class="hidden">Portfolio Biography</h2>
    <picture class=" col-span-full">
            <source srcset="images/dsk-works-hero.svg" media="(min-width: 1280px)">
            <source srcset="images/tb-works-hero.svg"  media="(min-width: 768px)">
            <source srcset="images/mb-works-hero.svg" >
            <!-- Fallback for browsers that do not support <picture> -->
            <img src="images/mb-works-hero.svg" alt="Responsive image">
        </picture>
    <div id="completed-work-intro" class="col-span-full">
        <h3 class="comp-head">Works Completed</h3>
        <p class="comp-title">Project Title</p>
        <h3 class="comp-sub-title">' . $row['project_title'] . '</h3>
        <p class="comp-sub-head">' . $row['client_name'] . '</p>
        <p class="comp-date"><span>[</span>' . $row['year'] . '-' . $row['month'] . '<span>]</span></p>
        <p class="comp-cta">Like What You See? <a href="#contact">Let\'s Work</a></p>
    </div>
</section>
<div class="grid-con work-show ws1">
     <img src="images/'.$image_array[0].'" alt="Project showcase" class="col-span-full">
</div>
<div id="p-info" class="grid-con">
    <h2 class="col-span-full">Project Overview</h2>
    <p class="col-span-full">' . $row['project_info_text'] . '</p>
</div>
<div class="grid-con work-show ws2">
     <img src="images/'.$image_array[1].'" alt="Project showcase" class="col-span-full">
</div>
<section id="project-details" class="grid-con">
    <div class="project-section col-span-full m-col-start-1 m-col-span-6 l-col-start-1 l-col-span-6">
        <div class="section-content">
            <h3 class="section-title">Technology Stack</h3>
            <p class="section-text">These are the technologies <br> used in the project.</p>
            <p class="section-text">' . implode(', ', $tech_array) . '</p>
        </div>
        
        <div class="grid-con work-show work-show-3">
            <img src="images/'.$image_array[2].'" alt="Project showcase" class="col-span-full big-img" >
        </div>
    </div>
    <div class=" col-span-full work-show work-show-2 m-col-start-7 m-col-span-6 l-col-start-7 l-col-span-6">
     <img src="images/'.$image_array[1].'" alt="Project showcase" class="col-span-full">
    </div>

    <div class="project-section col-span-full">
        <div class="section-content">
            <h3 class="section-title">Collaborations</h3>
            <p class="section-text">' . $row['collaboration'] . '</p>
        </div>
    </div>

    <div class="col-span-full work-show work-show-2 m-col-start-1 m-col-span-6 l-col-start-1 l-col-span-6">
     <img src="images/'.$image_array[2].'" alt="Project showcase" class="col-span-full">
</div>

    <div class="project-section col-span-full m-col-start-7 m-col-span-6 l-col-start-7 l-col-span-6">
        <div class="section-content">
            <h3 class="section-title">Challenge</h3>
            <p class="section-text">' . $row['problem_info'] . '</p>
        </div>
    </div>

    <div class="project-section col-span-full">
        <div class="section-content">
            <h3 class="section-title">Solution</h3>
            <p class="section-text">' . $row['solution_info'] . '</p>
        </div>
    </div>
</section>';
?>




    <!--  -->
         
            <!-- Beyond Site Section -->
             <section id="beyond" class="grid-con">
                <h2 class="col-span-full">Beyond This Site</h2>
                <img src="images/globe-icon.svg" alt="globe Icon" class="col-span-full icon">
                <p class="col-span-full b-notes">[ "Exploring these pages reveals more of my work and supports my creative journey. Each visit fuels the passion behind these projects making every click part of something greater." ]</p>
                <p class="my-name col-span-full">Emmanuel Opadele</p>
                <div class="beyond-ad col-start-1 col-span-2 m-col-start-1 m-col-span-3">
                    <img src="images/otm-pic-logo.png" alt="otm-logo">
                    <button class="click-button"><p><a href="coming-soon.html" target="_blank">optimum Pictures</a></p></button>
                </div>
                <div class="beyond-ad col-start-3 col-span-2 m-col-start-4 m-col-span-3">
                    <img src="images/hando-logo.png" alt="hando-logo">
                    <button class="click-button"><p><a href="coming-soon.html" target="_blank">Hando Entertaiment</a></p></button>
                </div>
                <div class="beyond-ad col-start-1 col-span-2 m-col-start-7 m-col-span-3">
                    <img src="images/kcr-logo.png" alt="kcr-logo">
                    <button class="click-button"><p><a href="coming-soon.html" target="_blank">Coderedoc Studios</a></p></button>
                </div>
                <div class="beyond-ad col-start-3 col-span-2 m-col-start-10 m-col-span-3">
                    <img src="images/otm-pic-logo.png" alt="otm-logo">
                    <button class="click-button"><p><a href="coming-soon.html" target="_blank">optimum Pictures</a></p></button>
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

                <form id="contactForm">

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
    
    <input type="submit" value="Send">
    <br><br>
    
    <section id="feedback"><p>*Please fill out all required sections</p></section>
</form>

                    </div>  
              </section>
              <footer class="grid-con">
                <h2 class="hidden">Thanks In advance</h2>
                <p class="col-start-1 col-span-2 m-col-start-3 m-col-span-4 p1">You Have an Idea?</p>
                <p class="col-start-3 col-span-2 m-col-start-7 col-span-3 p2">Let's Work</p>
                <hr class="col-span-full trig-hr">
                <img src="images/red-Logo.svg" alt="Emmanuel's brand Logo" class="footer-logo col-span-full trig-logo">
                <p class="col-span-full advance trig-adv">Thanks in Advance</p>
                <p class="col-span-full footer-note">Disclaimer: The works and projects on this site are for portfolio purposes only and may not reflect current availability or pricing. Trademarks and brands mentioned belong to their respective owners. For collaborations or inquiries, please contact me directly.</p>
                <div  class=" social-logo col-span-full">
                    <a href="https://www.instagram.com/olak_crola/#" target="_blank">
                        <img src="images/insta-logo.svg" alt="Emmanuel's Instagram Page">
                    </a>
                    <a href="https://www.linkedin.com/in/emmanuel-opadele-85b902289/" target="_blank">
                        <img src="images/linkdin-logo.svg" alt="Emmanuel's LinkedIn Page">
                    </a>
                    <a href="https://github.com/Emmanuel9494" target="_blank">
                        <img src="images/github-mark.svg" alt="Emmanuel's Github Page">
                    </a>
                </div>
                <p class="col-span-full rights">©2024 Emmanuel Opadele<br>All Rights Reserved—Privacy Policy.</p>
                <p class="col-span-full dand">[ . Developer And Designer .]</p>
               </footer>
            <!-- Just containers -->
             <section id="clean-up">
            <div class="blinkCursor text intro-bio cta-work"></div>
            <div id="slider-container"></div>
            <div id="main-about"></div>
            <div id="intro-text"></div>
            <div id="index-text-switch"></div>
            </section>
            

</body>
</html>