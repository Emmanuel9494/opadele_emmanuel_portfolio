<!DOCTYPE html>
<html lang="en">
<?php
require_once('../includes/connect.php');
$query = 'SELECT * FROM projects WHERE projects.project_id = :projectid';
$stmt = $connect->prepare($query);
$projectid = $_GET['id'];
$stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);
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
                <!-- <li><a href="index.php">Content Editing</a></li> -->
				
            </ul>
        </div>
        <!-- Resume button  -->
        <div id="cv-resume" class="no-use l-col-start-8 l-col-span-2 m-col-start-8 m-col-span-2">
            <button><p> <button><p><a href="project_list.php">Go Back</a></p></button></p></button>
        </div>
        </section>
    </div>

 
<form action="edit_project.php" method="post">
    <input name="pk" type="hidden" value="<?php echo $row['project_id']; ?>">
    <label for="project_title">Project Title: </label>
    <input name="project_title" type="text" value="<?php echo $row['project_title']; ?>" required><br><br>
    <label for="main_images">Main Image: </label>
    <input name="main_images" type="text" value="<?php echo $row['main_images']; ?>" required><br><br>
    <label for="client_name">Client Name: </label>
    <input name="client_name" type="text" value="<?php echo $row['client_name']; ?>" required><br><br>
    <label for="collaboration">Collaboration: </label>
    <textarea name="collaboration" required><?php echo $row['collaboration']; ?></textarea><br><br>
    <label for="problem_info">Problem Info: </label>
    <textarea name="problem_info" required><?php echo $row['problem_info']; ?></textarea><br><br>
    <label for="solution_info">Solution Info: </label>
    <textarea name="solution_info" required><?php echo $row['solution_info']; ?></textarea><br><br>
    <label for="project_info_text">Project Information: </label>
    <textarea name="project_info_text" required><?php echo $row['project_info_text']; ?></textarea><br><br>
    <label for="year">Year: </label>
    <input name="year" type="number" value="<?php echo $row['year']; ?>" required><br><br>
    <label for="month">Month: </label>
    <input name="month" type="text" value="<?php echo $row['month']; ?>" required><br><br>
    <br>
    <input name="submit" type="submit" value="Edit">
</form>
<?php
$stmt = null;
?>
</body>
</html>
