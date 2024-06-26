<?php session_start();
$menu = "sale";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) { 
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include 'headerAdmin/head.php';

    ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>
    <script type="text/javascript">
        function previewImage(event) {
            var input = event.target;
            var image = document.getElementById('preview');
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    image.src = e.target.result;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
    <script language="JavaScript" type="text/javascript">
        function checkDelete() {
            return confirm('Are you sure? Delete this User');
        }
        function checkDeactivate() {
            return confirm('Are you sure? Deactivate this Product.');
        }
        function checkActivate() {
            return confirm('Are you sure? Activate this Product.');
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

                    <!-- Form start -->
                    <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                            <!-- Card start -->
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Stock Entry</div>
                                </div>

                            </div>
                            
                            <div class="card">
                                     <form action="sale.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">   
                                             <!-- Brand -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
												<div class="field-wrapper">
													<select class="select-single js-states" title="Select Product Category" data-live-search="true">
														<option>Mobiles</option>
														<option>Books</option>
														<option>Clothing</option>
														<option>Electronics</option>
														<option>Food</option>
														<option>Games</option>
														<option>Gifts</option>
														<option>Laptops</option>
														<option>Mobiles</option>
														<option>Music</option>
														<option>Office</option>
														<option>Pharmacy</option>
														<option>Sports</option>
														<option>Toys</option>
													</select>   
													<div class="field-placeholder">Select Customer</div>
												</div>
											</div>
                                             <!-- Prdocut Type -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                               <!-- Button trigger modal -->
									            	<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
									            		Add New Customer
									            	</button>
											</div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>

                            </div>
                            <!-- Card end -->

                             <div class="card">
                                <div class="card-header" style="padding-bottom:20px; margin-top:20px;">
                                    <div class="card-title">Stock Entry</div>
                                </div>
                            </div>

                           
                        

                            <!-- Card end -->

                            <!-- Table Start -->
                           <div class="card">
                                <table id="stock" class="display nowrap" style="width:100%">
                                  <thead>
                                    <tr>
                                      <th>S.No.</th>
                                      <th>Name</th>
                                      <th>Type / Company</th>
                                      <th>Model</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>saling Price</th>
                                      <th>Status</th>
                                      <th>Update</th>
                                      <th>Descriprtion</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                                <?php
                                    $query = "SELECT st.company_id,mc.name as company,st.product_type_id,pt.name as productType,st.stock_id,st.name as stockName,st.model,st.quantity,st.price,st.saling_price,st.editor,st.activeStatus FROM `mstocktable` st
                                            inner join machinecompanytable mc on mc.company_id = st.company_id
                                            inner join mproducttypename pt on pt.product_type_id = st.product_type_id
                                                 WHERE --st.activeStatus = 'Y' 
                                                 ORDER BY st.stock_id desc";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $sno; ?>.
                                                        </td>
                                                        <td>
                                                            <?php echo "<b>" .$row['stockName']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "<b>" .$row['productType']; ?> | <?php echo $row['company']. "</b>";; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['model']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['quantity'];?>
                                                        </td>
                                                     
                                                        <td>
                                                            <?php echo $row['price'].".00/-"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['saling_price'].".00/-"; ?>
                                                        </td>
                                                        </td>
                                                           <td>
                                                            <?php echo $row['editor']; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['activeStatus'] == "Y") { ?>
                                                                <a href="function/stock-status.php?status=<?php echo $row['activeStatus'] ?>&stock_id=<?php echo $row['stock_id'] ?>" class="badge bg-success" onclick="return checkDeactivate()">Active</a>
                                                            <?php } else { ?>

                                                                <a href="function/stock-status.php?status=<?php echo $row['activeStatus'] ?>&stock_id=<?php echo $row['stock_id'] ?>" class="badge bg-danger" onclick="return checkActivate()">InActive</a>
                                                            <?php } ?>
                                                        </td>
                                                     
                                                        <td>
                                                          <button class="btn btn-success" name="add_product" id="add_product">Update</button>
                                                        

                                                    </tr>
                                                <?php
                                                    $sno = $sno + 1;
                                                } ?>
                                            </tbody>
                                </table>
                            </div>
                            <!-- Table End -->

                        </div>
                    </div>


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
    <script src="https://cdn.ckeditor.com/ckeditor5/[version.number]/[distribution]/ckeditor.js"></script>
    <!-- <script>
            $(document).ready(function() {
                $('#upload_csv').on("submit", function(e) {
                    e.preventDefault(); //form will not submitted  
                    $.ajax({
                        url: "export_CSV.php",
                        method: "POST",
                        data: new FormData(this),
                        contentType: false, // The content type used when sending data to the server.  
                        cache: false, // To unable request pages to be cached  
                        processData: false, // To send DOMDocument or non processed data file it is set to false  
                        success: function(data) {
                            if (data == 'Error1') {
                                alert("Invalid File, Please check file type");
                            } else if (data == "Error2") {
                                alert("Please Select File");
                            } else {
                                //put table name if getting data at same time
                            }
                        }
                    })
                });
            });
        </script> -->
    <?php
    include 'headerAdmin/footer.php'
    ?>
   <script>
        $(document).ready(function() {
          $('#stock').DataTable({
            responsive: {
              details: {
                display: $.fn.dataTable.Responsive.display.modal({
                  header: function(row) {
                    var data = row.data();
                    return 'Details for ' + data[0] + ' ' + data[1];
                  }
                }),
                renderer: $.fn.dataTable.Responsive.renderer.tableAll()
              }
            }
          });
        });
      </script>


</body>


</html>
<?php
} else {
    header("Location:login.php");
}
?>