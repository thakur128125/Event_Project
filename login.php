<?php
$host = 'localhost';
$user = 'root';
$password = '128125';
$dbName = 'festdatabase';

$conn = new mysqli($host, $user, $password, $dbName);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

session_start();

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];

            header('Location: home.html');
            exit();
        } else {
            $error = "Invalid email or password.";
        }
    } else {
        $error = "Invalid email or password.";
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - College Event Portal</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-image: url('loginbg2.jpg');
      background-size: cover;
      background-position: center;
      background-attachment: fixed;
    }

    .login-container {
      max-width: 400px;
      margin: 100px auto;
      padding: 30px;
      background-color: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }

    .form-control:focus {
      border-color: #007bff;
      box-shadow: 0 0 5px rgba(0, 123, 255, 0.5);
    }

    .password-toggle {
      position: relative;
    }

    .password-toggle .toggle-icon {
      position: absolute;
      top: 51px;
      right: 10px;
      transform: translateY(-50%);
      cursor: pointer;
    }
  </style>
</head>

<body>
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Event Portal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="home.html">Home</a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container">
    <div class="login-container">
      <h2 class="text-center mb-4">Login</h2>

      <!-- Show error message -->
      <?php if (!empty($error)): ?>
        <div class="alert alert-danger text-center">
          <?php echo $error; ?>
        </div>
      <?php endif; ?>

      <!-- Login form -->
      <form action="login.php" method="POST">
        <div class="mb-3">
          <label for="email" class="form-label">Email address</label>
          <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email" required>
        </div>
        <div class="mb-3 password-toggle">
          <label for="password" class="form-label">Password</label>
          <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
          <i class="toggle-icon bi bi-eye-slash" id="togglePassword"></i>
        </div>
        <button type="submit" class="btn btn-primary w-100"><a href="events.html">Login Here</a></button>
      </form>

      <div class="text-center mt-3">
        <p>Don't have an account? <a href="user-reg.php">Register here</a></p>
      </div>
    </div>
  </div>

  <footer class="bg-primary text-white text-center py-3 mt-5">
    <p>&copy; 2024 College Event Management. All rights reserved.</p>
    <a href="contact.html" class="text-white">Contact Us</a>
  </footer>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    const togglePassword = document.getElementById('togglePassword');
    const passwordField = document.getElementById('password');

    togglePassword.addEventListener('click', () => {
      const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
      passwordField.setAttribute('type', type);

      togglePassword.classList.toggle('bi-eye');
      togglePassword.classList.toggle('bi-eye-slash');
    });
  </script>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</body>

</html>
