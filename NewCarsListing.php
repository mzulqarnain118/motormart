<?php
// Fetch the HTML content using cURL or any other method
$html = '<!-- Replace this with your fetched HTML content -->';

// Dummy car listings
$carListings = array(
    array(
        'Model' => 'BMW X5',
        'Body Type' => 'SUV',
        'Seats' => 5,
        'Fuel Type' => 'Petrol',
        'Price' => '$50,000'
    ),
    array(
        'Model' => 'BMW 3 Series',
        'Body Type' => 'Sedan',
        'Seats' => 5,
        'Fuel Type' => 'Diesel',
        'Price' => '$40,000'
    ),
    array(
        'Model' => 'BMW i8',
        'Body Type' => 'Coupe',
        'Seats' => 2,
        'Fuel Type' => 'Electric',
        'Price' => '$100,000'
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
            font-family: Arial, sans-serif;
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

        /* Filters styles */
        .filters {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .filter-item {
            flex-basis: 25%;
            text-align: center;
        }

        /* Card styles */
        .card-container {
            display: flex;
            justify-content: center;
        }

        .card {
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            margin-bottom: 20px;
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
        .answer-card {
            display: none;
            background-color: white;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }

        .answer-card.open {
            display: block;
        }
    </style>
</head>
<body>
<?php echo $html; ?>

<div class="section">
    <h2>Your questions answered</h2>
</div>

<div class="row">
   
 <div class="col-4 filters">
        <div class="filter-item">
            <h3>Filters</h3>
        </div>
        <div class="filter-item">
            <h4>Models</h4>
            <!-- Add your model filter options here -->
        </div>
        <div class="filter-item">
            <h4>Body Type</h4>
            <!-- Add your body type filter options here -->
        </div>
        <div class="filter-item">
            <h4>Seats</h4>
            <!-- Add your seats filter options here -->
        </div>
        <div class="filter-item">
            <h4>Fuel Type</h4>
            <!-- Add your fuel type filter options here -->
        </div>
        <div class="filter-item">
            <h4>Min Price</h4>
            <!-- Add your min price filter option here -->
        </div>
        <div class="filter-item">
            <h4>Max Price</h4>
            <!-- Add your max price filter option here -->
        </div>
    </div>
    <div class="col-8">
    <div class="card-container">
        <div class="card">
            <div class="question">
                <div class="icon">+</div>
                <div class="question-text">Question 1</div>
            </div>
            <div class="answer-card">
                <div class="answer">Answer 1</div>
            </div>
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <div class="question">
                <div class="icon">+</div>
                <div class="question-text">Question 2</div>
            </div>
            <div class="answer-card">
                <div class="answer">Answer 2</div>
            </div>
        </div>
    </div>

    <div class="card-container">
        <div class="card">
            <div class="question">
                <div class="icon">+</div>
                <div class="question-text">Question 3</div>
            </div>
            <div class="answer-card">
                <div class="answer">Answer 3</div>
            </div>
        </div>
    </div>
</div>

<div class="col-2"></div>
</div>
</body>
</html>