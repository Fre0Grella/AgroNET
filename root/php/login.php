<?php
require_once('../bootstrap.php');

if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
       echo 'Inserisci email e password %s';
    } else {
        $result = $dbh->loginCheck($email); 

        if (!$result || password_verify($password, $result['password']) === false) {
            echo 'Credenziali utente errate %s';
        } else {
            session_regenerate_id();
            $_SESSION['session_id'] = session_id();
            $_SESSION['session_user'] = $result['email'];
            
            header('Location: home.html');
            exit;
        }
    }
    printf($msg, '<a href="../login.html">torna indietro</a>');
}
?>