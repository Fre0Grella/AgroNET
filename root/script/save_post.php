<?php
// Connessione al database
$servername = "localhost";
$username = "root"; 
$password = ""; 
$dbname = "agro_db"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

$description = $_POST['description'];

if ($_FILES['image']['size'] > 0) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
} else {
    $image = null; 
}

$sql = "INSERT INTO posts (description, image) VALUES ('$description', '$image')";

if ($conn->query($sql) === TRUE) {
    echo "Post salvato con successo.";
} else {
    echo "Errore durante il salvataggio del post: " . $conn->error;
}

$conn->close();
?>
