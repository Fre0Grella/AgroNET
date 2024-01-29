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
$temp = $dbh->getFollowersNumbers($user_id);
$templateParams["follower"] = $temp[0];
$temp = $dbh->getFollowedNumber($user_id);
$templateParams["followed"] = $temp[0];

$templateParams["notifications"] = $dbh->getNotificationsNotRead($user_id);


require("template/profileTemplate.php");

?>