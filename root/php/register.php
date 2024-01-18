<?php 
// connessione al database
require_once __DIR__ . "/../bootstrap.php";


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (
        isset($_POST['username']) &&
        isset($_POST['email']) &&
        isset($_POST['password'])
    ) {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password']; 

        dbh->registerUser($email,$password,$username);
        
    } else {
        // Dati non ricevuti correttamente
        echo json_encode(array('success' => false, 'error' => 'Dati mancanti.'));
    }
} else {
    // Metodo di richiesta non supportato
    echo json_encode(array('success' => false, 'error' => 'Metodo di richiesta non valido.'));
}
dbh->close();
?>



