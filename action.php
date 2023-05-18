<?php
include_once('config.php');
include_once('function.php');
if(isset($_POST['cmd'])){
    if($_POST['cmd']=="sign_login"){ //TODO LOGIN MODULE
        if((isset($_POST['user_email']) && $_POST['user_email']!="") && (isset($_POST['password']) && $_POST['password']!="") ){
            $select = "select * from users where user_email='".mysqli_real_escape_string($con,$_POST['user_email'])."' and password='".mysqli_real_escape_string($con,$_POST['password'])."' ";
            $q_run = mysqli_query($con,$select) or die(mysqli_error($con));
            if(mysqli_num_rows($q_run)>0){
                $data = mysqli_fetch_assoc($q_run);
                $_SESSION['user_id'] = $data['id'];
                $_SESSION['name'] = $data['f_name'];
                $_SESSION['lastname'] = $data['l_name'];
                $_SESSION['type'] = $data['user_type'];
                $_SESSION['user_email'] = $data['user_email'];
                $_SESSION['is_login'] = 1;
                header("Location:index.php");
            }else{
                 $_SESSION['error_pass'] = "<strong>Error:</strong> User Not Found.";
                header("Location:login.php");    
            }
        }else{
            $_SESSION['error_pass'] = "<strong>Error:</strong> An error occurred. Please try again.";
            header("Location:login.php");    
        }
    }
    if($_POST['cmd']=="register_user"){ //TODO REGISTER ACCOUNT MODULE
        $pass = $_POST['password'];
            $select = "select * from users where user_email='$_POST[user_email]'";
            $q_run =  mysqli_query($con,$select);
            if(mysqli_num_rows($q_run)==0){ // User Not FOund, Add new User
                $password =$_POST['password'];
                $con_password =$_POST['c_password'];
                if($password ==  $con_password){
                    $insert = "insert into users (f_name,l_name,user_email,password,mobile_number,user_type) values('$_POST[f_name]','$_POST[l_name]','$_POST[user_email]','$_POST[password]','$_POST[mobile_number]','0')";
                    //USER TYPE 0 for user 1 for ADMIN
                    if(mysqli_query($con,$insert)){
                        $_SESSION['succes_sc'] = "<b>Success:</b> Account created successfully.";
                        header("Location:login.php");         
                    }else{
                        $_SESSION['error_pass'] = "<b>Error:</b> An error occurred. Please try again.";
                        header("Location:register.php");    
                    }
                }
                else{
                    $_SESSION['error_pass']= "<b>Error:</b> Password does Not Match.";
                        header("Location:signup.php");
                }
            }else{
                $_SESSION['error_pass'] = "<b>Error:</b> Account with this email ($_POST[email]) adddress already in use.";
                header("Location:signup.php");
            }
    }
    if($_POST['cmd']=="create_customer"){ //TODO REGISTER ACCOUNT MODULE
        $pass = $_POST['password'];
            $select = "select * from users where email='$_POST[email]'";
            $q_run =  mysqli_query($con,$select);
            if(mysqli_num_rows($q_run)==0){ // User Not FOund, Add new User
                $insert = "insert into users (f_name,l_name,email,password,user_type) values('$_POST[f_name]','$_POST[l_name]','$_POST[email]','$_POST[password]','3')";
                if(mysqli_query($con,$insert)){
                    $to = $_POST['email'];
                    $nam = $_POST['name'];
                    $_SESSION['succes_sc'] = "<b>Success:</b> Your account created successfully.";
                    header("Location:customers.php");    
                }else{
                    $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                    header("Location:add_customers.php");    
                }
            }else{
                $_SESSION['error_pass'] = "<b>Error:</b> Account with this email ($_POST[email]) adddress already in use.";
                header("Location:add_customers.php");
            }
    }
    if($_POST['cmd']=="set_new_password"){ 
        $update = "update users set password='".$_POST['password']."' where id='".$_POST['id']."'";
        if(mysqli_query($con,$update)){
            unset($_SESSION['uid']);
            $_SESSION['succes_sc'] = "<b>Success</b> Password Changed successfuly.";
            header("Location:index.php");
            die();
        }else{
            $_SESSION['error_login'] = "<b>Error:</b> Password Mismatch. Please Enter Same Password";
            header("Location:forgot-password.php");
            die();
        }
    }
    if($_POST['cmd']=="edit_user"){ 
        $id =$_POST['id'];
         $f_name =$_POST['f_name'];
         $l_name =$_POST['l_name'];
         $email =$_POST['email'];
         $update="UPDATE `users` set f_name='$f_name',l_name='$l_name',email='$email' where id='$id'" ;
         $q_run =  mysqli_query($con,$update);
         if( $q_run ){
            $_SESSION['up_suc'] = "<b>Success:</b> Updated Successfully";
         }else{
            $_SESSION['an_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:users.php");
    }
    if($_POST['cmd']=="add_group"){ 
         $group_name =$_POST['group_name'];
         $insert="insert into groups (group_name) values(' $group_name ')" ;
         $q_run =  mysqli_query($con,$insert);
         if( $q_run ){
            $_SESSION['in_suc'] = "<b>Success:</b> Group Added Successfully";
         }else{
            $_SESSION['in_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:groups.php");
    }
    if($_POST['cmd']=="edit_group"){ 
        $id =$_POST['id'];
         $group_name =$_POST['group_name'];
         $update="UPDATE `groups` set group_name='$group_name' where id='$id'" ;
         $q_run =  mysqli_query($con,$update);
         if( $q_run ){
            $_SESSION['up_suc'] = "<b>Success:</b> Updated Successfully";
         }else{
            $_SESSION['an_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:groups.php");
    }
    if($_POST['cmd']=="add_client"){ 
        $group_id =$_POST['group_id'];
         $name =$_POST['name'];
         $number =$_POST['number'];
         $email =$_POST['email'];
         $insert="insert into clients (`group_id`, `name`, `number`, `email`) values('$group_id','$name','$number','$email')" ;
         $q_run =  mysqli_query($con,$insert);
         if( $q_run ){
            $_SESSION['in_suc'] = "<b>Success:</b> Client Added Successfully";
         }else{
            $_SESSION['in_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:clients.php");
    }
    if($_POST['cmd']=="edit_client"){ 
        $id =$_POST['id'];
        $group_id =$_POST['group_id'];
         $name =$_POST['name'];
         $number =$_POST['number'];
         $email =$_POST['email'];
         $update="UPDATE `clients` set group_id='$group_id',name='$name',number='$number',email='$email' where id='$id'" ;
         $q_run =  mysqli_query($con,$update);
         if( $q_run ){
            $_SESSION['up_suc'] = "<b>Success:</b> Updated Successfully";
         }else{
            $_SESSION['an_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:clients.php");
    }
    if($_POST['cmd']=="add_campaign"){ 
        $user_id =$_POST['user_id'];
        $group_id =$_POST['group_id'];
        $title =$_POST['campaign_title'];
        $message =trim(strip_tags($_POST['message']));
        $date =$_POST['date'];
        $time =$_POST['time'];
        $insert="insert into campaign (`user_id`,`title`, `group_id`, `message`, `date`,`time`) values('$user_id','$title','$group_id','$message','$date','$time')" ;
        $q_run =  mysqli_query($con,$insert);
        if( $q_run ){
           $_SESSION['in_suc'] = "<b>Success:</b> Campaign  Added Successfully";
           header("Location:mycampaign.php");
        }else{
           $_SESSION['in_error'] = "<b>Error:</b> An error occurred please try again";
           header("Location:addcampaign.php");
         }
    }
    if($_POST['cmd']=="edit_campaign"){ 
        $id =$_POST['id'];
        $group_id =$_POST['group_id'];
        $title =$_POST['campaign_title'];
        $message =trim(strip_tags($_POST['message']));
        $date =$_POST['date'];
        $time =$_POST['time'];
         $update="UPDATE `campaign` set group_id='$group_id',title='$title',message='$message',date='$date',time='$time' where id='$id'" ;
         $q_run =  mysqli_query($con,$update);
         if( $q_run ){
            $_SESSION['up_suc'] = "<b>Success:</b> Updated Successfully";
         }else{
            $_SESSION['an_error'] = "<b>Error:</b> An error occurred please try again";
          }
         header("Location:mycampaign.php");
    }
    if($_POST['cmd']=="setup_setting"){
        if(!isset($_POST['id'])){
            $insert = "insert into settings (sid,token,number,app_sid) values('".$_POST['sid']."','".$_POST['token']."','".$_POST['number']."','".$_POST['app_sid']."')";
            $q_run =  mysqli_query($con,$insert);
            if($q_run){
                $_SESSION['in_suc'] = "<b>Success:</b> Setting  Saved Successfully";
            }else{
                $_SESSION['in_error'] = "<b>Error:</b> An error occurred please try again";
            }
        }else{
            $update = "update settings set sid='".$_POST['sid']."', token='".$_POST['token']."', number='".$_POST['number']."', app_sid='".$_POST['app_sid']."' where id='".$_POST['id']."'";
            $q_run =  mysqli_query($con,$update);
            if($q_run){
                $_SESSION['in_suc'] = "<b>Success:</b> Setting  Updated Successfully";
            }else{
                $_SESSION['in_error'] = "<b>Error:</b> An error occurred please try again";
            }
        }
        header("Location:settings.php");
    }
}
?>