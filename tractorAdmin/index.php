<?php session_start();
$menu = "dashboard";
include 'headerAdmin/conn.php';
if (isset($_SESSION["user"])) {
?>

    <!doctype html>
    <html lang="en">

    <head>
        <?php
        include 'headerAdmin/head.php'
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
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="stats-tile">
                                    <div class="sale-icon">
                                        <i class="icon-shopping-bag1"></i>
                                    </div>
                                    <div class="sale-details">
                                        <h2><?php
                                            $query = $conn->query("SELECT COUNT(product_id) FROM mproductddetailstable");
                                            $row = $query->fetch_row();
                                            $count = $row[0];
                                            echo $count;
                                            ?></h2>
                                        <p>Total Product</p>
                                    </div>
                                    <div class="sale-graph">
                                        <div id="sparklineLine1"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12">
                                <div class="stats-tile">
                                    <div class="sale-icon">
                                        <i class="icon-shopping-bag1"></i>
                                    </div>
                                    <div class="sale-details">
                                        <h2><?php
                                            /*$query = $conn->query("SELECT COUNT(cus_id) FROM `happycustomertable`");
                                            $row = $query->fetch_row();
                                            $count = $row[0];
                                            echo $count;*/
                                            ?></h2>
                                        <p>Total Happy Customer</p>
                                    </div>
                                    <div class="sale-graph">
                                        <div id="sparklineLine2"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                                <div class="stats-tile">
                                    <div class="sale-icon">
                                        <i class="icon-check-circle"></i>
                                    </div>
                                    <div class="sale-details">
                                        <h2><?php
                                            $query = $conn->query("SELECT COUNT(test_id) FROM testimonialtable");
                                            $row = $query->fetch_row();
                                            $count = $row[0];
                                            echo $count;
                                            ?></h2>
                                        <p>Total Testimonial</p>
                                    </div>
                                    <div class="sale-graph">
                                        <div id="sparklineLine3"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Row end -->

                        <!-- First Graph Start -->
                        <!-- <div class="row gutters">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 cool-12">

                            <div class="card">
                                <div class="card-body">
                                   
                                    <div class="row gutters">
                                        <div class="col-xl-3 col-lg-3 col-md-4 col-sm-4 col-12">
                                            <div class="reports-summary">
                                                <div class="reports-summary-block">
                                                    <h5>Great Sales</h5>
                                                    <h6>Overall sales of the month</h6>
                                                </div>
                                                <div class="reports-summary-block">
                                                    <h5>35 Millions</h5>
                                                    <h6>Overall earnings</h6>
                                                </div>
                                                <div class="reports-summary-block">
                                                    <h5>27 Millions</h5>
                                                    <h6>Overall revenue</h6>
                                                </div>
                                                <div class="reports-summary-block">
                                                    <h5>67k</h5>
                                                    <h6>New customers</h6>
                                                </div>
                                                <button class="btn btn-info stripes-btn">Generate Report</button>
                                            </div>
                                        </div>
                                        <div class="col-xl-9 col-lg-9 col-md-8 col-sm-8 col-12">
                                            <div class="row gutters">
                                                <div class="col-12">
                                                    <div class="graph-day-selection mt-2" role="group">
                                                        <button type="button" class="btn active">Today</button>
                                                        <button type="button" class="btn">Yesterday</button>
                                                        <button type="button" class="btn">7 days</button>
                                                        <button type="button" class="btn">15 days</button>
                                                        <button type="button" class="btn">30 days</button>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div id="salesGraph" class="chart-height-xl"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                
                                </div>
                            </div>

                        </div>
                    </div> -->
                        <!-- First Graph End -->

                        <!-- Row start -->
                        <!-- <div class="row gutters">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Visitors</div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn active">Export</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="visitorsGraph" class="chart-height-md"></div>

                                    <ul class="stats-list-container">
                                        <li class="stats-list-item primary">
                                            <div class="stats-icon">
                                                <i class="icon-calendar1"></i>
                                            </div>
                                            <div class="stats-info">
                                                <h6 class="stats-title">Week 1</h6>
                                                <p class="stats-amount">25</p>
                                            </div>
                                        </li>
                                        <li class="stats-list-item primary">
                                            <div class="stats-icon">
                                                <i class="icon-calendar1"></i>
                                            </div>
                                            <div class="stats-info">
                                                <h6 class="stats-title">Week 2</h6>
                                                <p class="stats-amount">32</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Orders</div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn active">View All</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="ordersGraph" class="chart-height-md"></div>

                                    <ul class="stats-list-container">
                                        <li class="stats-list-item primary">
                                            <div class="stats-icon">
                                                <i class="icon-archive1"></i>
                                            </div>
                                            <div class="stats-info">
                                                <h6 class="stats-title">New</h6>
                                                <p class="stats-amount">15</p>
                                            </div>
                                        </li>
                                        <li class="stats-list-item primary">
                                            <div class="stats-icon">
                                                <i class="icon-truck"></i>
                                            </div>
                                            <div class="stats-info">
                                                <h6 class="stats-title">Delivered</h6>
                                                <p class="stats-amount">10</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">

                            <div class="card">
                                <div class="card-header">
                                    <div class="card-title">Earnings</div>
                                    <div class="graph-day-selection" role="group">
                                        <button type="button" class="btn active">Download</button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div id="earningsGraph" class="chart-height-md"></div>

                                    <ul class="stats-list-container">
                                        <li class="stats-list-item primary">
                                            <div class="stats-icon">
                                                <i class="icon-briefcase"></i>
                                            </div>
                                            <div class="stats-info">
                                                <h6 class="stats-title">Today</h6>
                                                <p class="stats-amount">$25</p>
                                            </div>
                                        </li>
                                        <li class="stats-list-item primary">
                                            <div class="stats-icon">
                                                <i class="icon-briefcase"></i>
                                            </div>
                                            <div class="stats-info">
                                                <h6 class="stats-title">Yesterday</h6>
                                                <p class="stats-amount">$18</p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div> -->
                        <!-- Row end -->



                        <!-- Row start -->
                        <!-- <div class="row gutters">
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="goal-container">
                                <div class="goal-info">
                                    <h5>Today's Goal</h5>
                                    <h6>70/100</h6>
                                </div>
                                <div class="goal-graph">
                                    <div id="todaysTarget"></div>
                                    <div class="circle-one"></div>
                                    <div class="circle-two"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12">
                            <div class="graph-card">
                                <h6>New Customers</h6>
                                <h4>2500</h4>
                                <div class="graph-placeholder">
                                    <div id="customersGraph"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12">
                            <div class="payments-card">
                                <h6>Balance</h6>
                                <h4>$5699.89</h4>
                                <div class="custom-btn-group mt-2">
                                    <button class="btn btn-outline-primary"><i
                                            class="icon-credit-card"></i>Deposit</button>
                                    <button class="btn btn-primary"><i class="icon-credit-card"></i>Withdraw</button>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <!-- Row end -->

                    </div>
                    <!-- Content wrapper end -->

                    <!-- App footer start -->
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

    <!-- Mirrored from bootstrap.gallery/unipro/v1-x/01-design-blue/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Oct 2021 09:52:06 GMT -->

    </html>

<?php
} else {
    header("Location:login.php");
}
?>