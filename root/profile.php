<?php
require_once("bootstrap.php");
$user_id = -1;
$user_id = $_SESSION["user_id"];

if (isset($_GET["id"])) {
    $user_id = $_GET["id"];
    $templateParams["isFollow"] = $dbh->isFollower($_SESSION["user_id"], $user_id);
}

$templateParams["title"] = "AgroNET - Profile";
$temp = $dbh->getProfileInfo($user_id);
$templateParams["info"] = $temp[0];
$templateParams["allPost"] = $dbh->getPostsFromId($user_id);
// $temp = $dbh->getNumberOfLikesFromUser($user_id);
// $templateParams["like"] = $temp[0];
// print_r($templateParams["allPost"]);


require("template/profileTemplate.php");

?>