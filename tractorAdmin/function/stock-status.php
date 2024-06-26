<?php 

include '../headerAdmin/conn.php';

$status = $_GET['status'];
$stock_id = $_GET['stock_id'];

echo $status;
echo $stock_id;
// exit();
if($status == "Y"){
    mysqli_query($conn,"UPDATE `mstocktable` SET activeStatus = 'N' where stock_id = '$stock_id'");
}elseif($status =="N"){
    mysqli_query($conn,"UPDATE `mstocktable` SET activeStatus = 'Y' where stock_id = '$stock_id'");
}
header('location:../stock_entry.php');
// mysqli_close($conn);

?>