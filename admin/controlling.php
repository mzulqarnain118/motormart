<?php
include_once('../config.php');
include_once('../function.php');

if(isset($_POST['cmd'])){
    if($_POST['cmd']=="add_category"){ // ADD CATEGORY
        if(!isset($_POST['id'])){ //INSERT
            $image_name = "";
            if(isset($_FILES['cat_image']['name']) && $_FILES['cat_image']['name']!=""){
                $image_name = time().$_FILES['cat_image']['name'];
                move_uploaded_file($_FILES["cat_image"]["tmp_name"], "cat_images/".$image_name);
            }
            if(isset($_POST['title']) && $_POST['title']!=""){
                    $insert = "insert into categories (title,cat_image,cat_type,is_condition) values('".DBin($_POST['title'])."','".$image_name."','".DBin($_POST['cat_type'])."','".$_POST['is_condition']."')";
                    if(mysqli_query($con,$insert)){
                          $_SESSION['succes_sc'] = "<b>Success:</b> Category created successfully.";
                            header("Location:categories.php");    
                    }else{
                        $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_category.php");        
                    }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Title is required. Please enter title.";
                header("Location:add_category.php");   
            }
        }else{ // UPDATE VALUE
            $image_name = "";
            if(isset($_FILES['cat_image']['name']) && $_FILES['cat_image']['name']!=""){
                $image_name = time().$_FILES['cat_image']['name'];
                move_uploaded_file($_FILES["cat_image"]["tmp_name"], "cat_images/".$image_name);
            }else{
                $image_name = $_POST['image_hidden_val'];    
            }
            $update = "update categories set title='".DBin($_POST['title'])."', is_condition='".$_POST['is_condition']."', cat_image='$image_name', cat_type='".DBin($_POST['cat_type'])."' where id='".$_POST['id']."'";
            if(mysqli_query($con,$update)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Category updated successfully.";
                    header("Location:edit_category.php?id=".$_POST['id']);    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit_category.php?id=".$_POST['id']);        
            }
        }
    }

     if($_POST['cmd']=="add_dealership"){ //! ADD DEALERSHIP
        if(!isset($_POST['id'])){ //INSERT
            $image_name = "";
            if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
                $image_name = time().$_FILES['image']['name'];
                move_uploaded_file($_FILES["image"]["tmp_name"], "dealership_images/".$image_name);
            }
            if(isset($_POST['title']) && $_POST['title']!=""){
                    $insert = "insert into dealerships (title,image,ratings) values('".DBin($_POST['title'])."','".$image_name."','".DBin($_POST['ratings'])."')";
                    if(mysqli_query($con,$insert)){
                          $_SESSION['succes_sc'] = "<b>Success:</b> Dealership created successfully.";
                            header("Location:dealerships.php");    
                    }else{
                        $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_dealership.php");        
                    }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Title is required. Please enter title.";
                header("Location:add_dealership.php");   
            }
        }else{ // UPDATE VALUE
            $image_name = "";
            if(isset($_FILES['image']['name']) && $_FILES['image']['name']!=""){
                $image_name = time().$_FILES['image']['name'];
                move_uploaded_file($_FILES["image"]["tmp_name"], "cat_images/".$image_name);
            }else{
                $image_name = $_POST['image_hidden_val'];    
            }
            $update = "update dealerships set title='".DBin($_POST['title'])."', image='$image_name', ratings='".DBin($_POST['ratings'])."' where id='".$_POST['id']."'";
            if(mysqli_query($con,$update)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Dealership updated successfully.";
                    header("Location:edit_dealership.php?id=".$_POST['id']);    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit_dealership.php?id=".$_POST['id']);        
            }
        }
    }

    if($_POST['cmd']=="add_maker"){ // ADD Maker
        if(!isset($_POST['id'])){ //INSERT
            $image_name = "";
            if(isset($_FILES['image_url']['name']) && $_FILES['image_url']['name']!=""){
                $image_name = time().$_FILES['image_url']['name'];
                move_uploaded_file($_FILES["image_url"]["tmp_name"], "maker_images/".$image_name);
            }
            if(isset($_POST['title']) && $_POST['title']!=""){
                    $insert = "insert into makers (title,image_url) values('".DBin($_POST['title'])."','".$image_name."')";
                    if(mysqli_query($con,$insert)){
                          $_SESSION['succes_sc'] = "<b>Success:</b> Maker created successfully.";
                            header("Location:maker.php");    
                    }else{
                        $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_maker.php");        
                    }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Title is required. Please enter title.";
                header("Location:add_maker.php");   
            }
        }else{ // UPDATE VALUE
            $image_name = "";
            if(isset($_FILES['image_url']['name']) && $_FILES['image_url']['name']!=""){
                $image_name = time().$_FILES['image_url']['name'];
                move_uploaded_file($_FILES["image_url"]["tmp_name"], "maker_images/".$image_name);
            }else{
                $image_name = $_POST['image_hidden_val'];    
            }
            $update = "update makers set title='".DBin($_POST['title'])."', image_url='$image_name' where id='".$_POST['id']."'";
            if(mysqli_query($con,$update)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Maker updated successfully.";
                    header("Location:edit_maker.php?id=".$_POST['id']);    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit_maker.php?id=".$_POST['id']);        
            }
        }
    }
    if($_POST['cmd']=="add_model"){
        if(!isset($_POST['id'])){ //INSERT
           
            if($_POST['maker_id']!=0){
            if(isset($_POST['title']) && $_POST['title']!=""){
                    $insert = "insert into models (maker_id,title,type) values('".$_POST['maker_id']."','".DBin($_POST['title'])."','".$_POST['type']."')";
                    if(mysqli_query($con,$insert)){
                          $_SESSION['succes_sc'] = "<b>Success:</b> Model created successfully.";
                            header("Location:models.php");    
                    }else{
                        $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_model.php");        
                    }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Title is required. Please enter title.";
                header("Location:add_model.php");   
            }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Select Any Maker. ";
                header("Location:add_model.php");
            }
        }else{ // UPDATE VALUE
            if($_POST['maker_id']!=0){
                if(isset($_POST['title']) && $_POST['title']!=""){
                $update = "update models  set title='".DBin($_POST['title'])."', maker_id='".$_POST['maker_id']."', type='".$_POST['type']."' where id='".$_POST['id']."'";
                if(mysqli_query($con,$update)){
                      $_SESSION['succes_sc'] = "<b>Success:</b> Model updated successfully.";
                        header("Location:edit_model.php?id=".$_POST['id']);    
                }else{
                    $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:edit_model.php?id=".$_POST['id']);        
                }
                }else{
                    $_SESSION['error_ocr'] = "<b>Error:</b> Title is required. Please enter title.";
                    header("Location:edit_model.php?id=".$_POST['id']);   
                }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Select Any Maker. ";
                header("Location:edit_model.php?id=".$_POST['id']);
            }
        }
    }
    if($_POST['cmd']=="add_body_type"){ // Body Type
        if(!isset($_POST['id'])){ //INSERT
            $image_name = "";
            if(isset($_FILES['image_url']['name']) && $_FILES['image_url']['name']!=""){
                $image_name = time().$_FILES['image_url']['name'];
                move_uploaded_file($_FILES["image_url"]["tmp_name"], "body_type_images/".$image_name);
            }
            if(isset($_POST['title']) && $_POST['title']!=""){
                    $insert = "insert into body_type (title,image_url) values('".DBin($_POST['title'])."','".$image_name."')";
                    if(mysqli_query($con,$insert)){
                          $_SESSION['succes_sc'] = "<b>Success:</b> Body Type created successfully.";
                            header("Location:body_type.php");    
                    }else{
                        $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_body_type.php");        
                    }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> Title is required. Please enter title.";
                header("Location:add_body_type.php");   
            }
        }else{ // UPDATE VALUE
            $image_name = "";
            if(isset($_FILES['image_url']['name']) && $_FILES['image_url']['name']!=""){
                $image_name = time().$_FILES['image_url']['name'];
                move_uploaded_file($_FILES["image_url"]["tmp_name"], "body_type_images/".$image_name);
            }else{
                $image_name = $_POST['image_hidden_val'];    
            }
            $update = "update body_type set title='".DBin($_POST['title'])."', image_url='$image_name' where id='".$_POST['id']."'";
            if(mysqli_query($con,$update)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Body Type updated successfully.";
                    header("Location:edit_body_type.php?id=".$_POST['id']);    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit_body_type.php?id=".$_POST['id']);        
            }
        }
    }
     if($_POST['cmd']=="add_city"){ // CITY NAMES
        if(!isset($_POST['id'])){ //INSERT   
            if(isset($_POST['city_name']) && $_POST['city_name']!=""){
                    $insert = "insert into cities (city_name) values('".DBin($_POST['city_name'])."')";
                    if(mysqli_query($con,$insert)){
                          $_SESSION['succes_sc'] = "<b>Success:</b> City name created successfully.";
                            header("Location:city.php");    
                    }else{
                        $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_city.php");        
                    }
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> City Name is required. Please enter City Name.";
                header("Location:add_city.php");   
            }
        }else{ // UPDATE VALUE
                if(isset($_POST['city_name']) && $_POST['city_name']!=""){
                $update = "update cities  set city_name='".DBin($_POST['city_name'])."' where id='".$_POST['id']."'";
                if(mysqli_query($con,$update)){
                      $_SESSION['succes_sc'] = "<b>Success:</b> City name updated successfully.";
                        header("Location:edit_city.php?id=".$_POST['id']);    
                }else{
                    $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:edit_city.php?id=".$_POST['id']);        
                }
                }else{
                    $_SESSION['error_ocr'] = "<b>Error:</b> City name is required. Please enter City Name..";
                    header("Location:edit_city.php?id=".$_POST['id']);   
                }
        }
    }
    if($_POST['cmd']=="create_listing"){ // CREATE LISTING POST
        $get_user_detail = get_userDetail($con,$_POST['user_id']); 
            
        if(!isset($_POST['id'])){ //INSERT
            $images_url = array();
            if(isset($_POST['images_url'])){
               foreach($_POST['images_url'] as $key=>$val){
                    $img = base64_images_to_save($val);
                    $images_url[] = $img;
               }    
            }
            
            $features = json_encode($_POST['features']);
            $reviewRatings = json_encode($_POST['ReviewRatings']);
            // $FAQS = json_encode($_POST['FAQS']);

          if(isset($_POST['mileage']) && $_POST['mileage']!="")
            {
                $mileage = $_POST['mileage'];
            }
            else
            {
                $mileage = 0;
            }
            
            $doors= isset($_POST['doors']) ? intval($_POST['doors']) : NULL;
            $seats= isset($_POST['seats']) ? intval($_POST['seats']) : NULL;
            $cylinders = isset($_POST['cylinders']) ? $_POST['cylinders'] : '0';
            echo $cylinders;
            $want_featured = isset($_POST['want_featured']) ? 1 : 0;

        $insert = "INSERT INTO listings (user_id, listing_title, listing_condition, dealership_id, category_id, maker_id, model_id, body_type_id, price, model_year, doors, seats, feulType,
            transmission, mileage, engine_size, cylinders, color, city_id, name, cardNumber, expiry, securityCode, address, description,
            Reliability, Safety, Interior, Performance, RunningCost, ReviewRatings,questions,answers,
            audioSE,exterior,interiorSE,illumination,driverAssistance,performanceSE,safetySecurity,
             images_url, features, want_featured)
            VALUES ('".$_POST['user_id']."', '".DBin($_POST['listing_title'])."', '".$_POST['listing_condition']."', '".$_POST['dealership_id']."', '".$_POST['category_id']."',
            '".$_POST['maker_id']."', '".$_POST['model_id']."', '".$_POST['body_type_id']."', '".$_POST['price']."', '".$_POST['model_year']."', '$doors', '$seats', '".$_POST['feulType']."',
            '".$_POST['transmission']."', '$mileage', '".$_POST['engine_size']."', '$cylinders', '".$_POST['color']."',
            '".$_POST['city_id']."', '".DBin($_POST['name'])."', '".convert_uuencode($_POST['cardNumber'])."', '".$_POST['expiry']."', '".convert_uuencode($_POST['securityCode'])."', '".DBin($_POST['address'])."', '".DBin($_POST['description'])."',
            '".DBin($_POST['Reliability'])."', '".DBin($_POST['RunningCost'])."', '".DBin($_POST['Safety'])."', '".DBin($_POST['Interior'])."', '".DBin($_POST['Performance'])."', '$reviewRatings',
            '".json_encode($_POST['questions'])."','".json_encode($_POST['answers'])."',
            '".json_encode($_POST['audioSE'])."','".json_encode($_POST['exterior'])."','".json_encode($_POST['interiorSE'])."','".json_encode($_POST['illumination'])."','".json_encode($_POST['driverAssistance'])."','".json_encode($_POST['performanceSE'])."','".json_encode($_POST['safetySecurity'])."',
            '".json_encode($images_url)."', '$features', '$want_featured')";
            
echo $insert; // Debugging statement to check the generated query
            if(mysqli_query($con,$insert)){
                $last_id = mysqli_insert_id($con);
                $_SESSION['succes_sc'] = "<b>Success:</b> Listing created successfully.";
                
                $subject = "New listing In PENDING";
                $message = "Hello Admin";
                $message.="<br> You have new listing in pending. Please review it.<br />
                Thanks";
                
                $to = "info@bdamotoring.com";
                $from = $get_user_detail['user_email'];
    
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Create email headers
                $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
                    
                
                if(isset($_POST['want_featured']) && $_POST['want_featured']==1){
                    $subject= "#$last_id Listing want to Featured!";
                    $message = "Hello Admin";
                    $message.="<br> You have new listing in pending to review as Featured. Please review it.<br />
                    <br> Listing Link: ".getServerURL()."edit-listing.php?id=$last_id<br />
                    Thanks";
                    
                    $to = "info@bdamotoring.com";
                    $from = $get_user_detail['user_email'];
                    $headers  = 'MIME-Version: 1.0' . "\r\n";
                    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                    // Create email headers
                    $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
                }
                
                header("Location:pending_listing.php"); 
            }else{
                
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:add-listing.php");   
            }
        }else{ // UPDATE
            $images_url = array();
            if(isset($_POST['images_url'])){
               // $images_url = json_encode($_POST['images_url']);
               foreach($_POST['images_url'] as $key=>$val){
                    $img = base64_images_to_save($val);
                    $images_url[] = $img;
               }    
            }
            $exist_images_url = array();
            if(isset($_POST['exist_images_url'])){
                $exist_images_url = $_POST['exist_images_url'];
            }
            $img_array_merge = array_merge($exist_images_url,$images_url);
            $features = "";
            if(isset($_POST['features'])){
                $features = json_encode($_POST['features']);
            }
             $accessory_type = "";
            if(isset($_POST['accessory_type'])){
                $accessory_type = $_POST['accessory_type'];
            }
             $service_type = "";
            if(isset($_POST['service_type'])){
                $service_type = $_POST['service_type'];
            }

               $maker_id = 0;
            if(isset($_POST['maker_id'])){
                $maker_id = $_POST['maker_id'];
            }
              $cylinders = 4;
            if(isset($_POST['cylinders'])){
                $cylinders = $_POST['cylinders'];
            }
                        $reviewRatings = json_encode($_POST['ReviewRatings']);


            /****VERIFICATION FILE***/
            $veri_file = "";
            if(isset($_FILES['veri_file']['name']) && $_FILES['veri_file']['name']!=""){
                $veri_file = time().$_FILES['veri_file']['name'];
                move_uploaded_file($_FILES["veri_file"]["tmp_name"], "verifiied_docs/".$veri_file);
            }
            
            
           $update = "UPDATE listings SET 
    listing_title='" . DBin($_POST['listing_title']) . "', 
    listing_condition='" . $_POST['listing_condition'] . "', 
    dealership_id='" . $_POST['dealership_id'] . "', 
    category_id='" . $_POST['category_id'] . "', 
    maker_id='$maker_id', 
    model_id='" . $_POST['model_id'] . "', 
    body_type_id='" . $_POST['body_type_id'] . "', 
    price='" . $_POST['price'] . "', 
    model_year='" . $_POST['model_year'] . "', 
    transmission='" . $_POST['transmission'] . "', 
    doors='" . $_POST['doors'] . "', 
    seats='" . $_POST['seats'] . "', 
    feulType='" . $_POST['feulType'] . "', 
    mileage='" . $_POST['mileage'] . "', 
    engine_size='" . $_POST['engine_size'] . "', 
    cylinders='$cylinders', 
    color='" . $_POST['color'] . "', 
    accessory_type='$accessory_type', 
    service_type='$service_type', 
    city_id='" . $_POST['city_id'] . "', 
    address='" . DBin($_POST['address']) . "', 
    description='" . DBin($_POST['description']) . "', 
    images_url='" . json_encode($img_array_merge) . "', 
    features='$features', 
    verification_file='$veri_file', 
    Reliability='" . DBin($_POST['Reliability']) . "', 
    RunningCost='" . DBin($_POST['RunningCost']) . "', 
    Safety='" . DBin($_POST['Safety']) . "', 
    Interior='" . DBin($_POST['Interior']) . "', 
    Performance='" . DBin($_POST['Performance']) . "', 
    ReviewRatings='$reviewRatings', 
    questions='" . json_encode($_POST['questions']) . "', 
    answers='" . json_encode($_POST['answers']) . "', 
    audioSE='" . json_encode($_POST['audioSE']) . "', 
    exterior='" . json_encode($_POST['exterior']) . "', 
    interiorSE='" . json_encode($_POST['interiorSE']) . "', 
    illumination='" . json_encode($_POST['illumination']) . "', 
    driverAssistance='" . json_encode($_POST['driverAssistance']) . "', 
    performanceSE='" . json_encode($_POST['performanceSE']) . "', 
    safetySecurity='" . json_encode($_POST['safetySecurity']) . "' 
    WHERE id='" . $_POST['id'] . "'";

              if(mysqli_query($con,$update)){
                $_SESSION['succes_sc'] = "<b>Success:</b> Listing updated successfully.";
                header("Location:edit-listing.php?id=".$_POST['id']); 
            }else{
                
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit-listing.php?id=".$_POST['id']);   
            }
            
        }
    }
    if($_POST['cmd']=="create_accessories"){ // CREATE ACCESSORIES POST
        $get_user_detail = get_userDetail($con,$_POST['user_id']); 
        if(!isset($_POST['id'])){ //INSERT
            $images_url = array();
            if(isset($_POST['images_url'])){
               // $images_url = json_encode($_POST['images_url']);
               foreach($_POST['images_url'] as $key=>$val){
                    $img = base64_images_to_save($val);
                    $images_url[] = $img;
               }    
            }
            $insert = "insert into listings (user_id,listing_title,price,description,images_url,accessory_type,listing_type)
            values('".$_POST['user_id']."','".DBin($_POST['listing_title'])."','".$_POST['price']."',
            '".DBin($_POST['description'])."','".json_encode($images_url)."','".$_POST['accessory_type']."','1')";
        var_dump($insert);
            if(mysqli_query($con,$insert)){
                $_SESSION['succes_sc'] = "<b>Success:</b> Accessory Listing created successfully.";
                $subject = "New Accessory listing In PENDING";
                $message = "Hello Admin";
                $message.="<br> You have new listing in pending. Please review it.<br />
                Thanks";
                
                $to = "info@bdamotoring.com";
                $from = $get_user_detail['user_email'];
    
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Create email headers
                $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
                header("Location:pending_listing.php"); 
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:add-accessory.php");   
            }
        }else{ // UPDATE
            $images_url = array();
            if(isset($_POST['images_url'])){
               // $images_url = json_encode($_POST['images_url']);
               foreach($_POST['images_url'] as $key=>$val){
                    $img = base64_images_to_save($val);
                    $images_url[] = $img;
               }    
            }
            $exist_images_url = array();
            if(isset($_POST['exist_images_url'])){
                $exist_images_url = $_POST['exist_images_url'];
            }
            $img_array_merge = array_merge($exist_images_url,$images_url);
            
            $update = "update listings set listing_title='".DBin($_POST['listing_title'])."', price='".$_POST['price']."',
            description='".DBin($_POST['description'])."', images_url='".json_encode($img_array_merge)."', accessory_type='".$_POST['accessory_type']."' where id='".$_POST['id']."'";
              if(mysqli_query($con,$update)){
                $_SESSION['succes_sc'] = "<b>Success:</b> Accessory updated successfully.";
                header("Location:edit-accessory.php?id=".$_POST['id']); 
            }else{
                
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit-accessory.php?id=".$_POST['id']);   
            }
            
        }
    }

      if($_POST['cmd']=="create_services"){ // CREATE SERVICES POST
        $get_user_detail = get_userDetail($con,$_POST['user_id']); 
        if(!isset($_POST['id'])){ //INSERT
            $images_url = array();
            if(isset($_POST['images_url'])){
               // $images_url = json_encode($_POST['images_url']);
               foreach($_POST['images_url'] as $key=>$val){
                    $img = base64_images_to_save($val);
                    $images_url[] = $img;
               }    
            }
            $insert = "insert into listings (user_id,listing_title,price,description,images_url,service_type,listing_type)
            values('".$_POST['user_id']."','".DBin($_POST['listing_title'])."','".$_POST['price']."',
            '".DBin($_POST['description'])."','".json_encode($images_url)."','".$_POST['service_type']."','2')";
        echo $insert;
            if(mysqli_query($con,$insert)){
                $_SESSION['succes_sc'] = "<b>Success:</b> Service Listing created successfully.";
                $subject = "New Service listing In PENDING";
                $message = "Hello Admin";
                $message.="<br> You have new listing in pending. Please review it.<br />
                Thanks";
                
                $to = "info@bdamotoring.com";
                $from = $get_user_detail['user_email'];
    
                $headers  = 'MIME-Version: 1.0' . "\r\n";
                $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
                // Create email headers
                $headers .= 'From: '.$from."\r\n".
                    'Reply-To: '.$from."\r\n" .
                    'X-Mailer: PHP/' . phpversion();
                    mail($to, $subject, $message, $headers);
                header("Location:pending_listing.php"); 
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:add-service.php");   
            }
        }else{ // UPDATE
            $images_url = array();
            if(isset($_POST['images_url'])){
               // $images_url = json_encode($_POST['images_url']);
               foreach($_POST['images_url'] as $key=>$val){
                    $img = base64_images_to_save($val);
                    $images_url[] = $img;
               }    
            }
            $exist_images_url = array();
            if(isset($_POST['exist_images_url'])){
                $exist_images_url = $_POST['exist_images_url'];
            }
            $img_array_merge = array_merge($exist_images_url,$images_url);
            
            $update = "update listings set listing_title='".DBin($_POST['listing_title'])."', price='".$_POST['price']."',
            description='".DBin($_POST['description'])."', images_url='".json_encode($img_array_merge)."', service_type='".$_POST['service_type']."' where id='".$_POST['id']."'";
              if(mysqli_query($con,$update)){
                $_SESSION['succes_sc'] = "<b>Success:</b> Accessory updated successfully.";
                header("Location:edit-service.php?id=".$_POST['id']); 
            }else{
                
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:edit-service.php?id=".$_POST['id']);   
            }
            
        }
    }
    if($_POST['cmd']=="update_profile"){ 
         $id =$_POST['user_id'];
         $f_name =$_POST['f_name'];
         $l_name =$_POST['l_name'];
         $user_email =$_POST['user_email'];
         $mobile_number = $_POST['mobile_number'];
         $update="UPDATE `users` set f_name='$f_name',l_name='$l_name', mobile_number='$mobile_number' where id='$id'" ;
         $q_run =  mysqli_query($con,$update);
         if( $q_run ){
            $_SESSION['name'] = $f_name;
            $_SESSION['lastname'] = $l_name;
            $_SESSION['up_suc'] = "<b>Success:</b> Updated Successfully";
         }else{
            $_SESSION['an_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:my_profile.php");
    }
    if($_POST['cmd']=="update_password"){
         $password =$_POST['password'];
        $con_password =$_POST['c_password'];
        if($password ==  $con_password){
            $update = "update users set password='".$_POST['password']."' where id='".$_POST['id']."'";
            if(mysqli_query($con,$update)){
                unset($_SESSION['uid']);
                $_SESSION['succes_sc'] = "<b>Success</b> Password Changed successfuly.";
                header("Location:my_profile.php");
                die();
            }else{
                $_SESSION['error_login'] = "<b>Error:</b> Password Mismatch. Please Enter Same Password";
                header("Location:my_profile.php");
                die();
            }
        }else{
            $_SESSION['error_pass']= "<b>Error:</b> Password does Not Match.";
            header("Location:my_profile.php");
        }
    }
    if($_POST['cmd']=="sold_item"){
        mysqli_query($con,"update listings set is_sold=1 where id='".$_POST['id']."'");
        if(isset($_POST['type']) && $_POST['type']==1){
            $_SESSION['succes_sc'] = "<b>Success:</b> Accessory item status changed to SOLD";
        }else{
            $_SESSION['succes_sc'] = "<b>Success:</b> Listing item status changed to SOLD";    
        }
        
        header("Location:my_listing.php");
        die();
    } 
    if($_POST['cmd']=="reject_item"){
        mysqli_query($con,"update listings set is_reject=1 where id='".$_POST['id']."'");
        $_SESSION['succes_sc'] = "<b>Success:</b> Listing item status changed to REJECTED";
        header("Location:my_listing.php");
        die();
    }  
    if($_POST['cmd']=="approve_item"){
        mysqli_query($con,"update listings set is_active='".$_POST['is_active']."' where id='".$_POST['id']."'");
        $msg = "";
        if($_POST['is_active']==1){
            
            if(isset($_POST['type']) && $_POST['type']==1){
                
                $subject = "Your Accessory Status Changed To APROVED";
                $msg = "Thanks for your patience, We informed you that Accessory status changed to Approved now its available to search on our website.
                    <br> Thanks";
                $_SESSION['succes_sc'] = "<b>Success:</b> Accessory item status changed to APPROVED";
                
                
            }else{
                $subject = "Your Listing Status Changed To APROVED";
                $msg = "Thanks for your patience, We informed you that listing status changed to Approved now its available to search on our website.
                    <br> Thanks";
                $_SESSION['succes_sc'] = "<b>Success:</b> Listing item status changed to APPROVED";
                    
            }
            
        }else if($_POST['is_active']==2){
            if(isset($_POST['type']) && $_POST['type']==1){
            $subject = "Your Accessory Status Changed To REJECTED";
            $_SESSION['succes_sc'] = "<b>Success:</b> Accessory item status changed to REJECTED";
            $msg = "Thanks for your patience, Unfortunately your Accessory does not match our requirments. Please try again.
                <br> Thanks";
            }else{
            $subject = "Your Listing Status Changed To REJECTED";
            $_SESSION['succes_sc'] = "<b>Success:</b> Listing item status changed to REJECTED";
            $msg = "Thanks for your patience, Unfortunately your listing does not match our requirments. Please try again.
                <br> Thanks";
            }
        }
        if(isset($_POST['id'])){
         $select = "SELECT f_name,l_name,user_email FROM `users` where id=(SELECT user_id from `listings` where id='".$_POST['id']."')";

        $q_run =  mysqli_query($con,$select);
        if(mysqli_num_rows($q_run)>0){
            $data =  mysqli_fetch_assoc($q_run);
        
            $message = "Hello ".$data['f_name']." ".$data['l_name'].", <br>";
            $message.=$msg;
            
            $to = $data['user_email'];
            $from = 'info@bdamotoring.com';

            $headers  = 'MIME-Version: 1.0' . "\r\n";
            $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
            // Create email headers
            $headers .= 'From: '.$from."\r\n".
                'Reply-To: '.$from."\r\n" .
                'X-Mailer: PHP/' . phpversion();
                mail($to, $subject, $message, $headers);
            }
        }
           
        header("Location:my_listing.php");
        die();
    }
    if($_POST['cmd']=="manage_listings"){
        mysqli_query($con,"update listings set popular=0");
        if(count($_POST['popular_listings'])>0){
            foreach($_POST['popular_listings'] as $key=>$val){
                mysqli_query($con,"update listings set popular=1 where id='".$val."'");
            }
        }
        header("Location:manage_listing.php");
        die();
    }
    if($_POST['cmd']=="manage_makers"){
        mysqli_query($con,"update makers set popular=0");
        if(count($_POST['popular_makers'])>0){
            foreach($_POST['popular_makers'] as $key=>$val){
                mysqli_query($con,"update makers set popular=1 where id='".$val."'");
            }
        }
        header("Location:manage_popular.php");
        die();
    }
    if($_POST['cmd']=="featured_listings"){
        mysqli_query($con,"update listings set featured=0");
        if(count($_POST['featured_listings'])>0){
            foreach($_POST['featured_listings'] as $key=>$val){
                mysqli_query($con,"update listings set featured=1 where id='".$val."'");
            }
        }
        header("Location:manage_featured.php");
        die();
    }
}
?>