<?php
require_once("bootstrap.php");
print_r($_SESSION["user_id"]);
$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Home";
$templateParams["greenPost"] = $dbh->postGreenFromFollowed($user_id);
$templateParams["tractorPost"] = $dbh->postTractorFromFollowed($user_id);
$templateParams["allPost"] = $dbh->postFromFollowed($user_id);


require("template/homeTemplate.php");

?>