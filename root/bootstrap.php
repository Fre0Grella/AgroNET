<?php
session_start();
require_once __DIR__ . "/../db/db_helper.php";
$dbh = new DatabaseHelper("localhost", "root", "", "agro_db", 3306);

?>