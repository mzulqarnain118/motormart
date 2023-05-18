<?php
    include_once("header.php");
?>
    <style>
.accordions {
  background-color: #7a4397;
  color: #fff;
  cursor: pointer;
  padding: 18px;
  width: 32%;
  border: none;
  text-align: center;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
  border-bottom: 1px solid #f7f7f7;
  float: left;
  margin: 0 5px 5px 0;
}

.accord_tab .active, .accordions:hover {
  background-color: #cc7dff; 
}

.panel_1 {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
.accord_tab .pinls{
    padding: 0 18px;
      display: none;
      background-color: white;
      overflow: hidden;
    display: none;
}
@media (max-width: 400px){
    .accordions {
        width: 31%;
        padding: 15px;
    }
}
</style>
  <!-- Home Design -->
  <section class="home-one bg-home1">
    <div class="container">
      <div class="row posr" style="display: inherit;">
        <div class="col-lg-10 m-auto">
          <div class="home_content home1_style">
            <div class="home-text text-center mb30">
                <div class="col-lg-12 accord_tab">
                    <center><img class="logo1 img-fluid" loading="lazy" src="images/site_logo.png" style="width: 75%;" alt="header-logo.svg"/></center>
                </div>
              <h2 class="title"><span class="aminated-object1"><img class="objects" src="images/home/_title-bottom-border.svg" alt=""></span>Find Your Next Match</h2>
              <p class="para">Find the right price, dealer and advice.</p>
            </div>
            <div class="advance_search_panel">
              <div class="row">
                <div class="col-lg-12 accord_tab">
                        <button class="accordions" onclick="change_tab(1)">Cars</button>
                        <button class="accordions" onclick="change_tab(2)">Bikes</button>
                        <button class="accordions" onclick="change_tab(3)">Boats</button>
                        <div class="panel_1 pinls">
                              <?php include_once('cars_tab.php'); ?>
                        </div>
                        <!--Bikes--->
                        
                        <div class="panel_2 pinls">
                                 <?php include_once('bikes_tab.php'); ?>
                        </div>
                        <!--Boats--->
                        
                        <div class="panel_3 pinls">
                             <?php include_once('boats_tab.php'); ?>
                        </div>
                       
                </div>
                <div class="col-lg-12 accord_tab">
                     <!--TRUCKS--->
                        <button class="accordions" onclick="change_tab(4)">Trucks</button>
                        <button class="accordions" onclick="change_tab(5)">Motorsports</button>
                        <button class="accordions" onclick="change_tab(6)">Accessories</button>
                        <button class="accordions" onclick="change_tab(7)">Services</button>

                        <div class="panel_4 pinls">
                            <?php include_once('trucks_tab.php'); ?>
                        </div>
                        <!--Motorsports--->
                        
                        <div class="panel_5 pinls">
                          <?php include_once('motorsports_tab.php'); ?>
                        </div>
                        <!--Accessories--->
                        
                        <div class="panel_6 pinls">
                          <?php include_once('accessories_tab.php'); ?>
                        </div>

                          <!--Services--->
                        
                        <div class="panel_7 pinls">
                          <?php include_once('services_tab.php'); ?>
                        </div>
                </div>
                <div class="col-lg-12 desktop_tab" >
                  <ul class="nav nav-pills justify-content-center" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-allstatus-tab" data-bs-toggle="pill" data-bs-target="#pills-allstatus" type="button" role="tab" aria-controls="pills-allstatus" aria-selected="true">Cars</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-newcar-tab" data-bs-toggle="pill" data-bs-target="#pills-newcar" type="button" role="tab" aria-controls="pills-newcar" aria-selected="false">Bikes</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link " id="pills-usedcar-tab" data-bs-toggle="pill" data-bs-target="#pills-usedcar" type="button" role="tab" aria-controls="pills-usedcar" aria-selected="false">Boats</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link " id="pills-trucks-tab" data-bs-toggle="pill" data-bs-target="#pills-trucks" type="button" role="tab" aria-controls="pills-trucks" aria-selected="false">Trucks</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link " id="pills-motorsports-tab" data-bs-toggle="pill" data-bs-target="#pills-motorsports" type="button" role="tab" aria-controls="pills-motorsports" aria-selected="false">Motorsports</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link " id="pills-accesssories-tab" data-bs-toggle="pill" data-bs-target="#pills-accesssories" type="button" role="tab" aria-controls="pills-accesssories" aria-selected="false">Accessories</button>
                    </li>
                      <li class="nav-item" role="presentation">
                      <button class="nav-link " id="pills-services-tab" data-bs-toggle="pill" data-bs-target="#pills-services" type="button" role="tab" aria-controls="pills-services" aria-selected="false">Services</button>
                    </li>
                  </ul>
                  <div class="adss_bg_stylehome1">
                    <div class="tab-content" id="pills-tabContent">
                      <div class="tab-pane fade show active" id="pills-allstatus" role="tabpanel" aria-labelledby="pills-allstatus-tab">
                            <?php include('cars_tab.php'); ?>
                      </div>
                      <div class="tab-pane fade" id="pills-usedcar" role="tabpanel" aria-labelledby="pills-usedcar-tab">
                                <?php include('boats_tab.php'); ?>
                      </div>
                      <div class="tab-pane fade" id="pills-newcar" role="tabpanel" aria-labelledby="pills-newcar-tab">
                                <?php include('bikes_tab.php'); ?>
                      </div>
                      
                      <div class="tab-pane fade" id="pills-trucks" role="tabpanel" aria-labelledby="pills-trucks-tab">
                            <?php include('trucks_tab.php'); ?>
                      </div>
                      
                       <div class="tab-pane fade" id="pills-motorsports" role="tabpanel" aria-labelledby="pills-motorsports-tab">
                            <?php include('motorsports_tab.php'); ?>
                      </div>
                      
                      <div class="tab-pane fade" id="pills-accesssories" role="tabpanel" aria-labelledby="pills-accesssories-tab">
                            <?php include('accessories_tab.php'); ?>
                      </div>

                       <div class="tab-pane fade" id="pills-services" role="tabpanel" aria-labelledby="pills-services-tab">
                            <?php include('services_tab.php'); ?>
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
  <!-- Car Category -->
  <section class="car-category mobile_space bgc-f9 z-2 pb100">
    <div class="container">
      <div class="row icons_box_home" >
        
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                    <a href="listings.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/cars.png" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title">Cars</p>
                    </div>
                    </a>
                  </div>
                </div>
                  
                  <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                  <a href="bike_listings.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/motorcycles.png" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title">Bikes</p>
                    </div>
                  </a>
                  </div>
                </div>
                 <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                  <a href="boats_listings.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/boat icon.png" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title">Boats</p>
                    </div>
                    </a>
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                  <a href="trucks_listings.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/truck.png" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title">Truck</p>
                    </div>
                  </a>
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                  <a href="motorsports_listings.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/motor_sports1.png" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title">Motorsports</p>
                    </div>
                  </a>
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                  <a href="accessories.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/accs.jpg" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title">Accessories</p>
                    </div>
                    </a>
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-4 col-lg col-xl wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                  <div class="category_item">
                                      <a href="services.php">
                    <div class="thumb">
                      <img loading="lazy" src="images/icon/services.jpg" alt=""/>
                    </div>
                    <div class="details">
                      <p class="title"><a href="#">Services</a></p>
                    </div>
                    </a>
                  </div>
                </div>
      </div>
    </div>
  </section>
  <!-- Featured Product  -->
  <section class="featured-product">
    <div class="container featured_container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="main-title text-center">
            <h2>Featured Listings</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="popular_listing_sliders row">
            <!-- Nav tabs -->
            <div class="nav nav-tabs col-lg-12 justify-content-center" role="tablist" style="height: auto;">
              <!--<button class="nav-link " id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">All Status</button>-->
              <button class="nav-link active" id="nav-shopping-tab" data-bs-toggle="tab" data-bs-target="#nav-shopping" role="tab" aria-controls="nav-shopping" aria-selected="false">Cars</button>
              <button class="nav-link" id="nav-hotels-tab" data-bs-toggle="tab" data-bs-target="#nav-hotels" role="tab" aria-controls="nav-hotels" aria-selected="false">Bikes</button>
              <button class="nav-link" id="nav-boats-tab" data-bs-toggle="tab" data-bs-target="#nav-boats" role="tab" aria-controls="nav-boats" aria-selected="false">Boats</button>
              <button class="nav-link" id="nav-trucks-tab" data-bs-toggle="tab" data-bs-target="#nav-trucks" role="tab" aria-controls="nav-trucks" aria-selected="false">Trucks</button>
              <button class="nav-link" id="nav-motor-tab" data-bs-toggle="tab" data-bs-target="#nav-motor" role="tab" aria-controls="nav-motor" aria-selected="false">Motorsports</button>
              <button class="nav-link" id="nav-accs-tab" data-bs-toggle="tab" data-bs-target="#nav-accs" role="tab" aria-controls="nav-accs" aria-selected="false">Accessories</button>
            </div>
            <!-- Tab panes -->
            <div class="tab-content col-lg-12" id="nav-tabContent">
              
              <div class="tab-pane fade show active" id="nav-shopping" role="tabpanel" aria-labelledby="nav-shopping-tab">
                <div class="row">
                  <?php
                  $select = "select * from listings where  is_active=1 and featured=1 and listing_type=0  and category_id  IN($inc_cats) order by id asc LIMIT 8";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
                        <div class="col-sm-12 col-xl-3">
                        <a href="listing_view.php?id=<?php echo $data['id']; ?>">
                            <div class="car-listing" style="border: 1px solid #7A4397;">
                              <div class="thumb">
                                <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tag">SOLD</div>
                                <?php
                                }
                                if(count($images_url)>0){                                
                                ?>
                                <img loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                <?php
                                }else{
                                ?>
                                <img loading="lazy" src="images/listing/1.jpg" alt="1.jpg">
                                <?php
                                }
                                ?>
                                <div class="thmb_cntnt2">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                                  </ul>-->
                                </div>
                                <div class="thmb_cntnt3">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                  </ul>-->
                                </div>
                              </div>
                              <div class="details">
                                <div class="wrapper">
                                  <?php
                                        if(isset($data['price']) && $data['price']!=""){
                                    ?>
                                  <h5 class="price">$<?php echo $data['price']; ?> <i class="fa-solid fa-shield-check" style="color: green;"></i></h5>
                                  <?php
                                    }
                                  ?>
                                  <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                                  <div class="listign_review">
                                    <ul class="mb0">
                                      <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#">4.7</a></li>-->
                                      <!-- <li class="list-inline-item">(684 reviews)</li> -->
                                    </ul>
                                  </div>
                                </div>
                                <div class="listing_footer">
                                  <ul class="mb0">
                                  <?php
                                    if(isset($data['mileage']) && $data['mileage']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                    <?php
                                    }
                                    if(isset($data['transmission']) && $data['transmission']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </a>
                        </div>
                        <?php
                        }
                    }
                  ?>
                </div>
                 <div class="row mt20">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="listings.php" class="more_listing">Show All Cars <span class="icon"><span class="fas fa-plus"></span></span></a>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-hotels" role="tabpanel" aria-labelledby="nav-hotels-tab">
                <div class="row">
                <?php
                  $select = "select * from listings where  is_active=1 and featured=1 and listing_type=0 and category_id IN($bike_cats) order by id asc LIMIT 8";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
                        <div class="col-sm-12 col-xl-3">
                            <a href="listing_view.php?id=<?php echo $data['id']; ?>">
                            <div class="car-listing" style="border: 1px solid #7A4397;">
                              <div class="thumb">
                               <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tag">SOLD</div>
                                <?php
                                }
                                if(count($images_url)>0){                                
                                ?>
                                <img loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                <?php
                                }else{
                                ?>
                                <img loading="lazy" src="images/listing/1.jpg" alt="1.jpg">
                                <?php
                                }
                                ?>
                                <div class="thmb_cntnt2">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                                  </ul>-->
                                </div>
                                <div class="thmb_cntnt3">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                  </ul>-->
                                </div>
                              </div>
                              <div class="details">
                                <div class="wrapper">
                                  <?php
                                        if(isset($data['price']) && $data['price']!=""){
                                    ?>
                                  <h5 class="price">$<?php echo $data['price']; ?> <i class="fa-solid fa-shield-check" style="color: green;"></i></h5>
                                  <?php
                                    }
                                  ?>
                                  <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                                  <div class="listign_review">
                                    <ul class="mb0">
                                      <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#">4.7</a></li>-->
                                      <!--<li class="list-inline-item">(684 reviews)</li>-->
                                    </ul>
                                  </div>
                                </div>
                                <div class="listing_footer">
                                  <ul class="mb0">
                                  <?php
                                    if(isset($data['mileage']) && $data['mileage']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                    <?php
                                    }
                                    if(isset($data['transmission']) && $data['transmission']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </a>
                        </div>
                        <?php
                        }
                    }
                  ?>
                </div>
                <div class="row mt20">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="bike_listings.php" class="more_listing">Show All Bikes <span class="icon"><span class="fas fa-plus"></span></span></a>
                      </div>
                    </div>
                  </div>
              </div>
              <!----BOATS SECTIon----->
               <div class="tab-pane fade" id="nav-boats" role="tabpanel" aria-labelledby="nav-boats-tab">
                <div class="row">
                <?php
                  $select = "select * from listings where is_active=1 and featured=1 and listing_type=0 and category_id IN($boat_cats) order by id asc LIMIT 8";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
                        <div class="col-sm-12 col-xl-3">
                        <a href="listing_view.php?id=<?php echo $data['id']; ?>">
                            <div class="car-listing" style="border: 1px solid #7A4397;">
                              <div class="thumb">
                               <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tag">SOLD</div>
                                <?php
                                }
                                if(count($images_url)>0){                                
                                ?>
                                <img loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                <?php
                                }else{
                                ?>
                                <img loading="lazy" src="images/listing/1.jpg" alt="1.jpg">
                                <?php
                                }
                                ?>
                                <div class="thmb_cntnt2">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                                  </ul>-->
                                </div>
                                <div class="thmb_cntnt3">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                  </ul>-->
                                </div>
                              </div>
                              <div class="details">
                                <div class="wrapper">
                                  <?php
                                        if(isset($data['price']) && $data['price']!=""){
                                    ?>
                                  <h5 class="price">$<?php echo $data['price']; ?> <i class="fa-solid fa-shield-check" style="color: green;"></i></h5>
                                  <?php
                                    }
                                  ?>
                                  <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                                  <div class="listign_review">
                                    <ul class="mb0">
                                      <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#">4.7</a></li>-->
                                      <!--<li class="list-inline-item">(684 reviews)</li>-->
                                    </ul>
                                  </div>
                                </div>
                                <div class="listing_footer">
                                  <ul class="mb0">
                                  <?php
                                    if(isset($data['mileage']) && $data['mileage']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                    <?php
                                    }
                                    if(isset($data['transmission']) && $data['transmission']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </a>
                        </div>
                        <?php
                        }
                    }
                  ?>
                </div>
                <div class="row mt20">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="boats_listings.php" class="more_listing">Show All Boats <span class="icon"><span class="fas fa-plus"></span></span></a>
                      </div>
                    </div>
                  </div>
              </div>
              <div class="tab-pane fade" id="nav-trucks" role="tabpanel" aria-labelledby="nav-trucks-tab">
                <div class="row">
                <?php
                  $select = "select * from listings where is_active=1 and featured=1 and listing_type=0 and category_id IN($trucks_cats) order by id asc LIMIT 8";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
                        <div class="col-sm-12 col-xl-3">
                        <a href="listing_view.php?id=<?php echo $data['id']; ?>">
                            <div class="car-listing" style="border: 1px solid #7A4397;">
                              <div class="thumb">
                               <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tag">SOLD</div>
                                <?php
                                }
                                if(count($images_url)>0){                                
                                ?>
                                <img loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                <?php
                                }else{
                                ?>
                                <img loading="lazy" src="images/listing/1.jpg" alt="1.jpg">
                                <?php
                                }
                                ?>
                                <div class="thmb_cntnt2">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                                  </ul>-->
                                </div>
                                <div class="thmb_cntnt3">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                  </ul>-->
                                </div>
                              </div>
                              <div class="details">
                                <div class="wrapper">
                                  <?php
                                        if(isset($data['price']) && $data['price']!=""){
                                    ?>
                                    <h5 class="price">$<?php echo $data['price']; ?> <i class="fa-solid fa-shield-check" style="color: green;"></i></h5>
                                  <?php
                                    }
                                  ?>
                                  <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                                  <div class="listign_review">
                                    <ul class="mb0">
                                      <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#">4.7</a></li>-->
                                      <!--<li class="list-inline-item">(684 reviews)</li>-->
                                    </ul>
                                  </div>
                                </div>
                                <div class="listing_footer">
                                  <ul class="mb0">
                                  <?php
                                    if(isset($data['mileage']) && $data['mileage']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                    <?php
                                    }
                                    if(isset($data['transmission']) && $data['transmission']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </a>
                        </div>
                        <?php
                        }
                    }
                  ?>
                </div>
                
                <div class="row mt20">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="trucks_listings.php" class="more_listing">Show All Trucks <span class="icon"><span class="fas fa-plus"></span></span></a>
                      </div>
                    </div>
                  </div>
              </div>
              
              
               <div class="tab-pane fade" id="nav-motor" role="tabpanel" aria-labelledby="nav-motor-tab">
                <div class="row">
                <?php
                  $select = "select * from listings where is_active=1 and featured=1 and listing_type=0 and category_id IN($inc_motor) order by id asc LIMIT 8";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
                        <div class="col-sm-12 col-xl-3">
                        <a href="listing_view.php?id=<?php echo $data['id']; ?>">
                            <div class="car-listing" style="border: 1px solid #7A4397;">
                              <div class="thumb">
                               <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tag">SOLD</div>
                                <?php
                                }
                                if(count($images_url)>0){                                
                                ?>
                                <img loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                <?php
                                }else{
                                ?>
                                <img loading="lazy" src="images/listing/1.jpg" alt="1.jpg">
                                <?php
                                }
                                ?>
                                <div class="thmb_cntnt2">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                                  </ul>-->
                                </div>
                                <div class="thmb_cntnt3">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                  </ul>-->
                                </div>
                              </div>
                              <div class="details">
                                <div class="wrapper">
                                  <?php
                                        if(isset($data['price']) && $data['price']!=""){
                                    ?>
                                    <h5 class="price">$<?php echo $data['price']; ?> <i class="fa-solid fa-shield-check" style="color: green;"></i></h5>
                                  <?php
                                    }
                                  ?>
                                  <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                                  <div class="listign_review">
                                    <ul class="mb0">
                                      <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#">4.7</a></li>-->
                                      <!--<li class="list-inline-item">(684 reviews)</li>-->
                                    </ul>
                                  </div>
                                </div>
                                <div class="listing_footer">
                                  <ul class="mb0">
                                  <?php
                                    if(isset($data['mileage']) && $data['mileage']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                    <?php
                                    }
                                    if(isset($data['transmission']) && $data['transmission']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </a>
                        </div>
                        <?php
                        }
                    }
                  ?>
                </div>
                
                <div class="row mt20">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="motorsports_listings.php" class="more_listing">Show All Motorsports <span class="icon"><span class="fas fa-plus"></span></span></a>
                      </div>
                    </div>
                  </div>
              </div>
              
               <div class="tab-pane fade" id="nav-accs" role="tabpanel" aria-labelledby="nav-accs-tab">
                <div class="row">
                <?php
                  $select = "select * from listings where is_active=1 and featured=1 and listing_type=1 order by id asc LIMIT 8";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
                        <div class="col-sm-12 col-xl-3">
                        <a href="listing_view.php?id=<?php echo $data['id']; ?>">
                            <div class="car-listing" style="border: 1px solid #7A4397;">
                              <div class="thumb">
                               <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tag">SOLD</div>
                                <?php
                                }
                                if(count($images_url)>0){                                
                                ?>
                                <img loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                <?php
                                }else{
                                ?>
                                <img loading="lazy" src="images/listing/1.jpg" alt="1.jpg">
                                <?php
                                }
                                ?>
                                <div class="thmb_cntnt2">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                                    <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                                  </ul>-->
                                </div>
                                <div class="thmb_cntnt3">
                                  <!--<ul class="mb0">
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                                  </ul>-->
                                </div>
                              </div>
                              <div class="details">
                                <div class="wrapper">
                                  <?php
                                        if(isset($data['price']) && $data['price']!=""){
                                    ?>
                                  <h5 class="price">$<?php echo $data['price']; ?> <i class="fa-solid fa-shield-check" style="color: green;"></i></h5>
                                  <?php
                                    }
                                  ?>
                                  <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                                  <div class="listign_review">
                                    <ul class="mb0">
                                      <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                      <li class="list-inline-item"><a href="#">4.7</a></li>-->
                                      <!--<li class="list-inline-item">(684 reviews)</li>-->
                                    </ul>
                                  </div>
                                </div>
                                <div class="listing_footer">
                                  <ul class="mb0">
                                  <?php
                                    if(isset($data['mileage']) && $data['mileage']!=0){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                    <?php
                                    }
                                    if(isset($data['transmission']) && $data['transmission']!=""){    
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                    <?php
                                    }
                                    ?>
                                    <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                    <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                                  </ul>
                                </div>
                              </div>
                            </div>
                            </a>
                        </div>
                        <?php
                        }
                    }
                  ?>
                </div>
                
                <div class="row mt20">
                    <div class="col-lg-12">
                      <div class="text-center">
                        <a href="accessories.php" class="more_listing">Show All Accessories <span class="icon"><span class="fas fa-plus"></span></span></a>
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
  <!-- Why Chose us  -->
  <section class="why-chose pt0 pb90">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="main-title text-center">
            <h2>Bank Financing</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
          <div class="partner_item">
          
            <a href="https://www.butterfieldgroup.com/en-bm/banking/personal-banking/borrowing/personal-loans"><img loading="lazy" src="images/bank_logos/web_1.jpg" alt="web_1.jpg"></a>
            <!--<div class="icon float-start"><span class="flaticon-price-tag"></span></div>
            <div class="details">
              <h5 class="title">Best Price</h5>
              <p>Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>-->
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="partner_item">
          <a href="https://www.bcb.bm/lending/loans/ "><img loading="lazy" src="images/bank_logos/web_2.jpg" alt="web_2.jpg"></a>
            <!--<div class="icon float-start style2"><span class="flaticon-car"></span></div>
            <div class="details">
              <h5 class="title">Trusted By Thousands</h5>
              <p>Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>-->
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="partner_item">
          <a href="https://clarienbank.com/personal/personal-loans/"><img loading="lazy" src="images/bank_logos/web_3.jpg" alt="web_3.jpg"></a>
            <!--<div class="icon float-start style3"><span class="flaticon-trust"></span></div>
            <div class="details">
              <h5 class="title">Wide Range of Brands</h5>
              <p>Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>-->
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="partner_item">
          <a href="https://www.hsbc.bm/loans/products/personal/"><img loading="lazy" src="images/bank_logos/web_4.jpg" alt="web_4.jpg"></a>
            <!--<div class="icon float-start style3"><span class="flaticon-trust"></span></div>
            <div class="details">
              <h5 class="title">Wide Range of Brands</h5>
              <p>Our stress-free finance department that can find financial solutions to save you money.</p>
            </div>-->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section class="why-chose pt0 pb90">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="main-title text-center">
            <h2>Vehicle Insurance</h2>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
          <div class="partner_item">
          
            <a href="https://www.bfm.bm/products/individual-family.aspx">
            <img loading="lazy" src="images/bank_logos/web_01.jpg" alt="web_1.jpg"></a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="partner_item">
          <a href="https://www.freisenbruch.bm/products/personal/motor/"><img loading="lazy" src="images/bank_logos/web_02.jpg" alt="web_2.jpg"></a>
         
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="partner_item">
          <a href="https://bermuda.cgcoralisle.com/products/motor/"><img loading="lazy" src="images/bank_logos/web_03.jpg" alt="web_3.jpg"></a>
       
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="partner_item">
          <a href="https://www.hsbc.bm/insurance/products/motor-insurance/"><img loading="lazy" src="images/bank_logos/web_4.jpg" alt="web_4.jpg"></a>
        
          </div>
        </div>
        
        <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
        </div>
        <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="partner_item">
          <a href="https://www.argus.bm/property-casualty/individual-plans/car/"><img loading="lazy" src="images/bank_logos/web_04.jpg" alt="web_4.jpg"></a>
          </div>
        </div>
        <div class="col-sm-6 col-lg-4 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
        </div>
      </div>
    </div>
  </section>
  
  <!-- Delivery Divider -->
  <section class="deliver-divider bg-img1" style="background-image: url('images/background/boats_new.jpg') !important; ">
    <div class="container">
      <div class="row">
        <!-- <div class="col-lg-12">
          <div class="posr">
            <div class="home1_divider_video_pop">
              <div class="video_popup_icon">
                <a class="video_popup_btn popup-img popup-youtube" href="https://www.youtube.com/watch?v=R7xbhKIiw4Y">
                  <span class="flaticon-play"></span>
                </a>
              </div>
            </div>
          </div>
        </div> -->
        <div class="col-md-9 col-xl-5">
          <div class="home1_divider_content">
            <h2 class="title">We Make Finding The Right VEHICLE Simple</h2>
            <p class="para">At Bermuda Motoring Mart what matters to us is making your vehicle search and buying experience as simple as possible, so you can find the right vehicle quickly and get on with making it yours.</p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Our Popular Listing -->
  <section class="popular-listing pb80 bg-ptrn1 bgc-heading-color">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="main-title text-center">
            <h2 class="text-white">Popular Listings</h2>
          </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="home1_popular_listing">
          <div class="listing_item_4grid_slider dots_none">
            <?php
                $select = "select * from listings where is_active=1 and listing_type=0  and popular=1 order by RAND() LIMIT 8";
                $q_run =  mysqli_query($con,$select);
                if(mysqli_num_rows($q_run)>0){
                while($data =  mysqli_fetch_assoc($q_run)){
                $images_url = json_decode($data['images_url']);
                ?>
            <div class="item">
            <a href="listing_view.php?id=<?php echo $data['id']; ?>">
              <div class="car-listing">
                <div class="thumb">
                 <?php
                    if($data['is_sold']==1){                                
                    ?>
                    <div class="tag">SOLD</div>
                    <?php
                    }
                    if(count($images_url)>0){                                
                    ?>
                    <img  loading="lazy" style="width: 100%; max-width: 100%; height: auto;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                    <?php
                    }
                    ?>
                  <div class="thmb_cntnt2">
                    <!--<ul class="mb0">
                      <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                      <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                    </ul>-->
                  </div>
                  <div class="thmb_cntnt3">
                    <!--<ul class="mb0">
                      <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                      <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                    </ul>-->
                  </div>
                </div>
                <div class="details">
                  <div class="wrapper">
                      <?php
                        if(isset($data['price']) && $data['price']!=""){
                    ?>
                    <h5 class="price">$<?php echo $data['price']; ?></h5>
                  <?php
                    }
                  ?>
                    <h6 class="title"><?php echo DBout($data['listing_title']); ?></h6>
                      <div class="listign_review">
                        <ul class="mb0">
                          <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#">4.7</a></li>-->
                          <!-- <li class="list-inline-item">(684 reviews)</li> -->
                        </ul>
                      </div>
                  </div>
                        <div class="listing_footer">
                          <ul class="mb0">
                              <?php
                                if(isset($data['mileage']) && $data['mileage']!=""){    
                                ?>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-road-perspective me-2"></span><?php echo $data['mileage']; ?></a></li>
                                <?php
                                }
                                if(isset($data['transmission']) && $data['transmission']!=""){    
                                ?>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span><?php echo $data['transmission']; ?></a></li>
                                <?php
                                }
                                ?>
                                <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam me-2"></span><?php echo $data['visit_count']; ?></a></li>
                                <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gas-station me-2"></span>Diesel</a></li>-->
                                <!--<li class="list-inline-item"><a href="#"><span class="flaticon-gear me-2"></span>Automatic</a></li>-->
                              </ul>
                        </div>
                </div>
              </div>
              </a>
            </div>
            <?php
                }
            }
            ?>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Funfact -->
  <section class="our-funfact pt100 pb0">
    <div class="container">
      <div class="row">
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
          <div class="funfact_one text-center">
            <div class="details">
              <div class="timer">27600</div>
              <p class="ff_title">TOTAL SERVICES</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.3s">
          <div class="funfact_one text-center">
            <div class="details">
              <div class="timer">6500</div>
              <p class="ff_title">PRO VERIFIED</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <div class="funfact_one text-center">
            <div class="details">
              <div class="timer">8230</div>
              <p class="ff_title">VISITORS PER DAY</p>
            </div>
          </div>
        </div>
        <div class="col-sm-6 col-lg-3 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.7s">
          <div class="funfact_one text-center">
            <div class="details">
              <div class="timer">5250</div>
              <p class="ff_title">VERIFIED DEALERS</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Our Partners -->
  <section class="our-partner pb100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="main-title text-center">
            <h2>Popular Makes</h2>
          </div>
        </div>
      </div>
      <div class="partner_divider">
        <div class="row">
        <?php
        $select = "select * from makers where image_url!='' and popular=1 order by title asc LIMIT 12";
        //$select = "select * from makers order by title asc";
        $q_run =  mysqli_query($con,$select);
        if(mysqli_num_rows($q_run)>0){
            while($data =  mysqli_fetch_assoc($q_run)){
            ?>
            <div class="col-6 col-xs-6 col-sm-4 col-xl-2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                <div class="partner_item">
                  <img loading="lazy" title="<?php echo $data['title']; ?>" height="60" src="<?php echo getServerURL(); ?>admin/maker_images/<?php echo $data['image_url']; ?>" alt="<?php echo $data['image_url']; ?>">
                </div>
              </div>
            <?php
            }
        }
        ?>
        </div>
      </div>
    </div>
  </section>
<style>
.models_car,.models_bike,.models_boat,.models_truck{
    
}

</style>
<?php
    include_once("footer.php");
?>
<script>
$(document).ready(function() {
    $('.selectpicker_1').selectpicker();
});
function select_make_by_model(id,type){
    
    if(type=='car'){
        jQuery('.modelscar .models_car').attr("disabled",'dispabled');
        jQuery('.modelscar .model_car_'+id).removeAttr('disabled');
        
    }else if(type=='bike'){
        jQuery('.model_bike .models_bike').attr("disabled",'dispabled');
        jQuery('.model_bike .model_bike_'+id).removeAttr('disabled');
    }else if(type=='boat'){
        jQuery('#model_boats .models_boat').attr("disabled",'dispabled');
        jQuery('#model_boats .model_boat_'+id).removeAttr('disabled');
        
    }else if(type=='truck'){
        jQuery('#model_truck .models_truck').attr("disabled",'dispabled');
        jQuery('#model_truck .model_truck_'+id).removeAttr('disabled');
    }
    else if(type=='motorsports'){
        jQuery('#model_motorsports .models_motorsports').attr("disabled",'dispabled');
        jQuery('#model_motorsports .model_motorsports_'+id).removeAttr('disabled');
    }   
  
}
function select_make_by_model_car(id,type){
    if(type=='car'){
        //jQuery('.modelscar .models_car').css("display","none");
        jQuery('.modelscar .models_car').attr("disabled",'dispabled');
        jQuery('.modelscar .model_car_'+id).removeAttr('disabled');
        
    }
}
</script>