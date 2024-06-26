<?php 

include '../headerAdmin/conn.php';

$product_id = $_POST['product_id'];
// exit();



$getDataFromTableQ="SELECT 

    mproductddetailstable.product_id as brand_id,
    mproductddetailstable.product_image,
    machinecompanytable.company_id,
    machinecompanytable.name as brand_name,
    mproductddetailstable.name as pro_name,
    mproductddetailstable.product_type_id,
    mproducttypename.name as product_type_name,
    mproductddetailstable.hp_id,
    mproductddetailstable.company_id,
    mproductddetailstable.chassis_no,
    mproductddetailstable.engine_no,
    mproductddetailstable.key_no,
    mproductddetailstable.ex_showroom,
    mproductddetailstable.insurance,
    mproductddetailstable.regd,
    mproductddetailstable.hpa,
    mproductddetailstable.agreement,
    mproductddetailstable.access,
    mproductddetailstable.misc,
    mproductddetailstable.other_cost,
    mproductddetailstable.total_cost,
    mproductddetailstable.editor,
    mproductddetailstable.activeStatus,
    mproductddetailstable.createdBy,
    mproductddetailstable.createdTime
FROM mproductddetailstable

INNER JOIN machinecompanytable on 
machinecompanytable.company_id=mproductddetailstable.company_id

INNER JOIN mproducttypename on
mproducttypename.product_type_id=mproductddetailstable.product_type_id

WHERE product_id='".$product_id."'";


/*$getDataFromTableQ="SELECT 
    product_id as brand_id,
    product_image,
    name as pro_name,
    product_type_id,
    hp_id,
    company_id,
    chassis_no,
    engine_no,
    key_no,
    ex_showroom,
    insurance,
    regd,
    hpa,
    agreement,
    access,
    misc,
    other_cost,
    total_cost,
    editor,
    activeStatus,
    createdBy,
    createdTime
FROM mproductddetailstable
INNER JOIN WHERE product_id='".$product_id."'";*/

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