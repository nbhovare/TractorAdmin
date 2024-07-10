<?php 

include '../headerAdmin/conn.php';

$invoice_id = $_POST['invoice_id'];

//$getDataFromTableQ="SELECT count(sub_invoice_id) as count, sum(total_cost) AS subtotal, sum(discount) AS discount FROM invoice_sub WHERE invoice_id='".$invoice_id."'";


$getDataFromTableQ="SELECT 
    SUM(quantity * total_cost) AS subtotal,
    SUM((quantity * total_cost) * (discount / 100)) AS discount,
    SUM((quantity * total_cost) - ((quantity * total_cost) * (discount / 100))) AS total_amount
FROM 
    invoice_sub
WHERE 
    invoice_id = '" . $invoice_id . "'";

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