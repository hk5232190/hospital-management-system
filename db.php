<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Your real database details
$servername = "sql205.infinityfree.com";
$username   = "if0_41803137";
$password   = "";
$dbname     = "if0_41803137_hospital_db";

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
