<?php 

include './headers/conn.php';



if(isset($_POST['datas'])){
    // GET D
    $data = json_decode($_POST['datas'], true);    
    $brands = $data['brand'];
    $product = $data['product'];
    $hp = $data['hp'];    
    //$type=$invoiceData["type"];

    /*if(count($brands) > 0){
        $brandsToADD=implode(", ", $brands);        
    }
    if(count($brands) > 0){
        $productToADD=implode(", ", $product);        
    }
    if(count($hp) > 0){
        $hpToADD=implode(", ", $hp);
    }*/
    

    $brandsStr = implode(",", array_map('intval', $brands));
    $productsStr = implode(",", array_map('intval', $product));
    $hpsStr = implode(",", array_map('intval', $hp));
    
    $query_select="SELECT distinct pt.product_id,pt.name as proName,ct.name as company,mp.name as productType,hp.hp_name as hpName,pt.product_image,pt.chassis_no,pt.engine_no,pt.key_no,pt.ex_showroom,pt.insurance,pt.hpa,pt.regd,pt.agreement,pt.access,pt.misc,pt.other_cost,pt.total_cost,pt.activeStatus,pt.editor FROM mproductddetailstable pt
                                inner join machinecompanytable ct on ct.company_id = pt.company_id 
                                inner join mproducttypename mp on mp.product_type_id = pt.product_type_id
                                inner join mhp_table hp on hp.hp_id = pt.hp_id
                                WHERE pt.activeStatus = 'Y'";




// Add dynamic filters if arrays are not empty
if (!empty($brands)) {
    $query_select .= " AND pt.company_id IN ($brandsStr)";
}

if (!empty($product)) {
    $query_select .= " AND pt.product_type_id IN ($productsStr)";
}

if (!empty($hp)) {
    $query_select .= " AND pt.hp_id IN ($hpsStr)";
}

$query_select.=" ORDER BY pt.product_id DESC";

}
else{
    echo "error";
}   

$query_selectEQ=mysqli_query($conn,$query_select);
if($query_selectEQ && mysqli_num_rows($query_selectEQ) > 0){
    $return_data=mysqli_fetch_all($query_selectEQ,MYSQLI_ASSOC);
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