<?php
include_once('../config.php');
include_once('../function.php');
if(isset($_GET['cmd'])){ 
    if($_GET['cmd']=="category"){ // Delete CATEGORY
            $delete = "delete from categories where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Category deleted successfully.";
                    header("Location:categories.php");    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:categories.php");        
            }
    }
    if($_GET['cmd']=="user"){ // Delete CATEGORY
            $delete = "delete from users where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> User deleted successfully.";
                    header("Location:users.php");    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:users.php");        
            }
    }
    if($_GET['cmd']=="accessory"){ // Delete maker
            $delete = "delete from listings where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Accessory deleted successfully.";
                    header("Location:".$_SERVER['HTTP_REFERER']);    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:".$_SERVER['HTTP_REFERER']);        
            }
    }
    if($_GET['cmd']=="listing"){ // Delete maker
            $delete = "delete from listings where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Listing deleted successfully.";
                    header("Location:".$_SERVER['HTTP_REFERER']);    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:".$_SERVER['HTTP_REFERER']);        
            }
    }
    
     if($_GET['cmd']=="maker"){ // Delete maker
            $delete = "delete from makers where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Maker deleted successfully.";
                    header("Location:maker.php");    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:maker.php");        
            }
    }
     if($_GET['cmd']=="maker"){ // Delete Models
            $delete = "delete from models where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Model deleted successfully.";
                    header("Location:models.php");    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:models.php");        
            }
    }
     if($_GET['cmd']=="maker"){ // Delete Body Type
            $delete = "delete from body_type where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> Body Type deleted successfully.";
                    header("Location:body_type.php");    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:body_type.php");        
            }
    }
    if($_GET['cmd']=="city"){ // Delete City
            $delete = "delete from cities where id='".$_GET['id']."'";
            if(mysqli_query($con,$delete)){
                  $_SESSION['succes_sc'] = "<b>Success:</b> City name deleted successfully.";
                    header("Location:city.php");    
            }else{
                $_SESSION['error_ocr'] = "<b>Error:</b> An error occurred. Please try again.";
                header("Location:city.php");        
            }
    }
}
?>