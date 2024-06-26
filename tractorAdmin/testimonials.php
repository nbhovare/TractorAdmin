<?php session_start();
$menu = "testimonials";
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
                                        <div class="card-title">Testimonials Entry</div>
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
                                    if (isset($_POST['testimonial_submit'])) {
                                        $name = $_REQUEST['name'];
                                        $mobile = $_REQUEST['mobile'];
                                        $position = $_REQUEST['position_post'];
                                        $rating = $_REQUEST['rating'];
                                        $date = $_REQUEST['buy_date'];
                                        $message = $_REQUEST['message'];
                                        $filename = $_FILES["test_file"]["name"];
                                        $tempname = $_FILES["test_file"]["tmp_name"];
                                        $folder = "img/Testimonial/" . $filename;
                                        // query to insert the submitted data
                                        $sql = "INSERT INTO  testimonialtable (test_name,test_phone,test_position,test_rating,image_url,test_date,test_message,createdby) 
                                    VALUES ('$name','$mobile','$position','$rating','$filename','$date','$message','1')";
                                        // function to execute above query
                                        mysqli_query($conn, $sql);
                                        // Add the image to the "image" folder"
                                        if (move_uploaded_file($tempname, $folder)) {
                                            echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                            echo "<i class='fa fa-thumbs-up me-2'></i>Testimonial Added Successfully!!";
                                            echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                            echo "</div>";
                                        } else {
                                            echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                            echo "<i class='fa fa-thumbs-up me-2'></i>Failed to Add Testimonial Details!!";
                                            echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                            echo "</div>";
                                        }
                                    }
                                    ?>
                                    <form action="testimonials.php" method="POST" enctype="multipart/form-data">
                                        <div class="card-body">

                                            <!-- Row start -->
                                            <div class="row gutters">
                                                <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" type="file" name="test_file" id="test_file" accept="image/*" onchange="previewImage(event)">
                                                        <!-- <input class="form-control" type="file" name="employee_file" id="employee_file"> -->
                                                        <div class="field-placeholder">Upload Testimonials Photo with Products
                                                        </div>
                                                        <div class="form-text">
                                                            Upload enter testimonial Picture, who set a message for us.
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
                                                        <input class="form-control" name="name" id="name" type="text" placeholder="Enter Full Name" required>
                                                        <div class="field-placeholder"> Name<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter full name.
                                                        </div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="mobile" id="mobile" type="number" placeholder="Enter Mobile Number" required>
                                                        <div class="field-placeholder">Mobile Number<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter 10 digit mobile number.
                                                        </div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <!-- Field wrapper start -->
                                                    <div class="field-wrapper">
                                                        <input class="form-control" name="position_post" id="position_post" type="text" placeholder="Enter Position/Post" required>
                                                        <div class="field-placeholder">Post / Position<span class="text-danger">*</span></div>
                                                        <div class="form-text">
                                                            Please enter Post/Position.
                                                        </div>
                                                    </div>
                                                    <!-- Field wrapper end -->
                                                </div>
                                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                                                    <div class="field-wrapper-group">
                                                        <div class="field-wrapper">
                                                            <select class="select-single js-states" name="rating" id="rating" title="Select Rating Type" data-live-search="true">
                                                                <option value="0">Select Rating by him/her</option>
                                                                <option value="1">1 Star</option>
                                                                <option value="2">2 Star</option>
                                                                <option value="3">3 Star</option>
                                                                <option value="4">4 Star</option>
                                                                <option value="5">5 Star</option>
                                                            </select>
                                                            <div class="field-placeholder">Select Rating</div>
                                                        </div>
                                                        <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Product Model With Company">
                                                            <i class="icon-info-with-circle m-0"></i>
                                                        </button>
                                                    </div>
                                                </div>

                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="field-wrapper-group">
                                                        <div class="field-wrapper">
                                                            <input class="form-control" name="buy_date" id="buy_date" type="date" placeholder="Enter Message Date" required>
                                                            <div class="field-placeholder">Message Date<span class="text-danger">*</span></div>
                                                            <div class="form-text">
                                                                Enter Publish date.
                                                            </div>
                                                        </div>
                                                        <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="Date when publish the message">
                                                            <i class="icon-info-with-circle m-0"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <div class="field-wrapper-group">
                                                        <div class="field-wrapper">
                                                            <textarea class="form-control" name="message" id="message" type="text" placeholder="Message" required> </textarea>
                                                            <div class="field-placeholder">Message<span class="text-danger">*</span></div>
                                                            <div class="form-text">
                                                                What's him/her Message.
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>



                                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    <button class="btn btn-primary" name="testimonial_submit" id="testimonial_submit">Submit</button>
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
                                                        <th>Photo</th>
                                                        <th>Name</th>
                                                        <th>Mobile</th>
                                                        <th>Position/Post</th>
                                                        <th>Message</th>
                                                        <th>Rating</th>
                                                        <th>Publish Date</th>
                                                        <th>Created Date</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $query = "SELECT * FROM testimonialtable ORDER BY test_id desc";
                                                    $result = mysqli_query($conn, $query);
                                                    $sno = 1;
                                                    while ($row = mysqli_fetch_array($result)) {
                                                    ?>
                                                        <tr>
                                                            <td>
                                                                <?php echo $sno; ?>.
                                                            </td>
                                                            <td>
                                                                <img src="img/Testimonial/<?php echo $row['image_url']; ?>" width="80px">
                                                            </td>
                                                            <td>
                                                                <?php echo $row['test_name']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['test_phone']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['test_position']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['test_message']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['test_rating']; ?> Star
                                                            </td>
                                                            <td>
                                                                <?php echo $row['test_date']; ?>
                                                            </td>
                                                            <td>
                                                                <?php echo $row['createdtime']; ?>
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