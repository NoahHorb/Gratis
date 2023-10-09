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
    



    
    //only usable if vehicleid is the only number in URL
    $vehicleid = preg_replace("/[^0-9]/", '', $_SERVER['QUERY_STRING']);


    //otherwise, create an array and grab only the vehicleid

    // $url = '?'.$_SERVER['QUERY_STRING'];
    // parse_str($_SERVER['QUERY_STRING']);
    // parse_str(parse_url($url, PHP_URL_QUERY), $array);
    // print_r( $array );


    $sqlvehicleinfo = $conn->prepare("SELECT * FROM gratis.vehicles WHERE vehicleid=?");
    $sqlimages = $conn->prepare("SELECT * FROM gratis.images WHERE vehicleid=?");
    $sqlfeatures = $conn->prepare("SELECT * FROM gratis.features WHERE vehicleid=?");





    $sqlvehicleinfo->execute(array($vehicleid));
    $sqlimages->execute(array($vehicleid));
    $sqlfeatures->execute(array($vehicleid));


 
   

    //image count for carousel
    $imagecount = $sqlimages->rowCount();
    $featurecount = $sqlfeatures->rowCount();
    //pulls vehicle info, images, and features from  database
    $vehicleinfo = $sqlvehicleinfo->fetch(PDO::FETCH_ASSOC);
    $images = $sqlimages->fetchAll(PDO::FETCH_ASSOC);
    $features = $sqlfeatures->fetchAll(PDO::FETCH_ASSOC);


    //vehicle info pulled from database to be used
    $year = $vehicleinfo['year']; 
    $brand = $vehicleinfo['brand'];
    $name = $vehicleinfo['vehiclename'];
    $price = $vehicleinfo['price'];
    $stocknum = $vehicleinfo['stocknum'];
    $mileage = $vehicleinfo['mileage'];
    $citympg = $vehicleinfo['citympg'];
    $hwympg = $vehicleinfo['hwympg'];
    $vin = $vehicleinfo['vin'];
    $dealerdesc = $vehicleinfo['dealerdescription'];


    //heading, carousel, table, etc... 

    //header + return
    echo '<h1 style="display: block; text-align: center;">'.$year.' '.$brand.' '.$name.'</h1>';
    echo '<h5 style="display: block; text-align: left; padding-left: 20px;">
        <a href="inventory.php">Back to Inventory</a>
    </h5>';
    ob_start();
            if(isset($_SESSION["loggedin"])) {
              echo '<a href="adminedit.php?vehicleId='.$vehicleid.'">
              <button class="btn btn-primary btn-block mb-4" style="display: block; margin: auto; width: 250px;">Admin View</button>
            </a>';
            }


    //carousel
    echo '<div class="d-flex flex-row" style="justify-content: center;">';
    echo '<div id="carouselExampleControls" class="carousel slide" data-ride="carousel" style="width: 35%; padding-left: 20px; ">
    <div class="carousel-inner">';
    for($i=0; $i<$imagecount; $i++){

        $img = $images[$i]['imagelink'];
        if ($i == 0){
            echo '<div class="carousel-item active">
            <img class="d-block w-100" src="'.$img.'" alt="'.$i.' slide">
          </div>';
        }
        else{
            echo '<div class="carousel-item">
            <img class="d-block w-100" src="'.$img.'" alt="'.$i.' slide">
          </div>';
        }
        
    }
    echo '<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</div>';


//pricing detail card
echo '<div style="width: 35%; padding-left: 20px; height: 110%">
    <div class="card-deck">
    <div class="card">
        <h2 style="text-align: center;">Pricing Details</h2>
        <div class="card-body">
          <h4 class="card-text">Retail Price: $'.$price.' </h4><br>
          <p class="card-text">MPG City: '.$citympg.' </p>
          <p class="card-text">MPG Hwy: '.$hwympg.' </p>
          <p class="card-text">Mileage: '.$mileage.' </p>
          <p class="card-text">Stock #: '.$stocknum.' </p>
          <p class="card-text">VIN: '.$vin.' </p>
          <br>
          <h3 style="text-align: center;">-Dealer Description-</h3>
          <p>'.$dealerdesc.'</p>
        </div>
      </div>
      </div>
      </div>
      </div>';


//table
echo '<div>
<div style="display: block; width: 50%; margin: auto;">
<h2 style="text-align: center;">Features and Options </h2>
<table class="table table-striped">
  <tbody>';
  for($i=0; $i<$featurecount; $i++){

    $feature = $features[$i]['option'];
    echo '<tr>
    <td>'.$feature.'</td>
    </tr>';
    
}
echo '</tbody>
</table>
</div>
</div>';

    ?>
</body>
</html>

