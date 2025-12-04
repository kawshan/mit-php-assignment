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
<body>
<h2>Login</h2>
<?php if($message != "") { echo "<p style='color:red;'>$message</p>"; } ?>
<form method="post" action="">
    <label>Username:</label><br>
    <input type="text" name="username" required><br><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>
</body>
</html>




