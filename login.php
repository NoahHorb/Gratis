<?php


session_start();
include "db_conn.php";
$conn = new Database();
$conn = $conn->connect();
//prepared statement + binding for improved database security
$sql = $conn->prepare("SELECT * FROM gratis.login WHERE username=? AND password=?");

if(isset($_POST['username']) && isset($_POST['password'])){


    //sql injection mitigation
    function validate($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}

$username = validate($_POST['username']);
$password = validate($_POST['password']);
// echo "<h1> user:".$username ."<h1>";
// echo $password; 
if(empty($username)) {
    header ("Location: loginform.php?error=Username is required");
    exit();
}
else if(empty($password)) {
    header ("Location: loginform.php?error=Password is required");
    exit();
}

$sql->execute(array($username, $password));
$user = $sql->fetchAll(PDO::FETCH_ASSOC);


if(count($user) === 1){
    if($user[0]['username'] === $username && $user[0]['password'] === $password){
        //echo "Successfully Logged In";
        $_SESSION['loggedin'] = TRUE;
        header("Location: inventory.php");
        exit();
    }
    // else{
    //     header("Location: loginform.php>error=Incorrect username or password");
    //     exit();
    // }
}
else{
    header("Location: loginform.php?error=Incorrect username or password");
    exit();
}