<?php 
// connessione al database
require_once __DIR__ . "/../bootstrap.php";

print_r($_POST);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];
$dbh->registerUser($email,$password,$username);
   
$dbh->close();
?>



