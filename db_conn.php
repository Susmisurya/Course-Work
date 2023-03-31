<?php
session_start();

$servername = "localhost";
$dbname = 'coursework_007';
$username = "root";
$password = "";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die(mysqli_error($conn));
}


?>