<?php
    include_once("header_dashboard.php");
    if(isset($_GET['id'])){
    $select = "select * from categories where id='".$_GET['id']."'";
    $q_run =  mysqli_query($con,$select);
    $data =  mysqli_fetch_assoc($q_run);
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
                <h2 class="breadcrumb_title">Edit Category</h2>
                <p>Ready to jump back in!</p>
              </div>
						</div>
					</div>
                  <div class="row">
                 
                    <div class="col-sm-12 col-md-6 col-lg-6">
                     <?php
                     if(isset($_SESSION['succes_sc'])){
                            ?>
                                <div class="alert alart_style_four alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['succes_sc']; ?>
                                </div>
                            <?php
                            unset($_SESSION['succes_sc']);
                        }
                          if(isset($_SESSION['error_ocr'])){
                            ?>
                                <div class="alert alart_style_three alert-dismissible fade show" role="alert">
                                    <?php echo $_SESSION['error_ocr']; ?>
                                </div>
                            <?php
                            unset($_SESSION['error_ocr']);
                        }
                      ?>
                      <div class="shortcode_widget_form">
                        <div class="ui_kit_input mb25">
                          <form method="post" action="controlling.php" enctype="multipart/form-data">
                          <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                            <input type="hidden" name="cmd" value="add_category" />
                            <div class="form-group p-1">
                                <h5 class="short_code_title">Title</h5>
                              <input type="text" class="form-control" value="<?php echo DBout($data['title']); ?>" required="" name="title"  placeholder="Category Title"/>
                            </div>
                            
                            <div class="form-group p-1">
                                <h5 class="short_code_title">Image/Icon</h5>
                              <input type="file" class="form-control" name="cat_image" />
                              <?php
                                if($data['cat_image']!=""){
                                    ?>
                                        <img width="60" src="<?php echo getServerURL(); ?>cat_images/<?php echo $data['cat_image']; ?>" />
                                        <input type="hidden" name="image_hidden_val" value="<?php echo $data['cat_image']; ?>" />
                                    <?php
                                    
                                }
                              ?>
                            </div>
                            <div class="form-group p-1">
                                <h5 class="short_code_title">Category Type</h5>
                                <?php
                                    $array = array('Cars','Bikes','Trucks','Boats','Accessories','Motorsports');
                                    foreach($array as $key=>$val){
                                        if($data['cat_type']==$val){
                                            echo "<input type='radio'  checked='checked' name='cat_type' value='$val'/> ".$val." &nbsp;";
                                        }else{
                                            echo "<input type='radio' name='cat_type' value='$val'/> ".$val." &nbsp;";
                                        }
                                    }
                                ?>
                            </div>
                            <div class="form-group p-1">
                                <h5 class="short_code_title">Condition Type</h5>
                                <?php
                                    $array = array('Used','New');
                                    foreach($array as $key=>$val){
                                        if($data['is_condition']==$val){
                                            echo "<input type='radio' checked='checked' name='is_condition' value='$val'/> ".$val." &nbsp;";
                                        }else{
                                            echo "<input type='radio' name='is_condition' value='$val'/> ".$val." &nbsp;";    
                                        }
                                        
                                    }
                                ?>
                            </div>
                            <div class="form-group p-1">
                                <input type="submit" class="btn btn-lg btn-primary" value="Save" />
                            </div>
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
}
?>