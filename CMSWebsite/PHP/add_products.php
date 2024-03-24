<?php

require __DIR__ . '/vendor/autoload.php';
    
//Create MongoDB client
$mongoClient = (new MongoDB\Client);

//choose gameShop database
$db = $mongoClient->gameShop;

//choose Games collection 
$collection = $db->Games;

//get data from the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$desc = filter_input(INPUT_POST, 'desc', FILTER_SANITIZE_STRING);
$img= filter_input(INPUT_POST, 'img', FILTER_SANITIZE_STRING);
$console = filter_input(INPUT_POST, 'console', FILTER_SANITIZE_STRING);
$price= filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$stock = filter_input(INPUT_POST, 'stock', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);


//Convert the data to an array
$dataArray = [
    "name" => $name, 
    "description" => $desc, 
    "img_url" => $img, 
    "console" => $console, 
    "price" => $price, 
    "stock_available" => $stock, 
    "keywords" => $keywords, 
 ];
 //Add product database
$insertResult = $collection->insertOne($dataArray);

//display result to staff
if($insertResult->getInsertedCount() == 1){
    echo '<h1>Product: '. $dataArray["name"] . ' Successfully Added.</h1>';
    echo ' New generated ID: ' . $insertResult->getInsertedId() . '<br>';
    echo $dataArray["name"] . ' in <a class="reg" href="viewProducts.php">View Products</a> table <br>';
}
else {
    echo 'Error adding product';
}
?>