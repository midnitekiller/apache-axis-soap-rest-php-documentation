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