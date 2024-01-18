<?php 
// connessione al database
require_once __DIR__ . "/../bootstrap.php";

print_r($_POST);

$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

$query = "SELECT * FROM users WHERE email = '$email' OR password = '$password'";
$result = $conn->query($query);

if($result->num_rows == 0) {
    $dbh->registerUser($email,$password,$username);
    header("Location: ../home.php");
}
  
$dbh->close();
?>



