<?php
$host = 'localhost';
$user = 'root'; 
$password = '128125'; 
$dbName = 'festdatabase';
$conn = new mysqli($host, $user, $password, $dbName);
if ($conn->connect_error) { die("Connection failed: " . $conn->connect_error); }
if ($_SERVER['REQUEST_METHOD'] === 'POST') { $name =
$conn->real_escape_string($_POST['name']); $email =
$conn->real_escape_string($_POST['email']); $college_id =
$conn->real_escape_string($_POST['id']); $branch =
$conn->real_escape_string($_POST['branch']); $semester =
$conn->real_escape_string($_POST['sem']); $event =
$conn->real_escape_string($_POST['event']); $sql = "INSERT INTO
event_registration (name, email, college_id, branch, semester, event) VALUES
('$name', '$email', '$college_id', '$branch', '$semester', '$event')"; if
($conn->query($sql) === TRUE) { echo "Registration successful!"; } else { echo
"Error: " . $sql . "<br />" . $conn->error; } } $conn->close(); ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Registration</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
    <style>
      body {
        background-image: linear-gradient(to bottom right, #6a11cb, #2575fc);
        background-size: cover;
        font-family: "Arial", sans-serif;
        color: #fff;
      }

      .navbar {
        box-shadow: 0 4px 6px rgba(52, 2, 2, 0.1);
      }

      h2.text-center {
        color: #fff;
        font-weight: bold;
        animation: fadeIn 2s ease-in-out;
      }

      .container {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(10px);
        border-radius: 15px;
        padding: 30px;
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.3);
      }

      .form-control,
      .form-select {
        background-color: rgba(255, 255, 255, 0.9);
        border: none;
        border-radius: 8px;
        color: #333;
      }

      .form-control:focus,
      .form-select:focus {
        box-shadow: 0 0 8px #6a11cb;
        outline: none;
      }

      button {
        background: linear-gradient(to right, #6a11cb, #2575fc);
        border: none;
        border-radius: 8px;
        padding: 10px 20px;
        font-size: 16px;
        font-weight: bold;
        color: #fff;
        cursor: pointer;
        transition: all 0.3s ease;
      }

      button:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0, 0, 0, 0.2);
      }

      @keyframes fadeIn {
        from {
          opacity: 0;
          transform: scale(0.9);
        }

        to {
          opacity: 1;
          transform: scale(1);
        }
      }

      form {
        animation: fadeIn 1.5s ease-in-out;
      }

      @keyframes textGlow {
        0%,
        100% {
          text-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 20px #3a1a26,
            0 0 30px #82131d, 0 0 40px #2c0c12;
        }

        50% {
          text-shadow: 0 0 5px #fff, 0 0 15px #fff, 0 0 25px #6a11cb,
            0 0 35px #2575fc, 0 0 45px #2575fc;
        }
      }

      h2 {
        animation: textGlow 2s infinite;
      }

    </style>
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Registration Portal</a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="quiz.html">Quiz</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container my-5">
      <h2 class="text-center">Event Registration</h2>
      <form
        id="registrationForm"
        class="needs-validation"
        novalidate
        method="POST"
        action="submit_project_registration.php"
      >
        <div class="mb-3">
          <label for="name" class="form-label">Name</label>
          <input
            type="text"
            class="form-control"
            id="name"
            name="name"
            required
          />
          <div class="invalid-feedback">Please enter your name.</div>
        </div>
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input
            type="email"
            class="form-control"
            id="email"
            name="email"
            required
          />
          <div class="invalid-feedback">Please enter a valid email-id.</div>
        </div>
        <div class="mb-3">
          <label for="id" class="form-label">College ID</label>
          <input type="text" class="form-control" id="id" name="id" required />
          <div class="invalid-feedback">Please enter your college ID.</div>
        </div>
        <div class="mb-3">
          <label for="branch" class="form-label">Branch</label>
          <input
            type="text"
            class="form-control"
            id="branch"
            name="branch"
            required
          />
          <div class="invalid-feedback">Please enter your branch.</div>
        </div>
        <div class="mb-3">
          <label for="sem" class="form-label">Semester</label>
          <input
            type="text"
            class="form-control"
            id="sem"
            name="sem"
            required
          />
          <div class="invalid-feedback">Please enter your semester.</div>
        </div>
        <div class="mb-3">
          <label for="event" class="form-label">Event</label>
          <select class="form-select" id="event" name="event" required>
            <option selected disabled value="">Choose...</option>
            <option value="Dance Battle">Dance Battle</option>
            <option value="Tech Talk">Tech Talk</option>
            <option value="Sports Meet">Sports Meet</option>
            <option value="Academic Deals">Academic Deals</option>
            <option value="Dandiya Night">Dandiya Night</option>
            <option value="Singing Competition">Singing Competition</option>
          </select>
          <div class="invalid-feedback">Please select an event.</div>
        </div>
        <button class="btn btn-primary" type="submit" <a href="submit_project_registration.php">Submit</a></button>
      </form>
    </div>

    <script>
      (function () {
        "use strict";
        const forms = document.querySelectorAll(".needs-validation");
        Array.from(forms).forEach(function (form) {
          form.addEventListener(
            "submit",
            function (event) {
              if (!form.checkValidity()) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add("was-validated");

              window.location.href = "project_feedback.html";
            },
            false
          );
        });
      })();
    </script>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </body>
</html>
