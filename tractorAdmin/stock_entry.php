<?php session_start();
$menu = "stock_entry";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) { 
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include 'headerAdmin/head.php';

    ?>
    
    <script>
        // Your JavaScript code using jQuery
        $(document).ready(function(){       
            $("#brand_id").on('change', function() {        
                if(this.value==="Select Brand"){
                    $("#product_type_id").prop("disabled",true);
                    alert("Select Brand Name");                    
                }
                else{
                    $("#product_type_id").prop("disabled",false);
                }
            });
            $("#product_type_id").on('change', function(){
                if(this.value==="Select Category Type"){
                    alert("Select Category Type");
                    $("#model_name").prop("disabled",true);
                    $("#model_name").empty();
                }
                /*else if(this.value==="Other"){                    
                    $("#model_name").prop("disabled",false);                    
                }*/
                else{
                    $("#model_name").prop("disabled",false).empty();                    
                    $("#model_name").append(
                        "<option value='Select Model Name'>Select Model Name</option>"
                    );
                    // Get Model Names From Databases
                    const product_type_id= $("#product_type_id").val();
                    const brand_id= $("#brand_id").val();
                    $.ajax({
                        url: 'function/getModelFromDb.php',
                        type: 'POST',
                        dataType: 'json',
                        data: "brand_id="+brand_id+"&product_type_id="+product_type_id,
                        success: function(response) {
                            if(response && response.data && response.data.length > 0) {
                           // Append options to the select element
                            var select = $('#model_name');
                            $.each(response.data, function(index, item) {
                                var option = $('<option></option>').val(item.id).text(item.name); // Adjust 'id' and 'name' based on your data
                                select.append(option);
                            });
                            }
                            else {
                                // Handle no data case
                                $('#model_name').append('<option value="">No data available</option>');
                            }
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    });
                }
            });            
        });
    </script>   

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
            return confirm('Are you sure? Delete this Stock Entry');
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
                            <!-- Card end -->

                            <!-- 
                                SELECT pt.product_id,pt.product_image,pt.name,m.name,p.name,s.name,pt.activeStatus FROM `productddetailstable` pt
                                INNER JOIN modeltable m on m.model_id = pt.model_id
                                INNER JOIN producttypename p on p.product_type_id = pt.product_type_id
                                INNER JOIN saletypetable s on s.sale_type_id = pt.sale_type_id
                                WHERE pt.activeStatus = 'Y'
                            -->
                            <!-- Card start -->
                             <div class="card">
                                
                                <?php
                                if (isset($_REQUEST['add_product'])) {
                                    //  echo "<script>alert('Invalid Email & Password!');</script>";

                                    $brand_id = $_REQUEST['brand_id'];    
                                    $productType = $_REQUEST['product_type_id'];                                    
                                    $pro_name = $_REQUEST['pro_name'];
                                    $model = $_REQUEST['model_name'];
                                    $quantiy = $_REQUEST['quantiy'];
                                    $price = $_REQUEST['price'];
                                    $saling_price = $_REQUEST['saling_price'];
                                    $editor = $_REQUEST['editorContent'];

                                    $query = "INSERT INTO `mstocktable` (`company_id`,`product_type_id`,`name`,`model`,`quantity`,`price`,`saling_price`,`editor`,`activeStatus`,`createdBy`) 
                                    VALUES ('$brand_id','$productType','$pro_name','$model','$quantiy','$price','$saling_price','$editor','Y','1')";

                                    // echo $query;
                                    // exit();
                                  if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Stock Entry Done Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Stock Entry!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="stock_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">   
                                              <!-- Brand -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="brand_id" id="brand_id" title="Select Brand" data-live-search="true">
                                                            <option value="Select Brand">Select Brand</option>

                                                            <?php
                                                            $query = "SELECT DISTINCT * from machinecompanytable where activeStatus = 'Y'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>  
                                                                <option value="<?php echo $row['company_id']; ?>">
                                                                    <?php echo $row['name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="field-placeholder">Select Brand Name</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                             <!-- Prdocut Type -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="product_type_id" id="product_type_id" title="Select Product Type" data-live-search="true" disabled>
                                                            <option value="Select Category Type">Select Category Type</option>

                                                            <?php
                                                            $query = "SELECT product_type_id,name as typeName,activeStatus FROM `mproducttypename`
                                                            WHERE activeStatus = 'Y'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['product_type_id']; ?>">
                                                                    <?php echo $row['typeName']; ?></option>
                                                            <?php } ?>
                                                            <option value="Other">Other</option>

                                                        </select>
                                                        <div class="field-placeholder">Select Product Type</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                           
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="model_name" id="model_name" title="Select Model" data-live-search="true" disabled>
                                                            <option value="Select Model Name">Select Model Name</option>
                                                        </select>
                                                        <div class="field-placeholder">Model Name<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter model name.
                                                        </div>
                                                    </div> 
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- Model Name -->
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="pro_name" id="pro_name" type="text" placeholder="Product Name" required>
                                                        <div class="field-placeholder">Product Name<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter product name.
                                                        </div>
                                                    </div> 
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                               <!-- Model Name -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="quantiy" id="quantiy" type="number" placeholder="Product Quantity" required>
                                                    <div class="field-placeholder">Quantity <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter company name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <!-- Show Image -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="price" id="price" type="number" placeholder="Price" required>
                                                    <div class="field-placeholder">Price<span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter actual price.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <!-- Show Image -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="saling_price" id="saling_price" type="number" placeholder="Selling Price" required>
                                                    <div class="field-placeholder">Selling<span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter selling price.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>

                                                <!-- Editor -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                <div class="field-wrapper-group" >
                                                    <div class="field-wrapper">
                                                    <label for="">Description: Details</label>
                                                        <div id="editor" name ="editor"><p></p></div>
                                                          <input type="hidden" id="editorContent" name="editorContent">
                                                         <script>
                                                            // ClassicEditor
                                                            //     .create( document.querySelector( '#editor' ) )
                                                            //     .then( editor => {
                                                            //             console.log( editor );
                                                            //         } )
                                                            //     .catch( error => {
                                                            //     console.error( error );
                                                            // } );

                                                             ClassicEditor
                                                                .create( document.querySelector( '#editor' ) )
                                                                .then( editor => {
                                                                    console.log( editor );
                                                                    // When the editor content changes, update the hidden input field
                                                                    editor.model.document.on('change:data', () => {
                                                                        document.getElementById('editorContent').value = editor.getData();
                                                                    });
                                                                })
                                                                .catch( error => {
                                                                    console.error( error );
                                                                });
                                                        </script>
                                                    </div>
                                                    
                                                
                                                    
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_product" id="add_product">Add Stock Entry</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                           

                            <!-- Card end -->

                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Stock List</div>
                                </div>

                            </div>


                            <!-- Table Start -->
                           <div class="card" style="padding:20px">
                           <div class="table-responsive">
                                <table id="fixedHeader" class="table custom-table">
                                  <thead>
                                    <tr>
                                      <th>S.No.</th>
                                      <th>Name</th>
                                      <th>Type / Company</th>
                                      <th>Model</th>
                                      <th>Quantity</th>
                                      <th>Price</th>
                                      <th>Selling Price</th>
                                      <th>Status</th>
                                      <th>Update</th>
                                      <th>Actions</th>
                                    </tr>
                                  </thead>
                                  <tbody>
                                                <?php
                                    $query = "SELECT stock_id,st.company_id,mc.name as company,st.product_type_id,pt.name as productType,st.stock_id,st.name as stockName,st.model,st.quantity,st.price,st.saling_price,st.editor,st.activeStatus FROM `mstocktable` st
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
                                                          <a href="function/stock-delete.php?stock_id=<?php echo $row['stock_id'] ?>" class="badge bg-danger" onclick="return checkDelete()">Delete</button>
                                                        

                                                    </tr>
                                                <?php
                                                    $sno = $sno + 1;
                                                } ?>
                                            </tbody>
                                </table>
                                            </div>
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