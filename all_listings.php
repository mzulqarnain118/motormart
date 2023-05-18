<?php 
 include_once("header.php"); ?>
  <!-- Inner Page Breadcrumb -->
  <section class="inner_page_breadcrumb">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb_content">
            <h2 class="breadcrumb_title">Used Vehicles For Sale</h2>
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
                  <ul class="sasw_list mb0">
                    <li class="search_area">
                      <div class="form-group">
                        <input type="text" class="form-control" placeholder="Enter Keyword">
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
                            <!--
                            <select class="selectpicker w100 show-tick" tabindex="-98">
                              <option>Select Makes</option>
                              <option>Audi</option>
                              <option>Bentley</option>
                              <option>BMW</option>
                              <option>Ford</option>
                              <option>Honda</option>
                              <option>Mercedes</option>
                            </select>-->
                            <select class="selectpicker" name='maker'  data-live-search="true">
                                <option value="0">Select Makes</option>
                                 <?php
                                  $select = "select * from makers  order by title asc ";
                                   // $select = "select * from models order by title asc";
                                    $q_run =  mysqli_query($con,$select);
                                    if(mysqli_num_rows($q_run)>0){
                                        while($data_cat =  mysqli_fetch_assoc($q_run)){
                                                echo "<option value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
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
                            <select class="selectpicker w100 show-tick" tabindex="-98">
                              <option>Select Models</option>
                              <option>A3 Sportback</option>
                              <option>A4</option>
                              <option>A6</option>
                              <option>Q5</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="search_option_two">
                        <div class="candidate_revew_select">
                          <div class="dropdown bootstrap-select w100 show-tick">
                            <select class="selectpicker w100 show-tick" tabindex="-98">
                              <option>Select Type</option>
                              <option>Convertible</option>
                              <option>Coupe</option>
                              <option>Hatchback</option>
                              <option>Sedan</option>
                              <option>SUV</option>
                            </select>
                          </div>
                        </div>
                      </div>
                    </li>
                    <li>
                      <div class="search_option_two">
                        <div class="candidate_revew_select">
                          <div class="dropdown bootstrap-select w100 show-tick">
                            <select class="selectpicker w100 show-tick" tabindex="-98">
                              <option>Year</option>
                              <option>1967</option>
                              <option>1990</option>
                              <option>2000</option>
                              <option>2002</option>
                              <option>2005</option>
                              <option>2010</option>
                              <option>2015</option>
                              <option>2020</option>
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
                      <h5 class="subtitle">Fuel Type</h5>
                      <div class="ui_kit_checkbox">
                        <div class="form-check mb20">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckPetrolSbp">
                          <label class="form-check-label" for="flexCheckPetrolSbp">Petrol (676)</label>
                        </div>
                        <div class="form-check mb20">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDieselSbp">
                          <label class="form-check-label" for="flexCheckDieselSbp">Diesel (9,784)</label>
                        </div>
                        <div class="form-check mb20">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckElectricSbp">
                          <label class="form-check-label" for="flexCheckElectricSbp">Electric (6.584)</label>
                        </div>
                        <div class="form-check mb30">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckHybridSbp">
                          <label class="form-check-label" for="flexCheckHybridSbp">Hyrbid (97)</label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <h5 class="subtitle">Transmission</h5>
                      <div class="ui_kit_checkbox">
                        <div class="form-check mb20">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckAutometicSbp">
                          <label class="form-check-label" for="flexCheckAutometicSbp">Automatic (6,676)</label>
                        </div>
                        <div class="form-check mb30">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckManualSbp">
                          <label class="form-check-label" for="flexCheckManualSbp">Manual (9,784)</label>
                        </div>
                      </div>
                    </li>
                    <li>
                      <h5 class="subtitle">Features</h5>
                      <div class="sidebar_feature_checkbox">
                        <div class="wrapper">
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefaultSbp">
                            <label class="form-check-label" for="flexCheckDefaultSbp">Adaptive Cruise Control (6,676)</label>
                          </div>
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1Sbp">
                            <label class="form-check-label" for="flexCheckDefault1Sbp">Cooled Seats (9,784)</label>
                          </div>
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2Sbp">
                            <label class="form-check-label" for="flexCheckDefault2Sbp">Keyless Start (9,784)</label>
                          </div>
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3Sbp">
                            <label class="form-check-label" for="flexCheckDefault3Sbp">Navigation System (9,784)</label>
                          </div>
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4Sbp">
                            <label class="form-check-label" for="flexCheckDefault4Sbp">Remote Start (9,784)</label>
                          </div>
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5Sbp">
                            <label class="form-check-label" for="flexCheckDefault5Sbp">Cooled Seats (9,784)</label>
                          </div>
                          <div class="form-check mb15">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6Sbp">
                            <label class="form-check-label" for="flexCheckDefault6Sbp">Keyless Start (9,784)</label>
                          </div>
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7Sbp">
                            <label class="form-check-label" for="flexCheckDefault7Sbp">Navigation System (9,784)</label>
                          </div>
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-4 col-xl-3 dn-md">
          <div class="sidebar_widgets">
            <div class="sidebar_widgets_wrapper">
              <div class="sidebar_advanced_search_widget">
                <h4 class="title">Search Filters</h4>
                <ul class="sasw_list mb0">
                  <li class="search_area">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Enter Keyword">
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
                                                echo "<option value='".$data_cat['id']."'>".DBout($data_cat['title'])."</option>";
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
                                                    echo "<option value='".$data_cat['id']."' class='model_".$data_cat['maker_id']."'>".DBout($data_cat['title'])."</option>";
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
                                                echo "<option value='".$data_cat['id']."' >".DBout($data_cat['title'])."</option>";
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
                                    echo "<option value='$i'>$i</option>";
                                }
                              ?>
                            </select>
                        </div>
                      </div>
                    </div>
                  </li>
                  <li><h5 class="subtitle">Mileage</h5></li>
                  <li class="min_area list-inline-item">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Min">
                    </div>
                  </li>
                  <li class="max_area list-inline-item">
                    <div class="form-group">
                      <input type="text" class="form-control" placeholder="Max">
                    </div>
                  </li>
                  <li><h5 class="subtitle">Price</h5></li>
                  <li>
                    <div class="slider-range"></div>
                    <input type="text" class="amount" placeholder="$5,000"> 
                    <input type="text" class="amount2" placeholder="$15,000">
                  </li>
                  <li>
                    <h5 class="subtitle">Fuel Type</h5>
                    <div class="ui_kit_checkbox">
                      <div class="form-check mb20">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckPetrol">
                        <label class="form-check-label" for="flexCheckPetrol">Petrol (676)</label>
                      </div>
                      <div class="form-check mb20">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckDiesel">
                        <label class="form-check-label" for="flexCheckDiesel">Diesel (9,784)</label>
                      </div>
                      <div class="form-check mb20">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckElectric">
                        <label class="form-check-label" for="flexCheckElectric">Electric (6.584)</label>
                      </div>
                      <div class="form-check mb30">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckHybrid">
                        <label class="form-check-label" for="flexCheckHybrid">Hyrbid (97)</label>
                      </div>
                    </div>
                  </li>
                  <li>
                    <h5 class="subtitle">Transmission</h5>
                    <div class="ui_kit_checkbox">
                      <div class="form-check mb20">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckAutometic">
                        <label class="form-check-label" for="flexCheckAutometic">Automatic (6,676)</label>
                      </div>
                      <div class="form-check mb30">
                        <input class="form-check-input" type="checkbox" value="" id="flexCheckManual">
                        <label class="form-check-label" for="flexCheckManual">Manual (9,784)</label>
                      </div>
                    </div>
                  </li>
                  <li>
                    <h5 class="subtitle">Features</h5>
                    <div class="sidebar_feature_checkbox">
                      <div class="wrapper">
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                          <label class="form-check-label" for="flexCheckDefault">Adaptive Cruise Control (6,676)</label>
                        </div>
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault1">
                          <label class="form-check-label" for="flexCheckDefault1">Cooled Seats (9,784)</label>
                        </div>
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault2">
                          <label class="form-check-label" for="flexCheckDefault2">Keyless Start (9,784)</label>
                        </div>
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault3">
                          <label class="form-check-label" for="flexCheckDefault3">Navigation System (9,784)</label>
                        </div>
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault4">
                          <label class="form-check-label" for="flexCheckDefault4">Remote Start (9,784)</label>
                        </div>
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault5">
                          <label class="form-check-label" for="flexCheckDefault5">Cooled Seats (9,784)</label>
                        </div>
                        <div class="form-check mb15">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault6">
                          <label class="form-check-label" for="flexCheckDefault6">Keyless Start (9,784)</label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault7">
                          <label class="form-check-label" for="flexCheckDefault7">Navigation System (9,784)</label>
                        </div>
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
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-8 col-xl-9">
          <div class="row">
            <div class="listing_filter_row db-lg">
              <div class="col-xl-5">
                <div class="page_control_shorting left_area tac-lg mb30-767 mt15">
                  <p>We found <span class="heading-color fw600">4733</span> Cars available for you</p>
                </div>
              </div>
              <div class="col-xl-7">
                <div class="page_control_shorting right_area text-end tac-lg">
                  <ul>
                    <li class="list-inline-item mb10-400"> <a id="open2" class="filter_open_btn style2 dn db-md" href="#"><img class="mr10" src="images/icon/filter-icon.svg" alt="filter-icon.svg"> Filters</a> </li>
                    <li class="list-inline-item short_by_text listone">Sort by:</li>
                    <li class="list-inline-item listwo">
                      <select class="selectpicker show-tick">
                        <option>Date: newest First</option>
                        <option>Most Recent</option>
                        <option>Recent</option>
                        <option>Best Selling</option>
                        <option>Old Review</option>
                      </select>
                    </li>
                    <li class="list-inline-item list-gird"><a href="#"><img src="images/icon/list-grid.svg" alt="list-grid.svg"></a></li>
                    <li class="list-inline-item list-list"><a href="#"><img src="images/icon/list-list.svg" alt="list-list.svg"></a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
              <?php
              if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                }
                $total_records_per_page = 15;                        
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;
                $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings`");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total pages minus 1
                        
                  $select = "select * from listings order by id asc LIMIT $offset, $total_records_per_page";
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                            $images_url = json_decode($data['images_url']);
                        ?>
              <div class="col-sm-6 col-xl-4">
              <div class="car-listing">
                <div class="thumb">
                  <div class="tag">FEATURED</div>
                   <?php
                    if(count($images_url)>0){                                
                    ?>
                    <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>" />
                    <?php
                    }else{
                    ?>
                    <img src="images/listing/1.jpg" alt="1.jpg">
                    <?php
                    }
                    ?>
                  <div class="thmb_cntnt2">
                    <ul class="mb0">
                      <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-photo-camera mr3"></span> 22</a></li>
                      <li class="list-inline-item"><a class="text-white" href="#"><span class="flaticon-play-button mr3"></span> 3</a></li>
                    </ul>
                  </div>
                  <div class="thmb_cntnt3">
                    <ul class="mb0">
                      <li class="list-inline-item"><a href="#"><span class="flaticon-shuffle-arrows"></span></a></li>
                      <li class="list-inline-item"><a href="#"><span class="flaticon-heart"></span></a></li>
                    </ul>
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
                    <h6 class="title"><a href="listing_view.php?id=<?php echo $data['id']; ?>"><?php echo DBout($data['listing_title']); ?></a></h6>
                      <div class="listign_review">
                        <ul class="mb0">
                          <!--<li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#"><i class="fa fa-star"></i></a></li>
                          <li class="list-inline-item"><a href="#">4.7</a></li>-->
                          <li class="list-inline-item">(684 reviews)</li>
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