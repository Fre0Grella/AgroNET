<?php
require_once __DIR__ . "/../bootstrap.php";

$follower = $_SESSION["user_id"];
$followed = $_GET["button"];

if ($dbh->isFollower($follower, $followed)) {
    $dbh->unfollow($follower,$followed);
} else {
    $dbh->follow($follower, $followed);
}


$dbh->close();

header("Location: ../profile.php?id=" . $followed);
exit();
?>
