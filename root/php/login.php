<?php

require_once __DIR__ . '/../bootstrap.php';

    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = $dbh->loginCheck($email,$password); 

    if (count($result) > 0) {
        header("Location: ../home.html");
        $dbh->close();

        exit();
    } else {
        print_r("Login failed");
        header("Location: ../login.html");
        $dbh->close();
        exit();
    }

    
    

?>