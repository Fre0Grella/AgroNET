<?php
// Connessione al database
require_once __DIR__ . "../bootstrap.php";



$description = $_POST['description'];
$userId = $_SESSION['user_id'];

if ($_FILES['image']['size'] > 0) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
} else {
    $image = null; 
}

$category = $_POST['category'];


if ($category == 'true') {
    $sql = "INSERT INTO posts (user_id, description, image_data) VALUES ('$userId', '$description', '$image')";
} else {
    $sql = "INSERT INTO posts (user_id, description, category, image_data) VALUES ('$userId','$description', 0, '$image')";
}


if ($dbh->query($sql) === TRUE) {
    echo "Post salvato con successo.";
} else {
    echo "Errore durante il salvataggio del post: " . $dbh->error;
}
header("Location: ../home.html");
$dbh->close();
exit();
?>
