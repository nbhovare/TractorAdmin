<?php session_start();
session_destroy();
$d=base64_encode('logout');
header("Location:login.php");
?>