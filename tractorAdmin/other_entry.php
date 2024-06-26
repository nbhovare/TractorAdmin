<?php session_start();
$menu = "other_entry";
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
        function checkDelete() {
            return confirm('Are you sure? Delete this?');
        }
        function checkDeactivate() {
            return confirm('Are you sure? Deactivate this?');
        }
        function checkActivate() {
            return confirm('Are you sure? Activate this?');
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

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Company Entry</div>
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
                                <form action="other_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="company_name" id="company_name" type="text" required>
                                                    <div class="field-placeholder">Company Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter company name.
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
                       
                        <!-- Company Start -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Product Type Entry</div>
                                </div>
                                <?php
                                if (isset($_REQUEST['add_product_type'])) {
                                    $product_type = $_REQUEST['product_type'];
                                    $query = "INSERT INTO `mproductTypeName`(name,activeStatus,createdBy) VALUES('$product_type','Y','1')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Product Type Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Product Type Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="other_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="product_type" id="product_type" type="text" required>
                                                    <div class="field-placeholder">Product Type Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter product type name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_product_type" id="add_product_type">Add
                                                    Product Type </button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Company End -->


                        <!-- Product Sale Type start -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Sale Type Entry</div>
                                </div>
                                <?php
                                if (isset($_REQUEST['add_sale_type'])) {
                                    $sale_type = $_REQUEST['sale_type'];
                                    $query = "INSERT INTO `msaleTypeTable`(name,activeStatus,createdBy) VALUES('$sale_type','Y','1')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Product Sale Type Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Product Sale Type Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="other_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="sale_type" id="sale_type" type="text" required>
                                                    <div class="field-placeholder">Sale Type Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter sale type name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_sale_type" id="add_sale_type">Add Sale Type</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- Product Sale Type End -->
                        
                        <!-- HP start -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">HP Entry</div>
                                </div>
                                <?php
                                if (isset($_REQUEST['add_hp'])) {
                                    $hp = $_REQUEST['hp'];
                                    $query = "INSERT INTO mhp_table(hp_name,activeStatus,createdBy) VALUES('$hp','Y','1')";
                                    if (mysqli_query($conn, $query)) {
                                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Product Sale Type Added Successfully!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    } else {
                                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>";
                                        echo "<i class='fa fa-thumbs-up me-2'></i>Failed to add Product Sale Type Details!!";
                                        echo " <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>";
                                        echo "</div>";
                                    }
                                }
                                ?>
                                <form action="other_entry.php" method="POST" enctype="multipart/form-data">
                                    <div class="card-body">
                                        <!-- Row start -->
                                        <div class="row gutters">

                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-8 col-lg-8 col-md-8 col-sm-8 col-12">
                                                <!-- Field wrapper start -->
                                                <div class="field-wrapper">
                                                    <input class="form-control" name="hp" id="hp" type="text" required>
                                                    <div class="field-placeholder">HP Name <span class="text-danger">*</span></div>
                                                    <div class="form-text">
                                                        Please enter HP name.
                                                    </div>
                                                </div>
                                                <!-- Field wrapper end -->
                                            </div>
                                            <div class="col-xl-2 col-lg-2 col-md-2 col-sm-2 col-12"></div>
                                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                                <button class="btn btn-primary" name="add_hp" id="add_hp">Add HP</button>
                                            </div>
                                        </div>
                                        <!-- Row end -->
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- HP End -->

                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                        <!-- Table Start -->
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                <div class="card-title">Data Table</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table custom-table">
                                            <thead>
                                            <tr>
                                                <th>S.No.</th>
                                                <th>Company</th>
                                                <th>Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $query = "SELECT * FROM `machinecompanytable` -- where activeStatus = 'Y'";
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

                        <!-- Table Start -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Product Type</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT product_type_id,name as productType,activeStatus FROM `mproductTypeName` 
                                                WHERE --activeStatus = 'Y'";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $sno; ?>.
                                                        </td>
                                                        <td>
                                                            <?php echo $row['product_type_id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['productType']; ?>
                                                        </td>
                                                        <td>
                                                        <?php if ($row['activeStatus'] == "Y") { ?>
                                                                <a href="function/product-sale-status.php?isFrom=product&status=<?php echo $row['activeStatus'] ?>&proSale_id=<?php echo $row['product_type_id'] ?>" class="badge bg-success" onclick="return checkDeactivate()">Active</a>
                                                            <?php } else { ?>

                                                                <a href="function/product-sale-status.php?isFrom=product&status=<?php echo $row['activeStatus'] ?>&proSale_id=<?php echo $row['product_type_id'] ?>" class="badge bg-danger" onclick="return checkActivate()">InActive</a>
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
                        </div>
                        <!-- Table End -->

                        <!-- Table Start -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">Sale Type</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">Type</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT sale_type_id,name as saleType,activeStatus FROM `msaleTypeTable` 
                                                WHERE --activeStatus = 'Y'";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $sno; ?>.
                                                        </td>
                                                        <td>
                                                            <?php echo $row['sale_type_id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['saleType']; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['activeStatus'] == "Y") { ?>
                                                                <a href="function/product-sale-status.php?isFrom=sale&status=<?php echo $row['activeStatus'] ?>&proSale_id=<?php echo $row['sale_type_id'] ?>" class="badge bg-success" onclick="return checkDeactivate()">Active</a>
                                                            <?php } else { ?>
                                                                <a href="function/product-sale-status.php?isFrom=sale&status=<?php echo $row['activeStatus'] ?>&proSale_id=<?php echo $row['sale_type_id'] ?>" class="badge bg-danger" onclick="return checkActivate()">InActive</a>
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
                        </div>
                        <!-- Table End -->

                          <!-- Table Start -->
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
                            <div class="card">
                                <div class="card-header" style="padding-bottom:20px;">
                                    <div class="card-title">HP</div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">

                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">#</th>
                                                    <th scope="col">Id</th>
                                                    <th scope="col">HP</th>
                                                    <th scope="col">Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $query = "SELECT hp_id,hp_name as hptype,activeStatus FROM `mhp_table` 
                                                WHERE --activeStatus = 'Y'";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                                    <tr>
                                                        <td>
                                                            <?php echo $sno; ?>.
                                                        </td>
                                                        <td>
                                                            <?php echo $row['hp_id']; ?>
                                                        </td>
                                                        <td>
                                                            <?php echo $row['hptype']; ?>
                                                        </td>
                                                        <td>
                                                            <?php if ($row['activeStatus'] == "Y") { ?>
                                                                <a href="function/product-sale-status.php?isFrom=hp&status=<?php echo $row['activeStatus'] ?>&proSale_id=<?php echo $row['hp_id'] ?>" class="badge bg-success" onclick="return checkDeactivate()">Active</a>
                                                            <?php } else { ?>
                                                                <a href="function/product-sale-status.php?isFrom=hp&status=<?php echo $row['activeStatus'] ?>&proSale_id=<?php echo $row['hp_id'] ?>" class="badge bg-danger" onclick="return checkActivate()">InActive</a>
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
                        </div>
                        <!-- Table End -->

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