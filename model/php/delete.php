<?php
    $dirpath = "../dashboard/uploads/";
    $file_to_delete = $_GET['file'];
    $string = $dirpath.$file_to_delete;
    if (unlink($string)) {
        header("location: ./showfiles.php");
    } else {
        header("location: ./showfiles.php?status=Errore");
    }
?>