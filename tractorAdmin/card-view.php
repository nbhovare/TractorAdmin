<?php session_start();
$menu = "card-view";
include '../headerAdmin/conn.php';
if (isset($_SESSION["user"])) {
?>
<!doctype html>
<html lang="en">

<head>
    <?php
    include '../headerAdmin/head.php'
        ?>

</head>

<body>

    <!-- Loading wrapper start -->
    <!-- <div id="loading-wrapper">
        <div class="spinner-border"></div>
        Loading...
    </div> -->
    <!-- Loading wrapper end -->

    <!-- Page wrapper start -->
    <div class="page-wrapper">

        <!-- Sidebar wrapper start -->
        <nav class="sidebar-wrapper">

            <!-- Sidebar content start -->
            <div class="sidebar-tabs">
                <?php
                include '../headerAdmin/sidebar.php';
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
                include '../headerAdmin/page-header.php';
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
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <!-- Copy Views -->

                            <div class="card-body">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <figure class="user-card">
                                            <figcaption>
                                                <a href="" class="edit-card" data-bs-toggle="modal"
                                                    data-bs-target="#editContact">
                                                    <i class="icon-mode_edit"></i>
                                                </a>
                                                <img src="../img/user1.png" alt="Le Meilleur Admin" class="profile">
                                                <h5>Larkyin</h5>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><span>Email: </span>larkyin@meow.com
                                                    </li>
                                                    <li class="list-group-item"><span>Phone: </span>+2 300-223-4567</li>
                                                    <li class="list-group-item"><span>Location: </span>London</li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <figure class="user-card">
                                            <figcaption>
                                                <a href="#" class="edit-card" data-bs-toggle="modal"
                                                    data-bs-target="#editContact">
                                                    <i class="icon-mode_edit"></i>
                                                </a>
                                                <img src="../img/user1.png" alt="Le Meilleur Admin" class="profile">
                                                <h5>Braxten</h5>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><span>Email: </span>braxten@meow.com
                                                    </li>
                                                    <li class="list-group-item"><span>Phone: </span>+2 300-678-6789</li>
                                                    <li class="list-group-item"><span>Location: </span>Melbourne</li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                                        <figure class="user-card">
                                            <figcaption>
                                                <a href="#" class="edit-card" data-bs-toggle="modal"
                                                    data-bs-target="#editContact">
                                                    <i class="icon-mode_edit"></i>
                                                </a>
                                                <img src="../img/user1.png" alt="Le Meilleur Admin" class="profile">
                                                <h5>Klenkov</h5>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><span>Email: </span>klenkov@meow.com
                                                    </li>
                                                    <li class="list-group-item"><span>Phone: </span>+2 300-332-7753</li>
                                                    <li class="list-group-item"><span>Location: </span>Barcelona</li>
                                                </ul>
                                            </figcaption>
                                        </figure>
                                    </div>
                               
                            </div>
                            <!-- Row end -->
                            <div class="modal fade" id="editContact" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="editContactLabel" aria-hidden="true"
                                style="display: none;">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editContactLabel">Edit Contact</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true"></span>
                                            </button>
                                        </div>
                                        <div class="slimScrollDiv"
                                            style="position: relative; overflow: hidden; width: auto; height: 95%;">
                                            <div class="modal-body" style="overflow: hidden; width: auto; height: 95%;">
                                                <div class="row gutters">
                                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                                        <div id="dropzone-sm1" class="mb-3">
                                                            <form action="/upload"
                                                                class="dropzone needsclick dz-clickable"
                                                                id="demo-upload1">

                                                                <div class="dz-message needsclick">
                                                                    <button type="button" class="dz-button">Update
                                                                        Image.</button>
                                                                </div>

                                                            </form>
                                                        </div>
                                                    </div>
                                                    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                        <div class="row gutters">
                                                            <div class="col-6">
                                                                <!-- Field wrapper start -->
                                                                <div class="field-wrapper">
                                                                    <input type="text" class="form-control"
                                                                        value="Braxten">
                                                                    <div class="field-placeholder">Full Name</div>
                                                                </div>
                                                                <!-- Field wrapper end -->
                                                                <!-- Field wrapper start -->
                                                                <div class="field-wrapper">
                                                                    <input type="text" class="form-control"
                                                                        value="+2 300-678-6789">
                                                                    <div class="field-placeholder">Phone</div>
                                                                </div>
                                                                <!-- Field wrapper end -->
                                                            </div>
                                                            <div class="col-6">
                                                                <!-- Field wrapper start -->
                                                                <div class="field-wrapper">
                                                                    <input type="text" class="form-control"
                                                                        value="braxten@meow.com">
                                                                    <div class="field-placeholder">Email</div>
                                                                </div>
                                                                <!-- Field wrapper end -->
                                                                <!-- Field wrapper start -->
                                                                <div class="field-wrapper">
                                                                    <div class="input-group">
                                                                        <input type="text"
                                                                            class="form-control datepicker-opens-left">
                                                                        <span class="input-group-text">
                                                                            <i class="icon-calendar1"></i>
                                                                        </span>
                                                                    </div>
                                                                    <div class="field-placeholder">Birthday</div>
                                                                </div>
                                                                <!-- Field wrapper end -->
                                                            </div>
                                                            <div class="col-12">
                                                                <!-- Field wrapper start -->
                                                                <div class="field-wrapper m-0">
                                                                    <textarea class="form-control" rows="2"></textarea>
                                                                    <div class="field-placeholder">Message</div>
                                                                </div>
                                                                <!-- Field wrapper end -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="slimScrollBar"
                                                style="background: rgb(214, 219, 230); width: 5px; position: absolute; top: 0px; opacity: 0.8; display: block; border-radius: 0px; z-index: 99; right: 1px; height: 304.801px;">
                                            </div>
                                            <div class="slimScrollRail"
                                                style="width: 5px; height: 100%; position: absolute; top: 0px; display: none; border-radius: 0px; background: rgb(214, 219, 230); opacity: 0.2; z-index: 90; right: 1px;">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-light"
                                                data-bs-dismiss="modal">Cancel</button>
                                            <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Save
                                                Contact</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <!-- My Views -->
                        <div class="row">
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="profile-header">

                                    <div class="profile-header-content">
                                        <div class="profile-header-tiles">
                                            <span class="badge bg-dark rounded-pill">14/400</span>
                                            <div class="row gutters">
                                                <div class="profile-tile">
                                                    <h6>Name - <span>Jitendra Chandrakar </span></h6>
                                                    <h6>नाम - <span>जितेंद्र चंद्राकर</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-avatar-tile">
                                            <img src="../img/user1.png" class="img-fluid" alt="User Profile" />
                                        </div>

                                    </div>
                                    <div class="profile-data">
                                        <h6>Sex - <span>Male</span></h6>
                                        <h6>Age - <span>22</span></h6>
                                        <h6>Epic No. - <span></span></h6>
                                        <h6>Mobile Number - <span>8719952417</span></h6>
                                        <h6>Address - <span>Lorem ipsum dolor sit amet consectetur, adipisicing
                                                elit.</span></h6>
                                        <h6>पता - <span>Lorem ipsum dolor sit amet consectetur, adipisicing
                                                elit.</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="profile-header">

                                    <div class="profile-header-content">
                                        <div class="profile-header-tiles">
                                            <span class="badge bg-dark rounded-pill">14/400</span>
                                            <div class="row gutters">
                                                <div class="profile-tile">
                                                    <h6>Name - <span>Jitendra Chandrakar </span></h6>
                                                    <h6>नाम - <span>जितेंद्र चंद्राकर</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-avatar-tile">
                                            <img src="../img/user1.png" class="img-fluid" alt="User Profile" />
                                        </div>

                                    </div>
                                    <div class="profile-data">
                                        <h6>Sex - <span>Male</span></h6>
                                        <h6>Age - <span>22</span></h6>
                                        <h6>Epic No. - <span></span></h6>
                                        <h6>Mobile Number - <span>8719952417</span></h6>
                                        <h6>Address - <span>Lorem ipsum dolor sit amet consectetur, adipisicing
                                                elit.</span></h6>
                                        <h6>पता - <span>Lorem ipsum dolor sit amet consectetur, adipisicing
                                                elit.</span></h6>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12">
                                <div class="profile-header">

                                    <div class="profile-header-content">
                                        <div class="profile-header-tiles">
                                            <span class="badge bg-dark rounded-pill">14/400</span>
                                            <div class="row gutters">
                                                <div class="profile-tile">
                                                    <h6>Name - <span>Jitendra Chandrakar </span></h6>
                                                    <h6>नाम - <span>जितेंद्र चंद्राकर</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="profile-avatar-tile">
                                            <img src="../img/user1.png" class="img-fluid" alt="User Profile" />
                                        </div>

                                    </div>
                                    <div class="profile-data">
                                        <h6>Sex - <span>Male</span></h6>
                                        <h6>Age - <span>22</span></h6>
                                        <h6>Epic No. - <span></span></h6>
                                        <h6>Mobile Number - <span>8719952417</span></h6>
                                        <h6>Address - <span>Lorem ipsum dolor sit amet consectetur, adipisicing
                                                elit.</span></h6>
                                        <h6>पता - <span>Lorem ipsum dolor sit amet consectetur, adipisicing
                                                elit.</span></h6>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Row end -->



            </div>
            <!-- Content wrapper end -->

            <!-- App Footer start -->
            <?php
                include '../headerAdmin/footer-admin.php';
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
    include '../headerAdmin/footer.php';
    ?>

</body>

</html>
<?php
} else {
    header("Location:login.php");
}
?>