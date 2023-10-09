<?php
session_start();

session_unset();
session_destroy();
$_SESSION['loggedin'] = FALSE;
header("Location: inventory.php");
exit();
?>