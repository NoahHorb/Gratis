<!DOCTYPE html>
<html lang="en">
<head>
<title>Header</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php 
    include_once 'index.php';
    session_start();
    ?>

    <!-- bootstrap navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light nav-fill w-100">
  <a class="navbar-brand" href="#">
    <img src="https://longofathens.com/site-images/dealers/0/athens-logo.jpg" width="150" height="75" alt="Long">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto w-100">
      <li class="nav-item active">
        <a class="nav-link" href="/gratis">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Inventory
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="inventory.php">New Vehicles</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Order My Vehicle</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Certified Pre-Owned</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Prei-owned Vehicles</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Search All</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Specials</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Learn about Electric Vehicles</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="inventory.php">Car Bravo</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/gratis">Shop From Home</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/gratis">About Us</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/gratis" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Finance
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/gratis">Credit Application</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/gratis">Value Your Trade</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/gratis">Get Pre-Approved</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/gratis">News & Updates</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="/gratis" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Parts & Services
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/gratis">Accessories</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/gratis">Request Service Appointment</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/gratis">Service & Parts Financing</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="/gratis">Specials</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/gratis">Long Bodyshop</a>
      </li>
      <?php
                        ob_start();
                            if(isset($_SESSION["loggedin"])) {
                              echo "<li class='nav-item'>
                                <a class='nav-link' href='logout.php'>Logout</a>
                              </li>";
                            } else {
                              echo "<li class='nav-item'>
                              <a class='nav-link' href='loginform.php'>Admin Login</a>
                            </li>";
                            }
                        ?>
    </ul>
  </div>
</nav>
</body>
</html>