<?php 

include ("../headerAdmin/conn.php");

$status = $_GET['status'];
$cus_id = $_GET['product_id'];

echo $status;
echo $cus_id;
// exit();
if($status == "Y"){
    mysqli_query($conn,"UPDATE `mproductddetailstable` SET activeStatus = 'N' where product_id = '$cus_id'");
}elseif($status =="N"){
    mysqli_query($conn,"UPDATE `mproductddetailstable` SET activeStatus = 'Y' where product_id = '$cus_id'");
}
header('location:../product_list.php');
// mysqli_close($conn);

?>