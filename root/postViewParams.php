<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];
$post_id = $_SESSION["post_id"];

$templateParams["title"] = "AgroNET - Postview";
$templateParams["postInfo"] = $dbh->getPostInfo($user_id);
$templateParams["likeNumber"] = $dbh->getLikesFromPost($post_id);
$templateParams["comment"] = $dbh->getCommentFromPost($post_id);


require("template/home.php");

?>