
  <!-- Our Footer -->
  <section class="footer_one pt50 pb25">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-xl-7">
          <div class="footer_about_widget text-start">
            <div class="logo mb40 mb0-sm"><img src="images/site_logo.png" style="width: 200px;" alt="header-logo.png"></div>
          </div>
        </div>
        <div class="col-md-8 col-xl-5">
          <div class="footer_menu_widget text-start text-md-end mt15">
            <ul>
              <li class="list-inline-item"><a href="/">Home</a></li>
              <li class="list-inline-item"><a href="about-us.php">About Us</a></li>
              <li class="list-inline-item"><a href="privacy-policy.php">Privacy Policy</a></li>
              <li class="list-inline-item"><a href="our-vision.php">Our Vision</a></li>
              
            </ul>
          </div>
        </div>
      </div>
    </div>
    <hr>
    <div class="container pt80 pt20-sm pb70 pb0-sm">
      <div class="row">
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
          <div class="footer_about_widget">
            <h5 class="title">OFFICE</h5>
            <p>152 Northshore Road,<br /> Permoke, Bermuda HM11</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
          <div class="footer_contact_widget">
            <h5 class="title">NEED HELP</h5>
            <div class="footer_phone">+1 441 747 1683</div>
            <p>info@bdamotoring.com</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3 col-xl-3">
          <div class="footer_contact_widget">
            <h5 class="title">OPENING HOURS</h5>
            <p>Business Hours: 24/7 <br /> Payment  and Support Hours: 09:00am - 06:30pm</p>
          </div>
        </div>
        <div class="col-sm-6 col-md-6 col-lg-3 col-xl-3">
          <div class="footer_contact_widget">
            <h5 class="title">KEEP IN TOUCH</h5>
            <form class="footer_mailchimp_form">
              <div class="wrapper">
                <div class="col-auto">
                  <input type="email" class="form-control" placeholder="Enter your email...">
                  <button type="submit">GO</button>
                </div>
              </div>
            </form>
            <p>Get latest updates and offers.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-lg-8 col-xl-9">
          <div class="copyright-widget mt5 text-start mb20-sm">
            <p>LiveLoveLaughLimited  © <?php date('Y') ?>. All Rights Reserved.</p>
          </div>
        </div>
        <div class="col-md-6 col-lg-4 col-xl-3">
          <div class="footer_social_widget text-start text-md-end">
            <ul class="mb0">
              <li class="list-inline-item"><a href="#"><i class="fab fa-facebook-f"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
              <li class="list-inline-item"><a href="#"><i class="fab fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  <a class="scrollToHome" href="#"><i class="fas fa-arrow-up"></i></a>
</div>
<!-- Wrapper End --> 
<script src="js/jquery-3.6.0.js"></script> 
<script src="js/jquery-migrate-3.0.0.min.js"></script> 
<script src="js/popper.min.js"></script> 
<script src="js/bootstrap.min.js"></script> 
<script src="js/bootstrap-select.min.js"></script>
<script src="js/jquery.mmenu.all.js"></script> 
<script src="js/ace-responsive-menu.js"></script> 
<script src="js/isotop.js"></script> 
<script src="js/snackbar.min.js"></script> 
<script src="js/simplebar.js"></script> 
<script src="js/parallax.js"></script> 
<script src="js/scrollto.js"></script> 
<script src="js/jquery-scrolltofixed-min.js"></script> 
<script src="js/jquery.counterup.js"></script> 
<script src="js/wow.min.js"></script> 
<script src="js/progressbar.js"></script> 
<script src="js/slider.js"></script>
<script src="js/timepicker.js"></script> 
<script src="js/wow.min.js"></script> 

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAAz77U5XQuEME6TpftaMdX0bBelQxXRlM&amp;callback=initMap"></script>
<script src="js/googlemaps1.js"></script>
<!-- Custom script for all pages --> 
<script src="js/script.js"></script>
  <script type="text/javascript">
  function change_tab(id){
    if(id!=''){
        var panel = $('.accord_tab .panel_'+id).css('display');
        console.log(panel);
        $('.accord_tab .pinls').hide();
        $('.accord_tab .panel_'+id).show();
        if(panel=='block'){
            $('.accord_tab .panel_'+id).hide();
        }
    }
  }
/*var acc = document.getElementsByClassName("accordions");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    
    this.classList.toggle("active");
    $('.accord_tab .panel_1').hide();
    $('.accord_tab .accordions').removeClass('active');
    var panel = this.nextElementSibling;
    console.log(panel.style.display);
    if (panel.style.display === "block") {
        panel.style.display = "none";
    } else {
        panel.style.display = "block";
    }
  }); 
} */
</script>
</body>

<!-- Mirrored from creativelayers.net/themes/voiture-html/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 14 Nov 2022 07:55:33 GMT -->

<style>
.advance_search_panel .nav-pills .nav-link.active{
  color: #1a3760;
}
.more_listing .icon {
    background-color: #7A4397 !important;
    color:#fff;}
    .footer_mailchimp_form button {
    background-color: #7A4397;
    color: #fff;
    border: 1px solid #f7f7f7;
    }
    .scrollToHome {
    background-color: #7A4397;}
    .btn-thm {
    background-color: #7a4397;
    border: 1px solid #7a4397;
    color: #fff;
    }
    .popular_listing_sliders .nav-tabs {
    background-color: #7A4397;
    }
    .popular_listing_sliders .nav-tabs .nav-link {
    color: #ffff;}
    .category_item .details .title, .category_item .details .title a{
      color:#7A4397;
    }
    h2,h4{
      color:#7A4397;
    }
    .why_chose_us .details .title, .why_chose_us .details .title a{
      color:#7A4397;
    }
    .header-nav.menu_style_home_one.home3_style {
    height: 150px;
}
.car-listing .thumb img {
	width: 100%;
}
.car-listing .thumb {
	height: 200px;
	display: flex;
	align-items: center;

    margin: auto;
}
.car-listing:hover .thumb {
	background: #fff;
}
.navbar_brand.float-start.dn-md {
    margin: 0 !important;
}
.header-nav.menu_style_home_one.home3_style {
    height: 100px !important;
}

@media screen and (max-width: 768px) {
    /*.featured_container{
        padding: 0px;
        max-width: 98%;
        
    }*/
}
</style>
</html>