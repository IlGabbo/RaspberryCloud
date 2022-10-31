<?php

require_once("config.php");

$user = $_POST["us"];
$pass = $_POST["ps"];
$sql = "SELECT * FROM utenti";
$result = mysqli_query($connection, $sql);
$rowcount = mysqli_num_rows($result);   
$check = false;

while($row = $result->fetch_assoc()) {
    $userRow[$i] = $row["username"];
    $i++;
}

for ($i = 0; $i < $rowcount; $i++) {
    if ($userRow[$i] == $user) {
        $check = true;
        break;
    } else {
        $check = false;
    }
}



if ($check == false) {
    exec("python3 static/confirm.pyw");
    $hash = password_hash($pass, PASSWORD_DEFAULT);
    $file = fopen("u.txt", "w");
    $filep = fopen("p.txt", "w");
    fwrite($file, $user);
    fwrite($filep, $hash);
    fclose($file);
    fclose($filep);
} else if ($check == true) {
    header("location: ../register.php?error=Utente esistente");
}
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="icon" type="image/png" href="https://media.giphy.com/media/CAYVZA5NRb529kKQUc/giphy.gif">
    <link rel="stylesheet" href="static/css/regStyle.css">
</head>
<body>
    <div class="box">
        <div class="form">
            <form action="checkCode.php" method="post">
                    <h1>Verifica registrazione</h1>
                    <h3>Chiedi all'admin il codice di verifica</h3>
                    <div style="display: flex;">
                        <input type="number" id="1" name="n1" min="0" max="9" oninput="changeFocus(this.id)">
                        <input type="number" id="2" name="n2" min="0" max="9" oninput="changeFocus(this.id)">
                        <input type="number" id="3" name="n3" min="0" max="9" oninput="changeFocus(this.id)">
                        <input type="number" id="4" name="n4" min="0" max="9" oninput="changeFocus(this.id)">
                        <input type="number" id="5" name="n5" min="0" max="9" oninput="changeFocus(this.id)">
                        <input type="number" id="6" name="n6" min="0" max="9" oninput="changeFocus(this.id)">
                    </div>
                    <div>
                        <button type="submit" name="login" onclick="go()">Verifica</button>
                    </div>
            </form>
        </div>
    </div>
    <script src="static/js/js.js"></script>
</body>
</html>
