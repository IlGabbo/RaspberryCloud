<?php

require_once("config.php");
$n1 = $_POST["n1"];
$n2 = $_POST["n2"];
$n3 = $_POST["n3"];
$n4 = $_POST["n4"];
$n5 = $_POST["n5"];
$n6 = $_POST["n6"];
$totValue = strval($n1).strval($n2).strval($n3).strval($n4).strval($n5).strval($n6);
$code = file("checkCode.txt");
$sas = $code[0];
$fixedCode = strval(str_replace('6', '', $sas));


if (strval($fixedCode) === strval($totValue)) {
        $f = file("u.txt");
        $fp = file("p.txt");
        $us = $f[0];
        $ps = $fp[0];

        $sql = "INSERT INTO utenti (username, password) VALUES ('$us', '$ps')";

        if ($connection->query($sql) === true) {
            header("location: ../index.php");
            unlink("u.txt");
            unlink("p.txt");
            $path = "$us";
            mkdir(strval("../".$path));
            exec("cp -r /var/www/html/model/dashboard -t /var/www/html/$us/");
            exec("cp -r /var/www/html/model/errors -t /var/www/html/$us/");
            exec("cp -r /var/www/html/model/php -t /var/www/html/$us/");
            exec("cp -r /var/www/html/model/logout.php -t /var/www/html/$us");
        } else {
            echo "Errore durante la registrazione utente $sql" . $connection->error;
            unlink("u.txt");
            unlink("p.txt");
        } 
} else {
    header("location: ../index.php?error=Codice errato");
    unlink("u.txt");
    unlink("p.txt");
}

unlink("checkCode.txt");

?>