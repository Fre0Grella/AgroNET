<?php
require_once("bootstrap.php");

$user_id = -1;
$user_id = $_SESSION["user_id"];

$templateParams["title"] = "AgroNET - Notifications page";
$templateParams["notifications"] = $dbh->getNotifications($user_id);


require("template/notificationsTemplate.php");

?>