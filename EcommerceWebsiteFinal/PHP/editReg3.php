<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    

$mongoClient = (new MongoDB\Client);

//Select gameShop database
$db = $mongoClient->gameShop;

//Extract the customers details 
$fname= filter_input(INPUT_POST, 'fname', FILTER_SANITIZE_STRING);
$sname= filter_input(INPUT_POST, 'sname', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$address= filter_input(INPUT_POST, 'address', FILTER_SANITIZE_STRING);
$phoneNum= filter_input(INPUT_POST, 'num', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);   

//search Criteria to find document to update
$updateCriteria = [
    "_id" => new MongoDB\BSON\ObjectID($id)
];

//Data to replace
$ProductsData = [
    "firstName" => $fname,
    "lastName" => $sname,
    "email" => $email,
    "billing_address" => $address,
    "phoneNumber" => $phoneNum,
    "password" => $password,
];

//Replace Products data for this ID
$updateRes = $db->Customer->replaceOne($updateCriteria, $ProductsData);
    
//print msgs of results to customer
if($updateRes->getModifiedCount() == 1) {
    echo '<h1>Your details have been updated successfully.</h1><br><br>';
    echo '<h2>Return to <a href="index.php">Home</h2>';
} else {
    echo 'Error updating details'; // error msg
}


