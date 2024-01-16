<?php
session_start();
require_once('../bootstrap.php');

if(isset($_POST['login'])) {
    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    if (empty($email) || empty($password)) {
       echo 'Inserisci email e password %s';
    } else {
        $query = "
            SELECT email, password
            FROM users
            WHERE email = :email
        ";

        $stmt = $pdo->prepare($query);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

    //     if (!$user || password_verify($password, $user['password']) === false) {
    //         echo 'Credenziali utente errate %s';
    //     } else {
    //         session_regenerate_id();
    //         $_SESSION['session_id'] = session_id();
    //         $_SESSION['session_user'] = $user['email'];
            
    //         header('Location: dashboard.php');
    //         exit;
    //     }
    // }
    
    // printf($msg, '<a href="../login.html">torna indietro</a>');
    }
} else {
    echo "ciao";
}
?>