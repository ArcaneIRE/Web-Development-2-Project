<?php
session_start();

$root = $_SERVER['DOCUMENT_ROOT'] . '/web-dev-project';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/web-dev-project/view/css/index.css">
  <title>Home</title>
</head>

<body>
  <?php
  include $root . '/view/include/header.php';
  ?>

  <main>
    <h2>Home</h2>
    <?php require_once $root . '/model/database_connect.php';
    if (isset($_SESSION['username'])) {
      echo '<h3 class="welcome">Welcome, <strong>' . $_SESSION["username"] . '</strong>.</h3>';
    }
    ?>
    <nav class="main-menu">
      <ul>
        <?php if (isset($_SESSION['username'])) {
          echo '<li><a href="/web-dev-project/view/search.php">Book Search</a></li>';
        } ?>
        <?php if (isset($_SESSION['username'])) {
          echo '<li><a href="/web-dev-project/view/reservations.php">My Reservations</a></li>';
        } ?>
        <?php if (!isset($_SESSION['username'])) {
          echo '<li><a href="/web-dev-project/view/register.php">Register an Account</a></li>';
        } ?>
      </ul>
    </nav>
  </main>

  <?php
  include $root . '/view/include/footer.php';
  ?>
</body>

</html>