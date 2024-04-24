<?php
$is_invalid = false;

if($_SERVER["REQUEST_METHOD"] === "POST")
{
  $mysqli = require __DIR__ . "/database.php";
  $sql = sprintf("SELECT * FROM user WHERE email = '%s'", $mysqli->real_escape_string($_POST["email"]));
  $result = $mysqli->query($sql);
  $user = $result->fetch_assoc();

  if($user)
  {
    if(password_verify($_POST["password"], $user["password_hash"]))
    {
      session_start();
      session_regenerate_id();
      $_SESSION["user_id"] = $user["id"];
      header("Location: index.php");
      exit;
    }
  }
  $is_invalid = true;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600&display=swap">
  <style>
    body {
      font-family: 'Exo', sans-serif;
      background: linear-gradient(135deg, #b3e5fc, #c8e6c9); /* Calming blue-to-green gradient */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 500px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Slightly darker shadow */
      padding: 40px;
      text-align: center;
      transition: transform 0.3s ease-in-out;
    }

    .container:hover {
      transform: scale(1.05); /* Hover effect for interactivity */
    }

    h1 {
      color: #0277bd; /* Deep blue */
      margin-bottom: 30px;
      font-weight: 600;
      letter-spacing: 1px;
    }

    input[type="email"],
    input[type="password"] {
      width: calc(100% - 20px);
      padding: 12px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      background-color: #e0f7fa; /* Soft blue */
      font-size: 16px;
      transition: background-color 0.3s ease;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
    }

    input[type="email"]:focus,
    input[type="password"]:focus {
      background-color: #b3e5fc; /* Slightly darker on focus */
    }

    button {
      width: calc(100% - 20px);
      padding: 15px;
      background-color: #0288d1; /* Deep blue for buttons */
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
      outline: none;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15);
    }

    button:hover {
      background-color: #01579b; /* Darker blue on hover */
    }

    .links {
      margin-top: 20px;
      font-size: 14px;
    }

    .links a {
      color: #0288d1; /* Deep blue for links */
      text-decoration: none;
      transition: color 0.3s ease-in-out;
    }

    .links a:hover {
      color: #01579b; /* Darker blue on hover */
    }

    .decorative-line {
      background: linear-gradient(to right, #0288d1, #01579b); /* Blue gradient line */
      height: 3px;
      border-radius: 5px;
      margin: 20px 0;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Welcome, please log in to your account!</h1>
    <form method="post">
      <input type="email" placeholder="Email" name="email">
      <input type="password" placeholder="Password" name="password">
      <button type="submit">Login</button>
    </form>
    <div class="links">
      <span>Don't have an account? </span><a href="signup.php">Sign up here</a>
    </div>
    <div class="decorative-line"></div> <!-- Horizontal line with gradient -->
  </div>
</body>
</html>
