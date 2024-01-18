<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Search";
$templateParams["greenPost"] = $dbh->GreenrandomPost($user_id);
$templateParams["tractorPost"] = $dbh->TractorandomPost($user_id);
$templateParams["allPost"] = $dbh->randomPost($user_id);

require("template/search.php");

?>