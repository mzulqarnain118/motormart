<!DOCTYPE html>
<html>

<head>
  <style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
  }
  @media screen and (max-width: 768px) {
   .viewByCategoryContent{
      width: 100vw;
      display : flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
   }
     .viewByCategoryContent {
      text-align: center; /* Center content on mobile */
    }
   
    .overview1 p{
      margin: 20px auto;
    }
    .viewByCategoryContent > div {
      margin: 20px auto; /* Add margin for centering */
      width: 342px; /* Occupy full width on mobile */
    }

    /* Adjust the styles for the h1 elements */
    .viewByCategoryContent h1,.viewByCategoryContent p {
      font-size: 20px; /* Adjust the font size */
      margin: 10px 0; /* Add spacing around the h1 elements */
      word-wrap: break-word; /* Wrap long words to the next line */
    }
    .container1 {
      max-width: 100%; /* Occupy full width on smaller screens */
      padding: 20px;
    }

    .row {
      flex-direction: column; /* Stack columns on smaller screens */
    }

    .col-6 {
      width: 100%; /* Occupy full width on smaller screens */
    }
      .category li .card-button {
        width: 100%; /* Make card buttons full width on mobile */
        text-align: center;
      }
      .category li.active .card-button{
        margin-left: 341px;
      }
      .car-summary {
        width: 100%; /* Make car-summary section full width on mobile */
      }

      .car-summary img {
        max-width: 100%; /* Make car-summary image full width on mobile */
        margin-right: 0; /* Remove margin on mobile */
      }

      .car-review p,
      .car-review h2 {
        width: auto; /* Allow text to flow naturally on mobile */
      }

      .car-summary p,
      .car-review h2 {
        font-size: 16px; /* Adjust font size for better readability on mobile */
      }
    }
  .container1 {
    max-width: 50%;
    margin: 0 auto;
    padding: 20px;
  }

  .car-summary {
    display: flex;
    align-items: center;
    margin-bottom: 20px;
    width: 971px;
  }

  .car-summary img {
    width: 100%;
    max-width: 400px;
    margin-right: 20px;
  }

  .car-summary p {
    font-size: 18px;
    margin: 0;
  }

  .car-review {
    margin-bottom: 20px;
  }

  .car-review h2 {
    font-size: 24px;
    margin-top: 0;
  }

  .car-review p {
    font-size: 16px;
    line-height: 1.5;
    width: 1011px;
  }

  .category {
    margin-bottom: 20px;
  }

  .category h2 {
    font-size: 24px;
    margin-top: 0;
  }

  .category ul {
    list-style-type: none;
    padding: 0;
  }

  .category li {
    font-size: 16px;
    line-height: 1.5;
    margin-bottom: 10px;
    display: flex;
    align-items: center;
  }

  .category li .card-button {
    position: relative;
    padding: 10px 20px;
    background-color: #800080;
    color: #fff;
    font-size: 16px;
    text-decoration: none;
    border-radius: 5px;
    cursor: pointer;
  }

  .category li .card-button:hover {
    background-color: #4B0082;
  }

  .category li .card-button::after {
    content: "";
    position: absolute;
    top: 50%;
    right: -10px;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-top: 10px solid transparent;
    border-bottom: 10px solid transparent;
    border-left: 10px solid #800080;
  }

  .category li .content-card {
    display: none;
    width: 800px;
    height: 4px;
    background-color: #800080;
    border-radius: 5px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    position: relative;
    z-index: 1;
    overflow: hidden;
  }

  .category li .stars {
    display: flex;
    position: relative;
    top: -15px;
    left: 0;
    width: 100%;
    height: 15px;
    background: url(images/NewIcons/star.png) repeat-x 0 0;
  }

  .category li .stars span {
    display: block;
    height: 100%;
    background: url(images/NewIcons/star.png) repeat-x 0 -15px;
  }

  .category li.active .content-card {
    display: block;
  }

  .category li.active .card-button::after {
    border-left-color: #4B0082;
  }
  
  </style>
</head>

<body>
    <div class="section">
            <h2 style="    font-size: xx-large;
    margin-top: 90px;">Read the review by category</h2>
          </div>
  <section class="container1">
    <div class="row">
      <div class="col-6">
        <div class="category">
      
          <div>
            <ul>
              <li class="active">
                <span class="card-button">Running Cost (<?php echo $ratingsArray[1];?>/5)</span>
                <div class="content-card">
                  <div class="stars">
                    <span style="width: 60%;"></span>
                  </div>
                </div>
              </li>
              <li>
                <span class="card-button">Performance (<?php echo $ratingsArray[2];?>/5)</span>
                <div class="content-card">
                  <div class="stars">
                    <span style="width: 60%;"></span>
                  </div>
                </div>
              </li>
              <li>
                <span class="card-button">Safety (<?php echo $ratingsArray[3];?>/5)</span>
                <div class="content-card">
                  <div class="stars">
                    <span style="width: 80%;"></span>
                  </div>
                </div>
              </li>
              <li>
                <span class="card-button">Interior (<?php echo $ratingsArray[4];?>/5)</span>
                <div class="content-card">
                  <div class="stars">
                    <span style="width: 80%;"></span>
                  </div>
                </div>
              </li>
              <li>
                <span class="card-button">Reliability (<?php echo  trim($ratingsArray[5], '"');?>/5)</span>
                <div class="content-card">
                  <div class="stars">
                    <span style="width: 40%;"></span>
                  </div>
                </div>
              </li>
            </ul>
          </div>

        </div>
      </div>
      <div class="col-6 viewByCategoryContent">
        <div id="runningCost">
          <h1 class="italic-heading">Running costs for a <?php echo $listingDataArray['model']; ?>
            <?php echo $listingDataArray['modelName']; ?> </h1>
          <p><?php echo $listingDataArray['RunningCost']; ?></p>
          <img loading="lazy" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[4]; ?>"
            alt="Running Cost Picture" style="height: 300px; width: 453px;">
        </div>
        <div id="performance">
          <h1 class="italic-heading">Performance for a <?php echo $listingDataArray['model']; ?>
            <?php echo $listingDataArray['modelName']; ?> </h1>
          <p><?php echo $listingDataArray['Performance']; ?></p>
          <img loading="lazy" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[5]; ?>"
            alt="Performance Picture" style="height: 300px; width: 453px;">
        </div>
        <div id="safety">
          <h1 class="italic-heading">Safety for a <?php echo $listingDataArray['model']; ?>
            <?php echo $listingDataArray['modelName']; ?> </h1>
          <p><?php echo $listingDataArray['Safety']; ?></p>
          <img loading="lazy" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[6]; ?>"
            alt="Safety Picture" style="height: 300px; width: 453px;">
        </div>
        <div id="interior">
          <h1 class="italic-heading">Interior for a <?php echo $listingDataArray['model']; ?>
            <?php echo $listingDataArray['modelName']; ?> </h1>
          <p><?php echo $listingDataArray['Interior']; ?></p>
          <img loading="lazy" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[7]; ?>"
            alt="Interior Picture" style="height: 300px; width: 453px;">
        </div>
        <div id="reliability">
          <h1 class="italic-heading">Reliability for a <?php echo $listingDataArray['model']; ?>
            <?php echo $listingDataArray['modelName']; ?> </h1>
          <p><?php echo $listingDataArray['Reliability']; ?></p>
          <img loading="lazy" src="<?php echo getServerURL(); ?>admin/listing_images/<?php echo $images_url[8]; ?>"
            alt="Reliability Picture" style="height: 300px; width: 453px;">
        </div>
      </div>
    </div>
  </section>

  <script>
  const categoryButtons = document.querySelectorAll('.card-button');
  const contentDivs = document.querySelectorAll('.viewByCategoryContent > div');

  categoryButtons.forEach((button, index) => {
    button.addEventListener('click', () => {
      const li = button.parentElement;

      contentDivs.forEach((div, i) => {
        if (i === index) {
          div.style.display = 'block';
        } else {
          div.style.display = 'none';
        }
      });

      categoryButtons.forEach((otherButton, i) => {
        const otherLi = otherButton.parentElement;

        if (otherButton !== button) {
          otherLi.classList.remove('active');
          otherButton.style.backgroundColor = '#800080';
          otherButton.style.color = '#fff';
        }
      });

      li.classList.add('active');
      button.style.backgroundColor = '#4B0082';
      button.style.color = '#fff';
    });
  });

  // Automatically select the first category
  categoryButtons[0].click();
  </script>

</body>

</html>