<?php 
 include_once("header.php"); 
 ?>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="fonts/stylesheet.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <style>

  </style>
</head>
<style>
h1,
h2,
h3,
h4,
.h1,
.h2,
.h3,
.h4 {
  font-weight: 400 !important;
}

h6 {
  font-family: 'lt_streakbold', sans-serif !important;
  font: weight 50px;
}

p,
div {
  font-family: 'lt_streakmedium', sans-serif !important;
  font-size: 20px;
}

.custom-font {
  font-family: 'lt_streakextra_bold', sans-serif !important;
}

body {
  font-family: 'lt_streakregular', sans-serif !important;
}

.review {
  max-width: 600px;
  margin: 20px auto;
  padding: 20px !important;
  ;
  background-color: #fff;
  border: 1px solid #ddd;
  border-radius: 5px;
}

.review h2 {
  font-size: 24px;
  margin: 0;
  margin-bottom: 10px;

}

.rating-box {
  display: inline-block;
  margin-right: 10px;
}

.rating-box .ratings {
  display: inline-block;
  background-color: purple;
  border-radius: 5px;
  padding: 5px;
  margin-right: 10px;
  color: #fff;
  width: 48px;
}

.review p {
  font-size: 16px;
  line-height: 1.5;
  margin: 0;
}

section {
  display: flex;
  flex-direction: column;
  align-items: center;
  margin-left: auto;
  margin-right: auto;
  padding: 43px 0 !important;
}

.gallery {
  display: flex;
  justify-content: space-evenly;
  gap: 10px;
  align-self: center;
  margin: 0 auto;
}




.card {
  width: 100%;
  height: 200px;
  margin-bottom: 10px;
}

.card img {
  width: 440px;
  height: 250px;
}

.car-info {
  display: flex;
  flex-direction: row;
  /* align-items: center; */
  width: 77%;
  margin-left: auto;
  margin-right: auto;
}

.crousal-container {
  width: 77%;
}

.car-info>div {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  width: 100%;
}

.crousal-container>div {
  display: flex;
  justify-content: space-between;
  flex-wrap: wrap;
  width: 100%;
}

.car-info>div>div {
  flex-basis: 50%;
}


.overview1 {
  width: 574px;
  padding: 57px;
}


.overview {
  width: 474px;
  padding: 37px;
}

.mySlides {
  display: none;
  width: 100%;
  overflow: hidden;
}

.slide {
  width: 30%;
  float: left;
  margin-left: 16px
}

.slide>img {
  height: 242px;
}

img {
  vertical-align: middle;
  width: 100%;
}

.slideshow-container {
  width: 77%;
  position: relative;
  margin: auto;
  overflow: hidden;
}

.next {
  background-color: white;
  cursor: pointer;
  position: absolute;
  top: 50%;
  right: 0;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 3px 0 0 3px;
  user-select: none;
}

.prev {
  background-color: white;
  margin-left: 16px;
  cursor: pointer;
  position: absolute;
  top: 50%;
  left: 0;
  width: auto;
  padding: 16px;
  margin-top: -22px;
  color: black;
  font-weight: bold;
  font-size: 18px;
  transition: 0.6s ease;
  border-radius: 3px 0 0 3px;
  user-select: none;
}

.prev:hover,
.next:hover {
  background-color: rgba(128, 0, 128, 1);
}

.external-div {
  width: 130%;
}

.overview>p {
  display: flex;
  justify-content: space-between;
  align-items: center;
}



.ratings .rating-card {
  padding: 10px;
  border-radius: 5px;
  background-color: #ffffff;
  box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  transition: background-color 0.3s;
  cursor: pointer;
}

.ratings .rating-card:hover {
  background-color: #f5f5f5;
}

.ratings .rating-card.selected {
  background-color: #800080;
  color: #ffffff;
}

.container1 {
  width: 2400px;
  height: 400px;
}

.carousel-inner>.item>img {
  width: 100%;
  height: 600px !important;
}
</style>

<head>
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
</head>
<?php
$id = $_GET['id'];
    $listingData = "SELECT *, m.title AS modelName,mk.title as model,b.title as bodyType
FROM listings AS l
INNER JOIN models AS m ON m.id = l.model_id
INNER JOIN makers AS mk ON mk.id = l.maker_id
INNER JOIN body_type AS b ON b.id = l.body_type_id WHERE l.id = '$id'";
  $result = mysqli_query($con,$listingData);
  $listingDataArray = mysqli_fetch_array($result);


     $ratingsArray = explode(",", $listingDataArray['ReviewRatings']);
                              $images_url = json_decode($listingDataArray['images_url']);

  ?>

<section class="crousal-container">
  <div class="row">
    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12" style="width:60%;">
      <div class="container1">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>

          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <?php foreach ($images_url as $index => $image_url): ?>
            <div class="item <?php echo ($index === 0) ? 'active' : ''; ?>">
              <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $image_url; ?>"
                alt="<?php echo $image_url; ?>">
            </div>
            <?php endforeach; ?>
            <!-- <div class="item active">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>" alt="<?php echo $images_url[0]; ?>">
            </div>

            <div class="item">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[1]; ?>" alt="<?php echo $images_url[1]; ?>">
            </div>

            <div class="item">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[2]; ?>" alt="<?php echo $images_url[2]; ?>">
            </div> -->
          </div>

          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>

      </div>

    </div>
    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12" style="width:40%;">
      <div>
        <h1>BRAND NEW</h1>
        <h1><strong><?php echo $listingDataArray['model']; ?> <?php echo $listingDataArray['modelName']; ?></strong>
        </h1>
        <p><?php echo $listingDataArray['model']; ?> </p>
        <p><?php echo $listingDataArray['model_year']; ?> </p>
        <h1><strong> £<?php echo $listingDataArray['price']; ?> p/m</strong></h1>
      </div>
    </div>
  </div>
</section>

<section class="car-info">

  <div>
    <div class="d-flex justify-evenly ">
      <div>work</div>
      <div>hard</div>
      <div>until</div>
      <div>succed</div>
    </div>
    <div class="overview">

    </div>
  </div>
</section>

<section class="car-info">
  <div>
    <div>
      <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[10]; ?>" alt="About Picture"
        style="margin-right:0.5rem;    width: 556px;
    height: 408px;">
    </div>
    <div class="overview1">

      <h1>About <?php echo $listingDataArray['model']; ?> <?php echo $listingDataArray['modelName']; ?></h1>
      <div style="display:flex;flex-wrap: wrap;justify-content:space-between;">

        <div>
          <p><?php echo $listingDataArray['description']; ?> </p>
          <!-- <?php
$rating = trim($ratingsArray[0], '"');
echo '<div class="rating-box">';
echo '<div class="ratings">' . $rating . '/5</div>';
for ($i = 0; $i < $rating; $i++) {
  echo '<span class="fi fi-ss-star"></span>';
}
echo '</div>';
?> -->

        </div>
      </div>

    </div>
  </div>
</section>



<?php
    include_once("footer.php");
?>