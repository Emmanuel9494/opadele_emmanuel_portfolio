<!DOCTYPE html>
<html lang="en">
<?php
require_once('includes/connect_local.php');
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
<body id="submit-body">
    <h1 class="hidden">Welcome to Emmanuel Opadele's Portfolio</h1>
    <div class="bg-tex"></div>
    <section id="submit-main" class="gridk-con">
        <h2 class="hidden">Emmanuel Opadele submittion page</h2>
        <picture class=" col-span-full">
            <source srcset="images/dsk-submit.svg" media="(min-width: 1280px)">
            <source srcset="images/tb-submit.svg"  media="(min-width: 768px)">
            <source srcset="images/mb-submit.svg" >
            <!-- Fallback for browsers that do not support <picture> -->
            <img src="images/mb-submit.svg" alt="Responsive image">
        </picture>
        <div id="submit-content" class="grid-con">
            <a href="index.html" class="im1 col-span-full"><img src="images/red-Logo.svg" alt="brand Logo" ></a>
            <h2 class="greet1 col-span-full">- Aw'fr - Hi - Hola - Bawo - Salut - Nǐ hǎo -  </h2>
            <p class="greet2 col-span-full">You Made It Here!!!  </p>
            <p class="greet3 col-span-full">Thanks for hitting submit! Your form is off on its adventure through the digital realm. <br>Hold tight - we'll take it from here!</p>
            <a href="main_home.php" class="im2 col-span-full"><img src="images/close-icon.svg" alt="close-icon" ></a>
            <p class="greet4 col-span-full">[ .Developer And Designer. ] <br>See You Soon!</p>
        </div>
    </section> 
</body>
</html>