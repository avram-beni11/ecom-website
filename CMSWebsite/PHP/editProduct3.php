<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->gameShop;

//Extract the Products details 
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);
$prodID= filter_input(INPUT_POST, 'prodID', FILTER_SANITIZE_STRING);
$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING);
$console= filter_input(INPUT_POST, 'console', FILTER_SANITIZE_STRING);
$description= filter_input(INPUT_POST, 'description', FILTER_SANITIZE_STRING);
$stock_available = filter_input(INPUT_POST, 'stock_available', FILTER_SANITIZE_STRING);
$keywords = filter_input(INPUT_POST, 'keywords', FILTER_SANITIZE_STRING);
$img_url = filter_input(INPUT_POST, 'img_url', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);   

//Criteria for finding document to replace
$replaceCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$ProductsData = [
    "name" => $name,
    "prodID" => $prodID,
    "price" => $price,
    "console" => $console,
    "description" => $description,
    "stock_available" => $stock_available,
    "img_url" => $img_url,
    "keywords" => $keywords,

];

//Replace Products data for this ID
$updateRes = $db->Games->replaceOne($replaceCriteria, $ProductsData);
    
//Echo result back to user
if($updateRes->getModifiedCount() == 1)
    echo 'Products document successfully replaced.';
else
    echo 'Products replacement error.';


