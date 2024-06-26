<?php
include "headers/head.php";
include "headers/conn.php";
$p_id = $_GET['id'];
// echo $p_id;
?>

    <!-- Header Area Start Here -->
 <?php include "headers/header.php"; ?>
 

<?php
   $query = "SELECT distinct pt.product_id,pt.name as proName,ct.name as company,mp.name as productType,hp.hp_name as hpName,pt.product_image,pt.chassis_no,pt.engine_no,pt.key_no,pt.ex_showroom,pt.insurance,pt.hpa,pt.regd,pt.agreement,pt.access,pt.misc,pt.other_cost,pt.total_cost,pt.activeStatus,pt.editor FROM mproductddetailstable pt
    inner join machinecompanytable ct on ct.company_id = pt.company_id 
    inner join mproducttypename mp on mp.product_type_id = pt.product_type_id
    inner join mhp_table hp on hp.hp_id = pt.hp_id
    WHERE pt.activeStatus = 'Y' and pt.product_id = $p_id
    ORDER BY pt.product_id desc";
    $result = mysqli_query($conn, $query);
    $sno = 1;
    $row = mysqli_fetch_array($result)
?>

	 <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".mySwiperClass", {
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
      });
	</script>

<!-- info-breadcrumbs End Here -->
<section class="tractor-check-detail trac-details"> 
     <div class="container">
      <div class="row align-items-center">
         <div class="col-xl-6 col-lg-5">
            <div class="check-detail-img text-center img-for-new">
               <div class="row">
                                  <div class="col-12 mb-3 col-for-mobile-none" style="margin:0px auto;" >
                     <div class="image gallery-item" data-index="1"> <img src="<?php echo $img . $row['product_image']; ?>" alt="image01" > </div>
                   
                  </div>
                                                   
                 <!--Mobile-->
                 <div class="swiper mySwiperClass">                   
                   <div class="swiper-wrapper">
                     <div class="swiper-slide"> <img src="<?php echo $img . $row['product_image']; ?>" alt="image0"></div>  
                                                               
                   </div>
                   <div class="swiper-button-next"></div>
                   <div class="swiper-button-prev"></div>
                 </div>
                 <!--Mobile-->   
                 
               </div>
            </div>
         </div>

         
         <div class="col-xl-6 col-lg-7 pdd ">
            <div class="check-dl-header">
               <div class="main-heading">
                  <h5 id="tractorname" data-type="new"><?php echo $row['proName'] ?></h5>
                  <span></span>
                  <p class="card-text">
                                        <span class="amount">Start From ₹<?php echo convertNumber($row['ex_showroom']); ?></span>
                                                         </p>
                    
                  <form id="tr-web-form" method="post" action="https://tractordekho.in/login-verify">
                     <fieldset class="fieldset-first">
                        <input type="button" name="next" class="next action-button sub contact-sell-btn" value="Contact Seller" /> 
                     </fieldset>
                     <fieldset class="fieldset-main">
                                                <input type="text" name="name" id="name" class="field-child-a" placeholder="Name"  value=""  required/>
                                                <input type="number" name="phone" id="phone" class="field-child-b"  placeholder="Mobile Number"  required/>
                                                
                                               	<input type="submit" name="previous" id="sendotplead" class="field-child-c Sendotp" value="Send Otp" style="background: #1b334b; color:#fff;" />
                        <input type="number" name="otp" class="field-child-d-inpA" placeholder="Enter Otp" style="display:none;"  id="otp"  />
                        <input type="submit" name="verify" class="action-button field-child-e inpA otpverify" value="Verify" style="display:none;" id="verify" required="required" />
                        <input type="hidden" value="new" id="leadType" name="leadtype">
                        <input type="hidden" value="" id="userId" name="userId">
                        <input type="hidden" value="38" id="tractorId" name="tractorId">
                       <input type="hidden" value="Swaraj 742 XT" id="tractorName" name="tractorName">
                  		<input type="hidden" value="https://tractordekho.in/swaraj/742-xt" id="tractorUrl" name="tractorUrl">
                        <!-- <input type="text" name="offer_price" class="set-child-a inpB" id="offer_price" placeholder="offer Price" /> -->
                        <input type="submit" id="submit" name="submit" class="submit action-button set-child-b inpB  offerproductssubmit " value="Submit" />
                        <div class="alert-text">
                           <p class="resend-otp" id="resendotp" style="cursor: pointer; display:none;text-align: left;" >didn't get otp, resend?</p>
                        </div>
                     </fieldset>
                     <!-- <fieldset class="fieldset-secound">
                        <input type="text" name="email" class="set-child-a" placeholder="offer Price" />
                        <input type="submit" name="submit" class="submit action-button set-child-b" value="Submit" /> </fieldset> -->
                    <p class="lerror" style="font-weight:600;color:red;margin-top:0px;    font-size: 18px;">
                  </form>
                 
               </div>
               
            </div>
            <!-- SUMMARY text -->
            <div class="summary-inner">
               <div class="summary-text">
                  <h2>SUMMARY</h2>
               </div>
               <div class="row">
                  <div class="col-lg-6">
                     <div class="firstlist">
                       <table class="table">
                         <tbody>
                           <tr>
                             <th scope="row">Brand</th>
                               <td><?php echo $row['company'] ?></td>
                             </tr>
                           
                             <tr>
                               <th scope="row">Num Of Cylinder</th>
                               <td><?php //echo $row['company'] ?></td>
                             </tr>
                           
                           	<tr>
                              <th scope="row">HP</th>
                               <td><?php echo $row['hpName'] ?></td>
                             </tr>
                           
                           	<tr>
                              <th scope="row">PTO HP</th>
                               <td><?php //echo $row['company'] ?></td>
                             </tr>
                           
                           	<tr>
                              <th scope="row">Gear Box</th>
                               <td><?php //echo $row['company'] ?></td>
                             </tr>
                           
                           	<tr>
                              <th scope="row">Brakes</th>
                               <td><?php //echo $row['company'] ?></td>
                             </tr>
                           
                           <tr>
                              <th scope="row">Warranty</th>
                               <td>2 Years<?php //echo $row['company'] ?></td>
                             </tr>
                             
                           </tbody>
                         </table>
                       
                     </div>
                  </div>
 
                  <div class="col-lg-6">
                     <div class="firstlist">
                       <table class="table">
                         <tbody>
                           <tr>
                             <th scope="row">Machine Type</th>
                               <td><?php echo $row['productType'] ?></td>
                             </tr>
                           
                           <!--<tr>
                               <th scope="row">Manufacturing Year</th>
                               <td>
                                   2022                               </td>
                             </tr>-->
                           
                             <tr>
                               <th scope="row">Lifting Capacity</th>
                               <td><?php //echo $row['company'] ?></td>
                             </tr>
                           
                           	<tr>
                              <th scope="row">Steering</th>
                               <td>Power Steering</td>
                             </tr>
                           
                           	<tr>
                              <th scope="row">Engine RPM</th>
                               <td>2000</td>
                             </tr>
                           
                           </tbody>
                         </table>
                     </div>
                  </div>
               </div>
            </div>
          
         </div>
      </div>
           <!--INSPECTION DETAILS-->
          <section id="port_web_block">
       <div class="container">
         <div class="web_dev_title_sec">
           <h3>INSPECTION DETAILS</h3> 
         </div>        
         <div class="portfolio_dev">
                                 
           	                      
           	                      
           	                      
           	             <div class="slider_port tablinks sliderclasschange" data-filter="all" data-id="tab4" onclick="openfolio(event, 'tab4' )" data-loop="0"  id="defaultOpen_sec" >
               <h1>
                 Steering
               </h1>
             </div>
           		           	                      
           	                      
           	                      
           	                      
           	                      
           	                      
           	             <div class="slider_port tablinks sliderclasschange" data-filter="all" data-id="tab10" onclick="openfolio(event, 'tab10' )" data-loop="1" >
               <h1>
                 Other Information
               </h1>
             </div>
           		           	                      
         </div>         
       </div>
     </section> 

     <div class="port_block">
       <div class="container">
                    	                    	                    	                    	         
             <div id="tab4" class="tabcontent">
               <div class="tab-inner-details">

                    <ul>
                      	                        <li>Type :  Power Steering</li> 
                      	
                    </ul>
               </div>

             </div>
                               	                    	                    	                    	                    	                    	         
             <div id="tab10" class="tabcontent">
               <div class="tab-inner-details">

                    <ul>
                      	                        <li>Warranty:  2000 Hours Or 2 Year</li> 
                      	                        <li>Status: Launched</li> 
                      	
                    </ul>
               </div>

             </div>
                             

         

       </div>
     </div>
              
    <!--INSPECTION DETAILS END-->
         
     
   </div>
</section>

  <section class="td_populer_sec td_populer_tractors-slide">
    <div class="container">
        <div class="text-center">
            <h2 class="main-tilte"> Related Tractors</h2>
        </div>
        <div class="pills-tabs-td">
            <div class="tab-content">
                <div class="listing-pan owl-carousel">
                                    <div class="card">
                        <div class="tract-img-fix">
                            <img src="https://tractordekho.in/storage/uploads/1666334650_swaraj-742-XT.png" class="card-img-top" alt="2022 Swaraj 742 XT">
                        </div>
                        <div class="card-body">
                            <div class="tract-name">
                                <h5 class="card-title"> Swaraj 742 XT</h5>
                                <p class="card-text">
                                                                    <span class="amount">₹6.4 Lakh</span>
                                                                                                    </p>
                                <div class="for-product-city">
                                    <ul>
                                      <li>45 HP</li>
                                      
                                    </ul>
                                </div>
                                
                                                              
                              
                                                                
                            </div>
                            <a href="742-xt.html" class="btn_check btn-dark">Check Detail</a>
                        </div>
                    	<a href="742-xt.html" class="full-box-h"></a>
                    </div>
                  	
                                    <div class="card">
                        <div class="tract-img-fix">
                            <img src="https://tractordekho.in/storage/uploads/1666334745_Swaraj-855-FE.png" class="card-img-top" alt="2022 Swaraj 855 FE">
                        </div>
                        <div class="card-body">
                            <div class="tract-name">
                                <h5 class="card-title"> Swaraj 855 FE</h5>
                                <p class="card-text">
                                                                    <span class="amount">₹7.8 Lakh</span>
                                                                                                    </p>
                                <div class="for-product-city">
                                    <ul>
                                      <li>52 HP</li>
                                      
                                    </ul>
                                </div>
                                
                                                              
                              
                                                                
                            </div>
                            <a href="855-fe.html" class="btn_check btn-dark">Check Detail</a>
                        </div>
                    	<a href="855-fe.html" class="full-box-h"></a>
                    </div>
                  	
                                    <div class="card">
                        <div class="tract-img-fix">
                            <img src="https://tractordekho.in/storage/uploads/1666334827_swaraj-744-FE.png" class="card-img-top" alt="2022 Swaraj 744 FE">
                        </div>
                        <div class="card-body">
                            <div class="tract-name">
                                <h5 class="card-title"> Swaraj 744 FE</h5>
                                <p class="card-text">
                                                                    <span class="amount">₹6.9 Lakh</span>
                                                                                                    </p>
                                <div class="for-product-city">
                                    <ul>
                                      <li>48 HP</li>
                                      
                                    </ul>
                                </div>
                                
                                                              
                              
                                                                
                            </div>
                            <a href="744-fe.html" class="btn_check btn-dark">Check Detail</a>
                        </div>
                    	<a href="744-fe.html" class="full-box-h"></a>
                    </div>
                  	
                                  </div>

            </div>
        </div>
    </div>
</section>


<?php include "headers/footer.php"; ?>
