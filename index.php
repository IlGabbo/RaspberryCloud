<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="static/css/style.css">
</head>
<body class="body">
<?php
            if (isset($_GET["error"])) {
                $err = $_GET['error'];
                echo "<div class='error'>$err</div>";
            }
        ?>
    <div class="all">
    <div class="centered">
        <form class="login" action="php/login.php" method="post">
            <div class="class">
                <h1 class="h1">LOGIN</h1>
                <div>
                    <input type="text" name="username" id="username" placeholder="Username">
                </div>
                <div>
                    <input type="password" name="password" id="password" placeholder="Password">
                </div>
                <button type="submit">Login</button>
            </div>
        </form>

    </div>
    <div class="social">
        <a href="https://github.com/IlGabbo" class="git">
            <img src="static/images/github.png" alt="github">
        </a>
        <a href="https://www.youtube.it" class="ph">
            <img src="static/images/gabbologo.png" alt="gabbologo">
        </a>
        <form action="https://www.panettipitagora.edu.it/qs/documenti/orario/Classi/4%20ITIA_C.html" method="post">
            <button type="submit" class="orario">Orario</button>
        </form>

    </div>    
    <p style="display: none; position: absolute; color: white;" id="p1">Target Bruh</p>
    <p style="display: none; position: absolute; color: white;" id="p"></p>
    <img id="sas" style="display: none; color: #fff; position: absolute;" src="cross.gif" alt="sas">


    <div id="crosshair" style="display: none; position: absolute;">
            <p id="left" class="left">&nbsp;</p>
            <p id="top" class="top">&nbsp;</p>
    </div>
    </div>
    <script src="static/js/js.js"></script>
</body>
</html>
