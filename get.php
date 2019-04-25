<?php
//--- Set the parameters --------------//
$url    = "http://www.google.com/";
$apikey = "ab5bdb5d0b48cda6702e7bd80cad94a5ed2c26ef8ad1";
$width  = 640;
//--- Make the call -------------------//
$fetchUrl = "https://api.thumbnail.ws/api/".$apikey ."/thumbnail/get?url=".urlencode($url)."&width=".$width;
$jpeg = file_get_contents($fetchUrl);
//--- Do something with the image -----//
file_put_contents("screenshot.jpg", $jpeg);
header("Content-type: image/jpeg");
echo $jpeg;
exit(0);
?>
