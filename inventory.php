<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<?php 
    //include_once 'index.php';

    include_once 'header.php';
    include_once 'db_conn.php';

    $conn = new Database();
    $conn = $conn->connect();
    $sql = $conn->prepare("SELECT * FROM gratis.vehicles");
    $sql2 = $conn->prepare("SELECT * FROM gratis.images WHERE vehicleid=?");


    $sql->execute();
    $count = $sql->rowCount();
    $inventory = $sql->fetchAll(PDO::FETCH_ASSOC);

    echo "<div class='card-deck'>";
    for($i=0; $i<$count; $i++){
        $year = $inventory[$i]['year']; 
        $brand = $inventory[$i]['brand'];
        $name = $inventory[$i]['vehiclename'];
        $price = $inventory[$i]['price'];
        $stocknum = $inventory[$i]['stocknum'];
        $mileage = $inventory[$i]['mileage'];

        $vehicleid = $inventory[$i]['vehicleid'];
        $sql2->execute(array($vehicleid));
        $images = $sql2->fetch(PDO::FETCH_ASSOC);
        $img = $images['imagelink'];
        echo '<div class="card">
        <a href="vehiclepage.php?vehicleId='.$vehicleid.'">
          <img class="card-img-top" src="'.$img.'" alt="car image">
        </a>
        <div class="card-body">
          <h5 class="card-title">'.$year.' '.$brand.' '.$name.'</h5>
          <br>
          <p class="card-text">Retail Price: $'.$price.' </p>
          <p class="card-text">Stock #: '.$stocknum.'</p>
          <p class="card-text">Mileage: '.$mileage.' </p>';
          ob_start();
            if(isset($_SESSION["loggedin"])) {
              echo '<a href="adminedit.php?vehicleId='.$vehicleid.'">
              <button class="btn btn-primary btn-block mb-4" style="display: block; margin: auto; width:50%;">Admin View</button>
            </a>';
            }
        echo '</div>
      </div>';

    }
    echo "</div>";




    ?>



    
</body>
</html>



<!-- <form action="vehiclepage.php" method="get">
            <button type="submit" name="'.$vehicleid.'" class="btn btn-primary btn-block mb-4" style="width: 25%; margin: auto;" value="View More">
          </form> -->