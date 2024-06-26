<?php 

include '../headerAdmin/conn.php';
if (isset($_POST['add_customer'])) {
$name = $_REQUEST['name'];    
$mobile = $_REQUEST['mobile'];                                    
$address = $_REQUEST['address'];
$email = $_REQUEST['email'];

$sql = "INSERT INTO `cust_details` (`cust_name`,`cust_mobile`,`cust_address`,`cust_email`,`activeStatus`,`createdBy`) 
VALUES ('$name','$mobile','$address','$email','Y','1')";

// Add the image to the "image" folder"
    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
        echo "<i class='fa fa-thumbs-up me-2'></i>Customer Created Successfully!!";
        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
        echo "<i class='fa fa-thumbs-up me-2'></i>Error Creating Customer!!";
        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
        echo "</div>";
    }
																		
}


header("Location:../create-invoice.php");

?>
