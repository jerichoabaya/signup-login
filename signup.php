<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Page</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600&display=swap">
  <style>
    body {
      font-family: 'Exo', sans-serif;
      background: linear-gradient(135deg, #81d4fa, #c8e6c9); /* Blue-to-green gradient */
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      height: 100vh;
    }

    .container {
      width: 450px;
      background-color: #ffffff;
      border-radius: 20px;
      box-shadow: 0 10px 20px rgba(0, 0, 0, 0.15); /* Slightly darker shadow */
      padding: 40px;
      text-align: center;
      transition: transform 0.3s ease-in-out; /* Hover effect */
    }

    .container:hover {
      transform: scale(1.05); /* Interactivity on hover */
    }

    h1 {
      color: #0277bd; /* Deep blue */
      margin-bottom: 30px;
      font-weight: 600;
      letter-spacing: 1px;
    }

    .decorative-line {
      background: linear-gradient(to right, #0288d1, #26c6da); /* Blue gradient line */
      height: 3px;
      border-radius: 5px;
      margin: 20px 0; /* Decorative element */
    }

    input[type="text"],
    input[type="email"],
    input[type="password"] {
      width: calc(100% - 20px);
      padding: 12px;
      margin: 10px;
      border: none;
      border-radius: 5px;
      background-color: #e0f7fa; /* Soft blue background for input */
      font-size: 16px;
      transition: background-color 0.3s ease;
      outline: none;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); /* Subtle shadow */
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus {
      background-color: #b3e5fc; /* Slightly darker on focus */
    }

    button {
      width: calc(100% - 20px);
      padding: 15px;
      background-color: #0288d1; /* Blue button color */
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      font-size: 16px;
      transition: background-color 0.3s ease;
      outline: none;
      box-shadow: 0 3px 8px rgba(0, 0, 0, 0.15); /* Hover effect for button */
    }

    button:hover {
      background-color: #01579b; /* Darker blue on hover */
    }

    .links {
      margin-top: 20px;
      font-size: 14px; /* Link section */
    }

    .links a {
      color: #0288d1; /* Blue for links */
      text-decoration: none;
      transition: color 0.3s ease;
    }

    .links a:hover {
      color: #01579b; /* Darker blue on hover */
    }

  </style>
</head>
<body>
  <div class="container">
    <h1>Get started!</h1>
    <div class="decorative-line"></div> <!-- Horizontal gradient line -->
    <form action="process_signup.php" method="POST" novalidate>
      <input type="text" placeholder="Your Name" name="username" required>
      <input type="email" placeholder="Your Email" name="email" required>
      <input type="password" placeholder="Create a Password" id="password" name="password" required>
      <input type="password" placeholder="Confirm Password" id="confirm_password" name="confirm_password" required>
      <button type="submit">Sign Up</button>
      <div class="links">
        <span>Already have an account? </span><a href="login.php">Login here</a>
      </div>
    </form>
  </div>
</body>
</html>
