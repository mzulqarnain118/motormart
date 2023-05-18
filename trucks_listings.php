<?php 
 include_once("header.php"); 
 ?>
  <!-- Inner Page Breadcrumb -->
  <section class="inner_page_breadcrumb" style="background-image: url('images/background/trucks_new.jpg') !important ;">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb_content">
            <h2 class="breadcrumb_title">Trucks For Sale</h2>
            <p class="subtitle">Listings</p>
            <!--<ol class="breadcrumb fn-767 mt10-sm">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page"><a href="#">Cars for Sale</a></li>
            </ol>-->
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Listing Grid View -->
  <section class="our-listing bgc-white pb30-991 inner_page_section_spacing">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="listing_sidebar">
            <div class="sidebar_content_details style3">
              <!-- <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a> -->
              <div class="sidebar_listing_list style2 mobile_sytle_sidebar mb0">
                <div class="siderbar_widget_header">
                  <h4 class="title mb0">Search Filters<a class="filter_closed_btn float-end" href="#"><span class="fas fa-times"></span></a></h4>
                </div>
                <div class="sidebar_advanced_search_widget">
                <form method="post" action="listings.php">
                  <ul class="sasw_list mb0">
                    <li class="search_area">
                      <div class="form-group">
                        <input type="text" class="form-control" name="title" value="<?php if(isset($_GET['title'])){ echo $_GET['title']; } ?>" placeholder="Enter Keyword">
                      </div>
                    </li>
                    <li>
                      <div class="search_option_two">
                        <div class="candidate_revew_select">
                          <div class="dropdown bootstrap-select w100 show-tick">
                            <select class="selectpicker w100 show-tick" tabindex="-98">
                              <option>Condition</option>
                              <option>Most Recent</option>
                              <option>Recent</option>
                              <option>Best Selling</option>
                              <option>Old Review</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="search_option_two">
                        <div class="candidate_revew_select">
                          <div class="dropdown bootstrap-select w100 show-tick">
                            <select class="selectpicker  w100 show-tick" name='maker' tabindex="-98"  data-live-search="true">
                                <option value="0">Select Makes</option>
                                 <?php
                                  $select = "select * from makers  order by title asc ";
                                   // $select = "select * from models order by title asc";
                                    $q_run =  mysqli_query($con,$select);
                                    if(mysqli_num_rows($q_run)>0){
                                        while($data_cat =  mysqli_fetch_assoc($q_run)){
                                            if(isset($_GET['maker']) && $_GET['maker']==$data_cat['id']){
                                                    echo "<option selected='selected' value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
                                                }else{
                                                    echo "<option value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
                                                }
                                            }
                                    }
                                  ?>
                              </select>
                          </div>
                        </div>
                      </div>
                    </li>
                  
               
                    <li>
                      <div class="search_option_two">
                        <div class="candidate_revew_select">
                          <div class="dropdown bootstrap-select w100 show-tick">
                            <select class="selectpicker w100 show-tick" name="model_year" data-live-search="true" data-width="100%">
                              <option data-tokens="Year">Year</option>
                              <?php
                                for($i=date('Y'); $i>1989; $i--){
                                    if(isset($_GET['model_year']) && $_GET['model_year']==$i){
                                        echo "<option selected='selected' value='$i'>$i</option>";
                                    }else{
                                        echo "<option value='$i'>$i</option>";
                                    }
                                }
                              ?>
                            </select>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="sidebar_priceing_slider_mobile">
                        <div class="wrapper">
                          <h5 class="subtitle">Filter by price</h5>
                          <div class="mt20 ml10" id="slider"></div>
                          <span id="slider-range-value1"></span>
                          <span id="slider-range-value2"></span>
                        </div>
                      </div>
                    </li>
                  
                    <li>
                      <div class="search_option_button">
                        <button type="submit" class="btn btn-block btn-thm"><span class="flaticon-magnifiying-glass mr10"></span> Search</button>
                      </div>
                    </li>
                    <li class="text-center"><a class="reset-filter" href="#">Reset Filter</a></li>
                  </ul>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-xl-3 ">
          <div class="sidebar_widgets">
            <div class="sidebar_widgets_wrapper">
              <div class="sidebar_advanced_search_widget">
                <h4 class="title">Search Filters</h4>
                <form method="get" action="trucks_listings.php">
                <ul class="sasw_list mb0">
                  <li class="search_area">
                    <div class="form-group">
                      <input type="text" class="form-control" name="title" value="<?php if(isset($_GET['title'])){ echo $_GET['title']; } ?>" placeholder="Enter Keyword">
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <div class="dropdown bootstrap-select w100 show-tick">
                          <select name="condition" class="selectpicker w100 show-tick" tabindex="-98">
                            <option value="0">Condition</option>
                            <option <?php if(isset($_GET['condition']) && $_GET['condition']=="Used"){ echo "selected='selected'"; } ?> value="Used">Used</option>
                            <option <?php if(isset($_GET['condition']) && $_GET['condition']=="New"){ echo "selected='selected'"; } ?>  value="New">New</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <div class="dropdown bootstrap-select w100 show-tick">
                          
                          <select class="selectpicker  w100 show-tick" name='category_id' tabindex="-98"  data-live-search="true">
                                <option value="0">Select Category</option>
                                 <?php
                                  $inc_qry = mysqli_query($con,"select id,title from categories where cat_type='Trucks'");
                                    while($data_cat =  mysqli_fetch_assoc($inc_qry)){
                                      if(isset($_GET['category_id']) && $_GET['category_id'] == $data_cat['id']){
                                            echo "<option selected='selected' value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
                                        }else{
                                            echo "<option value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
                                        }
                                        
                                    }
                                  ?>
                              </select>
                        </div>
                      </div>
                    </div>
                  </li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <div class="dropdown bootstrap-select w100 show-tick">
                          
                          <select class="selectpicker  w100 show-tick" name='maker' tabindex="-98"  data-live-search="true" onchange="select_model(this.value)">
                                <option value="0">Select Makes</option>
                                 <?php
                                  $select = "select * from makers  order by title asc ";
                                   // $select = "select * from models order by title asc";
                                    $q_run =  mysqli_query($con,$select);
                                    if(mysqli_num_rows($q_run)>0){
                                        while($data_cat =  mysqli_fetch_assoc($q_run)){
                                              if(isset($_GET['maker']) && $_GET['maker'] == $data_cat['id']){
                                                    echo "<option selected='selected' value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
                                                }else{
                                                    echo "<option value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
                                                }
                                                
                                            }
                                    }
                                  ?>
                              </select>
                        </div>
                      </div>
                    </div>
                  </li>
                    <li>
                    <div class="search_option_two" id="model_car">                      

                      <select class="form-control" id="model_car_drop" name='model' style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;">    
                                <option value="0">Select Models</option>
                                 <?php
                                      $select = "select * from models where type='Trucks' order by title asc ";
                                       // $select = "select * from models order by title asc";
                                        $q_run =  mysqli_query($con,$select);
                                        if(mysqli_num_rows($q_run)>0){
                                            while($data_cat =  mysqli_fetch_assoc($q_run)){
                                                $dsp = "";
                                                if(isset($_GET['maker'])){
                                                    if($data_cat['maker_id']==$_GET['maker']){
                                                        $dsp = "";
                                                    }else{
                                                        $dsp = "display:none;";
                                                    }
                                                }else{
                                                    $dsp = "display:none;";
                                                }
                                                if(isset($_GET['model']) && $_GET['model']==$data_cat['id']){
                                                        echo "<option style='$dsp' selected='selected' value='".$data_cat['id']."' class='models_car model_car_".$data_cat['maker_id']."'>".DBout($data_cat['title'])."</option>";
                                                    }else{
                                                        echo "<option style='$dsp' value='".$data_cat['id']."' class='models_car model_car_".$data_cat['maker_id']."'>".DBout($data_cat['title'])."</option>";
                                                    }
                                                }
                                        }
                                      ?>
                      </select>
                      
                    </div>
                  </li>
                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <div class="dropdown bootstrap-select w100 show-tick">
                          
                          <select class="selectpicker w100 show-tick" name="model_year" data-live-search="true" data-width="100%">
                              <option data-tokens="Year">Year</option>
                              <?php
                                for($i=date('Y'); $i>1989; $i--){
                                    if(isset($_GET['model_year']) && $_GET['model_year']==$i){
                                        echo "<option selected='selected' value='$i'>$i</option>";
                                    }else{
                                        echo "<option value='$i'>$i</option>";
                                    }
                                }
                              ?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  
                  <!--<li class="min_area list-inline-item">
                    <div class="form-group">
                      <input type="text" name="min" value="<?php if(isset($_GET['min'])){ echo $_GET['min']; } ?>" class="form-control" placeholder="Min">
                    </div>
                  </li>
                  <li class="max_area list-inline-item">
                    <div class="form-group">
                      <input type="text" name="max" value="<?php if(isset($_GET['max'])){ echo $_GET['max']; } ?>" class="form-control" placeholder="Max">
                    </div>
                  </li>-->
                  <li><h5 class="subtitle">Price</h5></li>
                  <li>
                    <div class="slider-range"></div>
                    <input type="text" name="min" value="<?php if(isset($_GET['min'])){ echo $_GET['min']; } ?>" class="amount" placeholder="5,000"> <span style="position: absolute;left: 32px;">Min</span> 
                    <input type="text" name="max" value="<?php if(isset($_GET['max'])){ echo $_GET['max']; } if(isset($_GET['price'])){ echo $_GET['price']; } ?>" class="amount2" placeholder="15,000" /> <span style="position: absolute;right: 32px;">Max</span>
                  </li>
                 
                  <li>
                    <div class="search_option_button">
                      <button type="submit" class="btn btn-block btn-thm"><span class="flaticon-magnifiying-glass mr10"></span> Search</button>
                    </div>
                  </li>
                  <li class="text-center"><a class="reset-filter" href="#">Reset Filter</a></li>
                </ul>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-xl-9">
            <?php
            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                }
                /**SEARCH QUERY**/
                $query = array();
                
                $search_by = 0;
                if (isset($_GET['title']) && $_GET['title']!="") {
                    $query[] = "listing_title like '%".trim($_GET['title'])."%'";
                    $search_by = 1;
                }
              
                if (isset($_GET['condition']) && $_GET['condition']!="") {
                    $query[] = "listing_condition='".trim($_GET['condition'])."'";
                    $search_by = 1;
                }
                if (isset($_GET['category_id']) && $_GET['category_id']!=0) {
                    $query[] = "category_id='".trim($_GET['category_id'])."'";
                    $search_by = 1;
                }
                if (isset($_GET['maker']) && $_GET['maker']!=0) {
                    $query[] = "maker_id=".trim($_GET['maker']);
                    $search_by = 1;
                }
                
                if (isset($_GET['model']) && $_GET['model']!=0) {
                    $query[] = "model_id='".trim($_GET['model'])."'";
                    $search_by = 1;
                }
                
                if (isset($_GET['body_type']) && $_GET['body_type']!=0) {
                    $query[] = "body_type_id='".trim($_GET['body_type'])."'";
                    $search_by = 1;
                }
                if (isset($_GET['model_year']) && $_GET['model_year']!="Year") {
                    $query[] = "model_year='".trim($_GET['model_year'])."'";
                    $search_by = 1;
                }
              if (isset($_GET['min']) && $_GET['min']!="" &&  isset($_GET['max']) && $_GET['max']!="") {

                    $query[] = " ( price >= '".trim($_GET['min'])."'  and price <= '".trim($_GET['max'])."' )";
                    $search_by = 1;
                }else if (isset($_GET['min']) && $_GET['min']!=""){
                    $query[] = " ( price >= '".trim($_GET['min'])."' )";
                }else if (isset($_GET['max']) && $_GET['max']!=""){
                    $query[] = " ( price <= '".trim($_GET['max'])."' )";
                }
                if (isset($_GET['max']) && $_GET['max']!="") {
                   // $query_price[] = " ( price >= '".trim($_GET['max'])."'  or price <= '".trim($_GET['price'])."' )";
                    $search_by = 1;
                }
                if (isset($_GET['price']) && $_GET['price']!=0) {
                    $query[] = "price <= '".trim($_GET['price'])."'";
                    $search_by = 1;
                }
              
                $str = "";
                if(!empty($query)){
                    //$str = "where ".implode(" or ",$query);
                    $str = "and ".implode(" and ",$query);
                }
                
                $total_records_per_page = 15;                        
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;

                
                $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `listings` where is_active=1 and listing_type=0 and category_id IN($trucks_cats) $str");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total pages minus 1
            ?>
          <div class="row">
            <div class="listing_filter_row db-lg">
              <div class="col-xl-5">
                <div class="page_control_shorting left_area tac-lg mb30-767 mt15">
                  <p>We found <span class="heading-color fw600"><?php echo $total_records; ?></span> Trucks available for you</p>
                </div>
              </div>
              <div class="col-xl-7">
                <div class="page_control_shorting right_area text-end tac-lg">
                  <ul>
                    <!--<li class="list-inline-item mb10-400"> <a id="open2" class="filter_open_btn style2 dn db-md" href="#"><img class="mr10" src="images/icon/filter-icon.svg" alt="filter-icon.svg"> Filters</a> </li>
                    <li class="list-inline-item short_by_text listone">Sort by:</li>
                    <li class="list-inline-item listwo">
                      <select class="selectpicker show-tick">
                        <option>Date: newest First</option>
                        <option>Most Recent</option>
                        <option>Recent</option>
                        <option>Best Selling</option>
                        <option>Old Review</option>
                      </select>
                    </li>-->
                    <!--<li class="list-inline-item list-gird"><a href="#"><img src="images/icon/list-grid.svg" alt="list-grid.svg"></a></li>
                    <li class="list-inline-item list-list"><a href="#"><img src="images/icon/list-list.svg" alt="list-list.svg"></a></li>-->
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
              <?php
                   
                  $select = "select * from listings where is_active=1 and listing_type=0 $str and category_id IN($trucks_cats) order by id asc LIMIT $offset, $total_records_per_page";
                    
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
              <div class="col-sm-6 col-xl-4">
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
                    <img loading="lazy" style="width: 100%;" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
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
                          <li class="list-inline-item">(<?php echo $data['visit_count']; ?> Views)</li>
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
            
          
            
            
            <div class="col-lg-12">

              <div class="mbp_pagination mt20">
                <div class="new_line_pagination text-center">
                <?php //pagnination_btns($page_no,$previous_page,$total_no_of_pages,$next_page); ?>
                  <!--<p>Showing 36 of 497 Results</p>
                  <div class="pagination_line"></div>
                  <a class="pagi_btn" href="#">Show More</a>-->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
    include_once("footer.php");
?>
<script>
function select_model(id){
    jQuery('#model_car_drop').val(0);
    jQuery('#model_car .models_car').css("display","none");
    jQuery('#model_car .model_car_'+id).css("display","block");
}
</script>