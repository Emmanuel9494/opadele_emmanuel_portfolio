<?php
require_once('../includes/connect.php');
$query = 'DELETE FROM projects WHERE projects.project_id = :projectid';
$stmt = $connect->prepare($query);
$projectid = $_GET['id'];
$stmt->bindParam(':projectid', $projectid, PDO::PARAM_INT);
$stmt->execute();
$stmt = null;
header('Location: project_list.php');
?>