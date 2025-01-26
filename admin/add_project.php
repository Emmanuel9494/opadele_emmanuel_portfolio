<?php
require_once('../includes/connect.php');

$query = "INSERT INTO projects (project_title, main_images, client_name, collaboration, problem_info, solution_info, project_info_text, year, month) VALUES (?,?,?,?,?,?,?,?,?)";

$stmt = $connect->prepare($query);
$stmt->bindParam(1, $_POST['project_title'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['main_images'], PDO::PARAM_STR);
$stmt->bindParam(3, $_POST['client_name'], PDO::PARAM_STR);
$stmt->bindParam(4, $_POST['collaboration'], PDO::PARAM_STR);
$stmt->bindParam(5, $_POST['problem_info'], PDO::PARAM_STR);
$stmt->bindParam(6, $_POST['solution_info'], PDO::PARAM_STR);
$stmt->bindParam(7, $_POST['project_info_text'], PDO::PARAM_STR);
$stmt->bindParam(8, $_POST['year'], PDO::PARAM_INT);
$stmt->bindParam(9, $_POST['month'], PDO::PARAM_STR);

$stmt->execute();
$last_id = $connect->lastInsertId();
$stmt = null;
header('Location: project_list.php');
?>