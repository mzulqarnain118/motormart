<?php
    include_once("header.php");
?>
<section class="our-partner pb100">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="main-title text-center">
            <h2>New Cars by Make</h2>
          </div>
        </div>
      </div>
      <div class="partner_divider">
        <div class="row">
        <?php
        $select = "select * from makers where image_url!='' order by id ";
        //$select = "select * from makers order by title asc";
        $q_run =  mysqli_query($con,$select);
        if(mysqli_num_rows($q_run)>0){
            while($data =  mysqli_fetch_assoc($q_run)){
            ?>
            <div class="col-6 col-xs-6 col-sm-3 col-xl-2 wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">
                <a href="listings.php?maker=<?php echo $data['id']; ?>&condition=New"><div class="partner_item">
                  <img height="60" src="<?php echo getServerURL(); ?>admin/maker_images/<?php echo $data['image_url']; ?>" alt="<?php echo $data['image_url']; ?>" />
                </div></a>
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