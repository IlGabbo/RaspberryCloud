<?php
$paragraph = "";
$link = "sound.mp3";
session_start();

if (!isset($_SESSION['loggato']) || $_SESSION['loggato'] !== true) {
    header("location: ../index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $upload_path = getcwd(__FILE__)."/";
    $filename = basename($_FILES['file']['name']);
    $target_file = $upload_path.$filename;
    $check = true;

    if ($filename == "") {
        echo "<p style='color: red; font-weight: 600;'>File non caricato</p>";
    } else {

    if (file_exists($target_file)) {
        $check = false;
        echo "<p class='absolute' style='color: red; font-weight: 600;'>Il file esiste già</p>";
        echo '<audio autoplay><source src="static/sounds/err_effect.mp3" type="audio/mp3"></audio>';
    } else {

    if ($check) {
        if (!move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            echo "<p class='absolute' style='color: red; font-weight: 600;'>Upload fallito...</p>";
            echo '<audio autoplay><source src="static/sounds/err_effect.mp3" type="audio/mp3"></audio>';
        } else {
            echo "<p class='absolute' style='color: green; font-weight: 600;'>File caricato con successo!</p>";
            echo '<audio autoplay><source src="static/sounds/done_effect.mp3" type="audio/mp3"></audio>';
                
        }
    } else {
        echo '<audio autoplay><source src="static/sounds/err_effect.mp3" type="audio/mp3"></audio>';
    }

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
    <link rel="stylesheet" type="text/css" href="static/css/cloudStyle.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
    <style>
        .center {
      display: flex;
      align-items: center;
      position: absolute;
      top: 5%;
      left: 90%;
      transform: translate(-50%, -50%);
    }

    h3 {
      margin-right: 10px;
    }

    input[type="checkbox"] {
      position: relative;
      width: 80px;
      height: 40px;
      -webkit-appearance: none;
      background: #c6c6c6;
      outline: none;
      border-radius: 20px;
      box-shadow: inset 0 0 5px rgba(0,0,0,.2);
      /*transition: .5s;*/
    }

    input:checked[type="checkbox"] {
      background: #03a9f4;

    }

    input[type="checkbox"]:before {
      content: '';
      position: absolute;
      width: 40px;
      height: 40px;
      border-radius: 20px;
      top: 0;
      left: 0;
      background: #ffffff;
      transform: scale(1.1);
      box-shadow: 0 2px 5px rgba(0,0,0,.2);
      transition: .5s;
    }

    input:checked[type="checkbox"]:before {
      left: 40px;
    }
    @font-face {
    font-family: "Minecraftia";
    src: url(../Minecraftia-Regular.ttf);
    }

    .centered {
        padding: 40px;
        background-color: rgb(50, 50, 182);
        border: 4px solid #AAA;
        width: 360px;
        margin: auto;
    }

    .buttons {
        margin-top: 3%;
        text-align: center;
    }

    button {
        border-radius: 5px;
        background-color: #4285f4;
        color: #fff;
        height: 30px;
        font-size: 13px;
    }

    a {
        color: red;
        font-weight: 600;
    }

    button:hover {
        transition: 0.5s;
        background-color: rgb(140, 184, 255);
    }

    p {
        font-family: sans-serif;
        margin: 0 auto;
        margin-top: 10px;
    }

    #gallery {
        margin-top: 10px;
        margin-bottom: 10px;
        max-width: 100px;
        max-height: 70px;
    }

    img {
        max-width: 100px;
    }

    #preview{
        display: flex;
        margin-right: 16%;
    }

    #progress-bar {
        margin-top: 11px;
    }
    progress::-moz-progress-bar {
        background: greenyellow;
      }

    .absolute {
        position: absolute;
    }

    a {
        font-size: 14px;
    }

    form {
        display: flex;
    }

    .gotofile {
        margin: auto;
    }

    #fileElem {
        font-size: 13px;
    }

 

    </style>
</head>
<body>
    <div class="centered" id="drop-area" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
        <form method="post" action="folderCloud.php" enctype="multipart/form-data">
            <input type="file" name="file" id="fileElem" multiple="true" onchange="handleFiles(this.files)">
            <button type="submit" name="submit">Upload</button>
        </form>
        <div id="preview">
            <progress id="progress-bar" max=100 value=0>Progress</progress>
        </div>
        <div id="gallery"></div>
    </div>
    <div class="buttons">
        <form method="post" action="showfiles.php">
            <button class="gotofile">Vai ai file</button>
        </form>
    </div>
    <div class="center">
    <h3>Dark Mode</h3>
    <input type="checkbox" name="" onclick="dark_mode()">
  </div>

    <script>

        function handleFiles(files) {
        files = [...files]
        files.forEach(uploadFile)
        files.forEach(previewFile)
        }

        let filesDone = 0
        let filesToDo = 0
        let progressBar = document.getElementById('progress-bar')

        function initializeProgress(numfiles) {
        progressBar.value = 0
        filesDone = 0
        filesToDo = numfiles
        }

        function progressDone() {
        filesDone++
        progressBar.value = filesDone / filesToDo * 100
        }

        function handleFiles(files) {
        files = [...files]
        initializeProgress(files.length) // <- Add this line
        files.forEach(uploadFile)
        files.forEach(previewFile)
        }

        let uploadProgress = []
        function initializeProgress(numFiles) {
        progressBar.value = 0
        uploadProgress = []

        for(let i = numFiles; i > 0; i--) {
            uploadProgress.push(0)
        }
        }

        function updateProgress(fileNumber, percent) {
        uploadProgress[fileNumber] = percent
        let total = uploadProgress.reduce((tot, curr) => tot + curr, 0) / uploadProgress.length
        progressBar.value = total
        }

        function uploadFile(file, i) { // <- Add `i` parameter
        var url = 'YOUR URL HERE'
        var xhr = new XMLHttpRequest()
        var formData = new FormData()
        xhr.open('POST', url, true)

        // Add following event listener
        xhr.upload.addEventListener("progress", function(e) {
            updateProgress(i, (e.loaded * 100.0 / e.total) || 100)
        })

        xhr.addEventListener('readystatechange', function(e) {
            if (xhr.readyState == 4 && xhr.status == 200) {
            // Done. Inform the user
            }
            else if (xhr.readyState == 4 && xhr.status != 200) {
            // Error. Inform the user
            }
        })

        formData.append('file', file)
        xhr.send(formData)
        }
        
        var ch = true;

        function dark_mode() {
        let bd = document.querySelector("body");
        let h3 = document.querySelector("h3");
        if (ch == true) {
          bd.style.background = "#3A3B3C";
          h3.textContent = "Light Mode";
          h3.style.color = "#919393";
          ch = false;

        } else if (ch == false) {
          bd.style.background = "#ffffff";
          h3.textContent = "Dark Mode";
          h3.style.color = "#000";
          ch = true;

        }
      }
    </script>
</body>
</html>
