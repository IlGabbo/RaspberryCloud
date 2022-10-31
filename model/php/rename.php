<?php
    $filename = $_GET["file"];
    $newName = $_GET["newName"];
    $dir = "../dashboard/uploads/";
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $oldName = $dir.$filename;
    $newNameFile = $dir.$newName.".".$ext;
    if(rename($oldName, $newNameFile)) {
        header("location: showfiles.php"); 
    } else {
        header("location: showfiles.php?status=Errore"); 
    }
    
?>
