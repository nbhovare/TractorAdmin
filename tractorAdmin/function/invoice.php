<?php 

    include '../headerAdmin/conn.php';

    $cur_user=0;

    function createInvoiceEntry($conn,$invoice_id,$cust_id,$cur_user){
        // Create Invoice ID

        $createInvoiceEntryQ="INSERT INTO invoice (invoice_id,cust_id,created_by,status) VALUES ('".$invoice_id."','".$cust_id."','".$cur_user."','D')";
        $createInvoiceEntryEQ=mysqli_query($conn,$createInvoiceEntryQ);
        if($createInvoiceEntryEQ){
            return true;
        }
        else{
            return false;
        }
    }

    function checkIfInvoiceHasSubEntries($conn, $invoice_id){
        // Check if Invoice has sub entries/ products under

        $checkifInvoiceHasSubEntriesQ="SELECT invoice_id FROM invoice_sub WHERE invoice_id='".$invoice_id."'";
        $checkifInvoiceHasSubEntriesEQ=mysqli_query($conn, $checkifInvoiceHasSubEntriesQ);
        if($checkifInvoiceHasSubEntriesEQ && mysqli_num_rows($checkifInvoiceHasSubEntriesEQ) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    function checkIfInvoiceAlreadyExists($conn,$invoice_id){
        // check if invoice already exists

        $checkIfInvoiceAlreadyExistsQ="SELECT invoice_id FROM invoice WHERE invoice_id='".$invoice_id."'";
        $checkIfInvoiceAlreadyExistsEQ=mysqli_query($conn,$checkIfInvoiceAlreadyExistsQ);
        if($checkIfInvoiceAlreadyExistsEQ && mysqli_num_rows($checkIfInvoiceAlreadyExistsEQ) > 0){
            return true;
        }
        else{
            return false;
        }
    }

    if (isset($_POST['datas'])) {


        $invoiceData = json_decode($_POST['datas'], true);
        $type=$invoiceData["type"];

        switch($type){

            // Status R means Rejected, D meand Draft, F means Finalized in Invoice Status


            case "rejectInvoice":
                //Reject Invoice
                $invoice_id = $invoiceData["invoice_id"];
                $status="R";

                if(!checkIfInvoiceAlreadyExists($conn,$invoice_id)){
                    echo "Invalid Invoice ID";
                    exit;
                }

                if(checkIfInvoiceHasSubEntries($conn, $invoice_id)){
                    $stmt = $conn->prepare("UPDATE invoice SET status = ? WHERE invoice_id = ?");

                    if ($stmt === false) {
                        die("Error preparing statement: " . $conn->error);
                    }

                    $stmt->bind_param('si', $status, $invoice_id);            

                    if ($stmt->execute()) {     
                        $finalizeAllInvoiceSubEntries="UPDATE invoice_sub SET status='R' WHERE invoice_id='".$invoice_id."'";
                        $finalizeAllInvoiceSubEntriesEQ=mysqli_query($conn, $finalizeAllInvoiceSubEntries);
                        if($finalizeAllInvoiceSubEntriesEQ){
                            echo "true";
                        }
                        else{
                            echo "false";
                        }                                  
                    } else {
                        echo "false";            
                    }
                    //executeQ($stmt);     
                    $stmt->close();                     
                }
                else{
                    echo "Invalid Invoice ID";
                }

            break;

            case "createInvoice":
                $invoice_id = $invoiceData["invoice_id"];
                $invoice_date = $invoiceData["invoice_date"];
                $due_date = $invoiceData["due_date"];                
                $pay_terms = $invoiceData["pay_terms"];
                $notes = $invoiceData["notes"];
                $cust_id = $invoiceData["cust_id"];
                $status = "F";

                if(!checkIfInvoiceAlreadyExists($conn,$invoice_id)){
                    createInvoiceEntry($conn,$invoice_id,$cust_id,$cur_user );
                }

                if(checkIfInvoiceHasSubEntries($conn, $invoice_id)){
                    $stmt = $conn->prepare("UPDATE invoice SET date = ?, payment_terms = ?, due_date = ?, notes = ?, status = ?, cust_id = ? WHERE invoice_id = ?");

                    if ($stmt === false) {
                        die("Error preparing statement: " . $conn->error);
                    }

                    $stmt->bind_param('sssssii', $invoice_date, $pay_terms, $due_date, $notes, $status, $cust_id, $invoice_id);            

                    if ($stmt->execute()) {     
                        $finalizeAllInvoiceSubEntries="UPDATE invoice_sub SET status='F' WHERE invoice_id='".$invoice_id."'";
                        $finalizeAllInvoiceSubEntriesEQ=mysqli_query($conn, $finalizeAllInvoiceSubEntries);
                        if($finalizeAllInvoiceSubEntriesEQ){
                            echo "true";
                        }
                        else{
                            echo "false";
                        }                                  
                    } else {
                        echo "false";            
                    }
                    //executeQ($stmt);     
                    $stmt->close();                     
                }
                else{
                    echo "Error creating invoice, add items to invoice before proceeding";
                }
                                                                            
            break;

            case "saveInvoice":
                $invoice_id = $invoiceData["invoice_id"];
                $invoice_date = $invoiceData["invoice_date"];
                $due_date = $invoiceData["due_date"];
                $pay_terms = $invoiceData["pay_terms"];                
                $notes = $invoiceData["notes"];
                $cust_id = $invoiceData["cust_id"];
                $status = "D";

                if(!checkIfInvoiceAlreadyExists($conn,$invoice_id)){
                    createInvoiceEntry($conn,$invoice_id,$cust_id,$cur_user );
                }
                                                           
                $stmt = $conn->prepare("UPDATE invoice SET date = ?, payment_terms = ?, due_date = ?, notes = ?, status = ?, cust_id = ? WHERE invoice_id = ?");

                if ($stmt === false) {
                    die("Error preparing statement: " . $conn->error);
                }

                $stmt->bind_param('sssssii', $invoice_date, $pay_terms, $due_date, $notes, $status, $cust_id, $invoice_id);            

                if ($stmt->execute()) {        
                    echo "true";            
                } else {
                    echo "false";            
                }
                //executeQ($stmt);     
                $stmt->close();  

            break;

            case "insert":        
                $sub_invoice_id = $invoiceData["sub_invoice_id"];
                $invoice_id = $invoiceData["invoice_id"];
                $cust_id = $invoiceData["cust_id"];
                $product_type_id = $invoiceData["product_type_id"];
                $product_id = $invoiceData["product_type"];
                $model_id = $invoiceData["model_id"];
                $quantity = $invoiceData["quantity"];
                $total_cost = $invoiceData["total_cost"];
                $discount = $invoiceData["amt_discount"];                 
                $amt_net = $invoiceData["amt_net"];
                $status = "D";

                // check if invoice already exists in invoice table if not then first create invoice entry then proceed for adding items/ adding entries in sub_invoice table

                if(!checkIfInvoiceAlreadyExists($conn,$invoice_id)){
                    createInvoiceEntry($conn,$invoice_id,$cust_id,$cur_user );
                }
                
                $stmt=$conn->prepare("INSERT INTO invoice_sub (sub_invoice_id, invoice_id, cust_id, product_type_id, product_id, model_id, quantity,	total_cost,	discount, amt_net, status)
                        VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");       

                if ($stmt === false) {
                    die("Error preparing statement: " . $conn->error);
                }   
                
                $stmt->bind_param("iiiiisiddds", $sub_invoice_id, $invoice_id, $cust_id, $product_type_id, $product_id, $model_id, $quantity, $total_cost, $discount, $amt_net, $status);

                if ($stmt->execute()) {        
                    echo "true";            
                } else {
                    echo "false";            
                }
                //executeQ($stmt);     
                $stmt->close();           

            break;


            case "delete":
                $sub_invoice_id = $invoiceData["sub_id"];
                $invoice_id = $invoiceData["invoice_id"];

                $stmt=$conn->prepare("DELETE FROM invoice_sub WHERE sub_invoice_id=? AND invoice_id=?");       

                if ($stmt === false) {
                    die("Error preparing statement: " . $conn->error);
                }   
                
                $stmt->bind_param("ii", $sub_invoice_id, $invoice_id);

                if ($stmt->execute()) {        
                    echo "true";            
                } else {
                    echo "false";            
                }
                //executeQ($stmt);     
                $stmt->close(); 

            break;

            case "update":
            break;        

            default:
                echo "Invalid.... Try Again";
                exit;
            break;
        }     
                                                                            
    }

    else{
        header("Location:../create-invoice.php");
    }

?>
