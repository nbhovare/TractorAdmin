<?php
include 'headers/head.php';
include 'headers/conn.php';
                              
    $model="";
    $brand="";
    $hp="";
    if(isset($_GET['model'])){
        $model=$_GET['model'];
    }
    if(isset($_GET['model'])){
        $model=$_GET['model'];
    }


?>

    <!-- Header Area Start Here -->
 <?php include 'headers/header.php'; ?>
 

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>




 <script>
 
    
    //$(document).ready(function(){
        
/*
        
        $("#formFilter").submit(function(e){
            e.preventDefault();            
            var data={
                brand: getCheckedValues("brand[]"),
                product: getCheckedValues("model[]"),
                hp: getCheckedValues("hp[]")                
            };
            $.ajax({
				url: './filter.php',
				type: 'POST',				
				data: {datas: JSON.stringify(data)},								
				success: function(response) {			
                    var container = $('#card-container');
                    container.empty();                    
                    var data = response.data;

                    data.forEach(function(item) {
                        var cardHTML = `
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="used-inner" id="">
                                    <div class="card">
                                        <div class="tract-img-fix">
                                            <img src="${item.product_image}" class="card-img-top" alt="..." />
                                        </div>

                                        <div class="card-body">
                                            <div class="tract-name view-all-height">
                                                <h5 class="card-title">${item.proName}</h5>
                                                <p class="card-text">
                                                    <span class="amount">Start From ₹${convertNumber(item.ex_showroom)}</span>
                                                </p>
                                                <div class="for-product-city">
                                                    <ul>
                                                        <li>${item.hpName}</li>
                                                    </ul>
                                                </div>

                                                <div class="img-position for-tractor-sponser" style="display:none;">
                                                    <img src="./assets/image/sponser.png">
                                                </div>
                                            </div>

                                            <div class="list_page">
                                                <a href="tractor-details.php?id=${item.product_id}" class="btn_check btn-dark">Check Detail</a>
                                            </div>
                                        </div>
                                        <a href="#" class="full-box-h"></a>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.append(cardHTML);		
                    });
				},
				error: function(error) {
					console.log(error);
				}
			});
        });
    });




    function convertNumber(number) {
                // Assuming this function formats the number as required.
                return new Intl.NumberFormat('en-IN').format(number);
            }


*/
 </script>



 <section class="view-all-tractor new_all_tractor">
            <div class="container">
                <div class="row">
                     <div class="col-xxl-3 col-xl-3 col-lg-3 col-md-12">

                    <div class="vertical-filters-filters header-container vertical-slide-toggle">
                        <span class="header-title">FILTERS</span>
                        <span class="filter-md"><i class="fa-solid fa-filter"></i></span>
                    </div>


                    <div class="search-leftContainer filterdis" id="filter-slide">
                        <span class="d_close_filter"><i class="fas fa-times" aria-hidden="true"></i></span>
                        <form method="POST" id="formFilter">
                            <div class="condition-render-verticalFilters condition-render-boundary-top"
                                style="top: 0px; bottom: auto;">



                                <div class="vertical-filters-filters header-container">
                                    <span class="header-title" id="filterhead">FILTERS</span>

                                    <a href="new-tractor.php">
                                        <span class="header-clearAllBtn">CLEAR ALL
                                        </span>
                                    </a>
                                </div>


                                <div class="vertical-filters-filters brand-container">

                                 
                                    <span class="vertical-filters-header">Brands</span>
                                    <ul class="brand-list">
                                          <?php
                                            $query = "SELECT * FROM `machinecompanytable` where activeStatus = 'Y'";
                                            $result = mysqli_query($conn, $query);
                                            $sno = 1;
                                            while ($row = mysqli_fetch_array($result)) {
                                            ?>
                                        <li>
                                            <label class="vertical-filters-label common-customCheckbox">
                                                <input type="checkbox" name="brand[]"
                                                    class="filter_data brand_id" data-id="20"
                                                    value="<?php echo $row['company_id']; ?> " />
                                                <?php echo $row['name']; ?> 
                                                <!--<span class="brand-num">(5821)</span> displaybrandmodelonly -->
                                                <div class="common-checkboxIndicator"></div>
                                            </label>
                                        </li>
                                            <?php
                                                $sno = $sno + 1;
                                            } ?>
                                       
                                    </ul>

                                </div>
                                <div class="vertical-filters-filters ">
                                    <span class="vertical-filters-header">Product</span>
                                    <div class="filters-form" style="display:none;">
                                        <form id="categories-filter">
                                            <input type="search" placeholder="Search.." />
                                            <input type="submit" value="GO" />
                                        </form>
                                    </div>
                                    <ul class="price-list">
                                         <?php
                                                $query = "SELECT product_type_id,name as productType,activeStatus FROM `mproductTypeName` WHERE activeStatus = 'Y'";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                        <li class="parent20 hideallnow showallnow">
                                            <label class="common-customCheckbox vertical-filters-label">
                                                <input type="checkbox" name="model[]" data-id="50"
                                                    class="price-input filter_data models " value="<?php echo $row['product_type_id']; ?>" />
                                                 <?php echo $row['productType'].""; ?>
                                                <!--<span class="price-num">(3401)</span>-->
                                                <div class="common-checkboxIndicator"></div>
                                            </label>
                                        </li>
                                          <?php
                                                $sno = $sno + 1;
                                            } ?>
                                      


                                    </ul>
                                </div>


                                <div class="vertical-filters-filters vertical-price-fix">
                                    <span class="vertical-filters-header">HP</span>
                                    <ul class="price-list">
                                                <?php
                                                $query = "SELECT hp_id,hp_name as hptype,activeStatus FROM `mhp_table` 
                                                WHERE --activeStatus = 'Y'";
                                                $result = mysqli_query($conn, $query);
                                                $sno = 1;
                                                while ($row = mysqli_fetch_array($result)) {
                                                ?>
                                         <li class=" parent5 parent23 hideallnow showallnow">
                                            <label class="common-customCheckbox vertical-filters-label">
                                                <input type="checkbox" name="hp[]" class="price-input" value="<?php echo $row['hp_id']; ?>" />
                                                  <?php echo $row['hptype']; ?>
                                                <div class="common-checkboxIndicator"></div>
                                            </label>
                                        </li>
                                            <?php
                                                $sno = $sno + 1;
                                            } ?>
                                      
                                

                                    </ul>
                                </div>


                                <div class="vertical-filters-filters">
                                    
                                    <div class="vertical-tab-filter">
                                        <button type="submit" class="for-submit-btn btn-danger"> Filter </button>
                                    </div>

                                </div>

                            </div>
                        </form>
                    </div>
                </div>

                    <div class="col-xxl-9 col-xl-9 col-lg-9 col-md-12 mt-3">
                        <div class="row g-4"  id="card-container">


                            <div class="data"></div>

                            <!--<div class="col-xxl-4 col-xl-4 col-sm-6">id="parentBox"
                                <div class="used-inner" id="">
                                    <div class="card">
                                        <div class="tract-img-fix">
                                            <img src="./assets/storage/uploads/1666344803_trakstar-5362e41.png?w=375&amp;h=320" class="card-img-top" alt="..." />
                                        </div>

                                        <div class="card-body">
                                            <div class="tract-name view-all-height">
                                                <h5 class="card-title"> Trakstar 536</h5>
                                                <p class="card-text">
                                                    <span class="amount">Start From ₹5.2 Lakh</span>
                                                </p>
                                                <div class="for-product-city">
                                                    <ul>
                                                        <li>36 HP</li>

                                                    </ul>
                                                </div>

                                                <div class="img-position for-tractor-sponser" style="display:none;">
                                                    <img src="./assets/image/sponser.png">
                                                </div>
                                            </div>

                                            <div class="list_page">

                                                <a href="#" class="btn_check btn-dark">Check Detail</a>

                                            </div>

                                        </div>
                                        <a href="#" class="full-box-h"></a>
                                    </div>
                                </div>
                            </div>-->

                           
                            <?php
                               // $query = "SELECT pt.product_id,pt.product_image,pt.name as proName,m.name as model,c.name as company,p.name proType,s.name as saleType,pt.activeStatus FROM `mproductddetailstable` pt
                               // INNER JOIN mmodeltable m on m.model_id = pt.model_id
                               // INNER JOIN machinecompanytable c on c.company_id = m.company_id
                               // INNER JOIN mproducttypename p on p.product_type_id = pt.product_type_id
                               // INNER JOIN msaletypetable s on s.sale_type_id = pt.sale_type_id
                               // WHERE --pt.activeStatus = 'Y' 
                               // ORDER BY pt.product_id desc ";
                                $query = "SELECT distinct pt.product_id,pt.name as proName,ct.name as company,mp.name as productType,hp.hp_name as hpName,pt.product_image,pt.chassis_no,pt.engine_no,pt.key_no,pt.ex_showroom,pt.insurance,pt.hpa,pt.regd,pt.agreement,pt.access,pt.misc,pt.other_cost,pt.total_cost,pt.activeStatus,pt.editor FROM mproductddetailstable pt
                                inner join machinecompanytable ct on ct.company_id = pt.company_id 
                                inner join mproducttypename mp on mp.product_type_id = pt.product_type_id
                                inner join mhp_table hp on hp.hp_id = pt.hp_id
                                WHERE pt.activeStatus = 'Y' 
                                ORDER BY pt.product_id desc";
                               $result = mysqli_query($conn, $query);
                               $sno = 1;
                               while ($row = mysqli_fetch_array($result)) {
                               ?>
                            <div class="col-xxl-4 col-xl-4 col-sm-6">
                                <div class="used-inner" id="">
                                    <div class="card">
                                        <div class="tract-img-fix">
                                            <img src="<?php echo $img . $row['product_image']; ?>" class="card-img-top" alt="..." />
                                        </div>

                                        <div class="card-body">
                                            <div class="tract-name view-all-height">
                                                <h5 class="card-title"><?php echo $row['proName']; ?></h5>
                                                <p class="card-text">
                                                    <span class="amount">Start From ₹<?php echo convertNumber($row['ex_showroom']); ?></span>
                                                </p>
                                                <div class="for-product-city">
                                                    <ul>
                                                        <li><?php echo $row['hpName']; ?></li>

                                                    </ul>
                                                </div>

                                                <div class="img-position for-tractor-sponser" style="display:none;">
                                                    <img src="./assets/image/sponser.png">
                                                </div>
                                            </div>

                                            <div class="list_page">

                                                <a href="tractor-details.php?id=<?php echo $row['product_id'] ?>" class="btn_check btn-dark">Check Detail</a>



                                            </div>

                                        </div>
                                        <a href="#" class="full-box-h"></a>
                                    </div>
                                </div>
                            </div>
                                        <?php
                                                    
                                                } ?>

                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="pagination-list">
                            <div class="button">
                                <a class="button">
                                    <nav>
                                        <ul class="pagination" id="pagination">
                                            <!--
                                            <li class="page-item disabled" aria-disabled="true" aria-label="&laquo; Previous">
                                                <span class="page-link" aria-hidden="true">&lsaquo;</span>
                                            </li>

                                            <li class="page-item active" aria-current="page"><span class="page-link">1</span></li>
                                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                                            <li class="page-item"><a class="page-link" href="#">4</a></li>

                                            <li class="page-item">
                                                <a class="page-link" href="#" rel="next" aria-label="Next &raquo;">&rsaquo;</a>
                                            </li>
                                            -->
                                        </ul>
                                    </nav>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


<script>
        $(document).ready(function() {

            function getCheckedValues(inputName) {
                // Get all checkboxes with the specified name that are checked
                let checkboxes = document.querySelectorAll(`input[name="${inputName}"]:checked`);
                let values = [];

                // Iterate over checked checkboxes and collect their values
                checkboxes.forEach((checkbox) => {
                    values.push(checkbox.value);
                });

                return values;

                // Print the values
                //console.log(`Selected ${inputName.split('[')[0]}s: `, values);
            }

            const itemsPerPage = 1000;  // Number of items to show per page
            let currentPage = 1;
            let data = [];

            $("#formFilter").submit(function(e) {
                e.preventDefault();
                console.log("Form submitted!");
                fetchData();
            });

            function fetchData() {
                var data={
                    brand: getCheckedValues("brand[]"),
                    product: getCheckedValues("model[]"),
                    hp: getCheckedValues("hp[]")                
                };
                $.ajax({
                    url: './filter.php',
                    type: 'POST',				
                    data: {datas: JSON.stringify(data)},								
                    success: function(response) {	
                        console.log("Data fetched successfully:", response);                    
                        data = response.data;
                        $('#card-container').empty();
                        currentPage = 1;
                        renderPagination(data);
                        renderPage(currentPage, data);
                    },
                    error: function(error) {
                        console.error('Error fetching data:', error);
                    }
                });
            }

            function renderPage(page, data) {                
                const startIndex = (page - 1) * itemsPerPage;
                const endIndex = startIndex + itemsPerPage;
                const pageData = data.slice(startIndex, endIndex);
                
                pageData.forEach(function(item) {
                
                    const cardHTML = `
                        <div class="col-xxl-4 col-xl-4 col-sm-6">
                            <div class="used-inner" id="">
                                <div class="card">
                                    <div class="tract-img-fix">
                                        <img src="${item.product_image}" class="card-img-top" alt="..." />
                                    </div>

                                    <div class="card-body">
                                        <div class="tract-name view-all-height">
                                            <h5 class="card-title">${item.proName}</h5>
                                            <p class="card-text">
                                                <span class="amount">Start From ₹${convertNumber(item.ex_showroom)}</span>
                                            </p>
                                            <div class="for-product-city">
                                                <ul>
                                                    <li>${item.hpName}</li>
                                                </ul>
                                            </div>

                                            <div class="img-position for-tractor-sponser" style="display:none;">
                                                <img src="./assets/image/sponser.png">
                                            </div>
                                        </div>

                                        <div class="list_page">
                                            <a href="tractor-details.php?id=${item.product_id}" class="btn_check btn-dark">Check Detail</a>
                                        </div>
                                    </div>
                                    <a href="#" class="full-box-h"></a>
                                </div>
                            </div>
                        </div>
                    `;

                    $('#card-container').append(cardHTML);
                });
            }

            function renderPagination(data) {
                const totalPages = Math.ceil(data.length / itemsPerPage);
                const pagination = $('#pagination');
                pagination.empty();

                const prevClass = currentPage === 1 ? 'disabled' : '';
                pagination.append(`
                    <li class="page-item ${prevClass}" aria-disabled="true" aria-label="&laquo; Previous">
                        <span class="page-link" aria-hidden="true">&lsaquo;</span>
                    </li>
                `);

                for (let i = 1; i <= totalPages; i++) {
                    const activeClass = currentPage === i ? 'active' : '';
                    pagination.append(`
                        <li class="page-item ${activeClass}">
                            <a class="page-link" href="#">${i}</a>
                        </li>
                    `);
                }

                const nextClass = currentPage === totalPages ? 'disabled' : '';
                pagination.append(`
                    <li class="page-item ${nextClass}" aria-disabled="true" aria-label="Next &raquo;">
                        <span class="page-link" aria-hidden="true">&rsaquo;</span>
                    </li>
                `);

                pagination.find('a.page-link').on('click', function(e) {
                    e.preventDefault();
                    const page = parseInt($(this).text());
                    if (page !== currentPage) {
                        currentPage = page;
                        renderPage(currentPage);
                        renderPagination();
                    }
                });

                pagination.find('li.page-item').first().on('click', function(e) {
                    if (!$(this).hasClass('disabled')) {
                        currentPage--;
                        renderPage(currentPage);
                        renderPagination();
                    }
                });

                pagination.find('li.page-item').last().on('click', function(e) {
                    if (!$(this).hasClass('disabled')) {
                        currentPage++;
                        renderPage(currentPage);
                        renderPagination();
                    }
                });
            }

            function convertNumber(number) {
                return new Intl.NumberFormat('en-IN').format(number);
            }
        });
    </script>


<?php include 'headers/footer.php'; ?>
