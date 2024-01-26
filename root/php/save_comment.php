<?php
require_once __DIR__ . "/../bootstrap.php";

$comment = $_POST['comment'];
$user_id = $_SESSION['user_id'];
$post_id = $_GET['id'];
if ($comment) {
    $dbh->createComment($post_id, $user_id, $comment);
}


header("Location: ../postView.php?id=" . $post_id);
$dbh->close();
?>