<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Home";
$templateParams["greenPost"] = $dbh->postGreenFromFollowed($user_id);
$templateParams["tractorPost"] = $dbh->postTractorFromFollowed($user_id);
$templateParams["allPost"] = $dbh->postFromFollowed($user_id);


require("template/home.php");

?>