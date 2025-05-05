<?php
$host = 'localhost';
$user = 'root';
$password = '128125';
$dbName = 'festdatabase';

$conn = new mysqli($host, $user, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $email = $conn->real_escape_string($_POST['email']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $venue = $conn->real_escape_string($_POST['venue']);
    $event = $conn->real_escape_string($_POST['event']);

    $sql = "INSERT INTO event_registration (name, email, phone, venue,  event) 
            VALUES ('$name', '$email', '$phone', '$venue',  '$event')";

    if ($conn->query($sql) === TRUE) {
        $redirectPage = "events.html";
        $waitTime = 5; 
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Registration Successful</title>
            <script>
                let timeLeft = <?php echo $waitTime; ?>;
                let redirectPage = "<?php echo $redirectPage; ?>";

                function countdown() {
                    if (timeLeft > 0) {
                        document.getElementById("timer").textContent = timeLeft;
                        timeLeft--;
                    } else {
                        window.location.href = redirectPage;
                    }
                }

                setInterval(countdown, 1000); // Update countdown every second
            </script>
        </head>
        <body>
            <h1>Registration successful!</h1>
            <p>You will be redirected to <strong><?php echo $redirectPage; ?></strong> in <span id="timer"><?php echo $waitTime; ?></span> seconds...</p>
        </body>
        </html>
        <?php
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

$conn->close();
?>
