<?php
// Fetch the HTML content using cURL or any other method
$html = '<!-- Replace this with your fetched HTML content -->';
$audioSE = json_decode($listingDataArray['audioSE'], true) ?: [];
$exterior = json_decode($listingDataArray['exterior'], true) ?: [];
$interiorSE = json_decode($listingDataArray['interiorSE'], true) ?: [];
$illumination = json_decode($listingDataArray['illumination'], true) ?: [];
$driverAssistance = json_decode($listingDataArray['driverAssistance'], true) ?: [];
$performanceSE = json_decode($listingDataArray['performanceSE'], true) ?: [];
$safetySecurity = json_decode($listingDataArray['safetySecurity'], true) ?: [];

$faq = array(
  array(
    'question' => 'Audio and Communications',
    'answer' => implode(PHP_EOL . "- ", $audioSE)
  ),
  array(
    'question' => 'Exterior',
    'answer' => implode(PHP_EOL . "- ", $exterior)
  ),
  array(
    'question' => 'Interior',
    'answer' => implode(PHP_EOL . "- ", $interiorSE)
  ),
  array(
    'question' => 'Illumination',
    'answer' => implode(PHP_EOL . "- ", $illumination)
  ),
  array(
    'question' => 'Driver Assistance',
    'answer' => implode(PHP_EOL . "- ", $driverAssistance)
  ),
  array(
    'question' => 'Performance',
    'answer' => implode(PHP_EOL . "- ", $performanceSE)
  ),
  array(
    'question' => 'Safety and Security',
    'answer' => implode(PHP_EOL . "- ", $safetySecurity)
  )
);


?>

<!DOCTYPE html>
<html>
<head>
  <style>
    /* Global styles */
    body {
      background-color: #F5EEFD;
      margin: 0;
      padding: 20px;
      font-family: 'lt_streakregular', sans-serif !important;
    }


    /* Card styles */
    .listCardEq-container {
      display: flex;
      justify-content: center;
    }

    .listCardEq {
      background-color: white;
      padding: 20px;
      margin-bottom: 20px;
      width: 521px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    /* Question styles */
    .questionEq {
      color: #333;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      transition: color 0.3s ease-in-out;
    }

    .questionEq::before {
      content: '+';
      display: inline-block;
      margin-right: 5px;
      color: #555;
      transition: color 0.3s ease-in-out;
    }

    .listCardEq:hover {
      border: 1px solid purple;
    }

    .questionEq:hover,
    .questionEq.open {
      color: purple;
    }

    .questionEq:hover::before,
    .questionEq.open::before {
      color: purple;
    }

    .questionEq.open::before {
      content: '✕';
    }

    /* Answer styles */
/* Answer styles */
.answer-listCardEq {
  display: none;
  background-color: white;
  padding: 20px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  margin-top: 20px;
}

.answer-listCardEq:hover {
  box-shadow: 0 4px 6px purple;
}

.answer-listCardEq.open {
  display: block;
}

.answer-listCardEq ul {
  list-style-type: disc;
  color: darkpurple;
  padding-left: 20px;
}



  </style>
</head>
<body>
  <?php echo $html; ?>

  <div class="section">
    <h2>Standard equipment</h2>
  </div>

  <?php foreach ($faq as $index => $item) { ?>
    <div class="listCardEq-container">
      <div class="listCardEq">
        <div class="questionEq"><?php echo $item['question']; ?></div>
        <div class="answer-listCardEq">
          <div class="answer"><?php echo $item['answer']; ?></div>
        </div>
      </div>
    </div>
  <?php } ?>

  <script>
    // JavaScript to handle click interactions
    const cardsEq = document.querySelectorAll('.listCardEq');

    cardsEq.forEach((listCardEq) => {
      const questionEq = listCardEq.querySelector('.questionEq');
      const answerCardEq = listCardEq.querySelector('.answer-listCardEq');

      questionEq.addEventListener('click', () => {
        if (answerCardEq.classList.contains('open')) {
          answerCardEq.classList.remove('open');
          questionEq.classList.remove('open');
        } else {
          answerCardEq.classList.add('open');
          questionEq.classList.add('open');
        }
      });
    });
  </script>
</body>
</html>
