<?php
error_reporting(E_ALL);

ini_set('display_errors', TRUE);

$img=imagecreatefrompng($_GET['jpg']);
$red = imagecolorallocatealpha($img,255,0,0,0);
imagettftext($img, 20, -40, 40, 60, $red, "C:\Windows\Fonts\Calibri.ttf", "COPYRIGHT");

if(!$img)
{
	echo "erreur";
}
else
{
	imagepng($img);
}
?>