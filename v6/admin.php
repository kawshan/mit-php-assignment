<?php

session_start();
require_once "auth.php";

check_admin();

$servername="localhost";
$username="root";
$password = "kawshan6358";
$dbname = "neighborhood";

$conn = new mysqli($servername, $username, $password, $dbname);

// summary counts
$total = $conn->query("SELECT COUNT(*) AS c FROM complain")->fetch_assoc()['c'];
$high = $conn->query("SELECT COUNT(*) AS c FROM complain WHERE priority='High'")->fetch_assoc()['c'];
$noise = $conn->query("SELECT COUNT(*) AS c FROM complain WHERE type='Noise'")->fetch_assoc()['c'];
$garbage = $conn->query("SELECT COUNT(*) AS c FROM complain WHERE type='Garbage'")->fetch_assoc()['c'];
$parking = $conn->query("SELECT COUNT(*) AS c FROM complain WHERE type='Parking'")->fetch_assoc()['c'];

?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h1>Admin Dashboard</h1>
<h2>Summary</h2>
<ul>
    <li>Total Complaints: <strong> <?= $total ?>  </strong> </li>
    <li>High Priority Complaints <strong> <?=$high ?> </strong> </li>
    <li>Noise Complaints <strong><?=$noise ?></strong> </li>
    <li>Garbage Complaints <strong><?=$garbage ?></strong> </li>
    <li>Parking Complaints <strong><?=$parking ?></strong> </li>
</ul>
<hr>
<h2>Quick Links</h2>
<ul>
    <li><a href="create.php">Add New Complaint</a></li>
    <li><a href="index.php">View Complaints</a></li>

    <!-- NEW LINK FOR USER CRUD -->
    <li><a href="user_list.php">Manage Users</a></li>

    <li><a href="logout.php">Logout</a></li>
</ul>


</body>
</html>












