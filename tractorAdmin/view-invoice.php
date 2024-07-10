<?php session_start();
$menu = "create-invoice";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) { 



	if(isset($_GET['invoice_id'])){

		$invoice_id=$_GET['invoice_id'];

		$checkIfInvoiceAlreadyExistsQ="SELECT invoice_id FROM invoice WHERE invoice_id='".$invoice_id."'";
		$checkIfInvoiceAlreadyExistsEQ=mysqli_query($conn,$checkIfInvoiceAlreadyExistsQ);
		if($checkIfInvoiceAlreadyExistsEQ && mysqli_num_rows($checkIfInvoiceAlreadyExistsEQ) > 0){		

			// Get Invoice Details

			$getInvoiceDetailsQ="SELECT invoice_id, cust_details.cust_name as cust_name, cust_details.cust_mobile as cust_mobile, cust_details.cust_address as cust_address, date, payment_terms, due_date, notes, status
			FROM invoice
			INNER JOIN cust_details on invoice.cust_id=cust_details.cust_id
			WHERE invoice_id='".$invoice_id."' AND status='F'";
			$getInvoiceDetailsEQ=mysqli_query($conn, $getInvoiceDetailsQ);
			if($getInvoiceDetailsEQ && mysqli_num_rows($getInvoiceDetailsEQ) > 0){		

				$row=mysqli_fetch_all($getInvoiceDetailsEQ, MYSQLI_ASSOC);
				$invoiceData=$row[0];				

				include("view_invoice.php");
			}
			else{				
				echo "Error, Invalid Invoice ID";
			}

		}
		else{
			echo "Invalid Invoice ID";
		}

	}
	else{
		echo "Error";
	}

} else {
    header("Location:login.php");
}
?>