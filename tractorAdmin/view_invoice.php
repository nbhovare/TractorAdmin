<!doctype html>
<html lang="en">

<head>

	<?php
    include 'headerAdmin/head.php';

    ?>


<style>
	body{margin-top:20px;
    color: #2e323c;
    background: #f5f6fa;
    position: relative;
    height: 100%;
}
.invoice-container {
    padding: 1rem;
}
.invoice-container .invoice-header .invoice-logo {
    margin: 0.8rem 0 0 0;
    display: inline-block;
    font-size: 1.6rem;
    font-weight: 700;
    color: #2e323c;
}
.invoice-container .invoice-header .invoice-logo img {
    max-width: 130px;
}
.invoice-container .invoice-header address {
    font-size: 0.8rem;
    color: #9fa8b9;
    margin: 0;
}
.invoice-container .invoice-details {
    margin: 1rem 0 0 0;
    padding: 1rem;
    line-height: 180%;
    background: #f5f6fa;
}
.invoice-container .invoice-details .invoice-num {
    text-align: right;
    font-size: 0.8rem;
}
.invoice-container .invoice-body {
    padding: 1rem 0 0 0;
}
.invoice-container .invoice-footer {
    text-align: center;
    font-size: 0.7rem;
    margin: 5px 0 0 0;
}

.invoice-status {
    text-align: center;
    padding: 1rem;
    background: #ffffff;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
    margin-bottom: 1rem;
}
.invoice-status h2.status {
    margin: 0 0 0.8rem 0;
}
.invoice-status h5.status-title {
    margin: 0 0 0.8rem 0;
    color: #9fa8b9;
}
.invoice-status p.status-type {
    margin: 0.5rem 0 0 0;
    padding: 0;
    line-height: 150%;
}
.invoice-status i {
    font-size: 1.5rem;
    margin: 0 0 1rem 0;
    display: inline-block;
    padding: 1rem;
    background: #f5f6fa;
    -webkit-border-radius: 50px;
    -moz-border-radius: 50px;
    border-radius: 50px;
}
.invoice-status .badge {
    text-transform: uppercase;
}

@media (max-width: 767px) {
    .invoice-container {
        padding: 1rem;
    }
}


.custom-table {
    border: 1px solid #e0e3ec;
}
.custom-table thead {
    background: #007ae1;
}
.custom-table thead th {
    border: 0;
    color: #ffffff;
}
.custom-table > tbody tr:hover {
    background: #fafafa;
}
.custom-table > tbody tr:nth-of-type(even) {
    background-color: #ffffff;
}
.custom-table > tbody td {
    border: 1px solid #e6e9f0;
}


.card {
    background: #ffffff;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: 0;
    margin-bottom: 1rem;
}

.text-success {
    color: #00bb42 !important;
}

.text-muted {
    color: #9fa8b9 !important;
}

.custom-actions-btns {
    margin: auto;
    display: flex;
    justify-content: flex-end;
}

.custom-actions-btns .btn {
    margin: .3rem 0 .3rem .3rem;
}
</style>







<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>







<body>
	

<div class="container">
<div class="row gutters">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
			<div class="card">
				<div class="card-body p-0">
					<div class="invoice-container">
						<div class="invoice-header">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
									<div class="custom-actions-btns mb-5">
										<button type="button" class="btn btn-primary" onclick="downloadPdf()">
											<i class="icon-download"></i> Download
										</button>

										
<script>
        function downloadPDF() {
            var element = document.getElementById('printable');
            html2pdf(element, {
                margin:       1,
                filename:     'document.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
            });
        }
    </script>

										<button href="#" class="btn btn-secondary" onclick="window.print();">
											<i class="icon-printer"></i> Print
										</button>
									</div>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters" id="printable">
								<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
									<a >
										<img src="../assets/image/logo/head-logo.png" width="250" height="100" class="img-fluid">
									</a>
								</div>
								<div class="col-lg-6 col-md-6 col-sm-6">
									<address class="text-right">
										Maxwell admin Inc, 45 NorthWest Street.<br>
										Sunrise Blvd, San Francisco.<br>
										00000 00000
									</address>
								</div>
							</div>
							<!-- Row end -->
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<address>
											<?php echo $invoiceData['cust_name']; ?><br>
											<?php echo $invoiceData['cust_mobile']; ?><br>
											<?php echo $invoiceData['cust_address']; ?>
										</address>
									</div>
								</div>
								<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
									<div class="invoice-details">
										<div class="invoice-num">
											<div>Invoice ID - <?php echo "#".$invoice_id; ?></div>
											<div>Invoice Date - <?php echo $invoiceData['date']; ?></div>
										</div>
									</div>													
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-body">
							<!-- Row start -->
							<div class="row gutters">
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="table-responsive">
										<table class="table custom-table m-0">
											<thead>
												<tr>
													<th>Product Type</th>
													<th>Product Name</th>
													<th>Quantity</th>
													<th>Price</th>
													<th>Discount</th>
													<th>Amount (Net)</th>
												</tr>
											</thead>
											<tbody>


											<?php 
											
	$getSubInvoiceDataQ="SELECT mproducttypename.name as product_type_name, mproductddetailstable.name as product_name, quantity, invoice_sub.total_cost as total_cost, discount, amt_net, status

													FROM invoice_sub
													INNER JOIN mproductddetailstable on mproductddetailstable.product_id=invoice_sub.product_id
													INNER JOIN mproducttypename on mproducttypename.product_type_id=invoice_sub.product_type_id
													WHERE invoice_id='".$invoice_id."'";													

													$getSubInvoiceDataEQ=mysqli_query($conn, $getSubInvoiceDataQ);													

													if($getSubInvoiceDataEQ && mysqli_num_rows($getSubInvoiceDataEQ) > 0){
														while($row=mysqli_fetch_assoc($getSubInvoiceDataEQ)){
															echo "<tr>";
																echo "<td>".$row['product_type_name']."</td>";
																echo "<td>".$row['product_name']."</td>";
																echo "<td>".$row['quantity']."</td>";
																echo "<td>".$row['total_cost']."</td>";
																echo "<td>".$row['discount']."</td>";
																echo "<td>".$row['amt_net']."</td>";
															echo "</tr>";
														}														
													}
													else{
														echo "Error";
													}
											?>

												<!--<tr>
													<td>
														Wordpress Template
														<p class="m-0 text-muted">
															Reference site about Lorem Ipsum, giving information on its origins.
														</p>
													</td>
													<td>#50000981</td>
													<td>9</td>
													<td>$5000.00</td>
												</tr>-->			
												
												<?php	
													
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
														$rows=mysqli_fetch_all($getDataFromTableQEQ, MYSQLI_ASSOC);
														$rowD=$rows[0];
												?>
												
												<tr>
													<td>&nbsp;</td>
													<td>&nbsp;</td>
													<td>&nbsp;</td>													
													<td colspan="2">
														<p>
															Subtotal<br>															
															Total Disocunt<br>
														</p>
														<h5 class="text-success"><strong>Grand Total</strong></h5>
													</td>			
													<td>
														<p>
															₹ <?php echo $rowD['subtotal'];  ?><br>															
															₹ <?php echo $rowD['discount']; ?><br>
														</p>
														<h5 class="text-success"><strong>₹ <?php echo $rowD['total_amount']; ?></strong></h5>
													</td>
												</tr>
												<?php
													}
													else{
														echo "Error";
													}

												?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
							<!-- Row end -->
						</div>
						<div class="invoice-footer">
							Thank you for your Business.
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

</body>


</html>