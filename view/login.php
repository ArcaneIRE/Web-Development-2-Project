<?php 
  session_start();

  $root = $_SERVER['DOCUMENT_ROOT'] . '/web-dev-project';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web-dev-project/view/css/login.css">
  <title>Log In</title>
</head>
<body>
  <?php
    include $root . '/view/include/header.php';
  ?>

  <main>
    <h2 id="form-title" >Login</h1>
    <form method="post" action="">
    <div class="row">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="row">
        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required>
      </div>
      <button>Log In</button>
    </form>
    <?php

      if (isset($_POST['username']) && isset($_POST['password'])) {
        require_once $root . '/model/database_connect.php';

        $username = $_POST['username'];
        $password = $_POST['password'];

        $logInQuery = "SELECT username, password FROM users WHERE username = '$username'";
        $result = $conn->query($logInQuery);
        if ($result->num_rows === 0) {
          echo '<p class="error">Incorrect username or password.</p>';
          return;
        }
        else {
          $truePassword = mysqli_fetch_array($result)[1];
          if ($password !== $truePassword) {
            echo '<p class="error">Incorrect username or password.</p>';
            return;
          } else {
            $_SESSION["username"] = $username;
            echo '<p class="success">Logged in successfully!</p>'; 
            echo $_SESSION["username"];
          }
        }
      }
    ?>
  </main>

  <?php
    include $root . '/view/include/footer.php';
  ?>
</body>
</html>