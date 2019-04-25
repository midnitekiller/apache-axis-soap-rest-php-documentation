<?php
//--- Set the parameters --------------//
$url    = "http://www.google.nl/";
$apikey = "ab5bdb5d0b48cda6702e7bd80cad94a5ed2c26ef8ad1";
$width  = 640;
//--- Make the call -------------------//
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://api.thumbnail.ws/api/' . $apikey . '/thumbnail/get');
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, array(
  'url' => $url,
  'width' => $width,
  'fullpage' => 'false'
));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$jpeg = curl_exec($ch);
curl_close($ch);
//--- Do something with the image -----//
file_put_contents("screenshot.jpg", $jpeg);
header("Content-type: image/jpg");
echo $jpeg;
exit(0);
?>