<?php 

include '../headerAdmin/conn.php';

$type = $_POST['type'];
// exit();


$getDataFromTableQ=null;
$fieldsToAdd=null;

switch($type){
    case "partialFromProduct":
        if(isset($_POST['fields']) && isset($_POST['id'])){
            $fields = $_POST['fields'];
            $product_type_id=$_POST['id'];
            $pro_id_type=$_POST['id_type'];            
            $fieldsToAdd=$fields;                            
        }
        else{
            echo "Invalid Fields";
            exit;
        }         
        $getDataFromTableQ="SELECT ".$fieldsToAdd." FROM mproductddetailstable WHERE ".$pro_id_type."=".$product_type_id;       
    break;

    case "partialFromType":
        if(isset($_POST['fields'])){
            $fields = $_POST['fields'];
            $fieldsToAdd=$fields;                            
        }
        else{
            echo "Invalid Fields";
            exit;
        }                
        $getDataFromTableQ="SELECT ".$fieldsToAdd." FROM mproducttypename";
    break;

    default:
        $fieldsToAdd="*";
    break;
}

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