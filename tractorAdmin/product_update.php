<?php session_start();
$menu = "product_entry";
include 'headerAdmin/conn.php';

if (isset($_SESSION["user"])) { 
    if(isset($_GET['product_id'])){
        $product_id=$_GET['product_id'];
    
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include 'headerAdmin/head.php';

    ?>
    <script src="https://cdn.ckeditor.com/ckeditor5/41.1.0/classic/ckeditor.js"></script>    
    <script type="text/javascript">   
        
    $(document).ready(function() {        
        $.ajax({
                url: 'function/getProductDetails.php',
                method: 'POST', 
                data:   { product_id : <?php echo $product_id; ?> },
                success: function(response) {
                    // Handle the response from the server

                    if(response) {
                        if(response.data && response.data.length > 0){




                            let headerArray = ["brand_id","product_type_id","pro_name","hp_id","chassis_no","engine_no","key_no","ex_showroom","insurance","regd","hpa","agreement","access","misc","other_cost","total_cost","editor"];  
                            let fieldTypes = {
    brand_id: 'select',
    product_type_id: 'select',
    pro_name: 'input',
    hp_id: 'select',
    chassis_no: 'input',
    engine_no: 'input',
    key_no: 'input',
    ex_showroom: 'input',
    insurance: 'input',
    regd: 'input',
    hpa: 'input',
    agreement: 'input',
    access: 'input',
    misc: 'input',
    other_cost: 'input',
    total_cost: 'input',
    editor: 'div'
};

let data = response.data[0];


headerArray.forEach(function(header) {
    let fieldType = fieldTypes[header];
    let fieldData = data[header];
    
    if (fieldType === 'select' /*&& Array.isArray(fieldData)*/) {
        let select = $('#' + header);        
        if (select.length) {            
            //select.empty(); // Clear existing options
            //fieldData.forEach(function(option) {
            
            //let optionElement = null;
            if(header === "brand_id"){                
                select.val(data["brand_name"]);                
                //optionElement = $('<option></option>').val(fieldData).text(data["brand_name"]);                
            }
            else if(header === "product_type_id"){
                select.val(data["product_type_name"]);                
                //optionElement = $('<option></option>').val(fieldData).text(data["product_type_name"]);                
            }
            else if(header === "hp_id"){
                select.val(data["hp_id"]);                
                //optionElement = $('<option></option>').val(fieldData).text(data["product_type_name"]);                
            }
            else{        
                optionElement = $('<option></option>').val(fieldData).text(fieldData);                
            }
            //select.append(optionElement);
            //});
        } /*else {
            // Create and append new select if it doesn't exist
            select = $('<select></select>').attr('id', header).attr('name', header);
            //fieldData.forEach(function(option) {
                let optionElement = $('<option></option>').val(fieldData).text(fieldData);
                select.append(optionElement);
            //});
            $('#update_form').append(select);
        }*/
    } else if (fieldType === 'input') {
        let input = $('#' + header);        
        if (input.length) {
            input.val(fieldData); // Update existing input value
        } /*else {
            // Create and append new input if it doesn't exist
            input = $('<input>').attr('type', 'text').attr('id', header).attr('name', header).val(fieldData);
            $('#update_form').append(input);
        }*/
    }
    else if (fieldType === 'div') {                
        let input = $('#' + header);       
        document.getElementById("editor").innerHTML=fieldData;         
        if (input.length) {               
            input.html(fieldData); // Update existing input value
        }
    }
});
                    
                        }
                        else{
                            alert("Invalid Product ID");
                            
                        }
                    }
                    else {
                        alert("Error getting data");
                        window.location.href="product_list.php";
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX request failed:', status, error);
                }
            });
    });        
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
                                    <div class="card-title">Update Product Details                                        
                                    </div>                                                                        
                                </div>

                            </div>
                            <!-- Card end -->

                            <!-- 
                                SELECT pt.product_id,pt.product_image,pt.name,m.name,p.name,s.name,pt.activeStatus FROM `productddetailstable` pt
                                INNER JOIN modeltable m on m.model_id = pt.model_id
                                INNER JOIN producttypename p on p.product_type_id = pt.product_type_id
                                INNER JOIN saletypetable     s on s.sale_type_id = pt.sale_type_id
                                WHERE pt.activeStatus = 'Y'
                            -->
                            <!-- Card start -->
                             <div class="card">
                                
                                <?php
                                if (isset($_REQUEST['update_product_details'])) {
                                    //   echo "<script>alert('Invalid Email & Password!');</script>";

                                       $brand_id = $_REQUEST['brand_id'];    
                                    $productType = $_REQUEST['product_type_id'];                                    
                                    $pro_name = $_REQUEST['pro_name'];
                                    $hp_id = $_REQUEST['hp_id'];
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
                                    
                                    $filename = null;
                                    $tempname = null;
                                    $folder = null;

                                    $sql = "UPDATE mproductddetailstable SET name='".$pro_name."',product_type_id='".$productType."',hp_id='".$hp_id."',company_id='".$brand_id."',chassis_no='".$chassis_no."',engine_no='".$engine_no."',key_no='".$key_no."',ex_showroom='".$ex_showroom."',insurance='".$insurance."',regd='".$regd."',hpa='".$hpa."',agreement='".$agreement."',access='".$access."',misc='".$misc."',other_cost='".$other_cost."',total_cost='".$total_cost."',editor='".$editor."' WHERE product_id=".$product_id."";

                                    if (isset($_FILES['product_file']) && $_FILES['product_file']['error'] === UPLOAD_ERR_OK) {
                                                                                                                                                         
                                        $filename = $_FILES["product_file"]["name"];
                                        $tempname = $_FILES["product_file"]["tmp_name"];
                                        $folder = "img/products/" . $filename;       


                                        $sql.=",product_image='".$filename."'";
                                        
                                        
                                        if (move_uploaded_file($tempname, $folder)) {
                                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                            echo "<i class='fa fa-thumbs-up me-2'></i>Product Image Updated Successfully!!";
                                            echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                            echo "</div>";
                                        } else {
                                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                            echo "<i class='fa fa-thumbs-up me-2'></i>Failed to Update Product Image!!";
                                            echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                            echo "</div>";
                                        }
                                    }
                                    
                                    if (mysqli_query($conn, $sql)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Product Updated Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to Update Product Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                    }
                                ?>
                                <form action="product_update.php?product_id='<?php echo $product_id; ?>'" method="POST" id="update_form" enctype="multipart/form-data">
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
                                                        <select class="select-single js-states" name="brand_id" id="brand_id" title="Select Brand" data-live-search="true" required>
                                                            <option value="">Select Brand</option>

                                                            <?php                                                         
                                                                $getProductTyepFromDB="SELECT company_id,name FROM machinecompanytable WHERE activeStatus='Y' ORDER BY name ASC";


                                                                $getProductTyepFromDBQ=mysqli_query($conn,$getProductTyepFromDB);
                                                                if($getProductTyepFromDB && mysqli_num_rows($getProductTyepFromDBQ) > 0){

                                                                    // Fetch Product Types From DB
                                                                    while($rows=mysqli_fetch_assoc($getProductTyepFromDBQ)){
                                                    echo "<option value='".$rows['company_id']."'>".$rows['name']."</option>";
                                                                    }                                                                    
                                                                }
                                                            ?>
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
                                                        <select class="select-single js-states" name="product_type_id" id="product_type_id" title="Select Product Type" data-live-search="true" required>
                                                            <option value="">Select Category Type</option>

                                                            <?php                                                         
                                                                $getProductTyepFromDB="SELECT product_type_id,name FROM mproducttypename WHERE activeStatus='Y' ORDER BY name ASC";


                                                                $getProductTyepFromDBQ=mysqli_query($conn,$getProductTyepFromDB);
                                                                if($getProductTyepFromDB && mysqli_num_rows($getProductTyepFromDBQ) > 0){

                                                                    // Fetch Product Types From DB
                                                                    while($rows=mysqli_fetch_assoc($getProductTyepFromDBQ)){
                                                    echo "<option value='".$rows['product_type_id']."'>".$rows['name']."</option>";
                                                                    }                                                                    
                                                                }
                                                            ?>
                                                        
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
                                                        <input class="form-control" name="pro_name" id="pro_name" type="text" placeholder="Product Name" required>
                                                        <div class="field-placeholder">Product Name<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter Product Name.
                                                        </div>
                                                    </div> <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                                <i class="icon-info-with-circle m-0"></i>
                                                            </button>
                                                    <!-- Field wrapper end -->
                                                    </div>
                                            </div>
                                            <!-- HP -->
                                             <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12" >
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
                                                        <div id="editor" name ="editor"></div>
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
                                                <button class="btn btn-primary" name="update_product_details" id="update_product_details">Update Detail</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                           

                            <!-- Card end -->
                       

                           

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



</body>


</html>
<?php
    }
    else{
        echo "Bad Request";
    }
} else {
    header("Location:login.php");
}
?>