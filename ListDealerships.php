<?php 
 include_once("header.php"); 
 ?>
  <!-- Inner Page Breadcrumb -->
  <section class="inner_page_breadcrumb" style="background-image: url('images/background/car_new_01.jpg') !important ;">
    <div class="container">
      <div class="row">
        <div class="col-xl-12">
          <div class="breadcrumb_content">
            <h2 class="breadcrumb_title">Cars For Sale</h2>
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
        <div class="col-lg-8 col-xl-9">
            <?php
            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                        $page_no = $_GET['page_no'];
                    } else {
                        $page_no = 1;
                }
                /**SEARCH QUERY**/
                $query = array();
               
                if (isset($_GET['category_id']) && $_GET['category_id']!=0) {
                    $query[] = "category_id='".trim($_GET['category_id'])."'";
                    $search_by = 1;
                }
                
               
                $total_records_per_page = 15;                        
                $offset = ($page_no-1) * $total_records_per_page;
                $previous_page = $page_no - 1;
                $next_page = $page_no + 1;

                
                $result_count = mysqli_query($con,"SELECT COUNT(*) As total_records FROM `dealerships`  ");
                $total_records = mysqli_fetch_array($result_count);
                $total_records = $total_records['total_records'];
                $total_no_of_pages = ceil($total_records / $total_records_per_page);
                $second_last = $total_no_of_pages - 1; // total pages minus 1
            ?>
          <div class="row">
            <div class="listing_filter_row db-lg">
              <div class="col-xl-5">
                <div class="page_control_shorting left_area tac-lg mb30-767 mt15">
                  <p>We found <span class="heading-color fw600"><?php echo $total_records; ?></span> Dealerships available for you</p>
                </div>
              </div>
              <div class="col-xl-7">
                <div class="page_control_shorting right_area text-end tac-lg">
                  <ul>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            
              <?php
                   
                  $select = "select * from dealerships order by id asc LIMIT $offset, $total_records_per_page";
                    
                  $q_run =  mysqli_query($con,$select);
                    if(mysqli_num_rows($q_run)>0){
                        while($data =  mysqli_fetch_assoc($q_run)){
                        ?>
              <div class="col-sm-6 col-xl-4">
              <a href="NewCarsListing.php?D_id=<?php echo $data['id']; ?>&CAT_ID=<?php echo $_GET['category_id']; ?>">
              <div class="car-listing">
                <div class="thumb">
                    <img loading="lazy" style="width: 100%;" src="<?php echo getServerURL(); ?>admin/dealership_images/<?php echo $data['image']; ?>" />
                  <div class="thmb_cntnt2">

                  </div>
                  <div class="thmb_cntnt3">
        
                  </div>
                </div>
                <div class="details">
                  <div class="wrapper">
                      
                    <h6 class="title"><?php echo DBout($data['title']); ?></h6>
                  
                  </div>
                        <div class="listing_footer">
                              <ul class="mb0">
                              <?php
                                if(isset($data['ratings']) && $data['ratings']!=""){    
                                ?>
<li class="list-inline-item" style="display:flex;align-items:center,"><a href="#"><img src="images/NewIcons/star.png" style="margin-right:5px" alt="Star Icon" width="15" height="15" class="icon"><?php echo $data['ratings']; ?></a></li>
                                <?php
                                }
    
                                ?>
                       
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
  
}
</script>