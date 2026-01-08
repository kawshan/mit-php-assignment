<?php

//start session for all pages
session_start();

//database connection
$servername = "localhost";
$username = "root";
$password = "kawshan6358";
$dbname = "neighborhood";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn -> connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


//function to check if user is logged in
function check_login(){
    if (!isset($_SESSION['user'])){
        header('Location: login.php');
        exit();
    }
}


// Function to check if user is admin
function check_admin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: login.php");
        exit();
    }
}



?>