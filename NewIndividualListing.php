<?php 
 include_once("header.php"); 
 ?>
<head>

  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-solid-straight/css/uicons-solid-straight.css'>
  <link rel="stylesheet" href="fonts/stylesheet.css">

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

   .star-golden {
        color: goldenrod; /* Or any other golden color you prefer */
    }
  /* Media query for screens with width less than or equal to 768px (typical tablet or mobile width) */
  @media screen and (max-width: 768px) {
    .slideshow-container {
    width: 100vw !important;
        margin: auto;
        position: static !important;
    border: none;
    }
    .mySlides .slide {
      display: none;
      width: 108vw;
      /* Hide all slides initially */
    }

    .mySlides .slide:first-child {
      display: block;
      /* Show only the first slide on mobile */
    }

    .mySlides .slide:first-child>img {
      max-width: 100%;
      /* Make the image full width */
      margin-right: 0;
      margin-bottom: 10px;
      /* Add some space between image and content */
    }

    .car-info {
      width: 100% !important;
    }

    .car-info img {
      max-width: 100%;
      /* Make the image full width */
      margin-right: 0;
      margin-bottom: 10px;
      /* Add some space between image and content */
    }

    .overview1 {
      width: 100%;
      margin-top: 100px !important;
    }

    .overview div {
      display: flex;
      flex-direction: column;
      /* Stack items in a column on mobile */
    }

    .overview div p {
      margin-bottom: 10px;
      /* Add spacing between stacked items */
    }

    .car-info>div {
      flex-direction: column;
    }

    /* Adjust styles for navigation buttons if needed */
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



  /* Section styles */
  .section {
    text-align: center;
    margin-bottom: 40px;
  }

  .section h2 {
    color: purple;
    font-size: 24px;
    font-weight: bold;
    margin-bottom: 10px;
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
    flex-direction: column;
    align-items: center;
    width: 77%;
    margin-left: auto;
    margin-right: auto;
  }

  .car-info>div {
    display: flex;
    justify-content: space-between;
    flex-wrap: wrap;
    width: 100%;
  }

  .car-info>div>div {
    flex-basis: 50%;
  }

  .chevron {
    background-color: rgba(128, 0, 128, 0.8);
    color: #fff;
    width: 40px;
    position: absolute;
    height: 40px;
    top: 57%;
    z-index: 1;
    transform: translateY(-50%);
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 24px;
    border-radius: 50%;
    cursor: pointer;
    transition: background-color 0.3s;
  }

  .chevron:hover {
    background-color: rgba(128, 0, 128, 1);
  }



  .overview {
    width: 574px;
    background-color: #F2F6FC;
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
    height: 400px;
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

  .running-costs {
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
  }

  .running-costs .running-cost-card {
    flex-basis: calc(50% - 10px);
    padding: 10px;
    border-radius: 5px;
    background-color: #ffffff;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.1);
  }

  .running-costs .running-cost-card h4 {
    margin-top: 0;
  }

  .running-costs .running-cost-card .rating {
    display: flex;
    align-items: center;
    font-size: 14px;
  }

  .running-costs .running-cost-card .rating i {
    color: #ffa500;
    margin-right: 5px;
  }
  </style>
</head>


<section style="display:flex;flex-direction:column;align-items:center">
  <?php
$id = $_GET['id'];
    $listingData = "SELECT *, m.title AS modelName,mk.title as model,b.title as bodyType
FROM listings AS l
INNER JOIN models AS m ON m.id = l.model_id
INNER JOIN makers AS mk ON mk.id = l.maker_id
INNER JOIN body_type AS b ON b.id = l.body_type_id WHERE l.id = '$id'";
  $result = mysqli_query($con,$listingData);
  $listingDataArray = mysqli_fetch_array($result);

// Array of image filenames
$imageFilenames = [
    '1.jpg',
    '2.jpg',
    '3.jpg',
    '4.jpg',
    '5.jpg',
    '6.jpg',
    '7.jpg',
    '8.jpg',
    // Add more image filenames as needed
];

     $ratingsArray = explode(",", $listingDataArray['ReviewRatings']);
// Directory path for the images
$imageDirectory = 'images/SingleListingPics/';
  $imageFolder = 'images/SingleListingPics/';
  $totalImages = 16; // Total number of images in the folder

  $currentImage = isset($_GET['image']) ? $_GET['image'] : 1;
  $previousImage = ($currentImage - 1) % $totalImages;
  $nextImage = ($currentImage + 1) % $totalImages;
  if ($previousImage === 0) {
    $previousImage = $totalImages;
  }
  if ($nextImage === 0) {
    $nextImage = $totalImages;
  }

  $imagePaths = [];
  for ($i = 1; $i <= 6; $i++) {
    $imageIndex = ($currentImage + $i - 2) % $totalImages;
    if ($imageIndex === 0) {
      $imageIndex = $totalImages;
    }
    $imagePaths[] = $imageFolder . $imageIndex . '.jpg';
  }

                              $images_url = json_decode($listingDataArray['images_url']);

  ?>

  <div class="slideshow-container">
    <div class="external-div">
      <div class="mySlides">
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[0]; ?>"
            alt="<?php echo $images_url[0]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[1]; ?>"
            alt="<?php echo $images_url[1]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[2]; ?>"
            alt="<?php echo $images_url[2]; ?>">
        </div>
      </div>
      <div class="mySlides">
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[1]; ?>"
            alt="<?php echo $images_url[1]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[2]; ?>"
            alt="<?php echo $images_url[2]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[3]; ?>"
            alt="<?php echo $images_url[3]; ?>">
        </div>
      </div>
      <div class="mySlides">
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[2]; ?>"
            alt="<?php echo $images_url[2]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[3]; ?>"
            alt="<?php echo $images_url[3]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[4]; ?>"
            alt="<?php echo $images_url[4]; ?>">
        </div>
      </div>
      <div class="mySlides">
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[3]; ?>"
            alt="<?php echo $images_url[3]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[4]; ?>"
            alt="<?php echo $images_url[4]; ?>">
        </div>
        <div class="slide">
          <img src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[5]; ?>"
            alt="<?php echo $images_url[5]; ?>">
        </div>
      </div>
    </div>
    <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
    <a class="next" onclick="plusSlides(1)">&#10095;</a>
  </div>
  <script>
  var slideIndex = 0;
  showSlides();

  function plusSlides(n) {
    slideIndex += n;
    showSlides();
  }

  function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    if (slideIndex >= slides.length) {
      slideIndex = 0;
    }
    if (slideIndex < 0) {
      slideIndex = slides.length - 1;
    }
    for (i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
    }
    slides[slideIndex].style.display = "block";
  }
  </script>
</section>

<section class="car-info">
  <div>
    <div>
      <h1><?php echo $listingDataArray["model"]; ?> <?php echo $listingDataArray["modelName"]; ?></h1>
      <p>New from £<?php echo $listingDataArray['price']; ?> p/m</p>
    </div>
    <div class="overview">
      <h1>Overview</h1>
      <div style="display:flex;justify-content:space-between;">

        <div>
          <p>
            <img src="images/NewIcons/bodyType.png" alt="car" width="15" height="15" style="margin-right:0.5rem;height: 15px;
    width: 15px;">
            <?php echo $listingDataArray['bodyType']; ?>
          </p>
          <p>
            <img src="images/NewIcons/car-seat.png" alt="car" width="15" height="15" style="margin-right:0.5rem;height: 15px;
    width: 15px;">
            <?php echo $listingDataArray['seats']; ?> Seats
          </p>
          <p>
            <img src="images/NewIcons/gas-station.png" style="margin-right:0.5rem;height: 15px;
    width: 15px;" alt="Gasoline" width="15" height="15">
            <?php echo $listingDataArray['feulType']; ?>
          </p>
        </div>
        <div>
          <p>
            <img src="images/NewIcons/car.png" alt="car" width="15" height="15" style="margin-right:0.5rem;height: 15px;
    width: 15px;">
            <?php echo $listingDataArray['doors']; ?> Doors
          </p>
          <p>
            <img src="images/NewIcons/automatic.png" style="margin-right:0.5rem;height: 15px;
    width: 15px;" alt="Gasoline" width="15" height="15">
            <?php echo $listingDataArray['transmission']; ?>
          </p>
        </div>
      </div>

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
<?php
$rating = trim($ratingsArray[0], '"');
echo '<div class="rating-box">';
echo '<div class="ratings">' . $rating . '/5</div>';
for ($i = 0; $i < 5; $i++) {
    if ($i < $rating) {
        echo '<span class="fi fi-ss-star star-golden"></span>';
    } else {
        echo '<span class="fi fi-ss-star"></span>';
    }
}
echo '</div>';
?>


        </div>
      </div>

    </div>
  </div>
</section>




<?php 
  include_once("AboutIndividualCar.php");
   include_once("StandardQuipment.php");
 include_once("Individual-Q&A.php"); 
 ?>
<?php
    include_once("footer.php");
?>