<?php
session_start();
require_once('../includes/connect.php');
$query = 'SELECT * FROM users WHERE username = ? AND password = ?';
$stmt = $connect->prepare($query);
$stmt->bindParam(1, $_POST['username'], PDO::PARAM_STR);
$stmt->bindParam(2, $_POST['password'], PDO::PARAM_STR);
$stmt->execute();

//  What can come back from the query?
// if successful, we should have one roll

if($stmt->rowCount() == 1){
    // if successful
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    $_SESSION['username'] = $row['username'];
    header('Location: project_list.php');
}else{
    // go back to login form,
    header('Location: login_form.php');
}

$stmt = null;
?>