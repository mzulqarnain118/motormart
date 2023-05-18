<?php 
 include_once("header.php"); 
 ?>

	<!-- Inner Page Breadcrumb -->
	<section class="inner_page_breadcrumb" style="margin-top: 12px;">
		<div class="container">
			<div class="row">
				<div class="col-xl-12">
					<div class="breadcrumb_content">
						<h2 class="breadcrumb_title">About Us</h2>
            <p class="subtitle"></p>
						<ol class="breadcrumb">
					    <!--<li class="breadcrumb-item"><a href="#">Home</a></li>-->
					    
						</ol>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- About Text Content -->
	<section class="about-section pb130">
		<div class="container">
			<div class="row">
				<!--<div class="col-lg-6">
					<div class="about_thumb mb30-md">
						<img class="thumb1" src="images/about/1.jpg" alt="1.jpg">
            <img class="img-fluid thumb2" src="images/about/2.jpg" alt="2.jpg">
					</div>
				</div>-->
				<div class="col-lg-12 ">
					<div class="about_content" style="margin-top: 0px;">
            <h2 class="title">Welcome To The <br/>BERMUDA MOTORING MART</h2>
            <p class="mb30">Bermuda Motoring Mart is a one-stop-shop for all your vehicle needs in Bermuda. We are a trusted online marketplace that allows individuals and dealers to sell and purchase cars, bikes, trucks, motorsports, and vehicle accessories.</p>
            <p class="mb30">Our mission is to make the process of buying and selling vehicles and their accessories as simple and stress-free as possible. We understand that the process of buying and selling vehicles can be overwhelming, which is why we have created a platform that is easy to navigate and user-friendly.</p>
            <p class="mb30">With Bermuda Motoring Mart, you can browse through a wide range of vehicles from the comfort of your own home. Whether you're looking for a new car, bike, truck, motorsport, or vehicle accessory, you'll find it on our platform. Our vast selection of vehicles and accessories makes it easy for you to find what you're looking for.</p>
            <p class="mb30">We also understand that trust is important when buying or selling vehicles, which is why we offer inspection servicess and have a team of experts who can thoroughly inspect each vehicle before it is listed on our platform. We also offer a secure payment system to ensure that both buyers and sellers are protected.</p>
            <p class="mb30">At Bermuda Motoring Mart, we strive to provide our customers with the best possible experience. We are committed to providing you with a wide range of vehicles and accessories at competitive prices. We also offer a customer support team that is available to answer any questions you may have.</p>
            <p class="mb30">So, whether you're looking to buy or sell a vehicle, Bermuda Motoring Mart is the perfect platform for you. Browse our selection today and find your next ride!</p>
            
     
            <!--<a class="btn btn-thm about-btn" href="#">Learn More</a>-->
					</div>
				</div>
			</div>
		</div>
	</section>
  

  
   <!-- Our Partners -->
  <section class="our-partner pb100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="main-title text-center">
            <h2>Popular Makes</h2>
          </div>
        </div>
      </div>
      <div class="partner_divider">
        <div class="row">
        <?php
        $select = "select * from makers where image_url!='' and popular=1 order by title asc LIMIT 12";
        //$select = "select * from makers order by title asc";
        $q_run =  mysqli_query($con,$select);
        if(mysqli_num_rows($q_run)>0){
            while($data =  mysqli_fetch_assoc($q_run)){
            ?>
            <div class="col-6 col-xs-6 col-sm-4 col-xl-2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
            
                <div class="partner_item">
                <a href="listings.php?maker=<?php echo $data['id'] ?>">
                  <img loading="lazy" title="<?php echo $data['title']; ?>" height="60" src="<?php echo getServerURL(); ?>admin/maker_images/<?php echo $data['image_url']; ?>" alt="<?php echo $data['image_url']; ?>"/>
                  </a>
                </div>
              </div>
            
            <?php
            }
        }
        ?>
        </div>
      </div>
    </div>
  </section>

	<?php
    include_once("footer.php");
?>