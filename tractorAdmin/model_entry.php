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
                                    $company_name = $_REQUEST['company_name'];
                                    $query = "INSERT INTO machinecompanytable(name,activeStatus,createdBy) VALUES('$company_name','Y','1')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Company Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Company Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="model_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">   

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="company_name" id="company_name" type="text" required>
                                                    <div class="field-placeholder">JItendra Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please kuxch mat likho
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
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
                        <!-- Model start -->
                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12" hidden>
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Model Entry</div>
                                </div>
                                <!-- Form Start -->
                                <?php
                                if (isset($_REQUEST['add_model'])) {
                                    $company_id = $_REQUEST['company_id'];
                                    $model_name = $_REQUEST['model_name'];
                                    $query = "INSERT INTO modeltable(company_id,name,activeStatus,createdBy) VALUES('$company_id','$model_name','Y','1')";
                                    // echo $query;
                                    // exit();
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Model Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Model Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="model_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">

                                            <!-- Select User Start -->
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <div class="field-wrapper-group">
                                                    <div class="field-wrapper">
                                                        <select class="select-single js-states" name="company_id" id="company_id" title="Select Company" data-live-search="true">
                                                            <option value="">Select Company</option>

                                                            <?php
                                                            $query = "SELECT * FROM companytable where activeStatus = 'Y' ORDER BY company_id DESC";
                                                            $result = mysqli_query($conn, $query);
                                                            while ($row = mysqli_fetch_array($result)) {
                                                            ?>
                                                                <option value="<?php echo $row['company_id']; ?>">
                                                                    <?php echo $row['name']; ?></option>
                                                            <?php } ?>

                                                        </select>
                                                        <div class="field-placeholder">Select Company Name</div>
                                                    </div>
                                                    <button type="button" class="input-icon-block btn btn-info" data-bs-toggle="tooltip" data-bs-placement="top" title="User Information">
                                                        <i class="icon-info-with-circle m-0"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="model_name" id="model_name" type="text" required>
                                                    <div class="field-placeholder">Model Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter model name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <!-- Select User End -->

                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_model" id="add_model">Add
                                                    Model</button>
                                            </div>

                                        </div>
                                        <!-- Row end -->

                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Model End -->


                         <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Category Entry</div>
                                </div>
                                <?php
                                if (isset($_REQUEST['add_category'])) {
                                    $category_name = $_REQUEST['category_name'];
                                    $query = "INSERT INTO categorytable(name,activeStatus,createdBy) VALUES('$category
                                    
                                    _name','Y','1')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Category Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Category Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="model_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="category_name" id="category_name" type="text" required>
                                                    <div class="field-placeholder">Category Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter category name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_category" id="add_category">Add
                                              Category</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                        </div>



                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                        <!-- Table Start -->
                            <div class="card">
                            <div class="card-header" style="padding-bottom:20px;">
                                <div class="card-title">Data Table</div>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="fixedHeader" class="table custom-table">
                                        <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Company</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $query = "SELECT * FROM `companytable` -- where activeStatus = 'Y'";
                                            $result = mysqli_query($conn, $query);
                                            $sno = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $sno; ?>.
                                                    </td>
                                                    <td>
                                                        <?php echo $row['name']; ?> 
                                                    </td>
                                                    <td>
                                                        <?php if ($row['activeStatus'] == "Y") { ?>
                                                            <a href="function/model-status.php?status=<?php echo $row['activeStatus'] ?>&company_id=<?php echo $row['company_id'] ?>" class="badge bg-success" onclick="return checkDeactivate()">Active</a>
                                                        <?php } else { ?>

                                                            <a href="function/model-status.php?status=<?php echo $row['activeStatus'] ?>&company_id=<?php echo $row['company_id'] ?>" class="badge bg-danger" onclick="return checkActivate()">InActive</a>
                                                        <?php } ?>
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