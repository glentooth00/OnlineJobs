<?php
$host = 'localhost'; 
$user = 'root';  
$password = ''; 
$database = 'job_portal'; 


$connection = mysqli_connect($host, $user, $password, $database);


if (!$connection) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
