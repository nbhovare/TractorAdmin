<?php session_start();
$menu = "customer_entry";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) { 
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include 'headerAdmin/head.php';

    ?>
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
        width: 180px;
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
                                    <div class="card-title">Customer Entry</div>
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
                                if (isset($_POST['upload_customer'])) {
                                    $name = $_REQUEST['cus_name'];
                                    $mobile = $_REQUEST['cus_mobile'];
                                    $address1 = $_REQUEST['address1'];
                                    $address2 = $_REQUEST['address2'];
                                    $model = $_REQUEST['model_id'];
                                    $productType = $_REQUEST['product_type_id'];
                                    $buyDate = $_REQUEST['buy_date'];
                                    $filename = $_FILES["cus_file"]["name"];
                                    $tempname = $_FILES["cus_file"]["tmp_name"];
                                    $folder = "img/customers/" . $filename;


                                    // query to insert the submitted data
                                    $sql = "INSERT INTO HappyCustomerTable (name,address_1,address_2,mobile,model_id,product_type_id,buy_date,imageUrl,activeStatus,createdBy) 
                                    VALUES ('$name','$address1','$address2','$mobile','$model','$productType','$buyDate','$filename','Y','1')";
                                    // function to execute above query
                                    mysqli_query($conn, $sql);
                                    // Add the image to the "image" folder"
                                    if (move_uploaded_file($tempname, $folder)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Customer Updated Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to Update Customer Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="customer_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" type="file" name="cus_file"
                                                        id="cus_file" accept="image/*" onchange="previewImage(event)">
                                                    <!-- <input class="form-control" type="file" name="employee_file" id="employee_file"> -->
                                                    <div class="field-placeholder">Upload Customer Photo with Products
                                                    </div>
                                                    <div class="form-text">
                                                        Upload enter customer who buy our products.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 text-center">
                                                <img id="preview" alt="Preview Image">
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="cus_name" id="cus_name"
                                                        type="text" placeholder="Enter Customer Full Name" required>
                                                    <div class="field-placeholder">Customer Name<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter customer full name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="cus_mobile" id="cus_mobile"
                                                        type="number" placeholder="Enter Customer Mobile Number"
                                                        required>
                                                    <div class="field-placeholder">Customer Mobile Number<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter customer 10 digit mobile number.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="address1" id="address1"
                                                        type="text" placeholder="Enter Flat / Village" required>
                                                    <div class="field-placeholder">Address 1<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter customer address 1.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="address2" id="address2"
                                                        type="text" placeholder="Enter Post / Block / District / State">
                                                    <div class="field-placeholder">Address 2<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter customer address 2.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="model_id"
                                                            id="model_id" title="Select Company"
                                                            data-live-search="true">
                                                            <option value="">Select Model</option>

                                                            <?php
                                                            $query = "SELECT DISTINCT m.model_id,m.name as model,c.company_id,c.name as company,m.activeStatus FROM `modeltable` m
                                                            INNER JOIN companytable c on c.company_id = m.company_id and c.activeStatus = 'Y'
                                                            WHERE m.activeStatus = 'Y' 
                                                            GROUP BY m.model_id";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                            <option value="<?php echo $row['model_id']; ?>">
                                                                <?php echo $row['model']; ?> |
                                                                <?php echo $row['company']; ?></option>
                                                            <?php } ?>
                                                        </select>
                                                        <div class="field-placeholder">Select Model Name</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="product_type_id"
                                                            id="product_type_id" title="Select Product Type"
                                                            data-live-search="true">
                                                            <option value="">Select Product Type</option>

                                                            <?php
                                                            $query = "SELECT product_type_id,name as typeName,activeStatus FROM `producttypename`
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
                                                    <button type="button" class="input-icon-block btn btn-info"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="buy_date" id="buy_date"
                                                            type="date" placeholder="Enter Customer Mobile Number"
                                                            required>
                                                        <div class="field-placeholder">Purchase Date<span
                                                                class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Enter Products buying date.
                                                        </div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info"
                                                        data-bs-toggle="tooltip" data-bs-placement="top"
                                                        title="Product Model With Company">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>



                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                <button class="btn btn-primary" name="upload_customer"
                                                    id="upload_customer">Submit</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>


                            </div>

                            <!-- Card end -->

                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Product List</div>
                                </div>

                            </div>


                            <!-- Table Start -->
                            <div class="card">

                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="fixedHeader" class="table custom-table">
                                            <thead>̥

                                                <tr>
                                                    <th>S.No.</th>
                                                    <th>Customer Photo</th>
                                                    <th>Name</th>
                                                    <th>Mobile</th>
                                                    <th>Address</th>
                                                    <th>Model / Company</th>
                                                    <th>Product Type</th>
                                                    <th>Purchase Date</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT cus.cus_id,cus.imageUrl,cus.name as cusName,cus.mobile as mobile,cus.address_1,cus.address_2,cus.buy_date,m.name as model,c.name as company,p.name proType,cus.activeStatus FROM `happycustomertable` cus
                                INNER JOIN modeltable m on m.model_id = cus.model_id
                                                INNER JOIN companytable c on c.company_id = m.company_id
                                                INNER JOIN producttypename p on p.product_type_id = cus.product_type_id 
                                          ORDER BY cus.cus_id desc ";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $sno; ?>.
                                                    </td>
                                                    <td>
                                                        <img src="img/customers/<?php echo $row['imageUrl']; ?>"
                                                            width="80px">
                                                    </td>
                                                    <td>
                                                        <?php echo $row['cusName']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['mobile']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['address_1']; ?> ,
                                                        <?php echo $row['address_2']; ?>
                                                    </td>

                                                    <td>
                                                        <?php echo $row['model']; ?>  | <?php echo $row['company']; ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $row['proType']; ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            $datetime = DateTime::createFromFormat('Y-m-d', $row['buy_date']);
                                                            echo $row['buy_date'] . " : " . $datetime->format('l');
                                                            ?>
                                                    </td>
                                                    <td>
                                                        <?php
                                                            if ($row['activeStatus'] == 'Y') { ?>
                                                        <button class="btn btn-success txt-center"
                                                            data_status="<?php echo $row['activeStatus']; ?>"
                                                            name="add_model" id="add_model">Active</button>
                                                        <?php } else { ?>
                                                        <button class="btn btn-danger txt-center"
                                                            data_status="<?php echo $row['activeStatus']; ?>"
                                                            name="add_model" id="add_model">Inactive</button>
                                                        <?php
                                                            }
                                                            ?>
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
                            } else {dsf

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