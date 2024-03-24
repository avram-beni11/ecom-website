<?php

//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Select a database
$db = $mongoClient->gameShop;
$collection = $db->Games;
//Extract the data that was sent to the server
$search_string = filter_input(INPUT_POST, 'SearchBar', FILTER_SANITIZE_STRING);

//Create a PHP array with our search criteria
$findCriteria = [
    '$text' => [ '$search' => $search_string ] 
 ];

//Find all of the Products that match  this criteria
$cursor = $db->Games->find($findCriteria);

//Output the results as forms
echo "<h1>Products</h1>";   
foreach ($cursor as $cust){
    echo '<form action="editProduct3.php" method="post">';
    echo 'Name: <input type="text" name="name" value="' . $cust['name'] . '" required><br>';
    echo 'Product ID: <input type="text" name="prodID" value="' . $cust['_id'] . '" required><br>';
    echo 'Price: <input type="text" name="price" value="' . $cust['price'] . '" required><br>';
    echo 'Console: <input type="text" name="console" value="' . $cust['console'] . '" required><br>';
    echo 'Description: <input type="text" name="description" value="' . $cust['description'] . '" required><br>';
    echo 'Stock: <input type="text" name="stock_available" value="' . $cust['stock_available'] . '" required><br>'; 
    echo 'Cover: <input type="text" name="img_url" value="' . $cust['img_url'] . '" required><br>'; 
    echo 'Keyword: <input type="text" name="keywords" value="' . $cust['keywords'] . '" required><br>'; 
    echo '<input type="hidden" name="id" value="' . $cust['_id'] . '" required>'; 
    echo '<input type="submit">';
    echo '</form><br>';
};

 