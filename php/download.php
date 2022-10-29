<?php
$dir = "../dashboard/uploads/";
if(isset($_GET['file']))
{
//Read the filename
$filename = $_GET['file'];
//Check the file exists or not
if(file_exists($dir.$filename)) {

//Define header information
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: 0");
header('Content-Disposition: attachment; filename="'.basename($dir.$filename).'"');
header('Content-Length: ' . filesize($dir.$filename));
header('Pragma: public');

//Clear system output buffer
flush();

//Read the size of the file
readfile($dir.$filename);

//Terminate from the script
die();
}
else{
echo "File does not exist.";
}
}
else
echo "Filename is not defined.";

header("location: showfiles.php");
?>