<?php

session_start();
// print_r($_SESSION);

if(isset($_SESSION["user_id"]))
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = "SELECT * FROM user WHERE id = {$_SESSION["user_id"]}";
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600&display=swap">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <style>
    body {
      font-family: 'Exo', sans-serif;
      background: linear-gradient(135deg, #b3e5fc, #c8e6c9); /* Gradient with light blue and green */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
      overflow: hidden; /* Prevent scrolling */
    }

    .container {
      width: 450px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2); /* Slightly darker shadow */
      padding: 50px;
      text-align: center;
      transition: transform 0.3s ease-in-out;
    }

    .container:hover {
      transform: scale(1.05); /* Hover effect */
    }

    h1 {
      color: #0288d1; /* Deep blue */
      font-weight: 700;
      margin-bottom: 30px;
      font-size: 2em; /* Larger font */
      text-shadow: 1px 1px 2px rgba(0, 0, 0, 0.1); /* Light shadow */
    }

    p {
      font-size: 16px;
      color: #01579b; /* Darker blue for text */
      margin-bottom: 20px;
    }

    a {
      color: #03a9f4; /* Light blue for links */
      text-decoration: none;
      transition: color 0.3s ease-in-out;
      font-weight: 600;
    }

    a:hover {
      color: #0288d1; /* Darker blue on hover */
    }

    .btn {
      background-color: #0288d1; /* Deep blue for buttons */
      color: #ffffff;
      border: none;
      border-radius: 10px;
      padding: 12px 25px;
      cursor: pointer;
      transition: background-color 0.3s ease-in-out;
    }

    .btn:hover {
      background-color: #01579b; /* Darker blue on hover */
    }

    .decorative-line {
      background: linear-gradient(to right, #0288d1, #03a9f4); /* Gradient decorative line */
      height: 3px;
      border-radius: 5px;
      margin: 20px 0;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Welcome User!</h1>

    <?php if(isset($user)): ?>
      <p>Hello, <?= htmlspecialchars($user["username"]); ?>. You are now logged in.</p>
      <button class="btn"><a href="logout.php" style="color: white; text-decoration: none;">Logout</a></button> <!-- Button for Logout -->
    <?php else: ?>
      <p><a href="login.php">Login</a> or <a href="signup.php">Sign up</a></p>
    <?php endif; ?>

    <div class="decorative-line"></div> <!-- Decorative line for visual separation -->
  </div>
</body>
</html>
