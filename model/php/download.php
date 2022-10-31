<?php
$dir = "../dashboard/uploads/";
if(isset($_GET['file'])) {
$filename = $_GET['file'];

if(file_exists($dir.$filename)) {
    header('Content-Description: File Transfer');
    header('Content-Type: application/octet-stream');
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header('Content-Disposition: attachment; filename="'.basename($dir.$filename).'"');
    header('Content-Length: ' . filesize($dir.$filename));
    header('Pragma: public');

    flush();

    readfile($dir.$filename);


    die();
} else {
    echo "File does not exist.";
    }
} else {
    echo "Filename is not defined.";

    header("location: showfiles.php");
}
?>