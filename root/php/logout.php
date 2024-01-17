<?php
require_once __DIR__ . "/../bootstrap.php";
// Cancella tutte le variabili di sessione
session_unset();

session_destroy();

echo json_encode(array('success' => true, 'message' => 'Logout effettuato con successo'));
exit();
?>
