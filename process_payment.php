<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $amount = htmlspecialchars($_POST['amount']);
    $payment_method = htmlspecialchars($_POST['payment_method']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('card.jpg'); /* Replace with your image path */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.7); /* Semi-transparent background */
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            width: 100%;
        }
        h1 {
            text-align: center;
            color: #333; /* Dark text color for headings */
            font-size: 2rem;
            margin-bottom: 20px;
        }
        p {
            font-size: 1.1rem;
            margin: 10px 0;
            color: #333; /* Darker text color for readability */
        }
        .highlight {
            font-weight: bold;
            color: #4CAF50; /* Green color for highlights */
        }
        .button {
            display: block;
            background-color: #007BFF;
            color: white;
            text-align: center;
            padding: 12px;
            margin-top: 20px;
            border-radius: 4px;
            text-decoration: none;
            font-size: 1rem;
            width: 100%;
        }
        .button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Payment Details</h1>
        <p><span class="highlight">Name:</span> <?php echo $name; ?></p>
        <p><span class="highlight">Email:</span> <?php echo $email; ?></p>
        <p><span class="highlight">Amount:</span> ₹<?php echo $amount; ?></p>
        <p><span class="highlight">Payment Method:</span> <?php echo $payment_method; ?></p>
        <p><span class="highlight">Redirecting to payment gateway...</span></p>
        <a href="#" class="button">Proceed to Payment</a>
    </div>
</body>
</html>
<?php
}
?>
