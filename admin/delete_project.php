<?php
require_once('../includes/connect.php');

// Start a transaction to ensure data consistency
$connect->beginTransaction();

// Get the project ID
$projectid = $_GET['id'];

try {
    $query = 'SELECT media_name FROM multimedia WHERE project_id = :projectid';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
    $stmt->execute();
    $files = $stmt->fetchAll(PDO::FETCH_COLUMN);

    // Deleting files From multimedia from the server
    foreach ($files as $file) {
        $filePath = '../images/' . $file;
        if (file_exists($filePath)) {
            unlink($filePath);
        }

        $filePath = '../videos/' . $file;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }

     // Fetching main images from projects table
     $query2 = 'SELECT main_images FROM projects WHERE project_id = :projectid';
     $stmt2 = $connect->prepare($query2);
     $stmt2->bindParam(':projectid', $projectid, PDO::PARAM_INT);
     $stmt2->execute();
     $files2 = $stmt2->fetchAll(PDO::FETCH_COLUMN);
 
     // Delete main_images from projects from the server
     foreach ($files2 as $file) { 
         $filePath = '../images/' . $file;
         if (file_exists($filePath)) {
             unlink($filePath);
         }
     }

    // Deleting From multimedia 
    $query = 'DELETE FROM multimedia WHERE project_id = :projectid';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
    $stmt->execute();

    // Deleting From projects_techs
    $query = 'DELETE FROM projects_techs WHERE project_id = :projectid';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
    $stmt->execute();

    // Deleting From projects
    $query = 'DELETE FROM projects WHERE project_id = :projectid';
    $stmt = $connect->prepare($query);
    $stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
    $stmt->execute();

    // Commit the transaction
    $connect->commit();
    $stmt = null;
    header('Location: project_list.php'); // Redirect after deletion
} catch (Exception $e) {
    // Rollback the transaction if something goes wrong
    $connect->rollBack();
    echo "Error: " . $e->getMessage();
}
?>
