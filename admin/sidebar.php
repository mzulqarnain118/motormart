<div class="row">
    <div class="col-lg-12">
      <div class="extra-dashboard-menu dn-lg">
        <div class="ed_menu_list">
            <ul>
            
                <li><a class="<?php if($filename=="dashboard.php"){ echo "active"; } ?>" href="dashboard.php"><span class="flaticon-dashboard"></span>Dashboard</a></li>
                <?php
                    if(isset($_SESSION['type']) && $_SESSION['type']==1){
                ?>
                <li><a class="<?php if($filename=="users.php"){ echo "active"; } ?>" href="users.php"><span class="fa-solid fa-user fa-fw"></span></span>Users</a></li>
                <li><a class="<?php if($filename=="categories.php"){ echo "active"; } ?>" href="categories.php"><span class="fa-solid fa-list fa-fw"></span>Categories</a></li>
                <li><a class="<?php if($filename=="maker.php"){ echo "active"; } ?>" href="maker.php"><span class="fa-solid fa-list fa-fw"></span>Maker</a></li>
                <li><a class="<?php if($filename=="models.php"){ echo "active"; } ?>" href="models.php"><span class="fa-solid fa-list fa-fw"></span>Models</a></li>
                <li><a class="<?php if($filename=="body_type.php"){ echo "active"; } ?>" href="body_type.php"><span class="fa-solid fa-list fa-fw"></span>Body Type</a></li>
                <li><a class="<?php if($filename=="city.php"){ echo "active"; } ?>" href="city.php"><span class="fa-solid fa-list fa-fw"></span>City Names</a></li>
                <li><a class="<?php if($filename=="manage_featured.php"){ echo "active"; } ?>" href="manage_featured.php"><span class="flaticon-list"></span></span>Manage Features Listings</a></li>
                <li><a class="<?php if($filename=="manage_popular.php"){ echo "active"; } ?>" href="manage_popular.php"><span class="flaticon-list"></span></span>Manage Popular Makes</a></li>
                <li><a class="<?php if($filename=="manage_listings.php"){ echo "active"; } ?>" href="manage_listings.php"><span class="flaticon-list"></span></span>Manage Popular Listings</a></li>
                
                <?php } ?>
                <li><a class="<?php if($filename=="pending_listing.php"){ echo "active"; } ?>" href="pending_listing.php"><span class="flaticon-list"></span>Pending Listing</a></li>
                <li><a class="<?php if($filename=="my_listing.php"){ echo "active"; } ?>" href="my_listing.php"><span class="flaticon-list"></span>Active Listing</a></li>
                <li><a class="<?php if($filename=="my_profile.php"){ echo "active"; } ?>" href="my_profile.php"><span class="flaticon-user-2"></span>My Profile</a></li>
                <!--
                <li><a href="page-dashboard-profile.html"><span class="flaticon-user-2"></span>Profile</a></li>
                <li><a href="page-dashboard-favorites.html"><span class="flaticon-heart"></span>Favorites</a></li>
                <li><a href="page-dashboard-add-listings.html"><span class="flaticon-plus"></span>Add Listing</a></li>
                <li><a href="page-dashboard-messages.html"><span class="flaticon-message"></span>Messages</a></li>
                -->
                <li><a href="../logout.php"><span class="flaticon-logout"></span>Logout</a></li>
            </ul>
      </div>
      </div>
    </div>
  </div>
  <!----MOBILE MENU----->
  <div class="row">
	<div class="col-lg-12">
		<div class="dashboard_navigationbar dn db-lg mt50">
			<div class="dropdown">
				<button onclick="myFunction()" class="dropbtn"><i class="fa fa-bars pr10"></i> Dashboard Navigation</button>
				<ul id="myDropdown" class="dropdown-content">
                <li><a class="<?php if($filename=="dashboard.php"){ echo "active"; } ?>"href="dashboard.php"><span class="flaticon-dashboard"></span>Dashboard</a></li>
                  <?php
                    if(isset($_SESSION['type']) && $_SESSION['type']==1){
                ?>
                <li><a class="<?php if($filename=="users.php"){ echo "active"; } ?>" href="users.php"><span class="fa-solid fa-user fa-fw"></span></span>Users</a></li>
                <li><a class="<?php if($filename=="categories.php"){ echo "active"; } ?>" href="categories.php"><span class="fa-solid fa-list fa-fw"></span>Categories</a></li>
                <li><a class="<?php if($filename=="maker.php"){ echo "active"; } ?>" href="maker.php"><span class="fa-solid fa-list fa-fw"></span>Maker</a></li>
                <li><a class="<?php if($filename=="models.php"){ echo "active"; } ?>" href="models.php"><span class="fa-solid fa-list fa-fw"></span>Models</a></li>
                <li><a class="<?php if($filename=="body_type.php"){ echo "active"; } ?>" href="body_type.php"><span class="fa-solid fa-list fa-fw"></span>Body Type</a></li>
                <li><a class="<?php if($filename=="city.php"){ echo "active"; } ?>" href="city.php"><span class="fa-solid fa-list fa-fw"></span>City Names</a></li>
                <li><a class="<?php if($filename=="manage_featured.php"){ echo "active"; } ?>" href="manage_featured.php"><span class="flaticon-list"></span></span>Manage Features Listings</a></li>
                <li><a class="<?php if($filename=="manage_popular.php"){ echo "active"; } ?>" href="manage_popular.php"><span class="flaticon-list"></span></span>Manage Popular Makes</a></li>
                <li><a class="<?php if($filename=="manage_listings.php"){ echo "active"; } ?>" href="manage_listings.php"><span class="flaticon-list"></span></span>Manage Popular Listings</a></li>
                <?php
                    }
                ?>
                <li><a class="<?php if($filename=="pending_listing.php"){ echo "active"; } ?>" href="pending_listing.php"><span class="flaticon-list"></span>Pending Listing</a></li>
                <li><a class="<?php if($filename=="my_listing.php"){ echo "active"; } ?>" href="my_listing.php"><span class="flaticon-list"></span>Active Listing</a></li>
                <li><a class="<?php if($filename=="my_profile.php"){ echo "active"; } ?>" href="my_profile.php"><span class="flaticon-user-2"></span>My Profile</a></li>
               <!--
                <li><a href="page-dashboard-profile.html"><span class="flaticon-user-2"></span>Profile</a></li>
                <li><a href="page-dashboard-favorites.html"><span class="flaticon-heart"></span>Favorites</a></li>
                <li><a href="page-dashboard-add-listings.html"><span class="flaticon-plus"></span>Add Listing</a></li>
                <li><a href="page-dashboard-messages.html"><span class="flaticon-message"></span>Messages</a></li>
                -->
                <li><a href="../logout.php"><span class="flaticon-logout"></span>Logout</a></li>
				</ul>
			</div>
		</div>
	</div>
</div>