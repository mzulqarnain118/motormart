<?php
    include_once("header_dashboard.php");
?>
	<!-- Our Dashbord -->
	<section class="our-dashbord dashbord bgc-f9">
		<div class="container-fluid">
			<div class="row">
				<div class="col-xxl-10 offset-xxl-2 dashboard_grid_space">
                <!----INC SIDEBAR------>
                   <?php include_once("sidebar.php"); ?>
                <!-----END INC SIDEBAR----->
					<div class="row">
						<div class="col-xl-8">
              <div class="breadcrumb_content mb50">
                <h2 class="breadcrumb_title">Hello, Cameron!</h2>
                <p>Ready to jump back in!</p>
              </div>
						</div>
					</div>
          <div class="row">
            <?php
            if(isset($_SESSION['type']) && $_SESSION['type']==1){ // SUPER ADMiN
            $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings` where is_active!=0 and listing_type=0");
            $total_records = mysqli_fetch_array($result_count);
            ?>
            <div class="col-sm-6 col-lg-4">
              <div class="ff_one">
                <div class="icon"><span class="flaticon-list"></span></div>
                <div class="detais text-end">
                  <div class="timer"><?php echo $total_records['total_records']; ?></div>
                  <p class="para">Total Listing</p>
                </div>
              </div>
            </div>
            <?php
            }else{ // USER
            $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings` where user_id='".$_SESSION['user_id']."' and is_active!=0 and listing_type=0");
            ?>
            <div class="col-sm-6 col-lg-4">
              <div class="ff_one">
                <div class="icon"><span class="flaticon-list"></span></div>
                <div class="detais text-end">
                  <div class="timer"><?php echo $total_records['total_records']; ?></div>
                  <p class="para">My Listings</p>
                </div>
              </div>
            </div>
            <?php
            }
            
            
             if(isset($_SESSION['type']) && $_SESSION['type']==1){ // SUPER ADMiN
            $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings` where is_active!=0 and listing_type=1");
            $total_records = mysqli_fetch_array($result_count);
            ?>
            <div class="col-sm-6 col-lg-4">
              <div class="ff_one">
                <div class="icon"><span class="flaticon-list"></span></div>
                <div class="detais text-end">
                  <div class="timer"><?php echo $total_records['total_records']; ?></div>
                  <p class="para">Total Accessories</p>
                </div>
              </div>
            </div>
            <?php
            }else{ // USER
            $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings` where user_id='".$_SESSION['user_id']."' and is_active!=0 and listing_type=1");
            ?>
            <div class="col-sm-6 col-lg-4">
              <div class="ff_one">
                <div class="icon"><span class="flaticon-list"></span></div>
                <div class="detais text-end">
                  <div class="timer"><?php echo $total_records['total_records']; ?></div>
                  <p class="para">My Accessories</p>
                </div>
              </div>
            </div>
            <?php
            }
            ?>
            <!--<div class="col-sm-6 col-lg-4">
              <div class="ff_one style2">
                <div class="icon"><span class="flaticon-message"></span></div>
                <div class="detais text-end">
                  <div class="timer">74</div>
                  <p class="para">Messages</p>
                </div>
              </div>
            </div>
            <div class="col-sm-6 col-lg-4">
              <div class="ff_one style3">
                <div class="icon"><span class="flaticon-heart"></span></div>
                <div class="detais text-end">
                  <div class="timer">20</div>
                  <p class="para">Favorites</p>
                </div>
              </div>
            </div>-->
          </div>
          <div class="row" style="display: none;">
            <div class="col-lg-12 col-xl-7">
              <div class="application_statics">
                <h4>Your Profile Views</h4>
                <div class="c_container"></div>
              </div>
            </div>
            <div class="col-xl-5">
              <div class="recent_job_activity">
                <h4 class="title">Recent Activities</h4>
                <div class="grid d-block d-sm-flex">
                  <div class="icon blue"><span><img src="../images/icon/briefcase-blue.svg" alt="briefcase-blue.svg"></span></div>
                  <p class="mb0"><span class="heading-color">Wade Warren</span> add list for a car <span class="color-blue">Audi a3 Sportback 2020</span></p>
                </div>
                <div class="grid d-block d-sm-flex">
                  <div class="icon blue"><span><img src="../images/icon/briefcase-blue.svg" alt="briefcase-blue.svg"></span></div>
                  <p class="mb0"><span class="heading-color">Wade Warren</span> add list for a car <span class="color-blue">Audi a5 Sportback 2020</span></p>
                </div>
                <div class="grid d-block d-sm-flex">
                  <div class="icon green"><span><img src="../images/icon/briefcase-green.svg" alt="briefcase-green.svg"></span></div>
                  <p><span class="heading-color">Wade Warren</span> Saved for a car Mercedes cla 2021</p>
                </div>
                <div class="grid d-block d-sm-flex">
                  <div class="icon blue"><span><img src="../images/icon/briefcase-blue.svg" alt="briefcase-blue.svg"></span></div>
                  <p><span class="heading-color">Wade Warren</span> add list for a car <span class="color-blue">Audi q5 Sportback 2020</span></p>
                </div>
                <div class="grid d-block d-sm-flex">
                  <div class="icon green"><span><img src="../images/icon/briefcase-green.svg" alt="briefcase-green.svg"></span></div>
                  <p><span class="heading-color">Wade Warren</span> Saved for a car Mercedes c-class 2021</span></p>
                </div>
                <div class="grid d-block d-sm-flex">
                  <div class="icon blue"><span><img src="../images/icon/briefcase-blue.svg" alt="briefcase-blue.svg"></span></div>
                  <p><span class="heading-color">Wade Warren</span> add list for a car <span class="color-blue">Audi a3 Sportback 2020</span></p>
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