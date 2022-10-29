<?php
    $dirpath = "../dashboard/uploads/";
    $file_to_delete = $_GET['file'];
    $string = $dirpath.$file_to_delete;
    exec("rm '$string'");
    header("location: showfiles.php");
?>