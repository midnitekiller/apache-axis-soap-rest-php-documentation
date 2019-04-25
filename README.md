# apache-axis-soap-rest-php-documentation
Apache axis web service SOAP and REST API using PHP documentations


## Links for notes
  1. https://eureka.ykyuen.info/2011/05/05/php-send-a-soap-request-by-curl/
  2. https://pritomkumar.blogspot.com/2013/12/soap-request-in-php-with-curl.html


# Sample Codes 

## get.php 

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


## post.php 
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


## WSDL 
<?php
$client = new SoapClient('https://api.thumbnail.ws/soap?wsdl');
try {
  $response = $client->get(array(
    "apikey" => 'ab5bdb5d0b48cda6702e7bd80cad94a5ed2c26ef8ad1', 
    "url" => 'http://thumbnail.ws/', 
    "width" => 800, 
    "fullpage" => false,
    "mobile" => false
  ));
  $image = base64_decode($response->image);
 
  file_put_contents("screenshot.jpg", $image);
  header("Content-type: image/jpg");
  echo $image;
  // do something with the image. 
  // ...
  // ...
    
} catch (SoapFault $fault) {
  echo "Error: " . $fault->faultcode . ": " . $fault->getMessage() . "\n";
}

?>
