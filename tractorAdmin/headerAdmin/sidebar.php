<!-- Tabs nav start -->
<div class="nav" role="tablist" aria-orientation="vertical">
    <a href="#" class="logo">
        <img src="img/logo.svg" alt="RJTechX Admin">
    </a>
    <a class="nav-link active" id="home-tab" data-bs-toggle="tab" href="#tab-home" role="tab" aria-controls="tab-home" aria-selected="true">
        <i class="icon-home2"></i>
        <span class="nav-link-text">Dashboards</span>
    </a>
    <!-- <a class="nav-link" id="product-tab" data-bs-toggle="tab" href="#tab-product" role="tab" aria-controls="tab-product" aria-selected="false">
                        <i class="icon-layers2"></i>
                        <span class="nav-link-text">Product</span>
                    </a>
                    <a class="nav-link" id="pages-tab" data-bs-toggle="tab" href="#tab-pages" role="tab" aria-controls="tab-pages" aria-selected="false">
                        <i class="icon-book-open"></i>
                        <span class="nav-link-text">Pages</span>
                    </a>
                    <a class="nav-link" id="forms-tab" data-bs-toggle="tab" href="#tab-forms" role="tab" aria-controls="tab-forms" aria-selected="false">
                        <i class="icon-edit1"></i>
                        <span class="nav-link-text">Forms</span>
                    </a>
                    <a class="nav-link" id="components-tab" data-bs-toggle="tab" href="#tab-components" role="tab" aria-controls="tab-components" aria-selected="false">
                        <i class="icon-box"></i>
                        <span class="nav-link-text">Components</span>
                    </a>
                    <a class="nav-link" id="graphs-tab" data-bs-toggle="tab" href="#tab-graphs" role="tab" aria-controls="tab-graphs" aria-selected="false">
                        <i class="icon-pie-chart1"></i>
                        <span class="nav-link-text">Graphs</span>
                    </a>
                    <a class="nav-link" id="authentication-tab" data-bs-toggle="tab" href="#tab-authentication" role="tab" aria-controls="tab-authentication" aria-selected="false">
                        <i class="icon-unlock"></i>
                        <span class="nav-link-text">Authentication</span>
                    </a>
                    <a class="nav-link settings" id="settings-tab" data-bs-toggle="tab" href="#tab-settings" role="tab" aria-controls="tab-authentication" aria-selected="false">
                        <i class="icon-settings1"></i>
                        <span class="nav-link-text">Settings</span>
                    </a> -->
</div>
<!-- Tabs nav end -->

<!-- Tabs content start -->
<div class="tab-content">

    <!-- Chat tab -->
    <div class="tab-pane fade show active" id="tab-home" role="tabpanel" aria-labelledby="home-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Admin Dashboards
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="index.php" <?php if ($menu == "dashboard") echo "class='current-page'" ?>>Dashboard</a>
                    </li>
                    <li>
                        <a href="machine_entry.php" <?php if ($menu == "model_entry") echo "class='current-page'" ?>>Data Entry</a>
                    </li>
                    <li>
                        <a href="other_entry.php" <?php if ($menu == "other_entry") echo "class='current-page'" ?>>Other Entry</a>
                    </li>
                    <li>
                        <a href="product_entry.php" <?php if ($menu == "product_entry") echo "class='current-page'" ?>>Product Entry</a>
                    </li> 
                       <li>
                        <a href="product_list.php" <?php if ($menu == "product_list") echo "class='current-page'" ?>>Product List</a>
                    </li>
                      <li>
                        <a href="stock_entry.php" <?php if ($menu == "stock_entry") echo "class='current-page'" ?>>Stock Entry</a>
                    </li> 
                      <li>
                        <a href="create-invoice.php" <?php if ($menu == "create-invoice") echo "class='current-page'" ?>>Create Invoice</a>
                    </li> 
                      <li>
                        <a href="sale.php" <?php if ($menu == "sale") echo "class='current-page'" ?>>Sale</a>
                    </li> 
                    <li>
                        <a href="customer_entry.php" <?php if ($menu == "customer_entry") echo "class='current-page'" ?>>Happy Customer</a>
                    </li>
                    <li>
                        <a href="testimonials.php" <?php if ($menu == "testimonials") echo "class='current-page'" ?>>Testimonials Entry</a>
                    </li>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <!-- <div class="sidebar-actions">
                            <a href="orders.html" class="red">
                                <div class="bg-avatar">12</div>
                                <h5>New Orders</h5>
                            </a>
                            <a href="invoices-list.html" class="blue">
                                <div class="bg-avatar">24</div>
                                <h5>Bills Pending</h5>
                            </a>
                        </div> -->
        <!-- Sidebar actions ends -->

    </div>

    <!-- Pages tab -->
    <div class="tab-pane fade" id="tab-product" role="tabpanel" aria-labelledby="product-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Product
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="products.html">Products Grid</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile">
                <i class="icon-headphones"></i> 24/7 Support
            </div>
        </div>
        <!-- Sidebar actions ends -->

    </div>

    <!-- Pages tab -->
    <div class="tab-pane fade" id="tab-pages" role="tabpanel" aria-labelledby="pages-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Pages
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="#">Chat</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile green">
                <i class="icon-pie-chart1"></i> 5GB Free Space
            </div>
        </div>
        <!-- Sidebar actions ends -->

    </div>

    <!-- Forms tab -->
    <div class="tab-pane fade" id="tab-forms" role="tabpanel" aria-labelledby="forms-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Forms
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li class="list-heading">Form Layouts</li>
                    <li>
                        <a href="forms-layout-one.html">Default Layout</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile red">
                <i class="icon-mail"></i> Inbox Full
            </div>
        </div>
        <!-- Sidebar actions ends -->

    </div>

    <!-- Components tab -->
    <div class="tab-pane fade" id="tab-components" role="tabpanel" aria-labelledby="components-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Components
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="accordions.html">Accordions</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile yellow">
                <i class="icon-arrow-down-circle"></i><a href="#">Download Reports</a>
            </div>
        </div>
        <!-- Sidebar actions ends -->

    </div>

    <!-- Graphs tab -->
    <div class="tab-pane fade" id="tab-graphs" role="tabpanel" aria-labelledby="graphs-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Graphs &amp; Tables
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li class="list-heading">Graphs</li>
                    <li>
                        <a href="apex-graphs.html">Apex Graphs</a>
                    </li>

                </ul>

                <ul>
                    <li class="list-heading">Tables</li>
                    <li>
                        <a href="bootstrap-tables.html">Bootstrap Tables</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile pink">
                <i class="icon-align-right1"></i> RTL Support
            </div>
        </div>
        <!-- Sidebar actions ends -->

    </div>

    <!-- Authentication tab -->
    <div class="tab-pane fade" id="tab-authentication" role="tabpanel" aria-labelledby="authentication-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Authentication
        </div>
        <!-- Tab content header end -->

        <!-- Sidebar menu starts -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-menu">
                <ul>
                    <li>
                        <a href="login.html">Login</a>
                    </li>
                    <li>
                        <a href="signup.html">Signup</a>
                    </li>

                </ul>
            </div>
        </div>
        <!-- Sidebar menu ends -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile blue">
                <a href="pricing.html" class="btn btn-light m-auto">Upgrade Account</a>
            </div>
        </div>
        <!-- Sidebar actions ends -->

    </div>

    <!-- Settings tab -->
    <div class="tab-pane fade" id="tab-settings" role="tabpanel" aria-labelledby="settings-tab">

        <!-- Tab content header start -->
        <div class="tab-pane-header">
            Settings
        </div>
        <!-- Tab content header end -->

        <!-- Settings start -->
        <div class="sidebarMenuScroll">
            <div class="sidebar-settings">
                <div class="accordion" id="settingsAccordion">
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="genInfo">
                            <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#genCollapse" aria-expanded="true" aria-controls="genCollapse">
                                General Info
                            </button>
                        </h2>
                        <div id="genCollapse" class="accordion-collapse collapse show" aria-labelledby="genInfo" data-bs-parent="#settingsAccordion">
                            <div class="accordion-body">
                                <div class="field-wrapper">
                                    <input type="text" value="Jeivxezer Lopexz" />
                                    <div class="field-placeholder">Full Name</div>
                                </div>

                                <div class="field-wrapper">
                                    <input type="email" value="jeivxezer-lopexz@email.com" />
                                    <div class="field-placeholder">Email</div>
                                </div>

                                <div class="field-wrapper">
                                    <input type="text" value="0 0000 00000" />
                                    <div class="field-placeholder">Contact</div>
                                </div>
                                <div class="field-wrapper m-0">
                                    <button class="btn btn-primary stripes-btn">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="chngPwd">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#chngPwdCollapse" aria-expanded="false" aria-controls="chngPwdCollapse">
                                Change Password
                            </button>
                        </h2>
                        <div id="chngPwdCollapse" class="accordion-collapse collapse" aria-labelledby="chngPwd" data-bs-parent="#settingsAccordion">
                            <div class="accordion-body">
                                <div class="field-wrapper">
                                    <input type="text" value="">
                                    <div class="field-placeholder">Current Password</div>
                                </div>
                                <div class="field-wrapper">
                                    <input type="password" value="">
                                    <div class="field-placeholder">New Password</div>
                                </div>
                                <div class="field-wrapper">
                                    <input type="password" value="">
                                    <div class="field-placeholder">Confirm Password</div>
                                </div>
                                <div class="field-wrapper m-0">
                                    <button class="btn btn-primary stripes-btn">Save</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="sidebarNotifications">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#notiCollapse" aria-expanded="false" aria-controls="notiCollapse">
                                Notifications
                            </button>
                        </h2>
                        <div id="notiCollapse" class="accordion-collapse collapse" aria-labelledby="sidebarNotifications" data-bs-parent="#settingsAccordion">
                            <div class="accordion-body">
                                <div class="list-group m-0">
                                    <div class="noti-container">
                                        <div class="noti-block">
                                            <div>Alerts</div>
                                            <div class="form-switch">
                                                <input class="form-check-input" type="checkbox" id="showAlertss" checked>
                                                <label class="form-check-label" for="showAlertss"></label>
                                            </div>
                                        </div>
                                        <div class="noti-block">
                                            <div>Enable Sound</div>
                                            <div class="form-switch">
                                                <input class="form-check-input" type="checkbox" id="soundEnable">
                                                <label class="form-check-label" for="soundEnable"></label>
                                            </div>
                                        </div>
                                        <div class="noti-block">
                                            <div>Allow Chat</div>
                                            <div class="form-switch">
                                                <input class="form-check-input" type="checkbox" id="allowChat">
                                                <label class="form-check-label" for="allowChat"></label>
                                            </div>
                                        </div>
                                        <div class="noti-block">
                                            <div>Desktop Messages</div>
                                            <div class="form-switch">
                                                <input class="form-check-input" type="checkbox" id="desktopMessages">
                                                <label class="form-check-label" for="desktopMessages"></label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Settings end -->

        <!-- Sidebar actions starts -->
        <div class="sidebar-actions">
            <div class="support-tile blue">
                <a href="account-settings.html" class="btn btn-light m-auto">Advance Settings</a>
            </div>
        </div>
        <!-- Sidebar actions ends -->
    </div>

</div>
<!-- Tabs content end -->