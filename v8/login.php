<?php
require 'db.php';

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    //query to check user
    $sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
    $result = $conn->query($sql);


    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION['user'] = $row['username'];
        $_SESSION['role'] = $row['role'];
        $_SESSION['user_id'] = $row['id'];
        header("Location: home.php");
        exit;
    } else {
        $message = "Invalid username or password!";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Login - Neighborhood Complaints</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body style="background: #2A7B9B;
background: linear-gradient(90deg, rgba(42, 123, 155, 1) 0%, rgba(87, 199, 133, 1) 50%, rgba(237, 221, 83, 1) 100%);">

<h2 style="text-align: center; color: whitesmoke; font-size: 50px">Login</h2>
<?php if($message != "") { echo "<p style='color:red;'>$message</p>"; } ?>
<div style="text-align: center; margin-top: 300px">
    <form method="post" action="">
        <label style="font-size: 20px">Username:</label><br>
        <input style="width: 50%; height: 50px; text-align: center; border-radius: 20px" type="text" name="username" required><br><br>
        <label style="font-size: 20px">Password:</label><br>
        <input style="width: 50%; height: 50px; text-align: center; border-radius: 20px" type="password" name="password" required><br><br>
        <button type="submit" style="background-color: #171717; color: whitesmoke; width: 150px; height: 50px; border-radius: 10px;">Login</button>
    </form>
</div>
</body>
</html>




