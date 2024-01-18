<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];
$post_id = -1;

if (isset($_GET["id"])) {
    $post_id = $_GET["id"];
}


$templateParams["title"] = "AgroNET - Post:"+$post_id;
$templateParams["postInfo"] = $dbh->getPostInfo($user_id);
$templateParams["likeNumber"] = $dbh->getLikesFromPost($post_id);
$templateParams["comment"] = $dbh->getCommentFromPost($post_id);


require("template/postView.php");

?>