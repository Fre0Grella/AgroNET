<?php 
// connessione al database
require_once __DIR__ . "/../bootstrap.php";

print_r($_POST);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$result = $dbh->isRegistered($email,$username);

if($count($result) == 0) {
    $dbh->registerUser($email,$password,$username);
    header("Location: ../home.php");
}
  
$dbh->close();
?>



