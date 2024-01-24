<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];
$templateParams["title"] = "AgroNET - Home";
$templateParams["allPost"] = $dbh->postFromFollowed($user_id);


require("template/homeTemplate.php");

?>