<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<?php 
    include_once 'header.php';
    include_once 'index.php';
    ?>

<form action="login.php" method="POST">

<?php if(isset($_GET['error'])) {  ?>
            <p class="error"> <?php echo $_GET['error']; ?> </p>
            <?php
        } ?>
  <!-- BOOTSTRAP -- username input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example1" style="display: block; text-align: center;">Username</label>
    <input type="username" name="username" id="username" class="form-control" style="width: 35%; margin: auto;" />
    
  </div>

  <!-- Password input -->
  <div class="form-outline mb-4">
    <label class="form-label" for="form2Example2" style="display: block; text-align: center;">Password</label>
    <input type="password" name="password" id="password" class="form-control" style="width: 35%; margin: auto;" />
    
  </div>

  <!-- Submit button -->
  <input type="submit" class="btn btn-primary btn-block mb-4" style="width: 25%; margin: auto;" value="Sign In">

</form>




</body>
</html>