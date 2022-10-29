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

echo "<h2 style='color: #aaaaaa;'>".format_size($freeDisk)." GB rimanenti</h2>";

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

        } else if ($ext == "pkt") {
          print_file("pkt.png", $content[$i]);

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
  <link rel="stylesheet" href="static/css/style.css">
</head>

<body>
  <div class='context-menu' id="context-menu">
    <div class='item' onclick="del()">Rimuovi</div>
    <div class="item" onclick="download()">Scarica</div>
    <div class="item" id="rename" onclick="newName()">Rinomina</div>
  </div>

    <input type="text" id="new_name" name="newName" onchange="rename()" placeholder="Nuovo nome"/>


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
  <script src="static/js/js.js"></script>
</body>
</html>
