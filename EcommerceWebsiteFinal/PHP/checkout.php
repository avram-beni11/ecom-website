<!DOCTYPE html>
<link rel="stylesheet" type="text/css" href="../CSS/style.css" /> <!-- link to CSS -->
<script src="../JavaScript/checkout.js"></script>

<?php
echo '<body style="background-color:#D8D8D8;"> '; // add bg colour to page

session_start();
//Start session  

require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Choose specific database
$db = $mongoClient->gameShop;
?>

<?php

// create headers
echo '
<html>
<head>
    <link rel="stylesheet" type="text/css" href="../CSS/style.css" />
    <title>Confirm Details</title>
</head>
<body style="background-color:#D8D8D8;"> 
<div class="detHeader">
<h1>Confirm Details</h1>
</div>
<div class="detBorder"> 
    <form action="confirmation.php" method="post">
    <br><br> ';
    if (array_key_exists('loggedInUserEmail', $_SESSION)) {  // check if a user is logged in, if so, print msg with the user email
        echo '<p>';
        echo 'Please confirm your details by clicking Confirm:<br><br>';
        // display rest of information as confirmation
    echo 'Email: ' . $_SESSION['email']. '<br>';
    echo 'Full Name: ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] .'<br>';
    echo 'Billing Address: ' . $_SESSION['billingAddress'] .'<br>';
    echo 'Phone Number: ' . $_SESSION['phone_no'] .'<br>';
    echo 'Your ID: ' . $_SESSION['custID'] .'<br>';
    //Extract the product IDs that were sent to the server
    $prodIDs= $_POST['prodIDs'];

    //Convert JSON string to PHP array 
    $productArray = json_decode($prodIDs, true);

    echo '<div class="divider"></div> <br>';
    echo '<h2>Products</h2>';
    //Output the IDs of the products that the customer has ordered
    for($i=0; $i<count($productArray); $i++){
        echo '<p> ' . $productArray[$i]['name'] . ' ......................Quantity: ' . $productArray[$i]['count'] . '</p>';
    }
    echo '<input type="submit" value="Confirm"></input>'; // create button to confirm and directs to another page
    } else {
        echo 'Account does not exist. Please <a href="index.php">Home</a><br>'; // display error msg if user is not have an account
    }
        
echo ' </form>
</div> ';

$collection = $db->Orders;

//Extract the data that was sent to the server
$name= filter_input(INPUT_POST, 'name', FILTER_SANITIZE_STRING);

$product = $productArray;
$customerID = $_SESSION['custID'];
$count = 1;
$date = date("d/m/Y");
$fname = $_SESSION['firstName'];
$sname = $_SESSION['lastName'];
$email = $_SESSION['email'];
$billingAddress = $_SESSION['billingAddress']; 

// array to send to database
$dataArray = [
        "products" => $product, 
        "CustomerID" => $customerID,
        "count" => $count,
        "date" => $date,
        "fname" => $fname,
        "sname" => $sname,
        "email" => $email,
        "billing_address" => $billingAddress,
     ];
     //Add the new product to the database
    $insertResult = $collection->insertOne($dataArray);
//------------------------------------------------------------------------------
$baskDoc = $db->Basket;
$orders = $db->Basket->find();

// store all data in database
$product = $productArray;
$price = 300;
date_default_timezone_set('Europe/London');
$time = date("H:i:sa");
$baskArray = [
    "CustomerID" => $customerID,
    "date" => $date,
    "time" => $time,
    "price" => $price,
    "products" => $product,
 ];
    $insertResult = $baskDoc->insertOne($baskArray);
?>

    </body>
</html>
