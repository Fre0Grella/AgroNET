<?php
require_once __DIR__ . "/../bootstrap.php";
// Cancella tutte le variabili di sessione
session_unset();

session_destroy();

$dbh->close();

exit();
?>
