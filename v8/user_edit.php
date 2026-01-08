<?php
require 'db.php';


check_admin();

if (!isset($_GET['id'])) {
    header("Location: user_list.php");
    exit;
}

$id = (int)$_GET['id'];

// Fetch existing user
$sql = "SELECT * FROM users WHERE id = $id";
$result = $conn->query($sql);

if ($result->num_rows != 1) {
    header("Location: user_list.php");
    exit;
}

$user = $result->fetch_assoc();

// Update user
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $role = $_POST['role'];

    // prevent admin changing its own role to user and locking itself
    if ($id == $_SESSION['user_id'] && $role != "admin") {
        $error = "You cannot remove your own admin role!";
    } else {
        $sqlUpdate = "UPDATE users SET username='$username', role='$role' WHERE id=$id";
        $conn->query($sqlUpdate);

        header("Location: user_list.php");
        exit;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User</title>
</head>
<body>
<h2>Edit User</h2>

<?php if (!empty($error)) { echo "<p style='color:red;'>$error</p>"; } ?>

<form method="POST">

    <label>Username:</label><br>
    <input type="text" name="username" value="<?php echo $user['username']; ?>" required>
    <br><br>

    <label>Role:</label><br>
    <select name="role">
        <option value="admin" <?php if ($user['role']=="admin") echo "selected"; ?>>Admin</option>
        <option value="user" <?php if ($user['role']=="user") echo "selected"; ?>>User</option>
    </select>
    <br><br>

    <button type="submit">Update</button>
</form>

</body>
</html>
