<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Search";
$templateParams["allPost"] = $dbh->randomPost($user_id);

require("template/searchTemplate.php");

?>