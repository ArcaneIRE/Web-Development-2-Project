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
    <h2 id="form-title">Create New Account</h1>
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
          <input type="text" name="mobile" id="mobile" minlength="10" maxlength="10">
        </div>
        <button class="submit">Submit</button>
      </form>
      <?php
      if (isset($_POST['username']) && isset($_POST['password']) && isset($_POST['confirmPassword']) && isset($_POST['firstName'])) {
        require_once $root . '/model/database_connect.php';

        $username = htmlentities($_POST['username']);
        $password = htmlentities($_POST['password']);
        $confirmPassword = htmlentities($_POST['confirmPassword']);
        $firstName = htmlentities($_POST['firstName']);
        $surname = '';
        if (isset($_POST['Surname'])) {
          $surname = htmlentities($_POST['Surname']);
        }
        $addressLineOne = '';
        if (isset($_POST['addressLineOne'])) {
          $addressLineOne = htmlentities($_POST['addressLineOne']);
        }
        $addressLineTwo = '';
        if (isset($_POST['addressLineTwo'])) {
          $addressLineTwo = htmlentities($_POST['addressLineTwo']);
        }
        $city = '';
        if (isset($_POST['city'])) {
          $city = htmlentities($_POST['city']);
        }
        $telephone = '';
        if (isset($_POST['telephone'])) {
          $telephone = htmlentities($_POST['telephone']);
        }
        $mobile = '';
        if (isset($_POST['mobile'])) {
          $mobile = htmlentities($_POST['mobile']);
        }

        // Input Validation
        $usernameQuery = "SELECT username FROM users WHERE username = '$username'";
        $result = $conn->query($usernameQuery);
        if ($result->num_rows > 0) {
          echo '<p class="error">Error! That username is taken.</p>';
          return;
        } elseif ($_POST['password'] !== $_POST['confirmPassword']) {
          echo '<p class="error">Error! Passwords did not match.</p>';
          return;
        } elseif (strlen($password) !== 6) {
          echo '<p class="error">Error! Passwords must be 6 characters long.</p>';
          return;
        } elseif (isset($_POST['mobile'])) {
          if (!is_numeric($_POST['mobile'])) {
            echo '<p class="error">Error! Mobile numbers may only contain numbers.</p>';
            return;
          } elseif (strlen($_POST['mobile']) !== 10) {
            echo '<p class="error">Error! Mobile numbers must be 10 digits long.</p>';
            return;
          }
        }
        // Success path
        $newUserInsert = "INSERT INTO users VALUES ('$username', '$password', '$firstName', '$surname', '$addressLineOne', '$addressLineTwo', '$city', '$telephone', '$mobile')";
        $result = $conn->query($newUserInsert);
        if ($result === true) {
          echo '<p class="success">Success! New Account Created!</p>';
        } else {
          echo  '<p class="error">Database Error: New user insert failed. ' . $conn->error . '</p>';
        }
        $conn->close();
      }
      ?>
  </main>

  <?php
  include $root . '/view/include/footer.php';
  ?>
</body>

</html>