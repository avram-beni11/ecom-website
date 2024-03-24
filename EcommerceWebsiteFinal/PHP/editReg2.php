<?php
include('common.php');
outputDefault('Home');
outputNav('Home');

session_start();
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->gameShop;
$collection = $db->Customer;

$loggedInCust = $_SESSION['loggedInUserEmail'];
//Extract the data that was sent to the server
echo $_SESSION['loggedInUserEmail'];
$search_string = $loggedInCust;


//Create array with cerain search criteria
$find = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the Products that match  this criteria
$findMatch = $db->Customer->find($find);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the Products that match  this criteria
$cursor = $db->Games->find($findCriteria);

//Output the results as forms
echo "<h1>Edit Your Details</h1>";   
foreach ($findMatch as $customers){
    echo '<form action="editReg3.php" method="post">';
    echo 'First Name: <input type="text" id="name3" name="fname" value="' . $customers['firstName'] . '" required><br><br>';
    echo 'Last Name: <input type="text" id="sname" name="sname" value="' . $customers['lastName'] . '" required><br><br>';
    echo 'Email: <input type="email" id="input2" name="email" value="' . $customers['email'] . '" required><br><br>';
    echo 'Address: <input type="text" id="address" name="address" value="' . $customers['billing_address'] . '" required><br><br>';
    echo 'Phone Number: <input type="number" id="pn" name="num" value="' . $customers['phoneNumber'] . '" required><br><br>';
    echo 'Password: <input type="password" id="pass" name="password" value="' . $customers['password'] . '" required><br><br>';
    echo '<input type="hidden" name="id" value="' . $customers['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
};

 