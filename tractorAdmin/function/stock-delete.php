<?php 

include '../headerAdmin/conn.php';

$stock_id = $_GET['stock_id'];

// exit();

mysqli_query($conn,"DELETE FROM `mstocktable` WHERE activeStatus = 'Y' AND stock_id = '$stock_id'");

header('location:../stock_entry.php');
// mysqli_close($conn);

?>