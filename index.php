<?php 
include 'headers/head.php';

include 'headers/conn.php';
?>

    <!-- Header Area Start Here -->
 <?php  include 'headers/header.php'; ?>
 
 <!-- Banner Section Start -->
    <section class="banner" style="background-image:url(./assets/image/slider/slider1.png);background-size: cover;">
        <div class="container">
            <div class="banner_main_block" hidden>
                <div class="banner_overlay">
                    <h2>Find the Right Tractor for you</h2>
                    <div class="find_tractor_block">
                        <form method="POST" id="filterform" action="#" accept-charset="UTF-8" autocomplete="off">
                            <input type="hidden" name="_token" value="VJ9nDAaTeVJ29Zsz7QNy03VdcGWqFkanB6VsegCf">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card tab-card">
                                        <div class="card-header tab-card-header">

                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade p-3 active show" id="one" role="tabpanel" aria-labelledby="one-tab">


                                                <div class="half">
                                                    <div class="form-group">
                                                        <select style="appearance: none;" name="" id="type" class="form-control">
                              <option value="Used">Used</option>
                             <option value="New">New</option>
                            </select>

                                                    </div>
                                                </div>
                                                <div class="half">
                                                    <div class="form-group">

                                                        <select style="appearance: none;" class="form-control get-model-from-manufacturer brand" data-url="./assets/model" name="filter[make_title]" id="brand" required>
                              <option value="" selected="selected">Select Brand</option>
                                                                                          <option value="1">Mahindra</option>
                                                                                                                        <option value="13">Sonalika</option>
                                                                                                                        <option value="5">John Deere</option>
                                                                                                                        <option value="9">Eicher</option>
                                                                                                                        <option value="10">New Holland</option>
                                                                                                                        <option value="11">Farmtrac</option>
                                                                                        </select>

                                                    </div>
                                                </div>
                                                <div class="half">
                                                    <div class="form-group">
                                                        <select style="appearance: none;" name="filter[model_title]" id="model" class="form-control model" required>
                              <option value="" data-make_title=""> Model</option>                           
                            </select>

                                                    </div>
                                                </div>

                                                <div class="half">
                                                    <div class="form-group">
                                                        <select style="appearance: none;" name="year" id="year" class="form-control">
                              <option value="">Year</option>
                              <option value="2022"> 2022</option>
                              <option value="2021"> 2021</option>      
                              <option value="2020"> 2020</option>
                              <option value="2019"> 2019</option> 
                              <option value="2018"> 2018</option>
                              <option value="2017"> 2017</option> 
                            </select>

                                                    </div>
                                                </div>



                                                <input type="hidden" name="_token" value="sWDPVWhO1GFLQhG1D2crt5tmvLdpwBVOZUtK5ffi">
                                                <input name="page" type="hidden" value="1">
                                                <div class="find-block-tractor">
                                                    <button type="submit" class="btn btn-danger find-tractor">Find Tractor</button> </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->


    <!-- New Tractors Section Start -->
    <section class="td_populer_sec">
        <div class="container">
            <h2 class="main-tilte  text-center">Popular Tractors</h2>
            <div class="pills-tabs-td">
                <div class="td-home-tab">
                    <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                        <li class="view-tom"><a href="#" class="view_link">View All<img src="./assets/image/next-arrow.png"></a></li>
                    </ul>
                </div>
                <div class="tab-content" id="pills-tabContent">

                    <div class="tab-pane fade pills-new show active" id="pills-profile-02" role="tabpanel" aria-labelledby="pills-profile-02-tab">

                        <div class="col-xxl-12 col-xl-12 col-lg-12 col-md-12 mt-3">
                            <div class="row g-4" id="parentBox">
                                
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
                            <div class="col-xxl-3 col-xl-4 col-sm-6">
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

                                <div class="col-xxl-3 col-xl-4 col-sm-6">
                                    <div class="used-inner" id="">
                                        <div class="card">
                                            <div class="tract-img-fix">
                                                <img src="./assets/storage/uploads/1666334298_John-Deere-Kubota-MU4501-2WD2e41.jpg?w=375&amp;h=320" class="card-img-top" alt="..." />
                                            </div>

                                            <div class="card-body">
                                                <div class="tract-name view-all-height">
                                                    <h5 class="card-title"> John Deere Kubota MU4501 2WD</h5>
                                                    <p class="card-text">
                                                        <span class="amount">Start From ₹7.54 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city">
                                                        <ul>
                                                            <li>20 HP</li>

                                                        </ul>
                                                    </div>


                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>

                                                </div>

                                            </div>
                                            <a href="#" class="full-box-h "></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6 ">
                                    <div class="used-inner " id=" ">
                                        <div class="card ">
                                            <div class="tract-img-fix ">
                                                <img src="./assets/storage/uploads/1681731028_mahindra-jivo-225-di-4wd02e41.jpg?w=375&amp;h=320 " class="card-img-top " alt="... " />
                                            </div>

                                            <div class="card-body ">
                                                <div class="tract-name view-all-height ">
                                                    <h5 class="card-title "> Mahindra JIVO 225 DI 4WD</h5>
                                                    <p class="card-text ">
                                                        <span class="amount ">Start From ₹4.45 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city ">
                                                        <ul>
                                                            <li>20 HP</li>

                                                        </ul>
                                                    </div>


                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>
                                                </div>

                                            </div>
                                            <a href="#" class="full-box-h "></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6 ">
                                    <div class="used-inner " id=" ">
                                        <div class="card ">
                                            <div class="tract-img-fix ">
                                                <img src="./assets/storage/uploads/1666332605_mahindr-%20jivo-245-di2e41.png?w=375&amp;h=320 " class="card-img-top " alt="... " />
                                            </div>

                                            <div class="card-body ">
                                                <div class="tract-name view-all-height ">
                                                    <h5 class="card-title "> Mahindra JIVO 245 DI</h5>
                                                    <p class="card-text ">
                                                        <span class="amount ">Start From ₹5.15 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city ">
                                                        <ul>
                                                            <li>24 HP</li>

                                                        </ul>
                                                    </div>
                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>
                                                </div>

                                            </div>
                                            <a href="#" class="full-box-h "></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6 ">
                                    <div class="used-inner " id=" ">
                                        <div class="card ">
                                            <div class="tract-img-fix ">
                                                <img src="./assets/storage/uploads/1681731967_upload-1632974455-02e41.jpg?w=375&amp;h=320 " class="card-img-top " alt="... " />
                                            </div>

                                            <div class="card-body ">
                                                <div class="tract-name view-all-height ">
                                                    <h5 class="card-title "> Eicher 241</h5>
                                                    <p class="card-text ">
                                                        <span class="amount ">Start From ₹3.83 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city ">
                                                        <ul>
                                                            <li>25 HP</li>

                                                        </ul>
                                                    </div>

                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>

                                                </div>

                                            </div>
                                            <a href="#" class="full-box-h "></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6 ">
                                    <div class="used-inner " id=" ">
                                        <div class="card ">
                                            <div class="tract-img-fix ">
                                                <img src="./assets/storage/uploads/1666346562_Kubota-neoStar%20B2741-4WD2e41.png?w=375&amp;h=320 " class="card-img-top " alt="... " />
                                            </div>

                                            <div class="card-body ">
                                                <div class="tract-name view-all-height ">
                                                    <h5 class="card-title "> Kubota NeoStar B2741 4WD</h5>
                                                    <p class="card-text ">
                                                        <span class="amount ">Start From ₹5.81 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city ">
                                                        <ul>
                                                            <li>27 HP</li>

                                                        </ul>
                                                    </div>


                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>
                                                </div>

                                            </div>
                                            <a href="#" class="full-box-h "></a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6 ">
                                    <div class="used-inner " id=" ">
                                        <div class="card ">
                                            <div class="tract-img-fix ">
                                                <img src="./assets/storage/uploads/1666345581_MF-60282e41.jpg?w=375&amp;h=320 " class="card-img-top " alt="... " />
                                            </div>

                                            <div class="card-body ">
                                                <div class="tract-name view-all-height ">
                                                    <h5 class="card-title "> Massey Ferguson 6028 4WD</h5>
                                                    <p class="card-text ">
                                                        <span class="amount ">Start From ₹5.5 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city ">
                                                        <ul>
                                                            <li>28 HP</li>

                                                        </ul>
                                                    </div>


                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>
                                                </div>
                                                <a href="#" class="full-box-h "></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xxl-3 col-xl-4 col-sm-6 ">
                                    <div class="used-inner " id=" ">
                                        <div class="card ">
                                            <div class="tract-img-fix ">
                                                <img src="./assets/storage/uploads/1681731237_upload-1632210883-02e41.jpg " class="card-img-top " alt="... " />
                                            </div>

                                            <div class="card-body ">
                                                <div class="tract-name view-all-height ">
                                                    <h5 class="card-title "> Mahindra 265 DI</h5>
                                                    <p class="card-text ">
                                                        <span class="amount ">Start From ₹4.8 Lakh</span>
                                                    </p>
                                                    <div class="for-product-city ">
                                                        <ul>
                                                            <li>30 HP</li>

                                                        </ul>
                                                    </div>


                                                </div>

                                                <div class="list_page ">

                                                    <a href="#" class="btn_check btn-dark ">Check Detail</a>
                                                </div>
                                                <a href="#" class="full-box-h "></a>
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
    </section>
    <!-- New Tractors Section End -->
    <!-- Popular Brands Section Start -->
    <section class="td_populer_brands ">
        <div class="container ">
            <h2 class="main-tilte text-center "> Popular Brands</h2>

            <div class="viwe-all-brand ">

                <a href="all-brands.html " class="view_link ">View All<img src="./assets/image/next-arrow.png "></a>

            </div>

            <div class="slider-brads ">
                <div class="brand-carousel section-padding owl-carousel ">

                    <div class="single-logo ">
                        <div>
                            <a href="#"><img src="./assets/storage/uploads/1664796510_eicher.png " alt="Eicher "></a>
                            <h5>Tracstar</h5>
                        </div>
                        <a href="#" class="full-box-h "></a>
                    </div>


                    <div class="single-logo ">
                        <div>
                            <a href="#"><img src="./assets/storage/uploads/1664796590_new-holland.png " alt="New Holland "></a>
                            <h5>ACE</h5>
                        </div>
                        <a href="#" class="full-box-h "></a>
                    </div>



                </div>
            </div>
        </div>
    </section>
    <!-- Popular Brands Section End -->


        <!--On Window Load popup-->
        <div id="modalOverlay " style="display:none; ">
        <div class="modalPopup ">
            <div class="modalContent ">
                <img src="./assets/storage/uploads/1668507109_New-year-special-offer.jpg ">
                <button class="buttonStyle " type="button " id="close-popup-btn "><i class="fas fa-times " aria-hidden="true "></i></button>
            </div>
        </div>
    </div>
    <!--On Window Load popup End-->

<?php include 'headers/footer.php';?>