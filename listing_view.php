<?php
    include_once("header.php");
    if(isset($_GET['id'])){
    $select = "select * from listings where id='".$_GET['id']."'  and is_active=1";
    $q_run =  mysqli_query($con,$select);
    if(mysqli_num_rows($q_run)>0){
        $data =  mysqli_fetch_assoc($q_run);
         mysqli_query($con,"update listings set visit_count=visit_count+1 where id='".$data['id']."'");
?>
  <!-- Agent Single Grid View -->
  <section class="our-agent-single bgc-f9 pb90 mt70-992 pt30">
    <div class="container">
      <div class="row mb30">
        <div class="col-xl-12">
          <div class="breadcrumb_content style2">
            <ol class="breadcrumb float-start">
              <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
              <!--<li class="breadcrumb-item active" aria-current="page">Cars for Sale</li>-->
            </ol>
          </div>
        </div>
      </div>
      <div class="row mb30">
        <div class="col-lg-7 col-xl-8">
          <div class="single_page_heading_content">
            <div class="car_single_content_wrapper">
              <ul class="car_info mb20-md">
                <?php
                
                    if(isset($data['listing_condition']) && $data['listing_condition']!=""){
                ?>
                <li class="list-inline-item"><a href="#"><b>Condition:</b> <?php echo $data['listing_condition']; ?></a></li>
                <?php
                   }
                ?>
                <li class="list-inline-item"><a href="#"><span class="flaticon-clock-1 vam"></span><?php echo date("Y-m-d H:i",strtotime($data['created_date'])); ?></a></li>
                <li class="list-inline-item"><a href="#"><span class="flaticon-eye vam"></span><?php echo $data['visit_count']+1; ?></a></li>
              </ul>
              <h2 class="title"><?php echo DBout($data['listing_title']); ?></h2>
              
              <!--<p class="para">2.0h T8 11.6kWh Polestar Engineered Auto AWD (s/s) 5dr</p>-->
            </div>
          </div>
        </div>
        <div class="col-lg-5 col-xl-4">
          <div class="single_page_heading_content text-start text-lg-end">
            <div class="share_content">
              <!--<ul>
                <li class="list-inline-item"><a href="#"><span class="flaticon-email"></span>EMAIL</a></li>
                <li class="list-inline-item"><a href="#"><span class="flaticon-printer"></span>PRINT</a></li>
                <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span>SAVE</a></li>
                <li class="list-inline-item"><a href="#"><span class="flaticon-share"></span>SHARE</a></li>
              </ul>-->
              <?php
              if(isset($_SESSION['is_login'])){
                    if($data['user_id']==$_SESSION['user_id']){
                        ?>
                        <a class="btn btn-primary" href="admin/edit-listing.php?id=<?php echo $data['id']; ?>">Edit</a>       
                        <?php
                    }
                }
              ?>
            </div>
            <div class="price_content">
            <?php
                if(isset($data['price']) && $data['price']!=""){
            ?>
              <!--<div class="price mt60 mb10 mt10-md"><h3><small class="mr15"><del>$92,480</del></small>$89,480</h3></div>-->
              <div class="price mt60 mb10 mt10-md"><h3><small class="mr15"></small>$<?php echo $data['price']; ?></h3></div>
              
              <?php
                }
              ?>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8 col-xl-8">
          <div class="row">
            <div class="col-lg-12">
              <div class="single_product_grid single_page1">
                <div class="single_product_slider">
                  <div class="item">
                    <div class="sps_content">
                      <div class="thumb">
                        <div class="single_product">
                          <div class="single_item">
                            <div class="thumb">
                              <?php
                                if($data['is_sold']==1){                                
                                ?>
                                <div class="tags">SOLD</div>
                                <?php
                                }
                                $images_url = json_decode($data['images_url']);
                                if(count($images_url)>0){
                                    ?>
                                    <img class="img-fluid" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                                    <style>
                                        .single_product_slider.owl-theme .owl-dots .owl-dot:first-child span{
                                              background-image: url("<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>");
                                              background-position: center center;
                                              background-size: cover;
                                              margin-bottom: 12px;
                                              display: none;
                                            }
                                    </style>
                                    <?php
                                }
                                ?>
                            </div>
                          </div>
                          <!--<div class="overlay_icon">
                            <a class="video_popup_btn popup-img popup-youtube" href="https://www.youtube.com/watch?v=oqNZOOWF8qM"><span class="flaticon-play-button"></span>Video</a>
                          </div>-->
                        </div>
                      </div>
                    </div>
                  </div>
                    
                    <?php
                        $images_url = json_decode($data['images_url']);
                        $i=2;
                        foreach($images_url as $key=>$val){
                            ?>
                            <div class="item">
                                <div class="sps_content">
                                  <div class="thumb">
                                    <div class="single_product">
                                      <div class="single_item">
                                        <div class="thumb">
                                        <?php
                                          if($data['is_sold']==1){                                
                                            ?>
                                            <div class="tags">SOLD</div>
                                            <?php
                                            }?>
                                          <img class="img-fluid" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $val; ?>" alt="<?php echo $val; ?>" />
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                </div>
                                 <style>
                                  .single_product_slider.owl-theme .owl-dots .owl-dot:nth-child(<?php echo $i; ?>) span{
                                      background-image: url("<?php echo getServerURL(); ?>admin/listing_images/<?php echo $val; ?>");
                                      background-position: center center;
                                      background-size: cover;
                                      margin-bottom: 12px;
                                    }
                                  </style>
                              </div>
                             
                            <?php
                            $i++;
                        }
                    ?>
                  
                  
                  
                </div>
              </div>
            </div>
            <?php if(isset($data['listing_type']) && $data['listing_type']!=2 && $data['listing_type']!=1){?>
            <div class="col-lg-12">
              <div class="opening_hour_widgets p30 mt30">
                <div class="wrapper">
                  <h4 class="title">Overview</h4>
                  <ul class="list-group">
                    <?php
                        if(isset($data['maker_id']) && $data['maker_id']!=0){
                          $select = "select * from makers where id='".$data['maker_id']."' order by title asc ";
                           // $select = "select * from models order by title asc";
                            $q_run =  mysqli_query($con,$select);
                            $data_cat =  mysqli_fetch_assoc($q_run);
                            
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Make</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data_cat['title']); ?></span>
                    </li>
                    <?php
                        }
                    
                    if(isset($data['model_id']) && $data['model_id']!=0){
                          $select = "select * from models where id='".$data['maker_id']."' order by title asc ";
                           // $select = "select * from models order by title asc";
                            $q_run =  mysqli_query($con,$select);
                            $data_cat =  mysqli_fetch_assoc($q_run);
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Model</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data_cat['title']); ?></span>
                    </li>
                    <?php
                        }
                        if(isset($data['body_type_id']) && $data['body_type_id']!=0){
                          $select = "select * from body_type where id='".$data['body_type_id']."' order by title asc ";
                           // $select = "select * from models order by title asc";
                            $q_run =  mysqli_query($con,$select);
                            $data_cat =  mysqli_fetch_assoc($q_run);
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Body Type</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data_cat['title']); ?></span>
                    </li>
                    <?php
                        }
                     if(isset($data['color']) && $data['color']!=""){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Color</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['color']); ?></span>
                    </li>
                    <?php
                        }
                     if(isset($data['transmission']) && $data['transmission']!=""){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Transmission</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['transmission']); ?></span>
                    </li>
                    <?php
                        }
                         if(isset($data['listing_condition']) && $data['listing_condition']!=""){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Condition</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['listing_condition']); ?></span>
                    </li>
                    <?php
                        }
                   if(isset($data['model_year']) && $data['model_year']!=""){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Year</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['model_year']); ?></span>
                    </li>
                    <?php
                        }
                     if(isset($data['mileage']) && $data['mileage']!=0){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Mileage</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['mileage']); ?></span>
                    </li>
                    <?php
                        }
                    if(isset($data['engine_size']) && $data['engine_size']!=""){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Engine Size</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['engine_size']); ?></span>
                    </li>
                    <?php
                        }
                    if(isset($data['cylinders']) && $data['cylinders']!=0){
                     ?>
                    <li class="list-group-item d-flex justify-content-between align-items-start">
                      <div class="me-auto">
                        <div class="day">Cylinders</div>
                      </div>
                      <span class="schedule"><?php echo DBout($data['cylinders']); ?></span>
                    </li>
                    <?php
                        }
                    ?>
                  </ul>
                </div>
              </div>
            </div>
            <?php }?>
              <?php if(isset($data['listing_type']) && $data['listing_type']!=2 && $data['listing_type']!=1){?>
            <div class="col-lg-12">
              <div class="listing_single_description mt30">
                <h4 class="mb30">Features </h4>
                <ul class="list-group">
                    <?php
                    $features_val = array();
                    if($data['features']!=""){
                        $features_val =  json_decode($data['features'],true);
                    }
                    foreach($features_val as $key=>$val){
                    ?>
                        <li class="list-group-item d-flex justify-content-between align-items-start">
                            <div class="me-auto">
                                <div class="day"><?php echo $val; ?></div>
                              </div>
                        </li>
                    <?php
                    }
                    ?>
                    
                </ul> 
              </div>
            </div>
            <?php }?>

           


            <?php
                if(isset($data['verification_file']) && $data['verification_file']!=""){
            ?>
            <div class="col-lg-12">
              <div class="listing_single_description mt30">
                <h4 class="mb30">Verification Sheet </h4>
                <img class="img-fluid" src="<?php echo getServerURL(); ?>admin/verifiied_docs/<?php echo $data['verification_file']; ?>" alt="<?php echo $data['verification_file']; ?>" />
              </div>
            </div>
            <?php
            }
            ?>
            <div class="col-lg-12">
              <div class="listing_single_description mt30">
                <h4 class="mb30">Description <span class="float-end body-color fz13">ID #<?php echo $data['id']; ?></span></h4>
                <p class="first-para">
                    <?php echo nl2br(DBout($data['description'])); ?>
                </p>
                
              </div>
            </div>
            <!--
            <div class="col-lg-12">
              <div class="user_profile_service">
                <div class="row">
                  <div class="col-lg-12">
                    <h4 class="title">Features</h4>
                  </div>
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="subtitle">Convenience</h5>
                  </div>
                  <div class="col-lg-6 col-xl-5">
                    <ul class="service_list">
                      <li>Heated Seats</li>
                      <li>Heated Steering Wheel</li>
                      <li>Navigation System</li>
                      <li>Power Liftgate</li>
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="subtitle">Entertainment</h5>
                  </div>
                  <div class="col-lg-6 col-xl-5">
                    <ul class="service_list">
                      <li>Apple CarPlay/Android Auto</li>
                      <li>Bluetooth</li>
                      <li>HomeLink</li>
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="subtitle">Exterior</h5>
                  </div>
                  <div class="col-lg-6 col-xl-5">
                    <ul class="service_list">
                      <li>Alloy Wheels</li>
                      <li>Sunroof/Moonroof</li>
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-6 col-xl-6">
                    <h5 class="subtitle">Safety</h5>
                  </div>
                  <div class="col-lg-6 col-xl-5">
                    <ul class="service_list">
                      <li>Backup Camera</li>
                      <li>Blind Spot Monitor</li>
                      <li>Brake Assist</li>
                      <li>LED Headlights</li>
                      <li>Stability Control</li>
                    </ul>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-lg-12">
                    <a class="fz12 tdu color-blue" href="#">View all features</a>
                  </div>
                </div>
              </div>
              <div class="user_profile_location">
                <h4 class="title">Location</h4>
                <div class="property_sp_map mb40">
                  <div class="h400 bdrs8" id="map-canvas"></div>
                </div>
                <div class="upl_content d-block d-md-flex">
                  <p class="float-start fn-sm mb20-sm"><span class="fas fa-map-marker-alt pr10 vam"></span>3891 Ranchview Dr. Richardson, California 62639</p>
                  <button class="btn location_btn">Get Direction</button>
                </div>
              </div>
            </div>
            -->
            
            <!--
            <div class="col-lg-12">
              <div class="user_profile_review">
                <div class="energy_class">
                  <h4 class="mb30 mt10">Consumer reviews</h4>
                  <div class="single_line">
                    <p class="para">Comfort</p>
                    <ul class="review">
                      <li class="list-inline-item"><span class="total_rive_count">4.7</span></li>
                    </ul>
                  </div>
                  <div class="single_line">
                    <p class="para">Interior design</p>
                    <ul class="review">
                      <li class="list-inline-item"><span class="total_rive_count">4.9</span></li>
                    </ul>
                  </div>
                  <div class="single_line">
                    <p class="para">Performance</p>
                    <ul class="review">
                      <li class="list-inline-item"><span class="total_rive_count">4.6</span></li>
                    </ul>
                  </div>
                  <div class="single_line">
                    <p class="para">Value for the money</p>
                    <ul class="review">
                      <li class="list-inline-item"><span class="total_rive_count">5.0</span></li>
                    </ul>
                  </div>
                  <div class="single_line">
                    <p class="para">Exterior styling</p>
                    <ul class="review">
                      <li class="list-inline-item"><span class="total_rive_count">4.3</span></li>
                    </ul>
                  </div>
                  <div class="single_line bbn">
                    <p class="para">Reliability</p>
                    <ul class="review">
                      <li class="list-inline-item"><span class="total_rive_count">4.0</span></li>
                    </ul>
                  </div>
                </div>
                <div class="product_single_content">
                  <div class="mbp_pagination_comments">
                    <div class="mbp_first d-flex db-414">
                      <div class="flex-shrink-0">
                        <img src="images/blog/reviewer1.png" class="mr-3" alt="reviewer1.png">
                      </div>
                      <div class="flex-grow-1 ms-4 ml0-414">
                        <h4 class="sub_title">Jane Cooper</h4>
                        <div class="sspd_postdate mb15">April 6, 2021 at 3:21 AM
                          <div class="sspd_review float-none float-sm-end">
                            <ul class="mb0 pl15 pl0-sm">
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item">(5 reviews)</li>
                            </ul>
                          </div>
                        </div>
                        <p>Every single thing we tried with John was delicious! Found some awesome places we would definitely go back to on our trip. John was also super friendly and passionate about Beşiktaş and Istanbul. </p>
                      </div>
                    </div>
                    <div class="mbp_first d-flex db-414">
                      <div class="flex-shrink-0">
                        <img src="images/blog/reviewer2.png" class="mr-3" alt="reviewer2.png">
                      </div>
                      <div class="flex-grow-1 ms-4 ml0-414">
                        <h4 class="sub_title">Jane Cooper</h4>
                        <div class="sspd_postdate mb15">April 6, 2021 at 3:21 AM
                          <div class="sspd_review float-none float-sm-end">
                            <ul class="mb0 pl15 pl0-sm">
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              <li class="list-inline-item">(5 reviews)</li>
                            </ul>
                          </div>
                        </div>
                        <p>Every single thing we tried with John was delicious! Found some awesome places we would definitely go back to on our trip. John was also super friendly and passionate about Beşiktaş and Istanbul. </p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            
            -->
            
            
            <!--
            <div class="col-lg-12">
              <div class="user_review_form">
                <div class="bsp_reveiw_wrt">
                  <h4 class="mt10">Write a Review</h4>
                  <div class="df db-sm">
                    <table class="table table-responsive table-borderless wa mr100 mr0-sm mb20">
                      <thead>
                        <tr>
                          <th class="pl0" scope="col">Comfort</th>
                          <td>
                            <div class="sspd_review">
                              <ul class="mb0 pl15 pl0-lg">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="pl0" scope="row">Performance</th>
                          <td>
                            <div class="sspd_review">
                              <ul class="mb0 pl15 pl0-lg">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th class="pl0" scope="row">Exterior styling</th>
                          <td>
                            <div class="sspd_review">
                              <ul class="mb0 pl15 pl0-lg">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <table class="table table-responsive table-borderless wa mb20">
                      <thead>
                        <tr>
                          <th class="pl0" scope="col">Interior design</th>
                          <td>
                            <div class="sspd_review">
                              <ul class="mb0 pl15 pl0-lg">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th class="pl0" scope="row">Value for the money</th>
                          <td>
                            <div class="sspd_review">
                              <ul class="mb0 pl15 pl0-lg">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th class="pl0" scope="row">Reliability</th>
                          <td>
                            <div class="sspd_review">
                              <ul class="mb0 pl15 pl0-lg">
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                                <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                              </ul>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  <form class="comments_form">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Your Name">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Email">
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="form-group">
                          <textarea class="form-control" rows="9" placeholder="Message"></textarea>
                        </div>
                        <button type="submit" class="btn btn-thm">Send Your Review</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            
            -->
          </div>
        </div>
        <div class="col-lg-4 col-xl-4">
          <div class="offer_btns">
            <div class="text-end">
              <!--<button class="btn btn-thm ofr_btn1 btn-block mt0 mb20"><span class="flaticon-coin mr10 fz18 vam"></span>Make an Offer Price</button>
              <button class="btn ofr_btn2 btn-block mt0 mb20"><span class="flaticon-profit-report mr10 fz18 vam"></span>View VIN Report</button>-->
            </div>
          </div>
          <div class="sidebar_seller_contact">
            <div class="d-flex align-items-center mb30">
              <div class="flex-shrink-0">
                <img class="mr-3 author_img w60" src="images/team/avatar.png" alt="author.png">
              </div>
              <div class="flex-grow-1 ms-3">
                <?php
                
                $select = "select f_name,l_name,mobile_number from users where id='".mysqli_real_escape_string($con,$data['user_id'])."'";
                $q_run = mysqli_query($con,$select) or die(mysqli_error($con));
                $user_detail = mysqli_fetch_assoc($q_run);
                ?>
                <h5 class="mt0 mb5 fz16 heading-color fw600"><?php echo $user_detail['f_name']." ".$user_detail['l_name']; ?></h5>
                <?php
                if($user_detail['mobile_number']){
                    if(isset($_SESSION['is_login'])){
                ?>
                <p class="mb0 tdu"><span class="flaticon-phone-call pr5 vam"></span><a href="tel:<?php echo $user_detail['mobile_number']; ?>"><?php echo $user_detail['mobile_number']; ?></a></p>
                <?php
                    }
                }
                ?>
              </div>
              
            </div>
            <?php
                    if(!isset($_SESSION['is_login'])){
                        ?>
                        <div style="clear: both;"></div>
                        
                        <a href="login.php"><button type="button" class="btn btn-block btn-thm mt10 mb20">Login</button></a>
                        <?php
                    }
              ?>
           <!-- <h4 class="mb30">Contact Seller</h4>
            <form action="#">
              <div class="row">
                <div class="col-lg-12">
                  <div class="mb-3">
                    <input class="form-control form_control" type="text" placeholder="Name">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-3">
                    <input class="form-control form_control" type="text" placeholder="Phone">
                  </div>
                </div>
                <div class="col-lg-12">
                  <div class="mb-3">
                    <input class="form-control form_control" type="email" placeholder="Email">
                  </div>
                </div>
                <div class="col-md-12">
                  <div class="mb-3">
                    <textarea class="form-control" rows="6">I am interested in a price quote on this vehicle. Please contact me at your earliest convenience with your best price for this vehicle.</textarea>
                  </div>
                  <button type="submit" class="btn btn-block btn-thm mt10 mb20">Send Message</button>
                  <button type="submit" class="btn btn-block btn-whatsapp mb0"><span class="flaticon-whatsapp mr10 text-white"></span>WhatsApp</button>
                </div>
              </div>
            </form>-->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <!-- Our Shopping Product -->
  <section class="our-shop pb100">
    <div class="container">
      <div class="row">
        <div class="col-md-8">
          <div class="main-title text-center text-md-start mb15-sm">
            <h2>Why Choose Us?</h2>
          </div>
        </div>
        <div class="col-md-4">
          <div class="text-center text-md-end mb30-sm">
            <a href="listings.php" class="more_listing">Show All Cars <span class="icon"><span class="fas fa-plus"></span></span></a>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="listing_item_4grid_slider nav_none">
            <?php
                $select = "select * from listings where is_active=1 order by RAND() LIMIT 8";
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
<?php
    }
    }
    include_once("footer.php");
?>