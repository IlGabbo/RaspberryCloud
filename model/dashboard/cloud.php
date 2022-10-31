<?php
$paragraph = "";
session_start();

ini_set("upload_max_filesize", "100M");


if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: ../../index.php");
    exit;
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_path = "uploads/";
    $filename = basename($_FILES['file']['name']);
    $target_file = $upload_path.$filename;
    $check = true;
    
    

    if ($filename == "") {
        echo "
        <div style='position: absolute; background-color: rgba(255,153,0,0.4); width: 300px; top: 10px; left:0; right:0; margin-left: auto; margin-right: auto; heigth: 33px; text-align: center; border-radius: 30px; font-family: Open Sans;'>
        <p class='absolute' style='color: rgb(255,153,0); font-weight: 600;'>Scegli un file</p>
        </div>
        ";
	echo "<audio autoplay><source src='static/sounds/err_effect.mp3' type='audio/mp3'></audio>";
    } else {

    /*if (file_exists($target_file)) {
        $check = false;
        echo "
        <div style='position: absolute; background-color: rgba(255,0,0,0.3); width: 300px; top: 10px; left:0; right:0; margin-left: auto; margin-right: auto; heigth: 33px; text-align: center; border-radius: 30px; font-family: Open Sans;'>
        <p class='absolute' style='color: red; font-weight: 600;'>Il file esiste già</p>
        </div>
        ";
        echo '<audio autoplay><source src="static/sounds/err_effect.mp3" type="audio/mp3"></audio>';
    } else {*/

    if ($check) {
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            echo "
            <div style='position: absolute; background-color: rgba(255,0,0,0.3); width: 300px; top: 10px; left:0; right:0; margin-left: auto; margin-right: auto; heigth: 33px; text-align: center; border-radius: 30px; font-family: Open Sans;'>
            <p class='absolute' style='color: red; font-weight: 600;'>Errore sconosciuto</p>
            </div>
            ";
            echo '<audio autoplay><source src="static/sounds/err_effect.mp3" type="audio/mp3"></audio>';
        } else {
            echo "
            <div style='position: absolute; background-color: rgba(0,255,0,0.3); width: 300px; top: 10px; left:0; right:0; margin-left: auto; margin-right: auto; heigth: 33px; text-align: center; border-radius: 30px; font-family: Open Sans;'>
            <p class='absolute' style='color: rgb(0,255,0); font-weight: 600;'>File caricato</p>
            </div>
            ";
            echo '<audio autoplay><source src="static/sounds/done_effect.mp3" type="audio/mp3"></audio>';
                
        }
    } else {
        echo '<audio autoplay><source src="static/sounds/err_effect.mp3" type="audio/mp3"></audio>';
    }

    }
}


?>

<!DOCTYPE html>
<html lang="it-IT">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cloud</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./static/css/style.css">
</head>
<body>
    <div class="cloud">
        <div class="sas">
            <form action="cloud.php" method="post" enctype="multipart/form-data" class="my-form">
                <input type="file" name="file" id="fileElem" multiple="true" onchange="handleFiles(this.files)">
                <button class="button" name="submit" type="submit">Upload</button>
                <div class="progressbar" id="progressbar" style="display: none;">&nbsp;</div>
                <progress id="progress-bar" max=100 value=0></progress>
            </form>
            <div class="logout">
                <a href="../logout.php">
                    <button class="logoutButton">Disconnetti</button>
                </a>
            </div>
        </div>
    </div>
    <iframe src="../php/showfiles.php" frameborder="0" class="filemanager" width="100%" ></iframe>
    <script src="static/js/js.js"></script>
</body>
</html>
