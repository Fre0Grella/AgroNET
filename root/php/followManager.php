<?php
require_once __DIR__ . "/../bootstrap.php";

$follower = $_SESSION["user_id"];
$followed = $_GET["button"];

print_r($dbh->isFollower($follower, $followed));

if ($dbh->isFollower($follower, $followed)) {
    $dbh->unfollow($follower,$followed);
} else {
    $dbh->follow($follower, $followed);
}

print_r($dbh->isFollower($follower, $followed));


$dbh->close();

header("Location: ../profile.php?id=" . $followed);
exit();
?>
