<?php

$host = "127.0.0.1";
$user = ""; 
$password = "";
$db = "";

$connection = mysqli_connect($host, $user, $password, $db);

if (!$connection) {
    die("Errore durante la connessione: " . $connection -> connect_error);
}

?>
