<!DOCTYPE html>
<html lang="en">

<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login_form.php');
}

require_once('../includes/connect.php');
$stmt = $connect->prepare('SELECT project_id AS procases, project_title, main_images, client_name, collaboration, problem_info, solution_info, project_info_text, year, month FROM projects ORDER BY project_id ASC');

$stmt->execute();
?>

<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="../images/red-Logo.svg"  rel="icon" type="image/svg+xml">
        <link href="../css/reset.css" rel="stylesheet">
        <link href="../css/grid.css" rel="stylesheet">
        <link href="../css/main.css" rel="stylesheet">
        <title>E.O Porfolio CMS</title>
        <!-- Script Start-->
        <script defer src="https://unpkg.com/lenis@1.1.10/dist/lenis.min.js"></script>
        <script defer type="module" src="../js/main.js"></script> 
        <!-- Script End -->
</head>
<body>
<h1 class="hidden">Welcome to Emmanuel Opadele's Portfolio</h1>
<div id="top-nav" class="grid-con col-span-full">
        <section id="header" class=" full-width-grid-con grid-con ">
            <h2 class="hidden">Emmanuel's Portfolio Home Page</h2>

         <!-- Mobile Menu Icon -->
         <div class="container-mobile-top-logo no-use2 col-start-1 col-span-1">
             <img src="../images/mobile-menu-icon.svg" alt="menu">
         </div>

        <!-- Mobile Logo -->
        <div class="mobilie-top-logo no-use2 col-start-2 col-span-2 m-col-start-4">
         <a href="intro.html">
             <img src="../images/red-Logo.svg" alt="menu">
         </a>
      </div>
    
        <!-- Header Navigation -->
        <div id="head-nav" class=" mb-nav l-col-start-3 l-col-span-5 m-col-start-3 m-col-end-10">
            <ul>
                <li><a href="index.php">Content Editing</a></li>
				
            </ul>
        </div>
        <!-- Resume button  -->
        <div id="cv-resume" class="no-use l-col-start-8 l-col-span-2 m-col-start-8 m-col-span-2">
            <button><p><a href="logout.php">log out</a></p></button>
        </div>
        </section>
    </div>
<div class="grid-con">
  <div class="try col-span-full grid-con"></div>
</div>
    <br><br><br>
<?php

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
  echo '<p class="project-list col-span-3">'.
      //  '<img src="../images/'.$row['main_images'].'" alt="'.$row['project_title'].'">'.
       $row['project_title'].
       '<div class="cta-project">
            <button class="click-button">
                <a href="edit_project_form.php?id='.$row['procases'].'">edit</a>
            </button>
        </div>'.
       '<div class="cta-project">
            <button class="click-button">
                <a href="delete_project.php?id='.$row['procases'].'">delete</a>
            </button>
        </div>'.
       '</p>';
}




$stmt = null;

?>
</div>
</div>
<br><br><br>
<h3>Add a New Project</h3>
<form action="add_project.php" method="post" enctype="multipart/form-data">
    <label for="project_title">Project Title: </label>
    <input name="project_title" type="text" required><br><br>

    <label for="main_images">Main Image: </label>
    <input name="main_images" type="file" required><br><br>

    <label for="client_name">Client Name: </label>
    <input name="client_name" type="text" required><br><br>

    <label for="collaboration">Collaboration: </label>
    <textarea name="collaboration" required></textarea><br><br>

    <label for="problem_info">Problem Info: </label>
    <textarea name="problem_info" required></textarea><br><br>

    <label for="solution_info">Solution Info: </label>
    <textarea name="solution_info" required></textarea><br><br>

    <label for="project_info_text">Project Information: </label>
    <textarea name="project_info_text" required></textarea><br><br>

    <label for="year">Year: </label>
    <input name="year" type="number" required><br><br>

    <label for="month">Month: </label>
    <select name="month" required>
        <option value="" disabled selected>Select a month</option>
        <option value="January">January</option>
        <option value="February">February</option>
        <option value="March">March</option>
        <option value="April">April</option>
        <option value="May">May</option>
        <option value="June">June</option>
        <option value="July">July</option>
        <option value="August">August</option>
        <option value="September">September</option>
        <option value="October">October</option>
        <option value="November">November</option>
        <option value="December">December</option>
    </select>
    <br><br>

    <h3>Select Technologies for the Project</h3>
    <br><br>

<div id="techList">
    <?php
    // Fetch existing technologies
    $query = 'SELECT tech_id, tech_name FROM technologies';
    $result = $connect->query($query);
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<label><input type="checkbox" name="tech_ids[]" value="' . $row['tech_id'] . '"> ' . $row['tech_name'] . '</label><br>';
    }
    ?>
</div><br><br>

    <h3>Upload 3 Images for Multimedia Table</h3>
    <br><br>
    <label for="image1">Image 1:</label>
    <input type="file" name="images[]" accept="image/*" required><br>

    <label for="image2">Image 2:</label>
    <input type="file" name="images[]" accept="image/*" required><br>

    <label for="image3">Image 3:</label>
    <input type="file" name="images[]" accept="image/*" required><br><br>

    <input name="submit" type="submit" value="Add">
</form>



    <br><br><br>
    <br><br><br>
    
</body>
</html>
