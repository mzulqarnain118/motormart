<!DOCTYPE html>
<html>
<head>
  <title>Pricing Page</title>
  <style>
    body {
      font-family: Arial, sans-serif;
    }
    
    .container {
      max-width: 800px;
      margin: 0 auto;
      padding: 20px;
    }
    
    h1 {
      color: #663399; /* Purple color */
      text-align: center;
    }
    
    .pricing-card {
      display: flex;
      flex-direction: column;
      align-items: center;
      padding: 20px;
      border: 1px solid #ddd;
      margin-bottom: 20px;
      text-align: center;
    }
    
    .pricing-card h2 {
      color: #663399; /* Purple color */
    }
    
    .pricing-card p {
      margin-top: 10px;
    }
    
    @media (min-width: 768px) {
      .pricing-card {
        flex-direction: row;
        justify-content: center;
        text-align: left;
      }
      
      .pricing-card .pricing-details {
        margin-left: 20px;
      }
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Pricing</h1>

    <div class="pricing-card">
      <h2>Vehicle Advertising</h2>
      <div class="pricing-details">
        <p>For each vehicle, pricing is $30/Month to advertise.</p>
      </div>
    </div>

    <div class="pricing-card">
      <h2>Service Advertising</h2>
      <div class="pricing-details">
        <p>Similarly, for each service, the price is $30/Month to advertise.</p>
      </div>
    </div>
  </div>
</body>
</html>
