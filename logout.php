<?php
session_start();
unset($_SESSION['emp']);
unset($_SESSION['admin']);

session_destroy();

header("Location: login.php");
exit;
?>