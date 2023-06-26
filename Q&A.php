<?php
// Fetch the HTML content using cURL or any other method
$html = '<!-- Replace this with your fetched HTML content -->';

// Array of questions and answers
$faq = array(
  array(
    'question' => 'What is the cost to list a personal item?',
    'answer' => 'It costs you absolutely zero.'
  ),
  array(
    'question' => 'What is the cost to advertise services?',
    'answer' => 'Advertising in the services department costs $30 per month. Yearly payments are reduced to $300 per year. We also offer creative services to create your own custom services page, priced at $200.'
  ),
  array(
    'question' => 'What is the best way to show a product on Bermuda Motoring Mart?',
    'answer' => 'We recommend having the vehicle cleaned and detailed, and having vibrant and up-to-date photographs. We can provide you with all of this.'
  ),
  array(
    'question' => 'What is a verified certification?',
    'answer' => 'The digital certification shows a prospective buyer the condition of the vehicle they are buying. We thoroughly inspect and document the state of the vehicle, providing buyer confidence and helping to sell vehicles faster.'
  ),
  array(
    'question' => 'How long does the certification process take?',
    'answer' => 'The process can be as fast as 10 minutes, but the vehicle must be on site. If a site visit is required, it can be arranged, but a fee will be incurred for travel time.'
  ),
  array(
    'question' => 'What is the price for certification?',
    'answer' => 'The certification price ranges from $20 to $200, depending on the vehicle type and location. Once created, the digital certificate will be placed online with your ad to help build consumer confidence in the sale.'
  ),
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
      <div class="listCard col-8">
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
