<?php
//include session start
require 'db.php';

//destroy all session data
session_unset();
session_destroy();


header('Location: login.php');
exit();

?>