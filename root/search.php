<?php
require_once("bootstrap.php");

$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Search";
$templateParams["allPost"] = $dbh->randomPost($user_id);

if (isset($_GET["search"]) && !empty($_GET["search"])) {
    $user_search = $_GET["search"];
    $templateParams["usersSearched"] = $dbh->getSearchAdvice($user_search);
    $_SESSION["searched"] = true;
}

require("template/searchTemplate.php");

?>