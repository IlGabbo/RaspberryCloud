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
    <link rel="stylesheet" href="static/css/Style.css">
</head>
<body class="body">   
    <div class="box">
        <form action="php/register.php" method="post">
            <div class="form">
                <h2>Registrati</h2>
                    <div class="inputBox">
                        <input type="text" name="us" id="username" required>
                        <span>Username</span>
                        <i></i>
                    </div>
                    <div class="inputBox">
                        <input type="password" name="ps" id="password" required>
                        <span>Password</span>
                        <i></i>
                    </div>
                    <a href="index.php">Login</a>
                    <input type="submit" value="Registrati">
                    <?php
                        if (isset($_GET["error"])) {
                            $err = $_GET['error'];
                            echo "<div class='error'>$err</div>";
                        }
                    ?>
            </div>
        </form>
    </div>
    
</body>
</html>
