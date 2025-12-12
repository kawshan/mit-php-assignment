<?php
require_once 'db.php';
//require_once 'auth.php';


check_admin();

if (isset($_GET['id'])) {
    $id = (int)$_GET['id']; //cast to int for safety

    //preventing admin from deleting itself
    if ($id == $_SESSION['user_id']){
        header("Location: user_list.php");
        exit;
    }

    $sql = "DELETE FROM users WHERE id=$id";
    $conn->query($sql);
}
header("Location: user_list.php");
exit;

?>