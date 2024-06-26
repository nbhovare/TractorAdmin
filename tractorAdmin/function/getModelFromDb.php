<?php 

include '../headerAdmin/conn.php';

$brand_id = $_POST['brand_id'];
$product_type_id = $_POST['product_type_id'];
// exit();

$getDataFromTableQ="SELECT name FROM mproductddetailstable WHERE activeStatus='Y' AND product_type_id='".$product_type_id."'";

$getDataFromTableQEQ=mysqli_query($conn,$getDataFromTableQ);
if($getDataFromTableQEQ &&  mysqli_num_rows($getDataFromTableQEQ) > 0){
    $return_data=mysqli_fetch_all($getDataFromTableQEQ,MYSQLI_ASSOC);
    $returnData=array(
        "data" => $return_data
    );

    header('Content-Type: application/json');
    echo json_encode($returnData);
    //print_r($returnData);

}
else{
    echo "0";
}
//header('location:../stock_entry.php');
// mysqli_close($conn);

?>