<!DOCTYPE html>
<html lang="en">
<?php
session_start();
if(!isset($_SESSION['username'])){
  header('Location: login_form.php');
}
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
        <!-- back button  -->
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
    <input name="main_images" type="file" required>
<!-- Echoing already existing file name -->
    <?php if (!empty($row['main_images'])): ?>
    <span><?php echo basename($row['main_images']); ?></span>
    <input type="hidden" name="existing_main_image" value="<?php echo $row['main_images']; ?>">
    <?php endif; ?><br><br>
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
    <select name="month" required>
        <option value="January" <?php echo ($row['month'] == 'January') ? 'selected' : ''; ?>>January</option>
        <option value="February" <?php echo ($row['month'] == 'February') ? 'selected' : ''; ?>>February</option>
        <option value="March" <?php echo ($row['month'] == 'March') ? 'selected' : ''; ?>>March</option>
        <option value="April" <?php echo ($row['month'] == 'April') ? 'selected' : ''; ?>>April</option>
        <option value="May" <?php echo ($row['month'] == 'May') ? 'selected' : ''; ?>>May</option>
        <option value="June" <?php echo ($row['month'] == 'June') ? 'selected' : ''; ?>>June</option>
        <option value="July" <?php echo ($row['month'] == 'July') ? 'selected' : ''; ?>>July</option>
        <option value="August" <?php echo ($row['month'] == 'August') ? 'selected' : ''; ?>>August</option>
        <option value="September" <?php echo ($row['month'] == 'September') ? 'selected' : ''; ?>>September</option>
        <option value="October" <?php echo ($row['month'] == 'October') ? 'selected' : ''; ?>>October</option>
        <option value="November" <?php echo ($row['month'] == 'November') ? 'selected' : ''; ?>>November</option>
        <option value="December" <?php echo ($row['month'] == 'December') ? 'selected' : ''; ?>>December</option>
    </select><br><br>
    <br>
    <input name="submit" type="submit" value="Edit">
</form>
<?php
$stmt = null;
?>
</body>
</html>
