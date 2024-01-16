<?php
// Connessione al database
require_once __DIR__ . "../bootstrap.php";



$description = $_POST['description'];

if ($_FILES['image']['size'] > 0) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
} else {
    $image = null; 
}

$category = $_POST['category']['value'];


if ($category == 1) {
    $sql = "INSERT INTO posts (description, image_data) VALUES ('$description', '$image')";
} else {
    $sql = "INSERT INTO posts (description, category, image_data) VALUES ('$description', false, '$image')";
}


if ($dbh->query($sql) === TRUE) {
    echo "Post salvato con successo.";
} else {
    echo "Errore durante il salvataggio del post: " . $dbh->error;
}

$dbh->close();
?>
