<?php 

include '../headerAdmin/conn.php';

$status = $_GET['status'];
$model = $_GET['company_id'];

// exit();
if($status == "Y"){
    mysqli_query($conn,"UPDATE `machinecompanytable` SET activeStatus = 'N' where company_id = '$model'");
}elseif($status =="N"){
    mysqli_query($conn,"UPDATE `machinecompanytable` SET activeStatus = 'Y' where company_id = '$model'");
}
header('location:../other_entry.php');
// mysqli_close($conn);

?>