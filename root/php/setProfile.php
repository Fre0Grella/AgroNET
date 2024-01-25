<?php

require_once __DIR__ . "/../bootstrap.php";

$oldUsername = $_SESSION['username'];
$userId = $_SESSION['user_id'];

if ($_FILES['image']['size'] > 0) {
    $image = addslashes(file_get_contents($_FILES['image']['tmp_name']));
} else {
    $image = null;
}

if (count($_POST['username'])>2) {
    $username = $_POST['username'];
    $dbh->query("UPDATE users SET username = '$username' WHERE user_id = '$userId'");
    $_SESSION['username'] = $username;
}

if (isset($_POST['description'])) {
    $bio = $_POST['description'];
    $dbh->query("UPDATE users SET bio = '$bio' WHERE user_id = '$userId'");

}
if ($image != null) {
    $dbh->query("UPDATE users SET profile_image = '$image' WHERE user_id = '$userId'");
}

header("Location: ../profile.php");
$dbh->close();


