<?php
require_once __DIR__ . "/../bootstrap.php";

$user_id = $_SESSION["user_id"];
$post_id = $_GET["like"];

if ($dbh->isLiked($user_id, $post_id)) {
    $dbh->removeLike($user_id,$post_id);
} else {
    $dbh->newLike($user_id, $post_id);
}

$dbh->close();

header("Location: ../profileView.php?id=" . $post_id);
exit();
?>