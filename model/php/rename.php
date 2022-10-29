<?php
    $filename = $_GET["file"];
    $newName = $_GET["newName"];
    $dir = "../dashboard/uploads/";
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $oldName = $dir.$filename;
    $newNameFile = $dir.$newName.".".$ext;
    exec("mv '$oldName' '$newNameFile'");
    echo $oldName;
    echo $newNameFile;
    header("location: showfiles.php"); 
?>
