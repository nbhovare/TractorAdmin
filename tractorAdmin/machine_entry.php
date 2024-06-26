<?php  session_start();
$menu = "model_entry";
include 'headerAdmin/head.php';
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) {
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include 'headerAdmin/conn.php';
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
      <style>
        #preview {
            width: 150px;
            height: 150px;
        }
    </style>

    <script language="JavaScript" type="text/javascript">
        function checkDeactivate() {
            return confirm('Are you sure? Deactivate this Model.');
        }
        function checkActivate() {
            return confirm('Are you sure? Activate this Model.');
        }
    </script>
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
                        <!-- Company Start -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                       
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">JItendra Entry</div>
                                </div>
                                <?php
                                if (isset($_REQUEST['add_company'])) {
                                     echo "<script>alert('Invalid Email & Password!');</script>";

                                       $brand_id = $_REQUEST['brand_id'];    
                                    $productType = $_REQUEST['product_type_id'];                                    
                                    $pro_name = $_REQUEST['pro_name'];
                                    $chassis_no = $_REQUEST['chassis_no'];
                                    $engine_no = $_REQUEST['engine_no'];
                                    $key_no = $_REQUEST['key_no'];

                                    $ex_showroom = $_REQUEST['ex_showroom'];
                                    $insurance = $_REQUEST['insurance'];
                                    $regd = $_REQUEST['regd'];
                                    $hpa = $_REQUEST['hpa'];
                                    $agreement = $_REQUEST['agreement'];
                                    $access = $_REQUEST['access'];
                                    $misc = $_REQUEST['misc'];
                                    $other_cost = $_REQUEST['other_cost'];
                                    $total_cost = $_REQUEST['total_cost'];
                                    $editor = $_REQUEST['editorContent'];

                                    $filename = $_FILES["product_file"]["name"];
                                    $tempname = $_FILES["product_file"]["tmp_name"];
                                    $folder = "img/products/" . $filename;
                                    // query to insert the submitted data

                                    $sql = "INSERT INTO `mproductddetailstable` (`product_image`,`name`,`product_type_id`,`brand_id`,`chassis_no`,`engine_no`,`key_no`,`ex_showroom`,`insurance`,`regd`,`hpa`,`agreement`,`access`,`misc`,`other_cost`,`total_cost`,`editor`,`activeStatus`,`createdBy`) 
                                    VALUES ('$filename','$pro_name','$productType','$brand_id','$chassis_no','$engine_no','$key_no','$ex_showroom','$insurance','$regd','$hpa','$agreement','$access','$misc','$other_cost','$total_cost','$editor','Y','1')";

                                    echo $sql;
                                    mysqli_query($conn, $sql);

                                    // Add the image to the "image" folder"
                                    if (move_uploaded_file($tempname, $folder)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Product Uploaded Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to Upload Product Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                       
                                    }
                                ?>
                                <form action="machine_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">   
                                             <!-- Upload Image -->
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="file" name="product_file" id="product_file" accept="image/*" onchange="previewImage(event)">
                                                    <!-- <input class="form-control" type="file" name="employee_file" id="employee_file"> -->
                                                    <div class="field-placeholder">Upload Product Image</div>
                                                    <div class="form-text">
                                                        Upload product images size should be 450 X 300.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <!-- Show Image -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                                                <img id="preview" alt="Preview Image">
                                            </div>

                                            <div class="card-title">Product Details</div>
                                            <!-- Brand -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="brand_id" id="brand_id" title="Select Brand" data-live-search="true">
                                                            <option value="">Select Brand</option>

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
                                                        <select class="select-single js-states" name="product_type_id" id="product_type_id" title="Select Product Type" data-live-search="true">
                                                            <option value="">Select Category Type</option>

                                                            <?php
                                                            $query = "SELECT product_type_id,name as typeName,activeStatus FROM `mproducttypename`
                                                            WHERE activeStatus = 'Y'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['product_type_id']; ?>">
                                                                    <?php echo $row['typeName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="field-placeholder">Select Product Type</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <!-- Model Name -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="pro_name" id="pro_name" type="text" placeholder="Model Name" required>
                                                        <div class="field-placeholder">Model Name<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter model name.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
 
                                           <!-- Chassis Number -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="chassis_no" id="chassis_no" type="text" placeholder="Chassis No" required>
                                                        <div class="field-placeholder">Chassis No<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter chassis no.
                                                        </div>
                                                    </div> 
                                                    
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Chassis No">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                    <!-- Field wrapper end -->
                                                </div>
                                            </div>
                                              
                                             <!-- Engine Number -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="engine_no" id="engine_no" type="text" placeholder="Engine No" required>
                                                        <div class="field-placeholder">Engine No<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter engine no.
                                                        </div>
                                                    </div> 
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Engine No">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                            
                                             <!-- Key Number -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="key_no" id="key_no" type="text" placeholder="Key No" required>
                                                        <div class="field-placeholder">Key No<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter key no.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Key No">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                             <div class="card-title">Cost Details</div>


                                             <!-- Ex-Showroom Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="ex_showroom" id="ex_showroom" type="number" placeholder="Ex-Showroom Price" required>
                                                        <div class="field-placeholder">Ex-Showroom Price<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter ex-showroom price.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Ex-Showroom Price">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                              <!-- Insurance Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="insurance" id="insurance" type="number" placeholder="Insurance" required>
                                                        <div class="field-placeholder">Insurance<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter insurance amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Insurance Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                              <!-- Regd Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="regd" id="regd" type="number" placeholder="Regd Amount" required>
                                                        <div class="field-placeholder">Regd<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter regd amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product REGD Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- HPA Amount -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="hpa" id="hpa" type="number" placeholder="HPA Amount" required>
                                                        <div class="field-placeholder">HPA<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter hpa amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product HPA Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                               <!-- Agreement Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="agreement" id="agreement" type="number" placeholder="Agreement Amount" required>
                                                        <div class="field-placeholder">Agreement<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter agreement amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Agreement Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- Accessories Amount -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="access" id="access" type="number" placeholder="Accessories Amount" required>
                                                        <div class="field-placeholder">Accessories<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter Accessories amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Accessories Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                             <!-- Misc Charge -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="misc" id="misc" type="number" placeholder="Misc Amount" required>
                                                        <div class="field-placeholder">Misc Charge<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter agreement amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Misc Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- Other Amount -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="other_cost" id="other_cost" type="number" placeholder="Other Amount" required>
                                                        <div class="field-placeholder">Other Amount<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter other amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Other Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                               <!-- Total Amount -->
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="total_cost" id="total_cost" type="number" placeholder="Total Amount" required>
                                                        <div class="field-placeholder">Total Amount<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter total amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Total Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                            <!-- Editor -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                <div class="field-wrapper-group" >
                                                    <div class="field-wrapper">
                                                        <div id="editor" name ="editor"><p><strong>Description :  </strong>Details</p></div>
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
                                                    
                                                
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Description">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_company" id="add_company">Add
                                                    Company</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Company End -->
                      
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                         <div class="card">
                                <?php
                                
                                if (isset($_POST['upload_Product'])) {

                                echo "<script>alert('Invalid Email & Password!');</script>";

                                    $brand_id = $_REQUEST['brand_id'];    
                                    $productType = $_REQUEST['product_type_id'];                                    
                                    $pro_name = $_REQUEST['pro_name'];
                                    $chassis_no = $_REQUEST['chassis_no'];
                                    $engine_no = $_REQUEST['engine_no'];
                                    $key_no = $_REQUEST['key_no'];

                                    $ex_showroom = $_REQUEST['ex_showroom'];
                                    $insurance = $_REQUEST['insurance'];
                                    $regd = $_REQUEST['regd'];
                                    $hpa = $_REQUEST['hpa'];
                                    $agreement = $_REQUEST['agreement'];
                                    $access = $_REQUEST['access'];
                                    $misc = $_REQUEST['misc'];
                                    $other_cost = $_REQUEST['other_cost'];
                                    $total_cost = $_REQUEST['total_cost'];
                                    $editor = $_REQUEST['editor'];

                                    $filename = $_FILES["product_file"]["name"];
                                    $tempname = $_FILES["product_file"]["tmp_name"];
                                    $folder = "img/products/" . $filename;
                                    // query to insert the submitted data

                                    $sql = "INSERT INTO `mproductddetailstable` (`product_image`,`name`,`product_type_id`,`brand_id`,`chassis_no`,`engine_no`,`key_no`,`ex_showroom`,`insurance`,`regd`,`hpa`,`agreement`,`access`,`misc`,`other_cost`,`total_cost`,`editor`,`activeStatus`,`createdBy`) 
                                    VALUES ('$filename','$pro_name','$productType','$brand_id','$chassis_no','$engine_no','$key_no','$ex_showroom','$insurance','$regd','$hpa','$agreement','$access','$misc','$other_cost','$total_cost','$editor','Y','1')";

                                    echo $sql;
                                    // exit();


                                    // function to execute above query

                                    mysqli_query($conn, $sql);

                                    // Add the image to the "image" folder"
                                    if (move_uploaded_file($tempname, $folder)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Product Uploaded Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to Upload Product Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }

                                ?>

                                <form action="product_entry.php" method="POST" enctype="multipart/form-data">
                             
                                    <div class="card-body">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <!-- Upload Image -->
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="file" name="product_file" id="product_file" accept="image/*" onchange="previewImage(event)">
                                                    <!-- <input class="form-control" type="file" name="employee_file" id="employee_file"> -->
                                                    <div class="field-placeholder">Upload Product Image</div>
                                                    <div class="form-text">
                                                        Upload product images size should be 450 X 300.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <!-- Show Image -->
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                                                <img id="preview" alt="Preview Image">
                                            </div>

                                             <div class="card-title">Product Details</div>
                                            <!-- Brand -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="brand_id" id="brand_id" title="Select Brand" data-live-search="true">
                                                            <option value="">Select Brand</option>

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
                                                        <select class="select-single js-states" name="product_type_id" id="product_type_id" title="Select Product Type" data-live-search="true">
                                                            <option value="">Select Category Type</option>

                                                            <?php
                                                            $query = "SELECT product_type_id,name as typeName,activeStatus FROM `mproducttypename`
                                                            WHERE activeStatus = 'Y'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['product_type_id']; ?>">
                                                                    <?php echo $row['typeName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="field-placeholder">Select Product Type</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                           
                                           <!-- Model Name -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="pro_name" id="pro_name" type="text" placeholder="Model Name" required>
                                                        <div class="field-placeholder">Model Name<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter model name.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
 
                                           <!-- Chassis Number -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="chassis_no" id="chassis_no" type="text" placeholder="Chassis No" required>
                                                        <div class="field-placeholder">Chassis No<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter chassis no.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Chassis No">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                             <!-- Engine Number -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="engine_no" id="engine_no" type="text" placeholder="Engine No" required>
                                                        <div class="field-placeholder">Engine No<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter engine no.
                                                        </div>
                                                    </div> 
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Engine No">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                            
                                             <!-- Key Number -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="key_no" id="key_no" type="text" placeholder="Key No" required>
                                                        <div class="field-placeholder">Key No<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter key no.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Key No">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>


                                             <div class="card-title">Cost Details</div>


                                             <!-- Ex-Showroom Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="ex_showroom" id="ex_showroom" type="number" placeholder="Ex-Showroom Price" required>
                                                        <div class="field-placeholder">Ex-Showroom Price<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter ex-showroom price.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Ex-Showroom Price">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                              <!-- Insurance Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="insurance" id="insurance" type="number" placeholder="Insurance" required>
                                                        <div class="field-placeholder">Insurance<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter insurance amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Insurance Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                              <!-- Regd Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="regd" id="regd" type="number" placeholder="Regd Amount" required>
                                                        <div class="field-placeholder">Regd<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter regd amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product REGD Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- HPA Amount -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="hpa" id="hpa" type="number" placeholder="HPA Amount" required>
                                                        <div class="field-placeholder">HPA<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter hpa amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product HPA Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                               <!-- Agreement Price -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="agreement" id="agreement" type="number" placeholder="Agreement Amount" required>
                                                        <div class="field-placeholder">Agreement<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter agreement amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Agreement Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- Accessories Amount -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="access" id="access" type="number" placeholder="Accessories Amount" required>
                                                        <div class="field-placeholder">Accessories<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter Accessories amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Accessories Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                             <!-- Misc Charge -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="misc" id="misc" type="number" placeholder="Misc Amount" required>
                                                        <div class="field-placeholder">Misc Charge<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter agreement amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Misc Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                             <!-- Other Amount -->
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="other_cost" id="other_cost" type="number" placeholder="Other Amount" required>
                                                        <div class="field-placeholder">Other Amount<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter other amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Other Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                               <!-- Total Amount -->
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="total_cost" id="total_cost" type="number" placeholder="Total Amount" required>
                                                        <div class="field-placeholder">Total Amount<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter total amount.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Total Amount">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>

                                            <!-- HP -->
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" hidden>
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="hp_id" id="hp_id" title="Select Product Type" data-live-search="true">
                                                            <option value="">Hp Name</option>

                                                            <?php
                                                            $query = "SELECT hp_id,hp_name,activeStatus FROM `mhp_table`
                                                            WHERE activeStatus = 'Y'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['hp_id']; ?>">
                                                                    <?php echo $row['hp_name']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="field-placeholder">Select HP Type</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            

                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12" hidden>
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="hp_name" id="hp_name" type="text" placeholder="HP" required>
                                                        <div class="field-placeholder">HP<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter HP.
                                                        </div>
                                                    </div>
                                                     <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                            <i class="icon-info-with-circle m-0"></i>
                                                        </button>
                                                    <!-- Field wrapper end -->
                                                </div>
                                            </div>
                                            <!-- Starting F -->
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12" hidden>
                                                <div class="field-wrapper-group">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="price" id="price" type="text" placeholder="Start From ₹5.2 Lakh" required>
                                                        <div class="field-placeholder">Start From <span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter Price.
                                                        </div>
                                                    </div>
                                                     <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                            <i class="icon-info-with-circle m-0"></i>
                                                        </button>
                                                    <!-- Field wrapper end -->
                                                </div>
                                            </div>
                                            <!-- Sale Type -->
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12" hidden>
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="sale_type_id" id="sale_type_id" title="Select Sale Type" data-live-search="true">
                                                            <option value="">Select Sale Type</option>

                                                            <?php
                                                            $query = "SELECT sale_type_id,name as typeName,activeStatus FROM `msaletypetable`
                                                            WHERE activeStatus = 'Y'";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['sale_type_id']; ?>">
                                                                    <?php echo $row['typeName']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="field-placeholder">Select Sale Type</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>

                                             <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12" hidden> 
                                                <div class="question">
                                                    <p>Show product on list?</p>
                                                    <div class="options">
                                                        <label>
                                                        <input type="radio" name="popularity" value="all"> All
                                                        </label>
                                                        <label>
                                                        <input type="radio" name="popularity" value="popular">Popular
                                                        </label>
                                                        <label>
                                                        <input type="radio" name="popularity" value="store"> Store List Only
                                                        </label>
                                                    </div>
                                                </div>

                                             </div>

                                            <!-- Editor -->
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">

                                                <div class="field-wrapper-group" >
                                                    <div class="field-wrapper">
                                                        <div id="editor" name ="editor"><p><strong>Description :  </strong>Details</p></div>
                                                         <script>
                                                            ClassicEditor
                                                                .create( document.querySelector( '#editor' ) )
                                                                .then( editor => {
                                                                        console.log( editor );
                                                                    } )
                                                                .catch( error => {
                                                                console.error( error );
                                                            } );
                                                        </script>
                                                    </div>
                                                    
                                                
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Description">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>


                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" type="button" name="upload_Product" id="upload_Product">Add
                                                    Submit</button>
                                            </div>
                                           
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>


                            </div>
                        </div>
                    


                    </div>
                    <!-- Card end -->



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