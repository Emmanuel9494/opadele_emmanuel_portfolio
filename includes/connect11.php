<?php
//Creates a connection to the database. This code is 'included' into another file, as if it is pasted into the other file.
// $connect = new mysqli('localhost','root','','portfolio');

$dsn = "mysql:host=localhost;dbname=usmubh24_portfolio;charset=utf8mb4";
try {
$connect = new PDO($dsn, 'usmubh24_general_user', 'genuserOLA-ola94-9-4&mide@94');
} catch (Exception $e) {
  error_log($e->getMessage());
  exit('unable to connect');
}
?>