<?php session_start();
$menu = "product_list";
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
        function editDetails() {
            return confirm('Are you sure? Edit Product Details.');
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
        function deleteDetails() {
            return confirm('Are you sure? Delete this Product.');
        }
    </script>
    <style>
        #preview {
            width: 150px;
            height: 100px;
        }
    </style>

    <!-- Table CDN -->
    <link rel="stylesheet" type="text/css" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.25/css/dataTables.jqueryui.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.jqueryui.min.css">
    <!-- Table JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.jqueryui.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/responsive.jqueryui.min.js"></script>
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
                                    <div class="card-title">Product List</div>
                                </div>

                            </div>
                            <!-- Card end -->


                            <div class="card" style="padding:20px">
                                <div class="table-responsive">
                                <table id="fixedHeader" class="table custom-table">
                                  <thead>
                                    <tr>
                                      <th>S.No.</th>
                                      <th>Photo</th>
                                      <th>Name</th>
                                      <th>Model / Company</th>
                                      <th>Product Details</th>
                                      <th>Cost</th>
                                      <th>Sale Type</th>
                                      <th>Update</th>
                                      <th>Status</th>
                                      <th>Delete</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                                <?php
                                                // $query = "SELECT pt.product_id,pt.product_image,pt.name as proName,m.name as model,c.name as company,p.name proType,s.name as saleType,pt.activeStatus FROM `mproductddetailstable` pt
                                                // INNER JOIN mmodeltable m on m.model_id = pt.model_id
                                                // INNER JOIN machinecompanytable c on c.company_id = m.company_id
                                                // INNER JOIN mproducttypename p on p.product_type_id = pt.product_type_id
                                                // INNER JOIN msaletypetable s on s.sale_type_id = pt.sale_type_id
                                                // WHERE --pt.activeStatus = 'Y' 
                                                // ORDER BY pt.product_id desc ";
                                                 $query = "SELECT distinct pt.product_id,pt.name as proName,ct.name as company,mp.name as productType,hp.hp_name as hpName,pt.product_image,pt.chassis_no,pt.engine_no,pt.key_no,pt.ex_showroom,pt.insurance,pt.hpa,pt.regd,pt.agreement,pt.access,pt.misc,pt.other_cost,pt.total_cost,pt.activeStatus,pt.editor FROM mproductddetailstable pt
                                                 inner join machinecompanytable ct on ct.company_id = pt.company_id 
                                                 inner join mproducttypename mp on mp.product_type_id = pt.product_type_id
                                                 inner join mhp_table hp on hp.hp_id = pt.hp_id
                                                 
                                                 ORDER BY pt.product_id desc";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $sno; ?>.
                                                        </td>
                                                        <td>
                                                            <img src="img/products/<?php echo $row['product_image']; ?>" width="50px">
                                                        </td>
                                                        <td>
                                                            <?php echo "<b>" .$row['proName']; ?> <?php echo $row['hpName'] . "</b>"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "<b>" .$row['productType']; ?> | <?php echo $row['company']. "</b>";; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "<b>Chassis No. :- </b>" .$row['chassis_no']; ?>
                                                            <br>
                                                            <?php echo "<b>Engine No. :- </b>" .$row['engine_no']; ?>
                                                            <br>
                                                            <?php echo "<b>Key No. :- </b>" .$row['key_no']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo "Ex-Showroom :-" . $row['ex_showroom'] .".00"; ?>
                                                            <br>
                                                            <?php echo "Insurance   :-" . $row['insurance'] .".00"; ?>
                                                            <br>
                                                            <?php echo "HPA         :-" . $row['hpa'] .".00"; ?>
                                                            <br>
                                                            <?php echo "Regd.       :-" . $row['regd'] .".00"; ?>
                                                            <br>
                                                            <?php echo "Agreement   :-" . $row['agreement'] .".00"; ?>
                                                            <br>
                                                            <?php echo "Accessorirs :-" . $row['access'] .".00"; ?> 
                                                            <br>
                                                            <?php echo "Misc Charge :-" . $row['misc'] .".00"; ?> 
                                                            <br>
                                                            <?php echo "Other Cost  :-" . $row['other_cost'] .".00"; ?>
                                                            <br>
                                                            <?php echo "<b>Total Cost  </b>:-" . $row['total_cost'] .".00"; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['editor']; ?>
                                                        </td>
                                                        <td>
                                                            
                                                            <a href="product_update.php?product_id=<?php echo $row['product_id'] ?>" class="badge bg-success" onclick="return editDetails()">Edit Detail</a>
                                                                                                                        
                                                        </td>
                                                         <td>
                                                            <?php if ($row['activeStatus'] == "Y") { ?>
                                                                <a href="function/product-status.php?status=<?php echo $row['activeStatus'] ?>&product_id=<?php echo $row['product_id'] ?>" class="badge bg-success" onclick="return checkDeactivate()">Active</a>
                                                            <?php } else { ?>

                                                                <a href="function/product-status.php?status=<?php echo $row['activeStatus'] ?>&product_id=<?php echo $row['product_id'] ?>" class="badge bg-danger" onclick="return checkActivate()">InActive</a>
                                                            <?php } ?>
                                                        </td>
                                                        <td>                                                            
                                                            <a href="function/product_delete.php?product_id=<?php echo $row['product_id'] ?>" class="badge bg-success" onclick="return deleteDetails()">Delete Product</a>                                                                                                                        
                                                        </td>

                                                    </tr>
                                                <?php
                                                    $sno = $sno + 1;
                                                } ?>
                                            </tbody>
                                </table>
                                            </div>
                            </div>

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
    <script>$(document)
  .ready(function () {
    $('#myTable')
      .DataTable();
  });</script>

   <script>
        $(document).ready(function() {
          $('#example').DataTable({
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



</body>


</html>
<?php
} else {
    header("Location:login.php");
}
?>