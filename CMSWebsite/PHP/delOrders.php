<?php
include('common.php');
outputDefault("View/Delete Customer Orders");
outputNav("View/Delete Customer Orders");

//use libraries
require __DIR__ . '/vendor/autoload.php';
    
//make MongoDB client
$mongoDbClient = (new MongoDB\Client);

//choose specifc database
$db = $mongoDbClient->gameShop;

//retrieve order ID from user input in txt field
$orderID = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_STRING);

//create array 
$criteria = [
    "_id" => new MongoDB\BSON\ObjectID($orderID)
];

//Delete the customer document
$removeDoc = $db->Orders->deleteOne($criteria);
    
//print msg to staff
if($removeDoc->getDeletedCount() == 1){
    echo '<h2>Product ID: ' . $orderID .' Deleted Successfully .</h2>'; 
    echo '<h3><p>View Orders <a href="deleteOrders.php">page</a></p></h3>'; // navigate to page
} else if ($orderID == "") {
  echo 'Please enter a valid ID'; // error msg if field is blank
}
else{
   echo 'Deleting Order Failed'; // error msg if deletion doesn't work
}

?>

<?php
showFooter();
?>