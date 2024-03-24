<?php
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create MongoDB client
$mongoClient = (new MongoDB\Client);

//choose CMS database
$db = $mongoClient->CMS;

//choose staff collection 
$collection = $db->staff;

//get data from the server
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);

//Convert the data to an array
$dataArray = [
    "Email" => $email, 
    "Password" => $password
 ];

//Add new staff member to the database
$insertResult = $collection->insertOne($dataArray);
    
//direct staff to certain page
if($insertResult->getInsertedCount()==1){
    header("Location: login.php");
    exit(); 
}
else {
    echo 'Error adding customer';
}
