<?php
    $dirpath = "../dashboard/uploads/";
    $file_to_delete = $_GET['file'];
    if (unlink ($dirpath.'/'.$file_to_delete)) {
        header("location: showfiles.php");
    } else {
        rmdir($dirpath.'/'.$file_to_delete);
        header("location: showfiles.php");
    }
?>