<?php
// Connessione al database
require_once __DIR__ . "../bootstrap.php";



$description = $_POST['description'];

if ($_FILES['image']['size'] > 0) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
} else {
    $image = null; 
}

$sql = "INSERT INTO posts (description, image) VALUES ('$description', '$image')";

if ($dbh->query($sql) === TRUE) {
    echo "Post salvato con successo.";
} else {
    echo "Errore durante il salvataggio del post: " . $dbh->error;
}

$dbh->close();
?>
