<?php
session_start();
require 'auth.php';
check_login();
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div>
    <h1 style="text-align: center; padding: 30px; border-radius: 10px; background-color: #030712; color: whitesmoke">Complain List</h1>
</div>

<a class="green-button" href="create.php" style="height: 30px">Add Complain</a>

<table class="basic-table">
    <thead>
        <tr>
            <th>#</th>
            <th>Title</th>
            <th>Description</th>
            <th>Type</th>
            <th>DateTime</th>
            <th>Priority</th>
            <th>Actions</th>
        </tr>
    </thead>

    <tbody>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "kawshan6358";
    $dbname = "neighborhood";

    $connection =new mysqli($servername, $username, $password, $dbname);
    if ($connection->connect_error) {
        die("connection error".$connection->connect_error);
    }


    $sql = "SELECT * FROM complain order by id desc";
    $result=$connection->query($sql);


    if (!$result){
        die("invalid query".$connection->error);
    }

    while ($row=$result->fetch_assoc()){
        echo "
            <tr>
                <td>$row[id]</td>
                <td>$row[title]</td>
                <td>$row[description]</td>
                <td>$row[type]</td>
                <td>$row[datetime]</td>
                <td>$row[priority]</td>
                <td style='display: flex; justify-content: center;'>
                <a href='edit.php?id=$row[id]' class='orange-button'>Edit</a>
                <a href='delete.php?id=$row[id]' class='red-button'>delete</a>
                </td>
            </tr>


";
    }


    ?>
    </tbody>

</table>



</body>
</html>
