<?php

include '../headerAdmin/conn.php';

$isFrom = $_GET['isFrom'];
$status = $_GET['status'];
$proSale = $_GET['proSale_id'];

// echo $isFrom;
// echo $status;
// echo $proSale;
// exit();

if ($isFrom == "product") {
    if ($status == "Y") {
        mysqli_query($conn, "UPDATE `mproducttypename` SET activeStatus = 'N' where product_type_id = '$proSale'");
    } elseif ($status == "N") {
        mysqli_query($conn, "UPDATE `mproducttypename` SET activeStatus = 'Y' where product_type_id = '$proSale'");
    }   
} elseif ($isFrom == "sale") {
    if ($status == "Y") {
        mysqli_query($conn, "UPDATE `msaletypetable` SET activeStatus = 'N' where sale_type_id = '$proSale'");
    } elseif ($status == "N") {
        mysqli_query($conn, "UPDATE `msaletypetable` SET activeStatus = 'Y' where sale_type_id = '$proSale'");
    }
}elseif ($isFrom == "hp") {
    if ($status == "Y") {
        mysqli_query($conn, "UPDATE `mhp_table` SET activeStatus = 'N' where hp_id = '$proSale'");
    } elseif ($status == "N") {
        mysqli_query($conn, "UPDATE `mhp_table` SET activeStatus = 'Y' where hp_id = '$proSale'");
    }

}
header('location:../other_entry.php');

?>
