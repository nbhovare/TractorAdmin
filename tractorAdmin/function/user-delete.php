<?php 



include '../../headerAdmin/conn.php';

$delete = $_GET['delete'];
$cus_id = $_GET['cus_id'];

if($delete == "N"){
    mysqli_query($conn,"UPDATE userstable SET user_delete = 'Y', user_status = '1' where user_id = '$cus_id'");
}elseif($delete =="Y"){
    mysqli_query($conn,"UPDATE userstable SET user_delete = 'N' , user_status = '0' where user_id = '$cus_id'");
}
header('location:../view-users.php');
// mysqli_close($conn);

?>