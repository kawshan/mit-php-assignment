<?php
session_start();
require 'auth.php';
check_admin();


if (isset($_GET["id"])){
    $id = $_GET["id"];

    $servername = "localhost";
    $username = "root";
    $password = "kawshan6358";
    $dbname = "neighborhood";

    $connection = new mysqli($servername, $username, $password, $dbname);

    $sql = "DELETE FROM complain WHERE id=$id";
    $connection->query($sql);
}
header("Location:index.php");
exit;




?>