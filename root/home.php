<?php
require_once("bootstrap.php");

$templateParams["title"] = "AgroNET - Home";
$templateParams["greenPost"] = $dbh->getGreenPosts();
$templateParams["tractorPost"] = $dbh->getTractorPosts();
$templateParams["allPost"] = $dbh->getAllPosts();


require("template/home.php");

?>