<?php

require 'db.php';


check_admin();  //only admin can access

//fetch all users
//$sql = "select id, username, role from users where role <> 'admin' order by id desc";
$sql = "select id, username, role from users order by id desc";
$result = $conn->query($sql);
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management</title>
</head>
<body>

<h2>User Management</h2>
<p><a href="home.php">Back To Home</a></p>
<p><a href="user_create.php">Add new User</a></p>

<table border="1" cellpadding="10">
    <tr>
        <th>ID</th>
        <th>Username</th>
        <th>Role</th>
        <th>Actions</th>
    </tr>

    <?php while ($row = $result->fetch_assoc()): ?>
    <tr>
        <td><?php echo htmlspecialchars($row['id'])?></td>
        <td><?php echo htmlspecialchars($row['username'])?></td>
        <td><?php echo htmlspecialchars($row['role'])?></td>
        <td>
            <a href="user_edit.php?id=<?php echo $row['id']; ?>">Edit</a> |
            <a href="user_delete.php?id=<?php echo $row['id']; ?>"
            onclick="return confirm('Are you sure to delete this user')"
            >Delete</a>
        </td>
    </tr>
    <?php endwhile; ?>

</table>


</body>
</html>
