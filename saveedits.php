<?php
include_once 'db_conn.php';

$conn = new Database();
$conn = $conn->connect();

//only usable if vehicleid is the only number in URL
$vehicleid = preg_replace("/[^0-9]/", '', $_SERVER['QUERY_STRING']);

//vehicleinfo
$updateveh = $conn->prepare("UPDATE gratis.vehicles SET price=?, vehiclename=?, citympg=?, hwympg=?, mileage=?, vin=?, dealerdescription=?, stocknum=?, brand=?, year=? WHERE vehicleid=?");


//features
$updatefeatures = $conn->prepare("UPDATE gratis.features SET option=? WHERE option=? AND vehicleid=?");

//images
$updateimages = $conn->prepare("UPDATE gratis.images SET imagelink=? WHERE imagelink=? AND vehicleid=?");



//vehicle info from POST
//checks if page was redirected to via Save Edit button
if(isset($_POST['editsub'])){
    $price = $_POST['price'];
    $name = $_POST['vehiclename'];
    $citympg = $_POST['citympg'];
    $hwympg = $_POST['hwympg'];
    $mileage = $_POST['mileage'];
    $vin = $_POST['vin'];
    $dealerdesc = $_POST['dealerdescription'];
    $stocknum = $_POST['stocknum'];
    $brand = $_POST['brand'];
    $year = $_POST['year'];
    $optionslab = $_POST['optionslab'];
    $options = $_POST['options'];
    $imageslab = $_POST['imageslab'];
    $images = $_POST['images'];

    //update the options/features
    for($x = 0; $x < count($options); $x++){ 
        if($options[$x] != $optionslab[$x]){
            if(!$featupdate = $updatefeatures->execute(array($options[$x], $optionslab[$x], $vehicleid))){
                $updatefeatures = null;
                header('location: vehiclepage.php?vehicleId='.$vehicleid.'&error=updatefailed&failedFor='.$options[$x].'');
                exit();
            }
        }
    }

    //update the images
    for($x = 0; $x < count($images); $x++){
        if($image[$x] != $imageslab[$x]){
            if(!$imageupdate = $updateimages->execute(array($images[$x], $imageslab[$x], $vehicleid))){
                $updateimages = null;
                header('location: vehiclepage.php?vehicleId='.$vehicleid.'&error=updatefailed&failedFor='.$images[$x].'');
                exit();
            }
        }
    }

    $vehupdate = $updateveh->execute(array($price, $name, $citympg, $hwympg, $mileage, $vin, $dealerdesc, $stocknum, $brand, $year, $vehicleid));
    
    if(!$vehupdate){
        $updateveh = null;
        header('location: vehiclepage.php?vehicleId='.$vehicleid.'&error=updatefailed&failedFor=vehicle');
        exit();
    } else {
        header('location: vehiclepage.php?vehicleId='.$vehicleid.'');
        exit();
    }

    $updatefeatures = null;
    $updateimages = null;
    $updateveh = null;
}
?>