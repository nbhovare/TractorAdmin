<?php 

include ("../headerAdmin/conn.php");

$product_id = $_GET['product_id'];

// exit();
mysqli_query($conn,"DELETE FROM `mproductddetailstable` WHERE product_id = '".$product_id."'");
header('location:../product_list.php');
// mysqli_close($conn);

?>