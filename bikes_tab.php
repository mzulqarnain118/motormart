 <div class="row">
    <div class="col-lg-12">
    <div class="home1_advance_search_wrapper">
      <form method="get" action="bike_listings.php">
      
      <ul class="mb0 text-center">
      <li class="list-inline-item">
          <div class="select-boxes">
            <div class="car_models" id="model_car">
              <h6 class="title">Condition</h6>
              <select class="form-control" name='condition' style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;">
                <option value="0">Select Condition</option>
                <option value="Used">Used</option>
                <option value="New">New</option>
              </select>
            </div>
          </div>
        </li>
        <li class="list-inline-item">
          <div class="select-boxes">
            <div class="car_brand">
              <h6 class="title">Make</h6>
              <select class="selectpicker" name='maker'  data-live-search="true" onchange="select_make_by_model(this.value,'bike')">
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
        </li>
        <li class="list-inline-item">
          <div class="select-boxes">
            <div class="car_models model_bike">
              <h6 class="title">Models</h6>

              <select class="form-control" name='model' style="background-color: transparent; border: 1px solid #eaeaea; border-radius: 8px; font-size:  13px;">
                <option value="0">Select Models</option>
                 <?php
                      $select = "select * from models  where type='Bikes' order by title asc ";
                       // $select = "select * from models order by title asc";
                        $q_run =  mysqli_query($con,$select);
                        if(mysqli_num_rows($q_run)>0){
                            while($data_cat =  mysqli_fetch_assoc($q_run)){
                                    echo "<option value='".$data_cat['id']."' class='model_bike_".$data_cat['maker_id']." models_bike' disabled='disabled'>".DBout($data_cat['title'])."</option>";
                                }
                        }
                      ?>
              </select>
            </div>
          </div>
        </li>
        <li class="list-inline-item">
          <div class="select-boxes">
            <div class="car_models" id="model_car">
              <h6 class="title">Year</h6>
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
        </li>
        <li class="list-inline-item">
          <div class="select-boxes">
            <div class="car_prices">
              <h6 class="title">Price</h6>
              <select class="selectpicker" name='price'  data-live-search="true" data-width="100%">
                <option value="0">All Price</option>
                <!--<option value="0">No max Price</option>-->
                <?php
                    for($i=1; $i<=15;$i++){
                        echo '<option value="'.$i.'000">$'.$i.',000</option>';        
                    }
                ?>
              </select>
            </div>
          </div>
        </li>
        <li class="list-inline-item">
          <div class="d-block">
            <button type='submit' class="btn btn-thm advnc_search_form_btn"><span class="flaticon-magnifiying-glass"></span>Search</button>
          </div>
        </li>
      </ul>
      </form>
    </div>
  </div>
</div>