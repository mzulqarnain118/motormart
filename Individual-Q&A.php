<?php
// Fetch the HTML content using cURL or any other method
$html = '<!-- Replace this with your fetched HTML content -->';

 $questions = array();
                    if($listingDataArray['questions']!=NULL){
                        $questions =  json_decode($listingDataArray['questions'],true);
                    }
                     $answers = array();
                    if($listingDataArray['answers']!=NULL){
                        $answers =  json_decode($listingDataArray['answers'],true);
                    }
$faq = array();

if (is_array($questions) && is_array($answers) && count($questions) === count($answers)) {
  $count = count($questions);
  
  for ($i = 0; $i < $count; $i++) {
    $faq[] = array(
      'question' => $questions[$i],
      'answer' => $answers[$i]
    );
  }
}


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

    /* Card styles */
    .listCard-container {
      display: flex;
      justify-content: center;
      flex-wrap: wrap;
    }

    .listCard {
      background-color: white;
      padding: 20px;
      margin-bottom: 20px;
          width: 521px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }




    /* Question styles */
    .question {
      color: #333;
      font-size: 18px;
      font-weight: bold;
      cursor: pointer;
      display: flex;
      align-items: center;
      margin-bottom: 10px;
      transition: color 0.3s ease-in-out;
    }

    .question::before {
      content: '+';
      display: inline-block;
      margin-right: 5px;
      color: #555;
      transition: color 0.3s ease-in-out;
    }
   
    .listCard:hover{
            border: 1px solid purple;

    }
    .question:hover,
    .question.open {
      color: purple;
    }

    .question:hover::before,
    .question.open::before {
      color: purple;
    }

    .question.open::before {
      content: '✕';
    }

    /* Answer styles */
    .answer-listCard {
      display: none;
      background-color: white;
      padding: 20px;
      box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
      margin-top: 20px;
    }

    .answer-listCard:hover{
            box-shadow: 0 4px 6px purple;
    }
    .answer-listCard.open {
      display: block;
    }
  </style>
</head>
<body>
  <?php echo $html; ?>

  <div class="section">
    <h2>FAQs</h2>
  </div>

  <?php foreach ($faq as $index => $item) { ?>
    <div class="listCard-container">
      <div class="listCard ">
        <div class="question">Question <?php echo $index + 1; ?>: <?php echo $item['question']; ?></div>
        <div class="answer-listCard">
          <div class="answer"><?php echo $item['answer']; ?></div>
        </div>
      </div>
    </div>
  <?php } ?>

  <script>
    // JavaScript to handle click interactions
    const cards = document.querySelectorAll('.listCard');

    cards.forEach((listCard) => {
      const question = listCard.querySelector('.question');
      const answerCard = listCard.querySelector('.answer-listCard');

      question.addEventListener('click', () => {
        if (answerCard.classList.contains('open')) {
          answerCard.classList.remove('open');
          question.classList.remove('open');
        } else {
          answerCard.classList.add('open');
          question.classList.add('open');
        }
      });
    });
  </script>
</body>
</html>
