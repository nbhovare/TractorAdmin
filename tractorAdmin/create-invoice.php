<?php session_start();
$menu = "create-invoice";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) { 



	
	$randomNumber = mt_rand(100000, 999999);
	$DT=date("hms");	


	// Check if Generated Invoice ID Already Exists or not

	$checkIfInvoiceAlreadyExistsQ="SELECT invoice_id FROM invoice WHERE invoice_id='".$randomNumber.$DT."'";
	$checkIfInvoiceAlreadyExistsEQ=mysqli_query($conn,$checkIfInvoiceAlreadyExistsQ);
	if($checkIfInvoiceAlreadyExistsEQ && mysqli_num_rows($checkIfInvoiceAlreadyExistsEQ) > 0){
		header("Refresh:0");		
	}


?>
<!doctype html>
<html lang="en">

<head>
	<?php
    include 'headerAdmin/head.php';

    ?>


<script>
	function convertDateFormat(date) {
    const [day, month, year] = date.split('/');
    return `${year}-${month}-${day}`;
}
</script>

	<script>
		$(document).ready(function(){

			getProductType();



			// Check if Invoice ID Already Exists or not


			$("#createInvoice").click(function(){
				// Create Invoice
				
				const invoice_date=$("#invoice_date").val();
				const invoice_id=$("#invoice_id").val();
				const pay_terms=$("#pay_terms").val();
				const due_date=$("#due_date").val();
				const notes=$("#notes").val();
				const cust_id=$("#cust_id").val();				

				function isEmpty(value) {
					return value === null || value === undefined || value === '';
				}

				var error_msg=null;

				if (isEmpty(cust_id)) {
					error_msg="Select Customer ID is empty";
				}

				if (isEmpty(invoice_date)) {
					error_msg="Invoice date is empty";
				}

				if (isEmpty(invoice_id)) {
					error_msg="Invoice ID is empty";
				}

				if (isEmpty(pay_terms)) {
					error_msg="Select Payment terms Properly";
				}

				if (isEmpty(due_date)) {
					error_msg="Due date is empty";
				}
								
				if(!isEmpty(error_msg)){
					alert(error_msg);
				}
				else{
					
					const usrconfirm=confirm("Are you sure you want to proceed, You will not be able to edit this invoice later");

					if(usrconfirm){
						var data={
							"type": "createInvoice",
							"invoice_id": invoice_id,
							"invoice_date": convertDateFormat(invoice_date),
							"pay_terms": pay_terms,
							"due_date": convertDateFormat(due_date),
							"notes": notes,
							"cust_id": cust_id
						}
						$.ajax({
							url: 'function/invoice.php',
							type: 'POST',				
							data: {datas: JSON.stringify(data)},								
							success: function(response) {			
								if(response==="true"){
									window.location.href = "view-invoice.php?invoice_id="+invoice_id;				
								}	
								else{
									alert(response);
								}														
							},
							error: function(error) {
								console.log(error);
							}
						});							
					}					
				}
				
			});

			$("#saveAsDraft").click(function(){
				const invoice_date=$("#invoice_date").val();
				const invoice_id=$("#invoice_id").val();
				const pay_terms=$("#pay_terms").val();
				const due_date=$("#due_date").val();
				const notes=$("#notes").val();
				const cust_id=$("#cust_id").val();

				function isEmpty(value) {
					return value === null || value === undefined || value === '';
				}

				var error_msg=null;

				if (isEmpty(cust_id)) {
					error_msg="Select Customer ID is empty";
				}

				if (isEmpty(invoice_date)) {
					error_msg="Invoice date is empty";
				}

				if (isEmpty(invoice_id)) {
					error_msg="Invoice ID is empty";
				}

				if (isEmpty(pay_terms)) {
					error_msg="Select Payment terms Properly";
				}

				if (isEmpty(due_date)) {
					error_msg="Due date is empty";
				}
								
				if(!isEmpty(error_msg)){
					alert(error_msg);
				}
				else{
					var data={
						"type": "saveInvoice",
						"invoice_id": invoice_id,
						"invoice_date": convertDateFormat(invoice_date),
						"pay_terms": pay_terms,
						"due_date": convertDateFormat(due_date),
						"notes": notes,
						"cust_id": cust_id
					}
					saveDraft(data);
				}
				

			});


			$("#product_type_id").on('change', function(){				
				
				resetValues();
				if(this.value==="Select Product" || this.value===""){
					alert("Select Product");					
				}
				else{		
					var select = $('#product_type');			
					$.ajax({						
						url: 'function/getProductDetails_All.php',
						type: 'POST',
						dataType: 'json',
			data: "type=partialFromProduct&fields=product_id,name&id_type=product_type_id&id="+this.value,								
						success: function(response) {								
							if(response && response.data && response.data.length > 0 && response!=0) {
								// Append options to the select element													
								select.empty();
								select.append("<option value='Select Product'>Select Product</option>");
								$.each(response.data, function(index, item) {
									var option = $('<option></option>').val(item.product_id).text(item.name); // Adjust 'id' and 'name' based on your data
									select.append(option);
								});
								}
								else {		
									select.empty(); 														
								}
						},
						error: function(error) {
							console.log(error);
						}
					});								
				}
			});

			$("#product_type").on('change', function() {        
                if(this.value==="Select Product" || this.value===""){                    
					alert("Select Product");
                }
                else{	
					$.ajax({
						url: 'function/getProductDetails_All.php',
						type: 'POST',
						dataType: 'json',
					data: "type=partialFromProduct&fields=total_cost&extra=model_id&id_type=product_id&id="+this.value,								
						success: function(response) {
							if(response && response.data && response.data.length > 0) {
							// Append options to the select element					
								$('#total_cost').val(response.data[0].total_cost);														
								//QtyChange();
								//dischange();
								
								var select = $('#model_id');	
								if(response && response.extras && response.extras.length > 0) {									
									// Append options to the select element					
									select.empty();
									select.append("<option value='Select Model'>Select Model</option>");
									$.each(response.extras, function(index, item) {
										var option = $('<option></option>').val(item.model_id).text(item.model_id); // Adjust 'id' and 'name' based on your data
										select.append(option);
									});
								}
								else {		
									select.empty(); 														
								}
								
							}
							else {						
								alert("Error");
							}
						},
						error: function(error) {
							console.log(error);
						}
					});				
                }
            });
		})
	</script>
	<script language="JavaScript" type="text/javascript">
		function resetValues(){
			$("#product_type").empty();
			$("#model_id").empty();
			$("#quantity").val("1");				
			$("#amt_discount").val("0");
			$("#total_cost").val("0");
			$("#amt_net").val("0");
		}		
		function getProductType(){
			$.ajax({
				url: 'function/getProductDetails_All.php',
				type: 'POST',
				dataType: 'json',								
				data: "type=partialFromType&fields=product_type_id,name",
				success: function(response) {
					var select = $('#product_type_id');
					if(response && response.data && response.data.length > 0) {
					// Append options to the select element										
					select.empty();
					select.append("<option value='Select Product'>Select Product</option>");
					$.each(response.data, function(index, item) {
						var option = $('<option></option>').val(item.product_type_id).text(item.name); // Adjust 'id' and 'name' based on your data
						select.append(option);
					});
					}
					else {						
						select.empty();						
					}
				},
				error: function(error) {
					console.log(error);
				}
			});
		}
		function checkDelete() {
			return confirm('Are you sure? Delete this User');
		}
		function checkDeactivate() {
			return confirm('Are you sure? Deactivate this Product.');
		}
		function checkActivate() {
			return confirm('Are you sure? Activate this Product.');
		}
		function QtyChange(){
			const total_cost=$("#total_cost").val();
			const Qty=$("#quantity").val();			
			if(Qty > 0){
				$("#amt_net").val(total_cost*Qty);
				if($("#amt_discount").val()>0)
					disChange();
			}			
			else{
				alert("Invalid Value");
			}
		}
		function disChange(){
			const Qty=$("#quantity").val();
			const discount=$("#amt_discount").val();
			const total_cost=$("#total_cost").val();
			if(discount > -1 && discount < 101){
				$("#amt_net").val(Qty*(total_cost-(total_cost*discount/100)));																									
			}	
			else{
				alert("Invalid Value In Discount");
			}	
		}		
	</script>
	<style>
		#preview {
			width: 150px;
			height: 100px;
		}
	</style>

</head>

<body>

	<!-- Page wrapper start -->
	<div class="page-wrapper">

		<!-- Sidebar wrapper start -->
		<nav class="sidebar-wrapper">

			<!-- Sidebar content start -->
			<div class="sidebar-tabs">

		 <?php
                include 'headerAdmin/sidebar.php';
                ?>

				

			</div>
			<!-- Sidebar content end -->

		</nav>
		<!-- Sidebar wrapper end -->

		<!-- *************
				************ Main container start *************
			************* -->
		<div class="main-container">

			<!-- Page header starts -->
			<div class="page-header">

			  <!-- Row start -->
                <?php
                include 'headerAdmin/page-header.php';
                ?>
                <!-- Row end -->

			</div>
			<!-- Page header ends -->

			<!-- Content wrapper scroll start -->
			<div class="content-wrapper-scroll">

				<!-- Content wrapper start -->
				<div class="content-wrapper">

					<!-- Row start -->
					<div class="row gutters">
						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

							<!-- Card start -->
							<div class="card" id="printableArea">
								<div class="card-header-lg">
									<h4>Create Invoice</h4>
									<div class="text-end">
										<a href="view-invoice.php?invoice_id=<?php echo $randomNumber.$DT; ?>" target="_blank" class="btn btn-light">View Invoice</a>
									</div>
								</div>
								<div class="card-body">

									<!-- Row start -->
									<div class="row justify-content-between">

										<div class="col-xl-5 col-lg-5 col-md-5 col-sm-5 col-12">

											<!-- Row start -->
											<div class="row gutters">

												<div class="col-12">
													<div class="form-section-header light-bg">Customer Details</div>
												</div>
												<div class="col-12">
													<!-- Field wrapper start -->
												<div class="field-wrapper">
													<select class="select-single js-states" id="cust_id" title="Select Product Category" data-live-search="true">
													
														<?php

															$selectCustDetailsQ="SELECT cust_id	,cust_name,cust_mobile,cust_email from cust_details where activeStatus='Y'";
															$selectCustDetailsEQ=mysqli_query($conn, $selectCustDetailsQ);
															
															if($selectCustDetailsEQ && mysqli_num_rows($selectCustDetailsEQ) > 0)
															{																
																while($row=mysqli_fetch_assoc($selectCustDetailsEQ)){																	
					echo "<option value='".$row["cust_id"]."'>".$row["cust_name"]." | ".$row["cust_mobile"]." | ".$row["cust_email"]."</option>";
																}
															}
															else{
																echo "<option value='Select Customer'>Select Customer</option>";
															}
														?>
													
													</select>   
													<div class="field-placeholder">Select Customer</div>
												</div>
													<!-- Field wrapper end -->
												</div>
												<div class="col-12">
													<!-- Field wrapper start -->
													<!-- Button trigger modal -->
									            	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
									            		Add New Customer
									            	</button>																					

													<!-- Modal start -->
												    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
												    	data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
												    	aria-hidden="true">
												    	<div class="modal-dialog">
												    		<div class="modal-content">
												    			<div class="modal-header">
												    				<h5 class="modal-title" id="staticBackdropLabel">Add New Customer</h5>
												    				<button type="button" class="btn-close" data-bs-dismiss="modal"
												    					aria-label="Close"></button>
												    			</div>
																    <?php
																	
																	if (isset($_REQUEST['add_customer'])) {
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
																	?>
																	<form action="create-invoice.php" method="POST">
																			<div class="card-body">
																				<div class="modal-body">
																					<!-- Row start -->
																					<div class="row gutters">   
																						<!-- Model Name -->
																						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
																							<div class="field-wrapper-group">
																								<!-- Field wrapper start -->
																								<div class="field-wrapper">
																									<input class="form-control" name="name" id="name" type="text" placeholder="Customer Name" required>
																									<div class="field-placeholder">Customer Name<span class="text-danger">*</span></div>
																								</div>
																								<!-- Field wrapper end -->
																								</div>
																						</div>
																						<!-- Chassis Number -->
																						<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
																							<div class="field-wrapper-group">
																								<!-- Field wrapper start -->
																								<div class="field-wrapper">
																									<input class="form-control" name="mobile" id="mobile" type="number" placeholder="Mobile No" required>
																									<div class="field-placeholder">Mobile No<span class="text-danger">*</span></div>
																								</div> 
																								<!-- Field wrapper end -->
																							</div>
																						</div>
																						<!-- Chassis Number -->
																						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																							<div class="field-wrapper-group">
																								<!-- Field wrapper start -->
																								<div class="field-wrapper">
																									<input class="form-control" name="email" id="email" type="text" placeholder="Email Addrress" required>
																									<div class="field-placeholder">Email Address<span class="text-danger">*</span></div>
																								</div> 
																								<!-- Field wrapper end -->
																							</div>
																						</div>
																						<!-- Chassis Number -->
																						<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
																							<div class="field-wrapper-group">
																								<!-- Field wrapper start -->
																								<div class="field-wrapper">
																									<textarea class="form-control" rows="2" id="address" name="address" placeholder="Complete Address"></textarea>
																									<div class="field-placeholder">Complete Address<span class="text-danger">*</span></div>
																								</div> 
																								<!-- Field wrapper end -->
																							</div>
																						</div>								
																					</div>
																					<!-- Row end -->
																				</div>

																				
																				<div class="modal-footer">
																					<button type="button" class="btn btn-secondary"
																						data-bs-dismiss="modal">Close</button>
																					<button type="submit" class="btn btn-primary" id="add_customer" name="add_customer">Add</button>
																				</div>
																				</div>
																	</form>
																	<!-- <script>
																		// AJAX to submit form data
																		$("#dataForm").submit(function(e) {
																		    e.preventDefault();
																		    $.ajax({
																		        type: "POST",
																		        url: "function/add_customer.php",
																		        data: $("#dataForm").serialize(),
																		        success: function(response) {
																		            alert(response);
																		            $("#myModal").css("display", "none");
																		        }
																		    });
																		});
																		</script> -->
												    		</div>
												    	</div>
												    </div>												
												<!-- Modal end -->

													<!-- Field wrapper end -->
												</div>
												

											</div>
											<!-- Row end -->

										</div>
										<div class="col-xl-5 col-lg-5 col-md-7 col-sm-7 col-12">

											<!-- Row start -->
											<div class="row gutters">

												<div class="col-12">
													<div class="form-section-header light-bg">Date and Invoice Number
													</div>
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
													<!-- Field wrapper start -->
													<div class="field-wrapper">
														<div class="input-group">
															<input type="text" class="form-control datepicker" id="invoice_date">
															<span class="input-group-text">
																<i class="icon-calendar1"></i>
															</span>
														</div>
														<div class="field-placeholder">Invoice Date</div>
													</div>
													<!-- Field wrapper end -->
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
													<!-- Field wrapper start -->
													<div class="field-wrapper">
														<input type="text" class="form-control" id="invoice_id"
															value="<?php echo $randomNumber.$DT; ?>" disabled>															
														<div class="field-placeholder">Invoice No</div>
													</div>
													<!-- Field wrapper end -->
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
													<!-- Field wrapper start -->
													<div class="field-wrapper">
														<select class="select-single js-states" title="Select Term"
															data-live-search="true" id="pay_terms">
															<option>Monthly</option>
															<option>Quarterly</option>
															<option>Yearly</option>
														</select>
														<div class="field-placeholder">Payment Terms</div>
													</div>
													<!-- Field wrapper end -->
												</div>
												<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
													<!-- Field wrapper start -->
													<div class="field-wrapper">
														<div class="input-group">
															<input type="text"
																class="form-control datepicker-opens-left" id="due_date">
															<span class="input-group-text">
																<i class="icon-calendar1"></i>
															</span>
														</div>
														<div class="field-placeholder">Due Date</div>
													</div>
													<!-- Field wrapper end -->
												</div>
												<div class="col-12">
													<!-- Field wrapper start -->
													<div class="field-wrapper">
														<textarea class="form-control" rows="3" id="notes"></textarea>
														<div class="field-placeholder">Notes</div>
													</div>
													<!-- Field wrapper end -->
												</div>

											</div>
											<!-- Row end -->

										</div>

									</div>
									<!-- Row end -->

									<!-- Row start -->
									<div class="row gutters">
										<div class="col-12">
											<div class="table-responsive">
											<table id="invoiceTable" class="table table-bordered">
														<thead>
														<tr>
															<th colspan="7" class="pt-3 pb-3">Product Details</th>
															
														</tr>														
														<tr>
															<th>Product Type</th>
															<th>Product</th>
															<th>Model</th>
															<th>Quantity</th>
															<th>Price</th>
															<th>Discount</th>
															<th>Amount (Net)</th>
														</tr>
													</thead>
													<tbody id="invoiceTableBody">
														<tr id="rowData">
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<select class="select-single js-states w-100" id="product_type_id" name="product_type_id"
																		data-live-search="true">																																				
																	</select>
																</div>
																<!-- Field wrapper end -->
															</td>
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<select class="select-single js-states w-100" id="product_type" name="product_type"
																		data-live-search="true">																																				
																	</select>
																</div>
																<!-- Field wrapper end -->
															</td>
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<select class="select-single js-states w-100" id="model_id" name="model_id"
																		data-live-search="true">																																				
																	</select>
																</div>
																<!-- Field wrapper end -->
															</td>
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<input type="number" class="form-control" id="quantity" name="quantity"
																		placeholder="Qty" value="1" min="1" onchange="QtyChange()">
																</div>
																<!-- Field wrapper end -->
															</td>
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<div class="input-group">
																		<input type="number" class="form-control" id="total_cost" name="total_cost" min="0" disabled>
																		<span class="input-group-text">
																			₹
																		</span>
																	</div>
																</div>
																<!-- Field wrapper end -->
															</td>
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<div class="input-group">
																		<input type="number" class="form-control" id="amt_discount" name="amt_discount" value="0" min="0" onchange="disChange()">
																		<span class="input-group-text">%</span>
																	</div>
																</div>
																<!-- Field wrapper end -->
															</td>
															<td>
																<!-- Field wrapper start -->
																<div class="field-wrapper m-0">
																	<div class="input-group">
																		<input type="number" class="form-control" id="amt_net" name="amt_net" disabled>
																		<span class="input-group-text">
																			₹
																		</span>
																	</div>
																</div>
																<!-- Field wrapper end -->
															</td>
															<!--<td>
																<div class="table-actions">
																	<button class="btn btn-light" onclick="removeRow(this)">
																		<i class="icon-trash-2"></i>
																	</button>
																	<button class="btn btn-light">
																		<i class="icon-edit-3"></i>
																	</button>																	
																</div>
															</td>-->
														</tr>
													</tbody>
													<tr>
															<td>
																<button class="btn btn-light" type="button" id="add-row-btn" onclick="addRow()">
																	Add Entry In Invoice
																</button>
															</td>
															<td colspan="6">
																<div class="row gutters justify-content-end">
																	<div class="col-auto">
																		<label class="col-form-label">Discount % of
																			Total Amount</label>
																	</div>
																	<div class="col-auto" style="max-width: 90px;">
																		<input type="text" class="form-control"
																			placeholder="0%">
																	</div>
																</div>
															</td>														
														</tr>									
												</table>
												<table id="invoiceTableFinals" class="table table-bordered">
													<thead>
														<tr>
															<th colspan="7" class="pt-3 pb-3">Invoice Details</th>
														</tr>
														<tr>															
															<th>Product Type</th>
															<th>Product</th>
															<th>Model Name</th>
															<th>Quantity</th>
															<th>Price</th>
															<th>Discount</th>
															<th>Amount (Net)</th>
															<th>Actions</th>
														</tr>
													</thead>
													<tbody id="invoiceTableBody">														
													</tbody>
													
														<tr>
															<td colspan="4">&nbsp;</td>
															<td colspan="2">
																<p class="m-0">Subtotal ₹</p>
																<p class="m-0">Discount %</p>
																<p class="m-0">VAT %</p>
																<h5 class="mt-2">Total Amount ₹</h5>
															</td>
															<td>
																<p class="m-0" id="subtotal_table">0</p>
																<p class="m-0" id="discount_table">0</p>
																<p class="m-0">0</p>
																<h5 class="mt-2" id="total_amt_table">0</h5>
															</td>
														</tr>
												</table>
											</div>

										</div>
									</div>
									<!-- Row end -->

									<!-- Row start -->
									<div class="row gutters">


										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="form-actions-footer">
												<h6 style='color:red'>Note: Remember to save Invoice Details</h6>
												<h5 style='color:red'>Note: Stock will be locked based on the quantities mentioned in the Product Details even if the Invoice Status is kept as draft</h5>
											</div>
										</div>

										<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
											<div class="form-actions-footer">
												<div class="text-end">
													<button class="btn btn-light" id="saveAsDraft">Save as Draft</button>
													<button class="btn btn-primary ms-1" id="createInvoice">Create Invoice</button>
												</div>
											</div>
										</div>

									</div>
									<!-- Row end -->

								</div>
							</div>
							<!-- Card end -->

						</div>
					</div>
					<!-- Row end -->

				</div>
				<!-- Content wrapper end -->

					  <!-- App Footer start -->
                <?php
                include 'headerAdmin/footer-admin.php';
                ?>
                <!-- App footer end -->

			</div>
			<!-- Content wrapper scroll end -->

		</div>
		<!-- *************
				************ Main container end *************
			************* -->

	</div>

	<!-- Page wrapper end -->

	<script>
		let lastInserted=0;


		function getTotal(invoice_id){
			$.ajax({
				url: 'function/get_invoice.php',
				type: 'POST',				
				data: "invoice_id="+invoice_id,								
				success: function(response) {			
					
					/*const subtotal_D=response.data[0].subtotal;
					const discount_D=response.data[0].discount;
					const count=response.data[0].count;

					const total_amt_D=subtotal_D-(subtotal_D*(discount_D/count)/100);
					$("#subtotal_table").text(subtotal_D);
					$("#discount_table").text(discount_D);			
					$("#total_amt_table").text(total_amt_D);								*/
					$("#subtotal_table").text(response.data[0].subtotal);
					$("#discount_table").text(response.data[0].discount);			
					$("#total_amt_table").text(response.data[0].total_amount);
				},
				error: function(error) {
					console.log(error);
				}
			});				
		}

		function saveDraft(datas){
						
			// Save Draft
			$.ajax({
				url: 'function/invoice.php',
				type: 'POST',				
				data: {datas: JSON.stringify(datas)},								
				success: function(response) {			
					if(response==="true"){		
						getTotal(datas.invoice_id);				
						alert("Saved As Draft");						
					}	
					else{ 
						alert("Error Saving Draft");
					}								
				},
				error: function(error) {
					console.log(error);
				}
			});	
		}
	
			function addRow() {
  // Get the first row from the source table
  var sourceRow = document.querySelector('#invoiceTable tbody tr');
  
  // Create a new row for the target table
  var newRow = document.createElement('tr');
  
  // Iterate over each cell in the source row
  var cells = sourceRow.getElementsByTagName('td');
  var isEmpty = false; // Flag to check for empty values
  
  var data={};

  for (var i = 0; i < cells.length; i++) {
    var cell = cells[i];
    var newCell = document.createElement('td');
    
    // Check if the cell contains an input or select element
    var input = cell.querySelector('input');
    var select = cell.querySelector('select');
    
    if (input) {
      // If it's an input element, copy its value
      if (input.value.trim() === '') {
        isEmpty = true;
        break; // Exit the loop if an empty value is found
      }	  
      newCell.textContent = input.value;	  
	  data[input.id]=input.value;	  
    } else if (select) {
      // If it's a select element, copy the selected option text
      if (select.value.trim() === '') {
        isEmpty = true;
        break; // Exit the loop if an empty value is found
	  }
	  else if(select.value.trim() === "Select Product"){		
		isEmpty = true;
        break; // Exit the loop if an empty value is found		
	  }
	  else if(select.value.trim() === "Select Model"){		
		isEmpty = true;
        break; // Exit the loop if an empty value is found		
	  }
      newCell.textContent = select.options[select.selectedIndex].text;
	  data[select.id]=select.options[select.selectedIndex].value;
    } else {
      // If it's a plain cell, copy its text content
      newCell.textContent = cell.textContent;
	  data[cell]=cell.textContent;
    }	
    // Append the new cell to the new row
    newRow.appendChild(newCell);
  }

  var checkbox=$("<button>").attr({
		"type": "button",
		"id": lastInserted,
		"onclick":"removeRow(this)"
	}).text("Remove Entry");
    	
	var newCell = document.createElement('td');
	$(newCell).append(checkbox);
	newRow.appendChild(newCell);
  
  // If any value was empty, show an alert and do not append the new row
  if (isEmpty) {
    alert('Please fill in all the fields.');
  } else {
	
	data.cust_id=$("#cust_id").val();
	data.invoice_id=$("#invoice_id").val();
	data.sub_invoice_id=lastInserted;	
	data.type="insert";
	//var result=saveDraft(data);			
	$.ajax({
	url: 'function/invoice.php',
	type: 'POST',				
	data: {datas: JSON.stringify(data)},								
	success: function(response) {			
		if(response==="true"){		
			// Append the new row to the target table body
			const tb=$("#invoiceTableFinals");
			tb.find("tr").eq(lastInserted+1).after(newRow);
			lastInserted+=1;
			getTotal(datas.invoice_id);				
			alert("Saved As Draft");						
		}	
		else if(response==="false"){
			alert("Error Saving Draft");
		}
		else{			
			alert(response);
		}
	},
	error: function(error) {
		console.log(error);
	}
});		  	 		
  }
  resetFormElements();
}
			/*//var row = button.closest('tr'); // Get the closest <tr> ancestor of the button
			var row = document.getElementById('invoiceTable').getElementsByTagName('tbody')[0].getElementsByTagName('tr')[0];
  var cells = row.getElementsByTagName('td'); // Get all <td> elements in the row
  
  var rowData = []; // Array to store cell data
  
  // Loop through each <td> element and add its text content to rowData array
  for (var i = 0; i < cells.length - 1; i++) { // Exclude last cell (which contains the button)
    rowData.push(cells[i].textContent);
  }
  
  // Create a new row (<tr>) in Table 2
  var newRow = document.createElement('tr');
  
  // Loop through rowData to create <td> elements and add them to newRow
  for (var i = 0; i < rowData.length; i++) {
    var cell = document.createElement('td');
    cell.textContent = rowData[i];
    newRow.appendChild(cell);
  }
  
  // Append newRow to Table 2
  var table2Body = document.getElementById('invoiceTableFinals');
  table2Body.appendChild(newRow);
		}
		function addRow() {
            const table = document.getElementById("invoiceTable");
            const lastRow = table.rows[2]; // Get the last row of the table
            const newRow = lastRow.cloneNode(true); // Clone the last row

            // Clear input values in the cloned row
            const inputs = newRow.querySelectorAll('input[type="text"], input[type="number"], select');
            inputs.forEach(input => {
                if (input.tagName === 'INPUT') {
                    input.value = ''; // Clear text and number inputs
                } else if (input.tagName === 'SELECT') {
                    input.selectedIndex = 0; // Reset selects to the first option
                }
            });
			
            // Insert the cloned row as a new row in the table
            const tb=$("#invoiceTable");
			tb.find("tr").eq(lastInserted+1).after(newRow);
			lastInserted+=1;
        }*/


		function resetFormElements() {
			resetValues();
  // Get the first row from the source table
  var firstRow = document.querySelector('#invoiceTable tbody tr');
  
  // Find all select elements in the first row
  var selects = firstRow.querySelectorAll('select');
  
  // Iterate over each select element and reset its value
  selects.forEach(function(select) {
    select.selectedIndex = 0; // Reset to the first option, assuming it is the default
  });

  // Find all input elements in the first row
  var inputs = firstRow.querySelectorAll('input');
  
  // Iterate over each input element and reset its value
  inputs.forEach(function(input) {
    if (input.type === 'number') {
      input.value = input.min || ''; // Reset to min value if defined, else empty
    } else {
      input.value = ''; // Reset to an empty value
    }
  });
}

function removeRow(button) {	
	var buttonId = $(button).attr('id');	
	var data={
		type:"delete",
		sub_id: buttonId,
		invoice_id: $("#invoice_id").val()
	};
	$.ajax({
		url: 'function/invoice.php',
		type: 'POST',				
		data: {datas: JSON.stringify(data)},								
		success: function(response) {			
			if(response==="true"){		
				$(button).closest('tr').remove();				
				alert("Saved As Draft");				
				getTotal(data.invoice_id);
			}	
			else{
				alert("Error Saving Data");
			}														
		},
		error: function(error) {
			console.log(error);
		}
	});	
}
</script>

	<!-- *************
			************ Required JavaScript Files *************
		************* -->
	<!-- Required jQuery first, then Bootstrap Bundle JS -->
	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.bundle.min.js"></script>
	<script src="js/modernizr.js"></script>
	<script src="js/moment.js"></script>

	<!-- *************
			************ Vendor Js Files *************
		************* -->

	<!-- Megamenu JS -->
	<script src="vendor/megamenu/js/megamenu.js"></script>
	<script src="vendor/megamenu/js/custom.js"></script>

	<!-- Slimscroll JS -->
	<script src="vendor/slimscroll/slimscroll.min.js"></script>
	<script src="vendor/slimscroll/custom-scrollbar.js"></script>

	<!-- Search Filter JS -->
	<script src="vendor/search-filter/search-filter.js"></script>
	<script src="vendor/search-filter/custom-search-filter.js"></script>

	<!-- Bootstrap Select JS -->
	<!--<script src="vendor/bs-select/bs-select.min.js"></script>-->
	<script src="vendor/bs-select/bs-select-custom.js"></script>

   <?php
    include 'headerAdmin/footer.php'
    ?>
</body>


</html>
<?php
} else {
    header("Location:login.php");
}
?>