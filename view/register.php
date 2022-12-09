<?php 
    $root = $_SERVER['DOCUMENT_ROOT'] . '/web-dev-project';
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/web-dev-project/view/css/register.css">
  <title>Register</title>
</head>
<body>
  <?php
    include $root . '/view/include/header.php';
  ?>

  <main>
    <h1 id="form-title" >Create New Account</h1>
    <form method="post" action="" id="registration-form">
      <div class="row">
        <label for="username">Username:</label>
        <input type="text" name="username" id="username" required>
      </div>
      <div class="row">
        <label for="password">Password: <strong class='form-requirement'>(6 chars)</strong></label>
        <input type="password" name="password" id="password" required>
      </div>
      <div class="row">
        <label for="confirm-password">Confirm Password:</label>
        <input type="password" name="confirmPassword" id="confirm-password" required>
      </div>
      <div class="row">
        <label for="first-name">First Name:</label>
        <input type="text" name="firstName" id="first-name" required>
      </div>
      <div class="row">
        <label for="surname">Surname:</label>
        <input type="text" name="surname" id="surname">
      </div>
      <div class="row">
        <label for="address-line-one">Address Line 1:</label>
        <input type="text" name="addressLineOne" id="address-line-one">
      </div>
      <div class="row">
        <label for="address-line-two">Address Line 2:</label>
        <input type="text" name="addressLineTwo" id="address-line-two">
      </div>
      <div class="row">
        <label for="city">City:</label>
        <input type="text" name="city" id="city">
      </div>
      <div class="row">
        <label for="telephone">Telephone:</label>
        <input type="text" name="telephone" id="telephone">
      </div>
      <div class="row">
        <label for="mobile">Mobile: <strong class='form-requirement'>(10 chars)</strong></label>
        <input type="text" name="mobile" id="mobile">
      </div>
      <button class="submit">Submit</button>
    </form>
  </main>

  <?php
    include $root . '/view/include/footer.php';
  ?>
</body>
</html>