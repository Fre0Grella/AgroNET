<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];
$post_id = -1;

if (isset($_GET["id"])) {
    $post_id = $_GET["id"];
}


$templateParams["title"] = "AgroNET - Post";
$temp = $dbh->getPostInfo($post_id);
$templateParams["postInfo"] = $temp[0];
$templateParams["comment"] = $dbh->getCommentsFromPostId($post_id);
$templateParams["isLiked"] = $dbh->isLiked($user_id, $post_id);


require("template/postViewTemplate.php");

?>