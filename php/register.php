<?php

exec("python3 static/confirm.pyw");
$user = $_POST["us"];
$pass = $_POST["ps"];
$hash = password_hash($pass, PASSWORD_DEFAULT);
$file = fopen("u.txt", "w");
$filep = fopen("p.txt", "w");
fwrite($file, $user);
fwrite($filep, $hash);
fclose($file);
fclose($filep);
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/png" href="https://media.giphy.com/media/CAYVZA5NRb529kKQUc/giphy.gif">
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body>
    <div>
    <form action="checkCode.php" method="post">
            <h1>Verifica registrazione</h1>
            <h3>È stata inviata una mail con il codice a 6 cifre al proprietario del server</h3>
            <div style="display: flex;">
                <input type="number" id="n1" name="n1">
                <input type="number" id="n2" name="n2">
                <input type="number" id="n3" name="n3">
                <input type="number" id="n4" name="n4">
                <input type="number" id="n5" name="n5">
                <input type="number" id="n6" name="n6">
            </div>
            <div>
                <button type="submit" name="login" onclick="go()">Verifica</button>
            </div>
    </form>
    </div>
</body>
</html>
