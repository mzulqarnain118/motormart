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
                <h2 class="breadcrumb_title">Pending Listings</h2>
                <p>Ready to jump back in!</p>
                <a href="add-listing.php" class="btn btn-primary">Add Listing</a>
              </div>
						</div>
					</div>
                  <div class="row">
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
                  </div>
                  <div class="row">
                    <table class="table">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Listing Title</th>
                          <th scope="col">Add</th>
                          <th scope="col">Staus</th>
                          <th scope="col">Want Featured</th>
                          <th scope="col">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                                $page_no = $_GET['page_no'];
                            } else {
                                $page_no = 1;
                        }
                         $total_records_per_page = 10;                        
                        $offset = ($page_no-1) * $total_records_per_page;
                        $previous_page = $page_no - 1;
                        $next_page = $page_no + 1;
                        if(isset($_SESSION['type']) && $_SESSION['type']==1){
                            $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings` where is_active=0");
                        }else{
                            $result_count = mysqli_query(   $con,"SELECT COUNT(*) As total_records FROM `listings` where user_id='".$_SESSION['user_id']."' and is_active=0");
                        }
                        $total_records = mysqli_fetch_array($result_count);
                        $total_records = $total_records['total_records'];
                        $total_no_of_pages = ceil($total_records / $total_records_per_page);
                        $second_last = $total_no_of_pages - 1; // total pages minus 1
                            if(isset($_SESSION['type']) && $_SESSION['type']==1){
                                $select = "select * from listings where is_active=0 order by id asc LIMIT $offset, $total_records_per_page";
                            }else{
                                $select = "select * from listings where user_id='".$_SESSION['user_id']."' and is_active=0 order by id asc LIMIT $offset, $total_records_per_page";
                            }
                            
                           // $select = "select * from models order by title asc";
                            $q_run =  mysqli_query($con,$select);
                            if(mysqli_num_rows($q_run)>0){
                                while($data =  mysqli_fetch_assoc($q_run)){
                                ?>
                                <tr>
                                  <th scope="row"><?php echo $data['id'] ?></th>
                                  <td><?php echo DBout($data['listing_title']); ?></td>
                                  <td>
                                  <?php
                                  if($data['listing_type']==1){
                                    echo "Accessory";
                                  }else if($data['listing_type']==2){
                                    echo "Service";
                                  }
                                  else{
                                    echo "Ads Listing";
                                  }
                                  ?>
                                  </td>
                                  <td>
                                    <?php
                                        if($data['is_active']==0){ // PENDING
                                            echo "Pending";
                                        }else if($data['is_active']==1){ // APPROVD
                                            echo "Approved";
                                        }else if($data['is_active']==2){ // REJECTED
                                            echo "Rejected";
                                        }
                                    ?>
                                  </td>
                                  <td>
                                    <?php
                                    if($data['want_featured']==1){ //
                                        echo "Yes"; 
                                    }else{
                                        echo "No";
                                    }
                                    ?>
                                  </td>
                                  <td>
                                  <?php
                                  if($data['listing_type']==1){ // ADD ACCESSORY
                                    ?>
                                    <a href="edit-accessory.php?id=<?php echo $data['id']; ?>" class="btn  btn-primary">Edit</a>
                                  <!--<a href="../listing_view.php?id=<?php echo $data['id']; ?>" class="btn  btn-info">View</a>-->
                                  <a onclick="return confirm_delete()" href="delete.php?cmd=accessory&id=<?php echo $data['id']; ?>" class="btn  btn-danger">Delete</a>
                                  <?php
                                  if($data['is_active']==0){
                                    if(isset($_SESSION['type']) && $_SESSION['type']==1){
                                  ?>
                                    <a onclick="return confirm_apr(<?php echo $data['id']; ?>)" href="javascript:void(0)" class="btn  btn-success">Approve</a>
                                    <form method="post" action="controlling.php" class="form_sold_<?php echo $data['id']; ?>" style="display: none;">
                                        <input type="hidden" name="cmd" value="approve_item" />
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="hidden" name="type" value="1" />
                                        <input type="hidden" name="is_active" value="1" />
                                    </form>
                                    
                                    <a onclick="return confirm_reject(<?php echo $data['id']; ?>)" href="javascript:void(0)" class="btn  btn-danger">Reject</a>
                                    <form method="post" action="controlling.php" class="form_reject_<?php echo $data['id']; ?>" style="display: none;">
                                        <input type="hidden" name="cmd" value="approve_item" />
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="hidden" name="type" value="1" />
                                        <input type="hidden" name="is_active" value="2" />
                                    </form>
                                    <?php
                                        }
                                    }
                                    
                                  }if($data['listing_type']==2){ //! ADD SERVICE
                                    ?>
                                    <a href="edit-service.php?id=<?php echo $data['id']; ?>" class="btn  btn-primary">Edit</a>
                                  <!--<a href="../listing_view.php?id=<?php echo $data['id']; ?>" class="btn  btn-info">View</a>-->
                                  <a onclick="return confirm_delete()" href="delete.php?cmd=service&id=<?php echo $data['id']; ?>" class="btn  btn-danger">Delete</a>
                                  <?php
                                  if($data['is_active']==0){
                                    if(isset($_SESSION['type']) && $_SESSION['type']==1){
                                  ?>
                                    <a onclick="return confirm_apr(<?php echo $data['id']; ?>)" href="javascript:void(0)" class="btn  btn-success">Approve</a>
                                    <form method="post" action="controlling.php" class="form_sold_<?php echo $data['id']; ?>" style="display: none;">
                                        <input type="hidden" name="cmd" value="approve_item" />
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="hidden" name="type" value="1" />
                                        <input type="hidden" name="is_active" value="1" />
                                    </form>
                                    
                                    <a onclick="return confirm_reject(<?php echo $data['id']; ?>)" href="javascript:void(0)" class="btn  btn-danger">Reject</a>
                                    <form method="post" action="controlling.php" class="form_reject_<?php echo $data['id']; ?>" style="display: none;">
                                        <input type="hidden" name="cmd" value="approve_item" />
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="hidden" name="type" value="1" />
                                        <input type="hidden" name="is_active" value="2" />
                                    </form>
                                    <?php
                                        }
                                    }
                                    
                                  }
                                  else{ // Add LISTING
                                  ?>
                                    <a href="edit-listing.php?id=<?php echo $data['id']; ?>" class="btn  btn-primary">Edit</a>
                                  <!--<a href="../listing_view.php?id=<?php echo $data['id']; ?>" class="btn  btn-info">View</a>-->
                                  <a onclick="return confirm_delete()" href="delete.php?cmd=listing&id=<?php echo $data['id']; ?>" class="btn  btn-danger">Delete</a>
                                  <?php
                                  if($data['is_active']==0){
                                    if(isset($_SESSION['type']) && $_SESSION['type']==1){
                                  ?>
                                    <a onclick="return confirm_apr(<?php echo $data['id']; ?>)" href="javascript:void(0)" class="btn  btn-success">Approve</a>
                                    <form method="post" action="controlling.php" class="form_sold_<?php echo $data['id']; ?>" style="display: none;">
                                        <input type="hidden" name="cmd" value="approve_item" />
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="hidden" name="is_active" value="1" />
                                    </form>
                                    
                                    <a onclick="return confirm_reject(<?php echo $data['id']; ?>)" href="javascript:void(0)" class="btn  btn-danger">Reject</a>
                                    <form method="post" action="controlling.php" class="form_reject_<?php echo $data['id']; ?>" style="display: none;">
                                        <input type="hidden" name="cmd" value="approve_item" />
                                        <input type="hidden" name="id" value="<?php echo $data['id']; ?>" />
                                        <input type="hidden" name="is_active" value="2" />
                                    </form>
                                    <?php
                                        }
                                    }
                                    
                                    }
                                   ?>
                                  </td>
                                </tr>
                                <?php
                                }
                            }
                        ?>
                        
                      </tbody>
                    </table>
                    <?php pagnination_btns($page_no,$previous_page,$total_no_of_pages,$next_page); ?>
                  </div>
				</div>
			</div>
		</div>
	</section>
<?php
include_once("footer.php");
?>
<script>
    function confirm_apr(id){
        var conf = window.confirm("Are you sure to approve?");
        if(conf){
            $(".form_sold_"+id).submit();
            //return true;
        }else{
            return false;
        }
    }
    function confirm_reject(id){
        var conf = window.confirm("Are you sure to reject this?");
        if(conf){
            $(".form_reject_"+id).submit();
            //return true;
        }else{
            return false;
        }
    }
</script>