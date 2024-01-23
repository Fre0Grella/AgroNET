<?php

require_once __DIR__ . "/../bootstrap.php";

$bio = $_POST['description'];
$username = $_POST['username'];
$oldUsername = $_SESSION['username'];

$userId = $_POST['user_id'];

if ($_FILES['image']['size'] > 0) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
} else {
    $image = null;
}

if ($dbh->query("UPDATE users SET username = '$username' WHERE username = '$oldUsername'")) {
    $_SESSION['username'] = $username;
}

$dbh->query("UPDATE users SET bio = '$bio' WHERE username = '$username'");
$dbh->query("UPDATE users SET profile_image = '$image' WHERE username = '$username'");
header("Location: ../profile.php");
$dbh->close();


