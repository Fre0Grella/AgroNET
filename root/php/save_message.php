<?php
require_once __DIR__ . "/../bootstrap.php";

$message = $_POST['message'];
$chat_id = $_POST['chat_id'];
$user_id = $_SESSION['user_id'];

$dbh->createMessage($chat_id, $user_id, $message);


$dbh->close();
?>