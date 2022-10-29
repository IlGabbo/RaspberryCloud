<?php


$_SESSION["loggato"] = true;
$dir = "../dashboard/uploads/";
$content = scandir($dir);
$num = count($content);
$freeDisk = disk_free_space("/");



function format_size($size) {
  global $units;

  $mod = 1024;

  for ($i = 0; $size > $mod; $i++) {
      $size /= $mod;
  }

  $endIndex = strpos($size, ".")+3;

  return substr( $size, 0, $endIndex).' '.$units[$i];
}

function print_file($typefile, $content) {
  echo "
      <div class='centeredDiv'>
        <div style='display: flex; justify-conten: center;'>
          <a href='../dashboard/uploads/$content' class='list_files' style='display: flex; font-family: Open Sans; text-decoration: none; margin-bottom: 10px;' target='_blank'>
            <div style='display: flex; align-items: center;'>  
              <img src='static/images/$typefile' width='20px' />
              <p style='color: #aaaaaa;' class=list_files>$content</p>
            </div>
          </a>
          <form action='delete.php' method='get' style='text-align: left;'>
            <a href='delete.php?file=$content' type='submit' class=deleting_files style='margin-left: 10px; text-align: right; color: red;'><p class=deleting_files>Remove $content</p></a>
          </form>
        </div>
      </div>
      "; 
}

echo "<h2 style='color: #aaaaaa'>".format_size($freeDisk)." GB rimanenti</h2>";

$extention = array(38);
$extention = ["py", "pyw", "sh", "png", "jpg", "jpeg", "webp", "psd", "raw", "exe", "c", "cpp", "js", "cs", "msi", "html", "css", "pdf", "docx", "doc", "docm", "dot", "dotm", "dotx", "odt", "xlsm", "xlsb", "xltm", "xls", "xlt", "xls", "xml", "xlam", "xlw", "xla", "xlr", "zip", "rar"];
for ($i = 0; $i < $num; $i++) {
    
    if ($content[$i] != "." && $content[$i] != ".." && is_file("../dashboard/uploads/".$content[$i])) {
      $ext = pathinfo($content[$i], PATHINFO_EXTENSION);
      
        if ($ext == "py" || $ext == "pyw") {
          print_file("python.svg", $content[$i]);
        } else 

        if ($ext == "sh") {
          print_file("shelll.svg", $content[$i]);

        } else 
        if ($ext == "png" || $ext == "jpg" || $ext == "jpeg" || $ext == "webp" || $ext == "psd" || $ext == "raw") {
          print_file("imageg.svg", $content[$i]);

        }else 
        if ($ext == "exe") {
          print_file("exe.svg", $content[$i]);

        }else 
        if ($ext == "c") {
          print_file("c.svg", $content[$i]);

        }else 
        if ($ext == "cpp") {
          print_file("cpp.svg", $content[$i]);

        }else 
        if ($ext == "js") {
          print_file("js.svg", $content[$i]);

        }else 
        if ($ext == "cs") {
          print_file("cs.svg", $content[$i]);

        }else 
        if ($ext == "msi") {
          print_file("msi.svg", $content[$i]);

        }else 
        if ($ext == "html") {
          print_file("html.svg", $content[$i]);

        }else 
        if ($ext == "css") {
          print_file("css.svg", $content[$i]);

        }else 
        if ($ext == "pdf") {
          print_file("pdf.svg", $content[$i]);
          
        }else 
        if ($ext == "docx" || $ext == "doc" || $ext == "docm" || $ext == "dot" || $ext == "dotm" || $ext == "dotx" || $ext == "odt") {
          print_file("word.svg", $content[$i]);

        }else 

        if ($ext == "xlsx" || $ext == "xlsm" || $ext == "xlsb" || $ext == "xltx" || $ext == "xltm" || $ext == "xls" || $ext == "xlt" || $ext == "xls" || $ext == "xml" || $ext == "xlam" || $ext == "xla" || $ext == "xlw" || $ext == "xlr") {
          print_file("excel.svg", $content[$i]);

        }else 
        if ($ext == "zip" || $ext == "rar") {
          print_file("zip.svg", $content[$i]);

        } else {
          print_file("file.svg", $content[$i]);
        }
        //print_file("file.svg", $content[$i]);
    
 
      }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Files</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300&display=swap" rel="stylesheet">
  <style>
    @font-face {
        font-family: "Minecraftia";
        src: url(../Minecraftia-Regular.ttf);
    }

    * {
        font-family: "Open Sans", sans-serif;
        font-weight: 600;
    }

    .centeredDiv {
      width: 100%;
      margin: 0 30%;
    }

    body {
      overflow-x: hidden;
      background-color: rgba(39, 39, 39, 0.83);
    }

    .context-menu {
        position: fixed;
        z-index: 10000;
        width: 150px;
        background: #1b1a1a;
        border-radius: 5px;
        display: none;
    }

    .context-menu .item {
        padding: 8px 10px;
        font-size: 15px;
        color: #eee;
        cursor: pointer;
        border-radius: inherit;
    }

    .context-menu .item:hover {
        background: #343434;
    }

    .item a {
      text-decoration: none;
      font-weight: 600;
    }

    .center {
      display: flex;
      align-items: center;
      position: absolute;
      top: 5%;
      left: 90%;
      transform: translate(-50%, -50%);
    }

    h3 {
      font-family: "Open Sans";
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
      display: none;
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

    p {
      margin-left: 10px;
    }

    p.list_files {
      color: #000;
    }

    input[type="text"] {
      position: fixed;
      z-index: 10000;
      display: none;
    }

    .error {
      display: block;
      color: red;
      background-color: rgba(255, 0, 0, 0.3);
      width: 20%;
      height: auto;
      font-size: 15px;
      text-align: center;
      margin: 0 auto;
      border-radius: 10px;
      line-height: 27px;
    }

  </style>
</head>

<body>
  <div class='context-menu' id="context-menu">
    <div class='item' onclick="del()">Rimuovi</div>
    <div class="item" onclick="download()">Scarica</div>
  </div>

  <div class='context-menu' id="second-context-menu">
    <div class='item folder' onclick="inpt()">Crea cartella</div>
  </div>
<div style="margin-left: 47.5%; margin-top: 10px; border-collapse: collapse;">
  </div>
  <?php
    if (isset($_GET["error"])) {
      echo "<div class='error'>".$_GET["error"]."</div>";
  }
  ?>
  <div class="center">
    <h3></h3>
    <input type="checkbox" name="" onclick="dark_mode()">
  </div>
  <div>
    <form method="get" action="../dashboard/createFolder.php">
      <input type="text" name="nameFolder" id="nameFolder" placeholder="Inserisci il nome della cartella"/>
    </form>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    var c = true;
    var ch = true;
    var sm = true;
    let text = "";
      document.querySelector("body").addEventListener("click", hideMenu);
      const contextMenu = document.getElementById("context-menu");
      const secondContextMenu = document.getElementById("second-context-menu");
      const createFolder = document.getElementById("nameFolder");
      document.querySelectorAll("a")
      .forEach(a=>a.addEventListener("contextmenu", ContextMenu));
      document.querySelectorAll('a p').forEach(p=>p.addEventListener("contextmenu", (evnt)=> {
        evnt.preventDefault();
        text = evnt.target.textContent;
      }));

      document.querySelector("body").addEventListener("contextmenu", secondMenu, false);
      document.querySelector(".folder").addEventListener("click", inpt, true);

      function getName(ev) {
        ev.stopPropagation();
        const { clientX: mouseX, clientY: mouseY } = ev;
        pos = ev;// Da risolvere: ottenere il testo del click corrente
        text = pos.textContent;
        console.log(text); // Vedi sopra
      }

      function hideMenu() {
        contextMenu.style.display = "none";
        secondContextMenu.style.display = "none";
      }

      function inpt(ev) {
        /*var input = document.createElement("input");
        document.querySelector("body").appendChild(input);  */
        let doc = document.getElementById("nameFolder");
        console.log(sm);
          event.stopPropagation();
          const { clientX: mouseX, clientY: mouseY } = ev;
          doc.style.top = `${mouseY}px`;
          doc.style.left = `${mouseX}px`;
          doc.style.display = "block";
      }

      function ContextMenu(event) {
            event.preventDefault();
            event.stopPropagation();
            const { clientX: mouseX, clientY: mouseY } = event;
            console.log("Right click");

            //if (c == true) {
              contextMenu.style.top = `${mouseY}px`;
              contextMenu.style.left = `${mouseX}px`;
              contextMenu.style.display = "block";
              c = false;
            /*} else if (c == false) {
              contextMenu.style.display = "none";
              c = true;
            } */             
        }

      function secondMenu(e) {
        e.preventDefault();
        e.stopPropagation();
        let body = document.querySelector("body");
        const { clientX: mouseX, clientY: mouseY } = e;

        //if (sm == true) {
          secondContextMenu.style.top = `${mouseY}px`;
          secondContextMenu.style.left = `${mouseX}px`;
          secondContextMenu.style.display = "block";
          sm = false;
        /*} else if (sm == false) {
          let doc = document.getElementById("nameFolder");
          doc.style.display = "none";
          secondContextMenu.style.display = "none";
          sm = true;          
        }*/
      }

        function del() {
          window.open("delete.php?file="+text.toString(), "_self");
          text = "";
      }

      function download() {
        window.open("download.php?file="+text.toString(), "_self");
        text = "";
      }

      function dark_mode() {
        let bd = document.querySelector("body");
        let h3 = document.querySelector("h3");
        if (ch == true) {
          bd.style.background = "#3A3B3C";
          document.querySelectorAll(".list_files")
          .forEach(a=>a.style.color = "#919393");
          h3.textContent = "Light Mode";
          h3.style.color = "#919393";
          ch = false;
        } else if (ch == false) {
          bd.style.background = "#ffffff";
          document.querySelectorAll(".list_files")
          .forEach(a=>a.style.color = "#000");
          h3.textContent = "Dark Mode";
          h3.style.color = "#000";
          ch = true;
        }
      }

      function isDir() {
        var result = "<?php 
          
          ?>";
      }

  </script>
</body>
</html>