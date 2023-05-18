<?php
@session_start();
unset($_SESSION['name']);
unset($_SESSION['user_id']);
unset($_SESSION['lastname']);
unset($_SESSION['type']);
unset($_SESSION['is_login']);
unset($_SESSION);
header("Location: login.php");
?>