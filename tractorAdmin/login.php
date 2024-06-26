<?php session_start();
// if (isset($_REQUEST['login'])) {
//     $username = $_REQUEST['email'];
//     $password = $_REQUEST['password'];
    include 'headerAdmin/conn.php';
//     $qry = "SELECT * FROM user WHERE EMAIL='$username' AND PASSWORD='$password'";
//     //   if (!preg_match('/^[a-zA-Z @ 0-9]+$/i', $username)) {

    if(ISSET($_POST['login'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        // $query=$conn->query("SELECT * FROM `admin` WHERE `admin_email`='$email' AND `admin_password`='$password'");
        // $row=$query->fetchArray(SQLITE3_ASSOC);  
        // $count=$row['count'];

        $sql = "SELECT * FROM `malik` WHERE `admin_email`='$email' AND `admin_password`='$password'";  
        $result = mysqli_query($conn, $sql);  
        if ($result) {
         // Fetch data from the result set
        //  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
         $row = mysqli_fetch_array($result, MYSQLI_ASSOC);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
        $count = mysqli_num_rows($result);  
 
        if($count > 0){
            $_SESSION["user"] = $row['admin_id'];
            $_SESSION["name"] = $row['admin_name'];
            echo "<script>alert('" .$_SESSION["name"]. " You are successfully Logged in') ;</script>";
            echo "<script>location.href='index.php';</script>";

        }else{
            echo "<script>alert('Invalid Email & Password!');</script>";
        }
         } else {
         // Handle SQL query error
         echo "Error executing SQL query: " . mysqli_error($conn);
        }
      
    }
?>

<!doctype html>
<html lang="en">

<head>

    <?php
    include("headerAdmin/head.php");
    ?>

</head>

<body class="authentication">

    <!-- Loading wrapper start -->

    <!-- Loading wrapper end -->

    <!-- *************
			************ Login container start *************
		************* -->
    <div class="login-container">

        <div class="container-fluid h-100">

            <!-- Row start -->
            <div class="row g-0 h-100">
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-about">
                        <div class="slogan">
                            <span>Developed</span>
                            <span>By</span>
                            <span><a href="#" target="_blank">Yashshwi Agrotech</a></span>
                        </div>
                        <div class="about-desc">
                            <!-- UniPro a data dashboard is an information management tool that visually tracks, analyzes and displays key performance indicators (KPI), metrics and key data points to monitor the health of a business, department or specific process. -->
                        </div>
                        <!-- <a href="#" class="know-more">Know More <img src="img/right-arrow.svg" alt="Team Freelancer"></a> -->

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="login-wrapper">
                        <form action="login.php" method="post" enctype="multipart/form-data">
                            <div class="login-screen">
                                <div class="login-body">
                                    <a href="crm.html" class="login-logo">
                                        <img src="img/logo.svg" alt="iChat">
                                    </a>
                                    <h6>Welcome back,<br>Please login to your account.</h6>
                                    <div class="field-wrapper">
                                        <input type="email" name="email" id="email" autofocus>
                                        <div class="field-placeholder">Email ID</div>
                                    </div>
                                    <div class="field-wrapper mb-3">
                                        <input type="password" name="password" id="password">
                                        <div class="field-placeholder">Password</div>
                                    </div>
                                    <div class="actions">
                                        <!-- <a href="#">Forgot password?</a> -->
                                        <button type="submit" id="login" name="login" class="btn btn-primary">Login</button>
                                    </div>
                                </div>
                                <div class="login-footer">
                                    <!-- <span class="additional-link">No Account? <a href="signup.php" class="btn btn-light">Sign Up</a></span> -->
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Row end -->

        </div>
    </div>
    <!-- *************
			************ Login container end *************
		************* -->

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

    <!-- Main Js Required -->
    <script src="js/main.js"></script>

</body>

<!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:59:26 GMT -->

</html>