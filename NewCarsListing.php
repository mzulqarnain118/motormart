<?php 
 include_once("header.php"); 
 ?>
  <!-- Inner Page Breadcrumb -->
  <link rel="stylesheet" href="fonts/stylesheet.css">

<style>
       body {
            font-family: 'lt_streakregular', sans-serif !important;
        }
        
        h1,h4,h2,h3,h5 {
            font-family: 'lt_streakbold', sans-serif !important;
        }
       h6{
        font-family: 'lt_streakbold', sans-serif !important;
        font: weight 50px;
       }
        
        p,div {
            font-family: 'lt_streakmedium', sans-serif !important;
        }
        
        .custom-font {
            font-family: 'lt_streakextra_bold', sans-serif !important;
        }
.listings-header {
  padding: 40px 20px;
  text-align: center;
}

.header-title {
  color: #fff;
  font-size: 36px;
  font-weight: bold;
  margin: 0;
}

.header-description {
  color: #fff;
  font-size: 18px;
  margin: 20px 0 0;
}

.cta-button {
  display: inline-block;
  background-color: #fff;
  color: #7A4397;
  font-size: 16px;
  font-weight: bold;
  text-decoration: none;
  padding: 12px 24px;
  border-radius: 4px;
  margin-top: 20px;
  transition: background-color 0.3s ease;
}

.cta-button:hover {
  background-color: #6C3687;
  color: #fff;
}

.filterHead{
  font-size: 13px;
  font-style: normal;
  font-weight: 600;
  line-height: 16px;
  letter-spacing: 0em;
        margin-bottom: -1.1099999999999994rem;
      
}

</style>
  <section class="inner_page_breadcrumb" style="background-image: url('images/background/NewCarsListing.jpg') !important; padding: 20px 0px 460px 0px;">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb_content">
            <h2 class="breadcrumb_title">Featured Listings</h2>
            <p class="subtitle">Explore our latest collection of high-quality vehicles</p>
          </div>
        </div>
      </div>
    </div>
  </section>
<?php
  $D_id = $_GET['D_id'];
  $sql = "SELECT * FROM `dealerships` WHERE `id` = '$D_id'";
  $result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
?>
 <div class="d-flex align-items-center mt-5">
  <img loading="lazy" style="width: 100px; border-radius: 50%;margin-right:34px;" src="<?php echo getServerURL(); ?>admin/dealership_images/<?php echo $row['image']; ?>" />
  <h2 class="breadcrumb_title"><?php echo $row['title']; ?></h2>
</div>

  <!-- Listing Grid View -->
<section class="our-listing pb30-991 inner_page_section_spacing newListingPagesFont" >
      <div class="container">

      <div class="row">
        <!--<div class="col-lg-4 col-xl-3 dn-md">-->
        <div class="col-lg-4 col-xl-3">
          <div class="sidebar_widgets">
            <div class="sidebar_widgets_wrapper">
              <div class="sidebar_advanced_search_widget">
                <h4 class="title">Search Filters</h4>
                <form method="get" action="NewCarsListing.php">
                <ul class="sasw_list mb0">
                  <input type="number" name="id" hidden value="<?php if(isset($_GET['id'])){ echo $_GET['id']; } ?>">
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
                            <select class="selectpicker w100 show-tick" name='model' tabindex="-98"  data-live-search="true" >
                                <option value="0">Select Models</option>
                                 <?php
                                      $select = "select * from models  order by title asc ";
                                       // $select = "select * from models order by title asc";
                                        $q_run =  mysqli_query($con,$select);
                                        if(mysqli_num_rows($q_run)>0){
                                            while($data_cat =  mysqli_fetch_assoc($q_run)){
                                                if(isset($_GET['model']) && $_GET['model']==$data_cat['id']){
                                                        echo "<option selected='selected' value='".$data_cat['id']."' class='model_".$data_cat['maker_id']."'>".DBout($data_cat['title'])."</option>";
                                                    }else{
                                                        echo "<option value='".$data_cat['id']."' class='model_".$data_cat['maker_id']."'>".DBout($data_cat['title'])."</option>";
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
                            <select class="selectpicker w100 show-tick" name='body_type' tabindex="-98"  data-live-search="true" >
                                <option value="0">Select Body Type</option>
                                 <?php
                                      $select = "select * from body_type  order by title asc ";
                                        $q_run =  mysqli_query($con,$select);
                                        if(mysqli_num_rows($q_run)>0){
                                            while($data_cat =  mysqli_fetch_assoc($q_run)){
                                                    if(isset($_GET['body_type']) && $_GET['body_type']==$data_cat['id']){
                                                        echo "<option selected='selected' value='".$data_cat['id']."' >".DBout($data_cat['title'])."</option>";
                                                    }else{
                                                        echo "<option value='".$data_cat['id']."' >".DBout($data_cat['title'])."</option>";
                                                    }
                                                }
                                        }
                                      ?>
                              </select>
                          </div>
                        </div>
                      </div>
                    </li>
                                    <li><h6 class="filterHead">Fuel type</h6></li>

                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <div class="dropdown bootstrap-select w100 show-tick">
                          
                          <select class="selectpicker w100 show-tick" name="feulType" data-live-search="true" data-width="100%">
                              <option data-tokens="feulType">Fuel type</option>
                          <?php
      $fuelTypes = array( 'Gasoline',
  'Diesel',
  'Electric',
  'Hybrid',
  'Natural Gas',
  'Propane',);
      foreach ($fuelTypes as $fuelType) {
        echo "<option value='" . $fuelType . "'>" . $fuelType . "</option>";
      }
      ?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </li>
                             <li><h6 class="filterHead">Seats</h6></li>

                  <li>
                    <div class="search_option_two">
                      <div class="candidate_revew_select">
                        <div class="dropdown bootstrap-select w100 show-tick">
                          
                          <select class="selectpicker w100 show-tick" name="seats" data-live-search="true" data-width="100%">
                              <option data-tokens="seats">Seats</option>
                                        <?php
      $seatsTypes = array( 3,4,5);
      foreach ($seatsTypes as $seat) {
        echo "<option value='" . $seat . "'>" . $seat . "</option>";
      }
      ?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li>
                    <div class="slider-range"></div>
                    <h6 class="filterHead" style="position: absolute;left: 32px; ">Min price</h6>  <input type="text" name="min" value="<?php if(isset($_GET['min'])){ echo $_GET['min']; } ?>" class="amount" placeholder="5,000">
                   <h6 class="filterHead" style="position: absolute;right: 57px;margin-top: -53px;">Max price</h6> <input type="text" name="max" value="<?php if(isset($_GET['max'])){ echo $_GET['max']; } if(isset($_GET['price'])){ echo $_GET['price']; } ?>" class="amount2" placeholder="15,000" /> 
                  </li>
                 
                  <li>
                    <div class="search_option_button">
                      <button type="submit" class="btn btn-block btn-thm"><span class="flaticon-magnifiying-glass mr10"></span> Search</button>
                    </div>
                  </li>
                  <li class="text-center"><a class="reset-filter" href="NewCarsListing.php">Reset Filter</a></li>
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
                $query_price = array();
                $search_by = 0;
         
                
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
                if (isset($_GET['feulType']) && $_GET['feulType']!="feulType") {
                    $query[] = "feulType='".trim($_GET['feulType'])."'";
                    $search_by = 1;
                }
                   if (isset($_GET['seats']) && $_GET['seats']!="seats") {
                    $query[] = "seats='".trim($_GET['seats'])."'";
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
                $str_price = "";
                if(!empty($query)){
                    //$str = "where ".implode(" or ",$query);
                    $str = "and ".implode(" and ",$query);
                }
                if(!empty($query_price)){
                    $str_price = "and ".implode(" or ",$query_price);
                }
                
                $total_records_per_page = 15;                        
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;

                
                $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `listings` where is_active=1  $str $str_price");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total pages minus 1
            ?>
  
         <div class="row">
    <?php

$D_id = $_GET['D_id'];
$CAT_ID = $_GET['CAT_ID'];
    $select = "SELECT *,l.id as listingID, m.title AS modelName,mk.title as model,b.title as bodyType
FROM listings AS l
INNER JOIN models AS m ON m.id = l.model_id
INNER JOIN makers AS mk ON mk.id = l.maker_id
INNER JOIN body_type AS b ON b.id = l.body_type_id
WHERE is_active = 1 AND dealership_id = $D_id AND  category_id = $CAT_ID  $str $str_price";
                    
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
        ?>

        <div class="col-sm-6 col-xl-4">
<a href="<?php if ($CAT_ID == 24) {
  echo "NewBikeIndividualListing.php?id=" . $data['listingID'];
} else {
  echo "NewIndividualListing.php?id=" . $data['listingID'];
} ?>">
                <div class="car-listing">
                  <div class="thumb">
                   
               
                    <div class="tag">New</div>
                    <?php
                    
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

                  </div>
                  <div class="thmb_cntnt3">
        
                  </div>
                </div>
                    <div class="details">
                            <h1 class="title"><?php echo $data["model"]; ?></h1>
                            <h6><?php echo $data["modelName"]; ?></h6>
<p> <img src="images/NewIcons/car-seat.png" alt="car" width="15" height="15" style="margin-right:0.5rem"><?php echo $data["seats"]; ?> Seats</p>

<p>
     <img src="images/NewIcons/gas-station.png" style="margin-right:0.5rem" alt="Gasoline" width="15" height="15">
    <?php echo $data["feulType"]; ?>
</p>
                        <div class="wrapper">
                          
                            <h6 class="title"><?php echo $data["model"]; ?> <?php echo $data["modelName"]; ?></h6>
                        </div>
                        <div class="listing_footer">
                                <h6 class="title"><span class="flaticon-price me-2"></span>New from $<?php echo $data["price"]; ?></h6>
                        </div>
                    </div>
                </div>
            <?php echo"</a>" ?>
        </div>
    <?php }} ?>
</div>

        </div>
      </div>
    </div>
  </section>
  <?php 
 include_once("Q&A.php"); 
 ?>
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