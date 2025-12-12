<?php
require 'db.php';
check_admin();

$message = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    $sql = "insert into users (username, password, role) values ('$username', '$password', '$role')";

    if ($conn->query($sql)) {
        header("Location: user_list.php");
        exit();
    } else {
        $message = "Error creating user";
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New User</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Add New User</h2>
<p><a href="user_list.php">Back To User List</a></p>

<?php if ($message != ""): ?>
    <p style="color: red"><?php echo $message; ?> </p>
<?php endif; ?>

<form action="" method="post">
    <label>username:</label>
    <input type="text" name="username" required><br><br>

    <label>password:</label>
    <input type="text" name="password" required><br><br>

    <label>Role</label><br>
    <select name="role">
        <option value="" selected disabled>Select An Option</option>
        <option value="user">User</option>
        <option value="admin">Admin</option>
    </select><br><br>

    <button type="submit">Create User</button>


</form>


</body>
</html>




