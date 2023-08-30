<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather Links</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 800px;
            margin: auto;
        }

        .list-group-item {
            background-color: #fff;
            border: none;
            margin-bottom: 10px;
            box-shadow: 0px 0px 5px rgba(0, 0, 0, 0.2);
        }

        .list-group-item a {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #333;
        }

        .list-group-item img {
            max-height: 40px;
            margin-right: 10px;
        }
   .back-button {
            position: absolute;
            top: 20px;
            left: 20px;
            background-color: #7a4397;
            color: #fff;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
            margin-bottom: 20px;
        }
             @media (max-width: 576px) {
            .back-button {
                top: 1%;
                left: 5%;
            }
        }
    </style>
</head>
<body>
<button class="back-button" onclick="window.location.href = 'index.php'">Back</button>
<div class="container mt-5">
    <ul class="list-group">
        <li class="list-group-item">
            <a href="https://Spaghettimodels.com" target="_blank">
                <img src="images/icon/MWPWeather.jpeg" alt="Icon 1">
                Spaghettimodels
            </a>
        </li>
        <li class="list-group-item">
            <a href="https://www.windy.com/" target="_blank">
                <img src="images/icon/windyWeahter.jpeg" alt="Icon 2">
                Windy Weather
            </a>
        </li>
        <li class="list-group-item">
            <a href="https://tgftp.nws.noaa.gov/weather/current/TXKF.html" target="_blank">
                <img src="images/icon/cloudy.jpg" alt="Icon 5">
                Noaa Weather
            </a>
        </li>
        <li class="list-group-item">
            <a href="http://www.weather.bm/tools/graphics.asp?name=250KM%20SRI&user=" target="_blank">
                <img src="images/icon/cloudy-day_3314019.png" alt="Icon 5">
                Weather Graphics
            </a>
        </li>
        <li class="list-group-item">
            <a href="http://www.weather.bm/" target="_blank">
                <img src="images/icon/bmWeather.gif" alt="Icon 5">
                Weather BM
            </a>
        </li>
        <li class="list-group-item">
            <a href="https://www.bbc.com/weather/3573197" target="_blank">
                <img src="images/icon/BBCWeather.png" alt="Icon 1">
                BBC Weather
            </a>
        </li>
        <li class="list-group-item">
            <a href="https://www.nhc.noaa.gov/gtwo.php" target="_blank">
                <img src="images/icon/hurricane1.png" alt="Icon 2">
                NHC [Hurricane]
            </a>
        </li>
    </ul>
</div>
<!-- Include Bootstrap JS (Optional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
