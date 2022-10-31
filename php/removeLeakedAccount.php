<?php
    $host = "127.0.0.1";
    $user = "admin"; 
    $password = "gabry(22)";
    $db = "user_credential";
    
    $connection = mysqli_connect($host, $user, $password, $db);
    
    if (!$connection) {
        die("Errore durante la connessione: " . $connection -> connect_error);
    }


    $account = $_GET['account'];
    $sqlCommand = "DELETE FROM leaked_accounts WHERE mail = '".$account."'";
    if ($connection->query($sqlCommand) == true) {
        header("location: leaked_accounts.php");
    } else {
        echo "bruh error";
    }
?>