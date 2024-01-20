<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Search";
$templateParams["greenPost"] = $dbh->GreenRandomPost($user_id);
$templateParams["tractorPost"] = $dbh->TractoRandomPost($user_id);
$templateParams["allPost"] = $dbh->randomPost($user_id);

require("template/searchTemplate.php");

?>