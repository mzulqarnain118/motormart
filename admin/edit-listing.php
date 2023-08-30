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
              <form class="contact_form" name="contact_form" action="controlling.php" method="post"
                enctype="multipart/form-data">
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
                  <div class="col-md-12" id="title-id-block">
                    <div class="mb20">
                      <label class="form-label">Listing Title</label>
                      <input class="form-control form_control" name="listing_title" type="text"
                        value="<?php echo DBout($data['listing_title']); ?>" placeholder="Title">
                    </div>
                  </div>
                  <?php if(isset($data['listing_type']) && $data['listing_type']==2){?>

                  <div class="col-sm-6 col-md-4">
                    <div class="mb20">
                      <label class="form-label">Service Type</label>
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
                      <select class="selectpicker_1" name="listing_condition" onchange="select_cat_by_cond(this.value)" data-live-search="true" data-width="100%">
                        <option value="0">Select</option>
                        <option data-tokens="Used">Used</option>
                        <option data-tokens="New">New</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Category</label>
                      <select class="selectpicker_2" name="category_id" onchange="category_select(this.value)" data-live-search="true" data-width="100%">
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
                  <div class="col-sm-6 col-md-4" id="dealership_id_block">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Dealership</label>
                      <select class="selectpicker_12" name="dealership_id" data-live-search="true" data-width="100%">
                        <option value="0">Select</option>
                        <?php
                          $select = "select * from dealerships  order by title asc ";
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
                    <div class="col-sm-6 col-md-4" id="fuel_type_block">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Fuel Type</label>
                      <select class="form-control selectpicker_13" name="feulType" onchange="fuel_type_select(this.value)"
                        style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;">
                        <option value="">Select</option>
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

                  <div class="col-sm-6 col-md-4" id="seats_id_block">
                    <div class="mb20">
                      <label class="form-label">Number of Seats</label>
                      <input name="seats" class="form-control form_control" type="number" placeholder="5" value="<?php echo $data['seats']; ?>">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4" id="doors_id_block">
                    <div class="mb20">
                      <label class="form-label">Number of Doors</label>
                      <input name="doors" class="form-control form_control" type="number" value="<?php echo $data['doors']; ?>">
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
                      <input name="price" class="form-control form_control" value="<?php echo $data['price']; ?>"
                        type="text" placeholder="150">
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
                        <option data-tokens="Automatic">Automatic</option>
                        <option data-tokens="Manual">Manual</option>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4">
                    <div class="mb20">
                      <label class="form-label">Mileage</label>
                      <input name="mileage" class="form-control form_control" value="<?php echo $data['mileage']; ?>"
                        type="number" placeholder="100">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="mb20">
                      <label class="form-label">Engine Size</label>
                      <input name="engine_size" class="form-control form_control"
                        value="<?php echo $data['engine_size']; ?>" type="text" placeholder="1000cc">
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

                      <input class="form-control form_control" value="<?php echo $data['address']; ?>" name="address"
                        type="text" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb20">
                      <label class="form-label">Description</label>
                      <textarea name="description" class="form-control" rows="10"
                        placeholder="Description"><?php echo $data['description']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="RunningCost">
                    <div class="mb20">
                      <label class="form-label">Running Cost</label>
                      <textarea name="RunningCost" class="form-control" rows="10"
                        placeholder="Running Cost"><?php echo $data['RunningCost']; ?></textarea>
                    </div>
                  </div>

                  <div class="col-md-12" id="Performance">
                    <div class="mb20">
                      <label class="form-label">Performance</label>
                      <textarea name="Performance" class="form-control" rows="10"
                        placeholder="Performance"><?php echo $data['Performance']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Safety">
                    <div class="mb20">
                      <label class="form-label">Safety</label>
                      <textarea name="Safety" class="form-control" rows="10"
                        placeholder="Safety"><?php echo $data['Safety']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Interior">
                    <div class="mb20">
                      <label class="form-label">Interior</label>
                      <textarea name="Interior" class="form-control" rows="10"
                        placeholder="Interior"><?php echo $data['Interior']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Features">
                    <div class="mb20">
                      <label class="form-label">Features</label>
                      <textarea name="Features" class="form-control" rows="10"
                        placeholder="Features"><?php echo $data['Features']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Reliability">
                    <div class="mb20">
                      <label class="form-label">Reliability</label>
                      <textarea name="Reliability" class="form-control" rows="10"
                        placeholder="Reliability"><?php echo $data['Reliability']; ?></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="ratings_id_block">
                    <div class="mb20">
                      <label class="form-label">Ratings</label>
                      <input class="form-control form_control" name="ReviewRatings" type="text"
                        value="<?php echo $data['ReviewRatings']; ?>" placeholder="Ratings">
                    </div>
                  </div>

                  <div id="faq-container">
                    <label class="form-label">FAQS</label>

                    <div class="faq-form row d-flex align-items-center">
                      <div class="col-sm-5 col-md-5">
                        <input class="form-control form_control" type="text" name="questions[]"
                          value="<?php echo $data['questions[]']; ?>" placeholder="Enter question">
                      </div>
                      <div class="col-sm-5 col-md-5">
                        <input class="form-control form_control" type="text" name="answers[]" placeholder="Enter answer"
                          value="<?php echo $data['answers[]']; ?>">
                      </div>
                      <div class="col-sm-2 col-md-2">
                        <button type="button" onclick="addFAQ()">+</button>
                        <button onclick="removeFAQ(this)">-</button>
                      </div>
                    </div>
                  </div>

                  <div id="audioSE-container">
                    <label class="form-label">Audio and Communications</label>

                    <div class="faq-form row d-flex align-items-center">
                      <div class="col-sm-10 col-md-10">
                        <input class="form-control form_control" type="text" name="audioSE[]"
                          placeholder="Enter Audio and Communications">
                      </div>

                      <div class="col-sm-2 col-md-2">
                        <button type="button" onclick="add_audioSE()">+</button>
                        <button onclick="remove_audioSE(this)">-</button>
                      </div>
                    </div>
                  </div>
                  <div id="SE-Sections">
                    <!-- Exterior Section -->
                    <div id="exterior-container">
                      <label class="form-label">Exterior</label>

                      <div class="faq-form row d-flex align-items-center">
                        <div class="col-sm-10 col-md-10">
                          <input class="form-control form_control" type="text" name="exterior[]"
                            placeholder="Enter Exterior">
                        </div>

                        <div class="col-sm-2 col-md-2">
                          <button type="button" onclick="add_exterior()">+</button>
                          <button onclick="remove_exterior(this)">-</button>
                        </div>
                      </div>
                    </div>

                    <!-- Interior Section -->
                    <div id="interior-container">
                      <label class="form-label">Interior</label>

                      <div class="faq-form row d-flex align-items-center">
                        <div class="col-sm-10 col-md-10">
                          <input class="form-control form_control" type="text" name="interiorSE[]"
                            placeholder="Enter Interior">
                        </div>

                        <div class="col-sm-2 col-md-2">
                          <button type="button" onclick="add_interior()">+</button>
                          <button onclick="remove_interior(this)">-</button>
                        </div>
                      </div>
                    </div>

                    <!-- Illumination Section -->
                    <div id="illumination-container">
                      <label class="form-label">Illumination</label>

                      <div class="faq-form row d-flex align-items-center">
                        <div class="col-sm-10 col-md-10">
                          <input class="form-control form_control" type="text" name="illumination[]"
                            placeholder="Enter Illumination">
                        </div>

                        <div class="col-sm-2 col-md-2">
                          <button type="button" onclick="add_illumination()">+</button>
                          <button onclick="remove_illumination(this)">-</button>
                        </div>
                      </div>
                    </div>

                    <!-- Driver Assistance Section -->
                    <div id="driver-assistance-container">
                      <label class="form-label">Driver Assistance</label>

                      <div class="faq-form row d-flex align-items-center">
                        <div class="col-sm-10 col-md-10">
                          <input class="form-control form_control" type="text" name="driverAssistance[]"
                            placeholder="Enter Driver Assistance">
                        </div>

                        <div class="col-sm-2 col-md-2">
                          <button type="button" onclick="add_driverAssistance()">+</button>
                          <button onclick="remove_driverAssistance(this)">-</button>
                        </div>
                      </div>
                    </div>

                    <!-- Performance Section -->
                    <div id="performance-container">
                      <label class="form-label">Performance</label>

                      <div class="faq-form row d-flex align-items-center">
                        <div class="col-sm-10 col-md-10">
                          <input class="form-control form_control" type="text" name="performanceSE[]"
                            placeholder="Enter Performance">
                        </div>

                        <div class="col-sm-2 col-md-2">
                          <button type="button" onclick="add_performance()">+</button>
                          <button onclick="remove_performance(this)">-</button>
                        </div>
                      </div>
                    </div>

                    <!-- Safety and Security Section -->
                    <div id="safety-security-container">
                      <label class="form-label">Safety and Security</label>

                      <div class="faq-form row d-flex align-items-center">
                        <div class="col-sm-10 col-md-10">
                          <input class="form-control form_control" type="text" name="safetySecurity[]"
                            placeholder="Enter Safety and Security">
                        </div>

                        <div class="col-sm-2 col-md-2">
                          <button type="button" onclick="add_safetySecurity()">+</button>
                          <button onclick="remove_safetySecurity(this)">-</button>
                        </div>
                      </div>
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
                        <a class="btn btn-primary ad_flor_btn" href="javascript:void(0)"
                          onclick="$('#pro-image').click()">Upload Image</a>
                        <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control"
                          multiple>
                      </fieldset>
                      <div class="preview-images-zone">
                        <?php
                                        $images_url = json_decode($data['images_url']);
                                        foreach($images_url as $key=>$val){
                                            ?>
                        <div class="preview-image preview-show-<?php echo $key; ?>">
                          <div class="image-cancel" data-no="<?php echo $key; ?>">x</div>
                          <div class="image-zone"><img id="pro-img-<?php echo $key; ?>"
                              src="<?php echo getServerURL(); ?>listing_images/<?php echo $val; ?>" /></div>
                          <div class="tools-edit-image"><a href="javascript:void(0)" data-no="<?php echo $key; ?>"
                              class="btn btn-light btn-edit-image">edit</a></div>
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
                      Want to featured this Listing? :
                      <?php if($data['want_featured'] == 1) { echo "Yes"; }else{ echo "No"; } ?>
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
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
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
  overflow: auto;
}

.preview-images-zone>.preview-image:first-child {
  height: 185px;
  width: 185px;
  position: relative;
  margin-right: 5px;
}

.preview-images-zone>.preview-image {
  height: 90px;
  width: 90px;
  position: relative;
  margin-right: 5px;
  float: left;
  margin-bottom: 5px;
}

.preview-images-zone>.preview-image>.image-zone {
  width: 100%;
  height: 100%;
}

.preview-images-zone>.preview-image>.image-zone>img {
  width: 100%;
  height: 100%;
}

.preview-images-zone>.preview-image>.tools-edit-image {
  position: absolute;
  z-index: 100;
  color: #fff;
  bottom: 0;
  width: 100%;
  text-align: center;
  margin-bottom: 10px;
  display: none;
}

.preview-images-zone>.preview-image>.image-cancel {
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

.preview-image:hover>.image-zone {
  cursor: move;
  opacity: .5;
}

.preview-image:hover>.tools-edit-image,
.preview-image:hover>.image-cancel {
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


  $("#Features").hide();
  $('.selectpicker_1').selectpicker();
  $('.selectpicker_1').selectpicker('val', '<?php echo $data['listing_condition']; ?>');

    // Check the listing condition and show/hide elements accordingly
  var listingCondition = '<?php echo $data['listing_condition']; ?>';
  if (listingCondition === 'Used') {
  $('#dealership_id_block').hide();
  $('#fuel_type_block').hide();
  $('#seats_id_block').hide();
  $('#doors_id_block').hide();
  $("#RunningCost").hide();
  $("#Performance").hide();
  $("#Safety").hide();
  $("#Interior").hide();
  $("#Reliability").hide();
  $("#ratings_id_block").hide();
  $("#faqs_id_block").hide();
  $("#faq-container").hide();
  $("#audioSE-container").hide();
  $("#SE-Sections").hide();
  } else {
     $('#dealership_id_block').show();
  $('#fuel_type_block').show();
  $('#seats_id_block').show();
  $('#doors_id_block').show();
  $("#RunningCost").show();
  $("#Performance").show();
  $("#Safety").show();
  $("#Interior").show();
  $("#Reliability").show();
  $("#ratings_id_block").show();
  $("#faqs_id_block").show();
  $("#faq-container").show();
  $("#audioSE-container").show();
  $("#SE-Sections").show();
  $("#title-id-block").hide();
  }
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

  /** dealership_id **/
  $('.selectpicker_12').selectpicker();
  $('.selectpicker_12').selectpicker('val', '<?php echo $data['dealership_id']; ?>');

    /** dealership_id **/
  $('.selectpicker_13').selectpicker();
  $('.selectpicker_13').selectpicker('val', '<?php echo $data['feulType']; ?>');

  document.getElementById('pro-image').addEventListener('change', readImage, false);
  $(".preview-images-zone").sortable();

  $(document).on('click', '.image-cancel', function() {
    let no = $(this).data('no');
    $(".preview-image.preview-show-" + no).remove();
  });
});

function addFAQ() {
  const faqContainer = document.getElementById("faq-container");

  const faqForm = document.createElement("div");
  faqForm.classList.add("faq-form", "row", "d-flex", "align-items-center");

  const questionInputDiv = document.createElement("div");
  questionInputDiv.classList.add("col-sm-5", "col-md-5");

  const questionInput = document.createElement("input");
  questionInput.classList.add("form-control", "form_control");
  questionInput.type = "text";
  questionInput.name = "questions[]";
  questionInput.placeholder = "Enter question";

  questionInputDiv.appendChild(questionInput);

  const answerInputDiv = document.createElement("div");
  answerInputDiv.classList.add("col-sm-5", "col-md-5");

  const answerInput = document.createElement("input");
  answerInput.classList.add("form-control", "form_control");
  answerInput.type = "text";
  answerInput.name = "answers[]";
  answerInput.placeholder = "Enter answer";

  answerInputDiv.appendChild(answerInput);

  const buttonDiv = document.createElement("div");
  buttonDiv.classList.add("col-sm-2", "col-md-2");

  const removeBtn = document.createElement("button");
  removeBtn.type = "button";
  removeBtn.innerText = "-";
  removeBtn.onclick = function() {
    removeFAQ(this);
  };

  buttonDiv.appendChild(removeBtn);

  faqForm.appendChild(questionInputDiv);
  faqForm.appendChild(answerInputDiv);
  faqForm.appendChild(buttonDiv);

  faqContainer.appendChild(faqForm);
}

function removeFAQ(btn) {
  const faqForm = btn.parentNode.parentNode;
  const faqContainer = faqForm.parentNode;
  faqContainer.removeChild(faqForm);
}

function add_audioSE() {
  var container = document.getElementById("audioSE-container");

  var faqForm = document.createElement("div");
  faqForm.className = "faq-form row d-flex align-items-center";

  var inputWrapper = document.createElement("div");
  inputWrapper.className = "col-sm-10 col-md-10";

  var input = document.createElement("input");
  input.className = "form-control form_control";
  input.type = "text";
  input.name = "audioSE[]";
  input.placeholder = "Enter Audio and Communications";

  inputWrapper.appendChild(input);

  var buttonWrapper = document.createElement("div");
  buttonWrapper.className = "col-sm-2 col-md-2";

  var addButton = document.createElement("button");
  addButton.type = "button";
  addButton.innerHTML = "+";
  addButton.onclick = function() {
    add_audioSE();
  };

  var removeButton = document.createElement("button");
  removeButton.type = "button";
  removeButton.innerHTML = "-";
  removeButton.onclick = function() {
    remove_audioSE(this);
  };

  buttonWrapper.appendChild(addButton);
  buttonWrapper.appendChild(removeButton);

  faqForm.appendChild(inputWrapper);
  faqForm.appendChild(buttonWrapper);

  container.appendChild(faqForm);
}

function remove_audioSE(button) {
  var faqForm = button.parentNode.parentNode;
  var container = faqForm.parentNode;

  container.removeChild(faqForm);
}

// Add functions for each section

function add_exterior() {
  var container = document.getElementById("exterior-container");
  addSection(container, "exterior[]", "Enter Exterior");
}

function add_interior() {
  var container = document.getElementById("interior-container");
  addSection(container, "interiorSE[]", "Enter Interior");
}

function add_illumination() {
  var container = document.getElementById("illumination-container");
  addSection(container, "illumination[]", "Enter Illumination");
}

function add_driverAssistance() {
  var container = document.getElementById("driver-assistance-container");
  addSection(container, "driverAssistance[]", "Enter Driver Assistance");
}

function add_performance() {
  var container = document.getElementById("performance-container");
  addSection(container, "performanceSE[]", "Enter Performance");
}

function add_safetySecurity() {
  var container = document.getElementById("safety-security-container");
  addSection(container, "safetySecurity[]", "Enter Safety and Security");
}

// Common function to add sections dynamically

function addSection(container, name, placeholder) {
  var faqForm = document.createElement("div");
  faqForm.className = "faq-form row d-flex align-items-center";

  var inputWrapper = document.createElement("div");
  inputWrapper.className = "col-sm-10 col-md-10";

  var input = document.createElement("input");
  input.className = "form-control form_control";
  input.type = "text";
  input.name = name;
  input.placeholder = placeholder;

  inputWrapper.appendChild(input);

  var buttonWrapper = document.createElement("div");
  buttonWrapper.className = "col-sm-2 col-md-2";

  var addButton = document.createElement("button");
  addButton.type = "button";
  addButton.innerHTML = "+";
  addButton.onclick = function() {
    addSection(container, name, placeholder);
  };

  var removeButton = document.createElement("button");
  removeButton.type = "button";
  removeButton.innerHTML = "-";
  removeButton.onclick = function() {
    removeSection(this);
  };

  buttonWrapper.appendChild(addButton);
  buttonWrapper.appendChild(removeButton);

  faqForm.appendChild(inputWrapper);
  faqForm.appendChild(buttonWrapper);

  container.appendChild(faqForm);
}

// Remove functions for each section

function remove_exterior(button) {
  removeSection(button);
}

function remove_interior(button) {
  removeSection(button);
}

function remove_illumination(button) {
  removeSection(button);
}

function remove_driverAssistance(button) {
  removeSection(button);
}

function remove_performance(button) {
  removeSection(button);
}

function remove_safetySecurity(button) {
  removeSection(button);
}

// Common function to remove sections

function removeSection(button) {
  var faqForm = button.parentNode.parentNode;
  var container = faqForm.parentNode;

  container.removeChild(faqForm);
}

function select_cat_by_cond(id) {
  if (id != 0) {
    $('#category_id').val(0);
    //$('#category_id_block .categories').hide();
    if (id == "Used") {
      $("#RunningCost").hide();
      $("#Performance").hide();
      $("#Safety").hide();
      $("#Interior").hide();
      $("#Reliability").hide();
      $("#ratings_id_block").hide();
      $("#faqs_id_block").hide();
      $("#faq-container").hide();
      $("#audioSE-container").hide();
      $("#SE-Sections").hide();

      $("#Features").hide();
      $('#title-id-block').show();
      $('#mileage').show();
      $('#dealership_id_block').hide();
      $('#fuel_type_block').hide();
      $('#seats_id_block').hide();
      $('#doors_id_block').hide();
      $('#category_id_block .cat_New').hide();
      $('#category_id_block .cat_' + id).show();
      <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != 1) { ?>
      $('#usedCarListing').show();
      $('#alert_message').hide();

      <?php } ?>
    } else if (id == "New") {
      $('#title-id-block').hide();
      $('#dealership_id_block').show();
      $('#mileage').hide();
      $('#fuel_type_block').show();
      $('#seats_id_block').show();
      $("#RunningCost").show();
      $("#Performance").show();
      $("#Safety").show();
      $("#Interior").show();
      $("#Reliability").show();
      $("#ratings_id_block").show();
      $("#faq-container").show();
      $("#audioSE-container").show();
      $("#SE-Sections").show();


      $("#Features").show();

      $('#doors_id_block').show();
      $('#category_id_block .cat_Used').hide();
      $('#category_id_block .cat_' + id).show();
      <?php if(isset($_SESSION['user_id']) && $_SESSION['user_id'] != 1) { ?>
      $('#usedCarListing').hide();
      $('#alert_message').show();

      <?php } ?>
    }
  }
}

function category_select(id) {
  if (id == 9 || id == 10 || id == 11 || id == 12) {
    $('#body_type_id').hide();
  } else if (id == 24) {
       $("#RunningCost").hide();
      $("#Performance").hide();
      $("#Safety").hide();
      $("#Interior").hide();
      $("#Reliability").hide();
      $("#ratings_id_block").hide();
      $("#faqs_id_block").hide();
      $("#faq-container").hide();
      $("#audioSE-container").hide();
      $("#SE-Sections").hide();
         $('#seats_id_block').hide();
      $('#doors_id_block').hide();
      $('#cylinders-id-block').hide();
             

  }else {
    $('#body_type_id').show();
  }
}
function fuel_type_select(id) {
  if (id == "Electric") {
    $('#engine-id-block').hide();
  } else {
    $('#engine-id-block').show();
  }
}
var num = 15;

function readImage() {
  if (window.File && window.FileList && window.FileReader) {
    var files = event.target.files; //FileList object
    var output = $(".preview-images-zone");
    for (let i = 0; i < files.length; i++) {
      var file = files[i];
      if (!file.type.match('image')) continue;
      var picReader = new FileReader();
      picReader.addEventListener('load', function(event) {
        var picFile = event.target;
        var html = '<div class="preview-image preview-show-' + num + '">' +
          '<div class="image-cancel" data-no="' + num + '">x</div>' +
          '<div class="image-zone"><img id="pro-img-' + num + '" src="' + picFile.result + '"></div>' +
          '<input type="hidden" name="images_url[]" value="' + picFile.result + '" />' +
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