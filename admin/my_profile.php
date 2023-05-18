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
                <h2 class="breadcrumb_title">My Profile</h2>
                <p>Ready to jump back in!</p>
                
              </div>
						</div>
					</div>
                  <div class="row">
                 
                    <div class="col-sm-12 col-md-6 col-lg-6">
                     <?php
                          if(isset($_SESSION['up_suc'])){
                            ?>
                                <div class="alert alart_style_four alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['up_suc']; ?>
                                </div>
                            <?php
                            unset($_SESSION['up_suc']);
                        }
                        if(isset($_SESSION['an_error'])){
                            ?>
                                <div class="alert alart_style_thre alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['an_error']; ?>
                                </div>
                            <?php
                            unset($_SESSION['an_error']);
                        }
                        $select = "select * from users where id='".mysqli_real_escape_string($con,$_SESSION['user_id'])."'";
                        $q_run = mysqli_query($con,$select) or die(mysqli_error($con));
                        $data = mysqli_fetch_assoc($q_run);
                      ?>
                      <div class="shortcode_widget_form">
                        <div class="ui_kit_input mb25">
                         <form action="controlling.php" method="post">
                            <input type="hidden" name="cmd" value="update_profile" />
                            <input type="hidden" name="user_id" value="<?php echo $data['id']; ?>" />
                          <div class="row">
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-label">First Name</label>
                                <input type="text" name="f_name" value="<?php echo $data['f_name']; ?>" required="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <input type="text" name="l_name" value="<?php echo $data['l_name']; ?>"  required="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-label">Email</label>
                                <input type="email" readonly="" name="user_email" value="<?php echo $data['user_email']; ?>"  required="" class="form-control">
                              </div>
                            </div>
                             <div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-label">Mobile Number</label>
                                <input type="tel" name="mobile_number" value="<?php echo $data['mobile_number']; ?>" required="" pattern="+[0-9]{3}-[0-9]{2}-[0-9]{3}" class="form-control">
                              </div>
                            </div>
                           <!-- <div class="col-lg-6">
                              <div class="form-group mb20">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" required="" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group mb20">
                                <label class="form-label">Confirm Password</label>
                                <input type="password" name="c_password" required="" class="form-control">
                              </div>
                            </div>-->
                          </div>
                          <button style="margin-top: 20px;" type="submit" class="btn btn-signup btn-thm mb0">Sign Up</button>
                        </form>
                        </div>
                        </div>
                       </div>
                       <div class="col-sm-12 col-md-6 col-lg-6">
                        <?php
                          if(isset($_SESSION['error_pass'])){
                            ?>
                                <div class="alert alart_style_three alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['error_pass']; ?>
                                </div>
                            <?php
                            unset($_SESSION['error_pass']);
                        }
                          if(isset($_SESSION['succes_sc'])){
                            ?>
                                <div class="alert alart_style_four alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['succes_sc']; ?>
                                </div>
                            <?php
                            unset($_SESSION['succes_sc']);
                        }
                      ?>
                         <div class="shortcode_widget_form">
                         <h2>Change Password</h2>
                        <div class="ui_kit_input mb25">
                          <form action="controlling.php" method="post">
                            <input type="hidden" name="cmd" value="update_password" />
                            <input type="hidden" name="user_id" value="<?php echo $data['id']; ?>" />
                          <div class="row">
                           <!--<div class="col-lg-12">
                              <div class="form-group">
                                <label class="form-label">Enter Current Password</label>
                                <input type="text" name="current_pas" required="" class="form-control" />
                              </div>
                            </div>
                            <div class="col-lg-6" >
                                <h4 style="margin-top: 20px;">Set New Password</h4>
                            </div>
                            <div class="col-lg-6">
                            </div>-->
                           <div class="col-lg-6">
                              <div class="form-group mb20">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" required="" class="form-control">
                              </div>
                            </div>
                            <div class="col-lg-6">
                              <div class="form-group mb20">
                                <label class="form-label">Re-enter Password</label>
                                <input type="password" name="c_password" required="" class="form-control">
                              </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-signup btn-thm mb0">Change Password</button>
                        </form>
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