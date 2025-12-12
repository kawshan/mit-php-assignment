<?php
session_start();

//check if user is logged in
if (isset($_SESSION['user'])){
    $username = $_SESSION['user'];
    $role = $_SESSION['role'];
}else{
    $username = "Guest";
    $role = "guest";
}
?>

<html>
<head>
    <title>Home - Neighborhood Complaints</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<h2>Welcome, <?php echo htmlspecialchars($username) ?>   </h2>

<?php if ($role=='guest'): ?>
<p>You are not logged in. please <a href="login.php">log in</a> to access the system. </p>
<?php else: ?>
<p>You are logged in as <strong><?php echo htmlspecialchars($role); ?></strong>.</p>
<ul>
    <li><a href="index.php">View Complaints</a></li>
    <li><a href="create.php">Add Complaint</a></li>
    <?php if($role == 'admin'): ?>
        <li><a href="admin.php">Admin Page</a></li>
    <?php endif; ?>
    <li><a href="logout.php">Logout</a></li>
</ul>
<?php endif; ?>

</body>
</html>






