<?php

function check_login() {
    if (!isset($_SESSION['user'])) {
        header("Location: login.php");
        exit();
    }
}

function check_admin() {
    if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
        header("Location: home.php");
        exit();
    }
}
