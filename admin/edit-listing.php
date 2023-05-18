<?php
include_once("header_dashboard.php");
if(isset($_GET['id'])){
    $select = "select * from listings where id='".$_GET['id']."'";
    $q_run =  mysqli_query($con,$select);
    if(mysqli_num_rows($q_run)>0){
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
              <div class="col-lg-12 mb50">
                <div class="breadcrumb_content">
                  <h2 class="breadcrumb_title">Edit Listing</h2>
                  <p>Ready to jump back in?</p>
                </div>
              </div>
						</div>
					</div>
          <div class="row">
            <div class="col-lg-12">
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
              <div class="new_property_form">
                <h4 class="title mb30">Additional</h4>
                <form class="contact_form" name="contact_form" action="controlling.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="cmd" value="create_listing" />
                    <?php
                    if(isset($_SESSION['user_id'])){
                    ?>
                    <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
                    <?php
                    }
                    if(isset($data['id']) && $data['id']!=""){
                        ?>
                            <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                        <?php
                    }
                    ?>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb20">
                        <label class="form-label">Listing Title</label>
                        <input class="form-control form_control" name="listing_title" type="text" value="<?php echo DBout($data['listing_title']); ?>" placeholder="Title">
                      </div>
                    </div>
                                          <?php if(isset($data['listing_type']) && $data['listing_type']==2){?>

                      <div class="col-sm-6 col-md-4">
                      <div class="mb20">
                        <label class="form-label">Service  Type</label>
                        <?php
$services_types = array('Automobile Maintenance', 'Carwash/Detailing', 'Automobile Spare Parts', 'Boat Maintenance', 'Boating Spare Parts', 'Propeller Repair', 'Fiberglass/Gelcoat Repair', 'Bike Maintenance', 'Painting', 'Island Tinting Services','Wheels and Tires', 'Stereo', 'Graphics/Signage/Flags', 'Tires', 'Fuel Stations', 'Chrome Plating / Laser Cleaning /Powder Coating', 'Mobile Tire Repair', 'Towing Services');
?>
       <select class="selectpicker_11" name="accessory_type" data-live-search="true" data-width="100%">
  <option>Select</option>
  <?php foreach ($services_types as $service_type) {
    if ($service_type == $data['service_type']) {
      echo '<option data-tokens="' . $service_type . '" selected>' . $service_type . '</option>';
    } else {
      echo '<option data-tokens="' . $service_type . '">' . $service_type . '</option>';
    }
  } ?>
</select>

                      </div>
                    </div>
<?php }?>

 <?php if(isset($data['listing_type']) && $data['listing_type']==1){?>

                      <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Accessory Type</label>
                        <?php
$accessory_types = array('Cars','Bikes','Trucks','Boats','Motorsports');
?>
                       <select class="selectpicker_10" name="accessory_type" data-live-search="true" data-width="100%">
   <option>Select</option>
  <?php foreach ($accessory_types as $accessory_type) {
    if ($accessory_type == $data['accessory_type']) {
      echo '<option data-tokens="' . $accessory_type . '" selected>' . $accessory_type . '</option>';
    } else {
      echo '<option data-tokens="' . $accessory_type . '">' . $accessory_type . '</option>';
    }
  } ?>
  </select>
                      </div>
                    </div>
<?php }?>
                      <?php if(isset($data['listing_type']) && $data['listing_type']!=2 && $data['listing_type']!=1){?>
            
            
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Condition</label>
                        <select class="selectpicker_1" name="listing_condition" data-live-search="true" data-width="100%">
                          <option value="0">Select</option>
                          <option data-tokens="Used" >Used</option>
                          <option data-tokens="New" >New</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Category</label>
                        <select class="selectpicker_2" name="category_id" data-live-search="true" data-width="100%">
                          <option value="0">Select</option>
                          <?php
                          $select = "select * from categories  order by title asc ";
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
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Make</label>
                        <select class="selectpicker_3" name="maker_id" data-live-search="true" data-width="100%">
                          <option value="0">Select</option>
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
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Model</label>
                        <select class="selectpicker_4" name="model_id" data-live-search="true" data-width="100%">
                          <option value="0">Select</option>
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
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Body Type</label>
                        <select class="selectpicker_5" name="body_type_id" data-live-search="true" data-width="100%">
                          <option value="0">Select</option>
                            <?php
                          $select = "select * from body_type  order by title asc ";
                           // $select = "select * from models order by title asc";
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
                    <div class="col-sm-6 col-md-4">
                      <div class="mb20">
                        <label class="form-label">Price ($)</label>
                        <input name="price" class="form-control form_control" value="<?php echo $data['price']; ?>" type="text" placeholder="150">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Year</label>
                        <select class="selectpicker_6" name="model_year" data-live-search="true" data-width="100%">
                          <option data-tokens="Year">Year</option>
                          <?php
                            for($i=date('Y'); $i>1989; $i--){
                                echo "<option data-tokens='$i'>$i</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                 
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Transmission</label>
                        <select class="selectpicker_7" name="transmission" data-live-search="true" data-width="100%">
                          <option>Select</option>
                          <option data-tokens="Autometic">Autometic</option>
                          <option data-tokens="Manual">Manual</option>
                        </select>
                      </div>
                    </div>
                  
                    <div class="col-sm-6 col-md-4">
                      <div class="mb20">
                        <label class="form-label">Mileage</label>
                        <input name="mileage" class="form-control form_control" value="<?php echo $data['mileage']; ?>" type="number" placeholder="100">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="mb20">
                        <label class="form-label">Engine Size</label>
                        <input name="engine_size"  class="form-control form_control" value="<?php echo $data['engine_size']; ?>" type="text" placeholder="1000cc">
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Cylinders</label>
                        <select class="selectpicker_8" name="cylinders" data-live-search="true" data-width="100%">
                          <option>Select</option>
                          <option data-tokens="4">4</option>
                          <option data-tokens="6">6</option>
                          <option data-tokens="8">8</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Color</label>
                        <select class="selectpicker_9" name="color" data-live-search="true" data-width="100%">
                          <option>Select</option>
                          <option data-tokens="Black">Black</option>
                          <option data-tokens="Beige">Beige</option>
                          <option data-tokens="Brown">Brown</option>
                          <option data-tokens="Grey">Grey</option>
                          <option data-tokens="Silver">Silver</option>
                          <option data-tokens="Red">Red</option>
                          <option data-tokens="White">White</option>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-4">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">City</label>
                        <select name="city_id" class="selectpicker_10" data-live-search="true" data-width="100%">
                          <option value="0">Select</option>
                           <?php
                          $select = "select * from cities  order by city_name asc ";
                           // $select = "select * from models order by title asc";
                            $q_run =  mysqli_query($con,$select);
                            if(mysqli_num_rows($q_run)>0){
                                while($data_cat =  mysqli_fetch_assoc($q_run)){
                                        echo "<option value='".$data_cat['id']."' >".DBout($data_cat['city_name'])."</option>";
                                    }
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class="col-sm-6 col-md-8">
                      <div class="ui_kit_select_search add_new_property mb20">
                        <label class="form-label">Address</label>
                      
                        <input class="form-control form_control" value="<?php echo $data['address']; ?>" name="address" type="text" placeholder="Address">
                      </div>
                    </div>
                    <div class="col-md-12">
                      <div class="mb20">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="10" placeholder="Description"><?php echo $data['description']; ?></textarea>
                      </div>
                    </div>
                    
                    <div class="col-md-12">
                      <div class="mb20">
                        <label class="form-label">Features</label><br />
                        <div class="row">
                            <div class="col-md-3">
                        
                        <?php
                        
                            $features_val = array();
                            if($data['features']!=""){
                                $features_val =  json_decode($data['features'],true);
                            }
                            
                            $features = array("ABS","Air Bag","Air Conditioner","Alloy Rims","Back Camera","CD Player","Cassette Player","Cool Box","Cruise Control","DVD Player");
                            echo "<ul class='feature_list'>";
                            foreach($features as $key=>$val){
                                if(in_array($val,$features_val)){
                                    echo "<li><input type='checkbox'  checked='checked' name='features[]' value='$val' /> ".$val." </li>";
                                }else{
                                    echo "<li><input type='checkbox' name='features[]' value='$val' /> ".$val." </li>";
                                }
                            }
                            echo "</ul>";
                        ?> 
                            </div>
                             <div class="col-md-3">
                        
                        <?php
                            $features = array("AM/FM Radio","Immobilizer Key","Keyless Entry","Navigation","Power Locks","Power Mirrors","Power Steering","Power Windows","Sun Roof");
                            echo "<ul class='feature_list'>";
                            foreach($features as $key=>$val){
                                if(in_array($val,$features_val)){
                                    echo "<li><input type='checkbox'  checked='checked' name='features[]' value='$val' /> ".$val." </li>";
                                }else{
                                    echo "<li><input type='checkbox' name='features[]' value='$val' /> ".$val." </li>";
                                }
                            }
                            echo "</ul>";
                        ?> 
                            </div>
                        </div>
                      </div>
                    </div>
                                        <?php }?>


                    <div class="row">
                        <div class="container">
                                <fieldset class="form-group">
                                    <a class="btn btn-primary ad_flor_btn" href="javascript:void(0)" onclick="$('#pro-image').click()">Upload Image</a>
                                    <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control" multiple>
                                </fieldset>
                                <div class="preview-images-zone">
                                    <?php
                                        $images_url = json_decode($data['images_url']);
                                        foreach($images_url as $key=>$val){
                                            ?>
                                            <div class="preview-image preview-show-<?php echo $key; ?>">
                                                <div class="image-cancel" data-no="<?php echo $key; ?>">x</div>
                                                <div class="image-zone"><img id="pro-img-<?php echo $key; ?>" src="<?php echo getServerURL(); ?>listing_images/<?php echo $val; ?>"/></div>
                                                <div class="tools-edit-image"><a href="javascript:void(0)" data-no="<?php echo $key; ?>" class="btn btn-light btn-edit-image">edit</a></div>
                                                <input type="hidden" name="exist_images_url[]" value="<?php echo $val; ?>" />
                                            </div>
                                            <?php
                                        }
                                    ?>
                                </div>
                            </div>
                        
                      </div>
                      <?php
                      if(isset($_SESSION['type']) && $_SESSION['type']==1){
                      ?>
                    <div class="row">
                       <div class="col-lg-12">
                         <div class="ui_kit_select_search add_new_property mb20">
                            <label class="form-label">Verification Sheet:</label>
                          
                            
                            <input type="file" class="form-control" name="veri_file" />
                          </div>
                       </div>
                    </div>
                    <?php
                        }
                    
                    ?>
                    <div class="row">
                       <div class="col-lg-12">
                        Want to featured this Listing? : <?php if($data['want_featured'] == 1) { echo "Yes"; }else{ echo "No"; } ?>
                       </div>
                    </div>
                    <div class="col-md-12" style="padding-top: 30px;">
                        <?php
                        if($data['want_featured'] == 1) {
                            echo '<a data-bs-toggle="modal" data-bs-target="#exampleModal" class="btn btn-thm ad_flor_btn">View Card Details</a>';
                        }
                        ?>
                        <input type="submit" value="Save Listing" class="btn btn-thm ad_flor_btn" />

                    </div>
                    
                    
                                    <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Card Details</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       <div class="row">
                    <table class="table" style="border: 1px">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Card Number</th>
                          <th scope="col">Expiry</th>
                          <th scope="col">Security Code</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td><?php echo $data['name']; ?></td>
                            <td><?php echo convert_uudecode($data['cardNumber']); ?></td>
                            <td><?php echo $data['expiry']; ?></td>
                            <td><?php echo convert_uudecode($data['securityCode']); ?></td>
                    
                        </tr>
                      </tbody>
                    </table>
                  </div>
                  
                </form>
                 
              </div>
            </div>
          </div>
				</div>
			</div>
		</div>
	</section>
    <!--
    
    <div class="preview-image preview-show-1">
                                    <div class="image-cancel" data-no="1">x</div>
                                    <div class="image-zone"><img id="pro-img-1" src="https://img.purch.com/w/660/aHR0cDovL3d3dy5saXZlc2NpZW5jZS5jb20vaW1hZ2VzL2kvMDAwLzA5Ny85NTkvb3JpZ2luYWwvc2h1dHRlcnN0b2NrXzYzOTcxNjY1LmpwZw=="></div>
                                    <div class="tools-edit-image"><a href="javascript:void(0)" data-no="1" class="btn btn-light btn-edit-image">edit</a></div>
                                </div>
    -->
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<style>
.preview-images-zone {
    width: 100%;
    border: 1px solid #ddd;
    min-height: 180px;
    /* display: flex; */
    padding: 5px 5px 0px 5px;
    position: relative;
    overflow:auto;
}
.preview-images-zone > .preview-image:first-child {
    height: 185px;
    width: 185px;
    position: relative;
    margin-right: 5px;
}
.preview-images-zone > .preview-image {
    height: 90px;
    width: 90px;
    position: relative;
    margin-right: 5px;
    float: left;
    margin-bottom: 5px;
}
.preview-images-zone > .preview-image > .image-zone {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .image-zone > img {
    width: 100%;
    height: 100%;
}
.preview-images-zone > .preview-image > .tools-edit-image {
    position: absolute;
    z-index: 100;
    color: #fff;
    bottom: 0;
    width: 100%;
    text-align: center;
    margin-bottom: 10px;
    display: none;
}
.preview-images-zone > .preview-image > .image-cancel {
    font-size: 18px;
    position: absolute;
    top: 0;
    right: 0;
    font-weight: bold;
    margin-right: 10px;
    cursor: pointer;
    display: none;
    z-index: 100;
}
.preview-image:hover > .image-zone {
    cursor: move;
    opacity: .5;
}
.preview-image:hover > .tools-edit-image,
.preview-image:hover > .image-cancel {
    display: block;
}
.ui-sortable-helper {
    width: 90px !important;
    height: 90px !important;
}

.container {
    padding-top: 50px;
}
</style>
<?php
 include_once("footer.php");
?>
<script>
$(document).ready(function() {
    $('.selectpicker_1').selectpicker();
    $('.selectpicker_1').selectpicker('val', '<?php echo $data['listing_condition']; ?>');
    /** category_id **/
    $('.selectpicker_2').selectpicker();
    $('.selectpicker_2').selectpicker('val', '<?php echo $data['category_id']; ?>');
    /** maker_id **/
    $('.selectpicker_3').selectpicker();
    $('.selectpicker_3').selectpicker('val', '<?php echo $data['maker_id']; ?>');
    /** model_id **/
    $('.selectpicker_4').selectpicker();
    $('.selectpicker_4').selectpicker('val', '<?php echo $data['model_id']; ?>');
    /** body_type_id **/
    $('.selectpicker_5').selectpicker();
    $('.selectpicker_5').selectpicker('val', '<?php echo $data['body_type_id']; ?>');
    /** model_year **/
    $('.selectpicker_6').selectpicker();
    $('.selectpicker_6').selectpicker('val', '<?php echo $data['model_year']; ?>');
    /** transmission **/
    $('.selectpicker_7').selectpicker();
    $('.selectpicker_7').selectpicker('val', '<?php echo $data['transmission']; ?>');
    /** cylinders **/
    $('.selectpicker_8').selectpicker();
    $('.selectpicker_8').selectpicker('val', '<?php echo $data['cylinders']; ?>');
    /** color **/
    $('.selectpicker_9').selectpicker();
    $('.selectpicker_9').selectpicker('val', '<?php echo $data['color']; ?>');
    /** city_id **/
    $('.selectpicker_10').selectpicker();
    $('.selectpicker_10').selectpicker('val', '<?php echo $data['city_id']; ?>');
    
    
    document.getElementById('pro-image').addEventListener('change', readImage, false);
    $( ".preview-images-zone" ).sortable();
    
    $(document).on('click', '.image-cancel', function() {
        let no = $(this).data('no');
        $(".preview-image.preview-show-"+no).remove();
    });
});



var num = 15;
function readImage() {
    if (window.File && window.FileList && window.FileReader) {
        var files = event.target.files; //FileList object
        var output = $(".preview-images-zone");
        for (let i = 0; i < files.length; i++) {
            var file = files[i];
            if (!file.type.match('image')) continue;
            var picReader = new FileReader();
            picReader.addEventListener('load', function (event) {
                var picFile = event.target;
                var html =  '<div class="preview-image preview-show-' + num + '">' +
                            '<div class="image-cancel" data-no="' + num + '">x</div>' +
                            '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
                            '<input type="hidden" name="images_url[]" value="'+picFile.result+'" />' +
                            '</div>';

                output.append(html);
                num = num + 1;
            });

            picReader.readAsDataURL(file);
        }
        $("#pro-image").val('');
    } else {
        console.log('Browser not support');
    }
}
</script>
<?php
    }else{
        header("Location:my_listings.php");    
    }
}else{
    header("Location:my_listings.php");
}
?>