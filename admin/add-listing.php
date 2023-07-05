<?php
include_once "header_dashboard.php";
?>
<style>
.message {
  background-color: #ff5858;
  color: #fff;
  padding: 10px;
  border-radius: 4px;
  font-weight: bold;
}

.alert {
  margin-top: 10px;
}

.faq-form {
  margin-bottom: 10px;
}
</style>
<!-- Our Dashbord -->
<section class="our-dashbord dashbord bgc-f9">
  <div class="container-fluid">
    <div class="row">
      <div class="col-xxl-10 offset-xxl-2 dashboard_grid_space">
        <!----INC SIDEBAR------>
        <?php include_once "sidebar.php";?>
        <!-----END INC SIDEBAR----->
        <div class="row">
          <div class="col-xl-8">
            <div class="col-lg-12 mb50">
              <div class="breadcrumb_content">
                <h2 class="breadcrumb_title">Add Listing</h2>
                <p>Ready to jump back in?</p>
              </div>
            </div>
          </div>
        </div>
        <div id="alert_message" class="message alert">This feature is paid. Contact management to use it.</div>

        <div class="row" id="usedCarListing">
          <div class="col-lg-12">
            <?php
if (isset($_SESSION['succes_sc'])) {
    ?>
            <div class="alert alart_style_four alert-dismissible fade show" role="alert">
              <?php echo $_SESSION['succes_sc']; ?>
            </div>
            <?php
unset($_SESSION['succes_sc']);
}
if (isset($_SESSION['error_ocr'])) {
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
if (isset($_SESSION['user_id'])) {
    ?>
                <input type="hidden" name="user_id" value="<?php echo $_SESSION['user_id'] ?>" />
                <?php
}
?>
                <div class="row">
                  <div class="col-md-12" id="title-id-block">
                    <div class="mb20">
                      <label class="form-label">Listing Title</label>
                      <input class="form-control form_control" name="listing_title" type="text" placeholder="Title">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Condition</label>
                      <select class="selectpicker" name="listing_condition" data-live-search="true" data-width="100%"
                        onchange="select_cat_by_cond(this.value)" required>
                        <option value="0">Select</option>
                        <option value="Used" selected>Used</option>
                        <option value="New">New</option>
                      </select>
                    </div>

                  </div>


                  <div class="col-sm-6 col-md-4" id="category_id_block">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label
                        class="form-label">Category<?php echo isset($_POST['listing_condition']) && $_POST['listing_condition']?></label>
                      <!--<select class="selectpicker" name="category_id" id="category_id" data-live-search="true" data-width="100%">-->
                      <select class="form-control" name='category_id' onchange="category_select(this.value)"
                        id="category_id"
                        style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;"
                        required>
                        <option value="0">Select</option>
                        <?php
$select = "select * from categories  order by title asc ";
$q_run = mysqli_query($con, $select);
if (mysqli_num_rows($q_run) > 0) {
    while ($data = mysqli_fetch_assoc($q_run)) {
        if ($data['is_condition'] == "New") {
            echo "<option class='cat_" . $data['is_condition'] . " categories' value='" . $data['id'] . "'>" . DBout($data['title']) . "</option>";
        } else if ($data['is_condition'] == "Used") {
            echo "<option class='cat_" . $data['is_condition'] . " categories' style='display:none' value='" . $data['id'] . "'>" . DBout($data['title']) . "</option>";
        } else {
            echo "<option class='cat_" . $data['is_condition'] . " categories' value='" . $data['id'] . "'>" . DBout($data['title']) . "</option>";
        }
    }
}
?>
                      </select>
                    </div>
                  </div>

                  <div class="col-sm-6 col-md-4" id="dealership_id_block">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Dealership</label>
                      <select class="form-control" name='dealership_id' onchange="dealership_select(this.value)"
                        id="dealership_id"
                        style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;"
                        required>
                        <option value="0">Select</option>
                        <?php
$select = "select * from dealerships  order by title asc ";
$q_run = mysqli_query($con, $select);
if (mysqli_num_rows($q_run) > 0) {
    while ($data = mysqli_fetch_assoc($q_run)) {
        echo "<option value='" . $data['id'] . "'>" . DBout($data['title']) . "</option>";
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4" id="fuel_type_block">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Fuel Type</label>
                      <select class="form-control" name="feulType" onchange="fuel_type_select(this.value)"
                        style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;"
                        required>
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
                      <input name="seats" class="form-control form_control" type="number" placeholder="5" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4" id="doors_id_block">
                    <div class="mb20">
                      <label class="form-label">Number of Doors</label>
                      <input name="doors" class="form-control form_control" type="number" placeholder="4" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Make</label>
                      <select class="selectpicker" name="maker_id" data-live-search="true" data-width="100%"
                        onchange="select_make_by_model(this.value)" required>
                        <option value="0">Select</option>
                        <?php
$select = "select * from makers  order by title asc ";
$q_run = mysqli_query($con, $select);
if (mysqli_num_rows($q_run) > 0) {
    while ($data = mysqli_fetch_assoc($q_run)) {
        echo "<option value='" . $data['id'] . "'>" . DBout($data['title']) . "</option>";
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Model</label>
                      <!--<select class="selectpicker" name="model_id" data-live-search="true" data-width="100%">-->
                      <select class="form-control" name='model_id' id="model_id"
                        style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;"
                        required>
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
                  <div class="col-sm-6 col-md-4" id="body_type_id">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Body Type</label>
                      <select class="selectpicker" name="body_type_id" data-live-search="true" data-width="100%"
                        required>
                        <option value="0">Select</option>
                        <?php
$select = "select * from body_type  order by title asc ";
// $select = "select * from models order by title asc";
$q_run = mysqli_query($con, $select);
if (mysqli_num_rows($q_run) > 0) {
    while ($data = mysqli_fetch_assoc($q_run)) {
        echo "<option value='" . $data['id'] . "' >" . DBout($data['title']) . "</option>";
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="mb20">
                      <label class="form-label">Price ($)</label>
                      <input name="price" class="form-control form_control" type="text" placeholder="150" required>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Year</label>
                      <select class="selectpicker" name="model_year" data-live-search="true" data-width="100%">
                        <option data-tokens="Year">Year</option>
                        <?php
for ($i = date('Y'); $i > 1989; $i--) {
    echo "<option value='$i'>$i</option>";
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Transmission</label>
                      <select class="selectpicker" name="transmission" data-live-search="true" data-width="100%"
                        required>
                        <option>Select</option>
                        <option data-tokens="Autometic">Autometic</option>
                        <option data-tokens="Manual">Manual</option>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4" id="mileage">
                    <div class="mb20">
                      <label class="form-label">Mileage</label>
                      <input name="mileage" class="form-control form_control" type="number" placeholder="100">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4" id="engine-id-block">
                    <div class="mb20">
                      <label class="form-label">Engine Size</label>
                      <input name="engine_size" class="form-control form_control" type="text" placeholder="1000cc">
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4" id="cylinders-id-block">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Cylinders</label>
                      <select class="selectpicker" name="cylinders" data-live-search="true" data-width="100%">
                        <option>Select</option>
                        <?php
for ($i = 1; $i <= 12; $i++) {
    echo "<option data-tokens='$i'>$i</option>";
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-4">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Color</label>
                      <select class="selectpicker" name="color" data-live-search="true" data-width="100%" required>
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
                      <select name="city_id" class="selectpicker" data-live-search="true" data-width="100%">
                        <option value="0">Select</option>
                        <?php
$select = "select * from cities  order by city_name asc ";
// $select = "select * from models order by title asc";
$q_run = mysqli_query($con, $select);
if (mysqli_num_rows($q_run) > 0) {
    while ($data = mysqli_fetch_assoc($q_run)) {
        echo "<option value='" . $data['id'] . "' >" . DBout($data['city_name']) . "</option>";
    }
}
?>
                      </select>
                    </div>
                  </div>
                  <div class="col-sm-6 col-md-8">
                    <div class="ui_kit_select_search add_new_property mb20">
                      <label class="form-label">Address</label>
                      <input class="form-control form_control" name="address" type="text" placeholder="Address">
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="mb20">
                      <label class="form-label">Description</label>
                      <textarea name="description" class="form-control" rows="10" placeholder="Description"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="RunningCost">
                    <div class="mb20">
                      <label class="form-label">Running Cost</label>
                      <textarea name="RunningCost" class="form-control" rows="10" placeholder="Running Cost"></textarea>
                    </div>
                  </div>

                  <div class="col-md-12" id="Performance">
                    <div class="mb20">
                      <label class="form-label">Performance</label>
                      <textarea name="Performance" class="form-control" rows="10" placeholder="Performance"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Safety">
                    <div class="mb20">
                      <label class="form-label">Safety</label>
                      <textarea name="Safety" class="form-control" rows="10" placeholder="Safety"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Interior">
                    <div class="mb20">
                      <label class="form-label">Interior</label>
                      <textarea name="Interior" class="form-control" rows="10" placeholder="Interior"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Features">
                    <div class="mb20">
                      <label class="form-label">Features</label>
                      <textarea name="Features" class="form-control" rows="10" placeholder="Features"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="Reliability">
                    <div class="mb20">
                      <label class="form-label">Reliability</label>
                      <textarea name="Reliability" class="form-control" rows="10" placeholder="Reliability"></textarea>
                    </div>
                  </div>
                  <div class="col-md-12" id="ratings_id_block">
                    <div class="mb20">
                      <label class="form-label">Ratings</label>
                      <input class="form-control form_control" name="ReviewRatings" type="text" placeholder="Ratings">
                    </div>
                  </div>

                  <div id="faq-container">
                    <label class="form-label">FAQS</label>

                    <div class="faq-form row d-flex align-items-center">
                      <div class="col-sm-5 col-md-5">
                        <input class="form-control form_control" type="text" name="questions[]"
                          placeholder="Enter question" required>
                      </div>
                      <div class="col-sm-5 col-md-5">
                        <input class="form-control form_control" type="text" name="answers[]" placeholder="Enter answer"
                          required>
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
                          placeholder="Enter Audio and Communications" required>
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
                            placeholder="Enter Exterior" required>
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
                            placeholder="Enter Interior" required>
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
                            placeholder="Enter Illumination" required>
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
                            placeholder="Enter Driver Assistance" required>
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
                            placeholder="Enter Performance" required>
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
                            placeholder="Enter Safety and Security" required>
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
$features = array("ABS", "Air Bag", "Air Conditioner", "Alloy Rims", "Back Camera", "CD Player", "Cassette Player", "Cool Box", "Cruise Control", "DVD Player");
echo "<ul class='feature_list'>";
foreach ($features as $key => $val) {
    echo "<li><input type='checkbox' name='features[]' value='$val' /> " . $val . " </li>";
}
echo "</ul>";
?>
                        </div>
                        <div class="col-md-3">
                          <?php
$features = array("AM/FM Radio", "Immobilizer Key", "Keyless Entry", "Navigation", "Power Locks", "Power Mirrors", "Power Steering", "Power Windows", "Sun Roof");
echo "<ul class='feature_list'>";
foreach ($features as $key => $val) {
    echo "<li><input type='checkbox' name='features[]' value='$val' /> " . $val . " </li>";
}
echo "</ul>";
?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="container">
                      <fieldset class="form-group">
                        <a class="btn btn-primary ad_flor_btn" href="javascript:void(0)"
                          onclick="$('#pro-image').click()">Upload Image</a>
                        <input type="file" id="pro-image" name="pro-image" style="display: none;" class="form-control"
                          multiple>
                        <span>Cars sell fast when you add atleast 8-10 pics of exterior and interior</span>
                      </fieldset>
                      <div class="preview-images-zone">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12">
                      <div class="mb20">
                        <label class="form-label"></label>
                      </div>
                    </div>
                  </div>
                  <div class="col-md-12" style="padding-top: 30px;">
                    Want to featured this Listing? <input type="checkbox" id="checkbox" name="want_featured"
                      onclick="displayModal()" />
                    <input type="hidden" class="form-control" id="name" name="name" aria-describedby="emailHelp">
                    <input type="hidden" class="form-control" id="cardNumber" name="cardNumber">
                    <input type="hidden" class="form-control" id="expiry" name="expiry">
                    <input type="hidden" Code" class="form-control" id="securityCode" name="securityCode">
                    &nbsp; &nbsp; <input type="submit" name="add-btn" value="Add Listing"
                      class="btn btn-thm ad_flor_btn" />
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Card Information</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- <form action="" method="POST"> -->
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input type="text" class="form-control" id="form_name" aria-describedby="emailHelp">
        </div>
        <div class="mb-3">
          <label for="cardnumber" class="form-label">Card Number</label>
          <input type="number" class="form-control" id="form_cardNumber">
        </div>
        <div class="mb-3">
          <label for="expiry" class="form-label">Expiry</label>
          <input type="text" class="form-control" id="form_expiry">
        </div>
        <div class="mb-3">
          <label for="securityCode" class="form-label">Security Code</label>
          <input type="number" class="form-control" id="form_securityCode">
        </div>
        <button type="button" onclick="getValues()" class="btn btn-primary">Save</button>
        <!-- </form> -->
      </div>
    </div>
  </div>
</div>
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
<?php include_once "footer.php";?>

<script>
$(document).ready(function() {
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

  $("#Features").hide();
  $('#alert_message').hide();
  document.getElementById('pro-image').addEventListener('change', readImage, false);
  $(".preview-images-zone").sortable();
  $(document).on('click', '.image-cancel', function() {
    let no = $(this).data('no');
    $(".preview-image.preview-show-" + no).remove();
  });
});
var num = 4;

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
  questionInput.required = true;

  questionInputDiv.appendChild(questionInput);

  const answerInputDiv = document.createElement("div");
  answerInputDiv.classList.add("col-sm-5", "col-md-5");

  const answerInput = document.createElement("input");
  answerInput.classList.add("form-control", "form_control");
  answerInput.type = "text";
  answerInput.name = "answers[]";
  answerInput.placeholder = "Enter answer";
  answerInput.required = true;

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

function select_make_by_model(id) {
  $('.model_id').val(0);
  $('.models_car').hide();
  $('.model_' + id).show();
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

function getValues() {
  //get modal values in var with their id's
  var form_name = $('#form_name').val(); //document.getElementById("").value;
  var form_cardNumber = $('#form_cardNumber').val(); //docform_nameument.getElementById("form_cardNumber").value;
  var form_expiry = $('#form_expiry').val(); //document.getElementById("form_expiry").value;
  var form_securityCode = $('#form_securityCode').val(); //document.getElementById("form_securityCode").value;
  $('#name').val(form_name);
  $('#cardNumber').val(form_cardNumber);
  $('#expiry').val(form_expiry);
  $('#securityCode').val(form_securityCode);
  //hide modal
  $('#exampleModal').modal('hide');
}

function displayModal() {
  var checkbox = document.getElementById("checkbox");
  // Check if the checkbox is checked
  if (checkbox.checked) {
    // Show the Bootstrap modal
    $('#exampleModal').modal('show');
  }
}
</script>