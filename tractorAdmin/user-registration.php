<?php session_start();
$menu = "user-registration";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) { ?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include 'headerAdmin/conn.php';
    include 'headerAdmin/head.php';

    ?>


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
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">User Registration</div>
                                </div>

                            </div>
                            <!-- Card start -->
                            <div class="card">


                                <?php

                                if (isset($_REQUEST['register'])) {
                                    $name = $_REQUEST['full_name'];
                                    $mobile = $_REQUEST['mobile_no'];
                                    $email = $_REQUEST['email_id'];
                                    $username = $_REQUEST['username'];
                                    // $password = md5("123");

                                    $query = "INSERT INTO userstable(user_full_name,user_mobile_no,user_email_id,username) 
                                    VALUES('$name','$mobile','$email','$username')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>User Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add user Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="user-registration.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">

                                        <!-- Row start -->
                                        <div class="row gutters">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="full_name" id="full_name"
                                                        type="text" required>
                                                    <div class="field-placeholder">Full Name <span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter full name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="mobile_no" id="mobile_no"
                                                        type="phone" required>
                                                    <div class="field-placeholder">Mobile Number<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter mobile number.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>

                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="email_id" id="email_id"
                                                        type="email" required>
                                                    <div class="field-placeholder">Email Id<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter email id.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="username" id="username"
                                                        type="text">
                                                    <div class="field-placeholder">Username</div>
                                                    <div class="form-text">
                                                        Please enter username.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12" hidden>

                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="password" id="password"
                                                        type="password" >
                                                    <div class="field-placeholder">Password<span
                                                            class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter password.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->

                                            </div>

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="register"
                                                    id="register">Register</button>
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
    <?php
    include 'headerAdmin/footer.php'
        ?>

</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/forms-layout-one.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:57:59 GMT -->

</html>
<?php
} else {
    header("Location:login.php");
}
?>