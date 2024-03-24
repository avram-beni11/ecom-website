<?php
include('common.php'); 
outputDefault('Home');
outputNav('Home');

session_start();// start session
if(array_key_exists("loggedInUserEmail", $_SESSION) ){
echo '
    <div class="detHeader">
    <h1>My Previous Orders</h1>
    </div> ';
    echo '<div class="detBorder">';

    echo 'You are logged in as: ' . $_SESSION["loggedInUserEmail"]. '<br>'; // get data from session variable to display logged in user
    require __DIR__ . '/vendor/autoload.php';

//Create MongoDB client stored in variable
$mongoClient = (new MongoDB\Client);

//select specific database
$db = $mongoClient->gameShop;

//choose Orders document
$collection = $db->Orders;

$orders = $db->Orders->find();
// loop through all data in orders document
foreach ($orders as $doc) {
    $databaseEmail = $doc["email"]; 
    $loggedInUserEmail = $_SESSION['loggedInUserEmail']; // variable contains the currently logged in user

     if (isset($doc["fname"])) { // if a username exists and - 
        if ($databaseEmail == $loggedInUserEmail) 
            if ($doc["email"] === $loggedInUserEmail) { //  - email is equal to logged in users email then display confirmation

            if (isset($_SESSION['custID'])) {
                // display information from the Orders document in database
            echo '<p>Order ID ' . $doc["_id"] . '<br>';
            echo 'Order Date: ' . $doc["date"] . '<br>';
            echo 'Delivery Address: ' . $doc["billing_address"] . '<br><br>';
            echo '<h3>Items Purchased List</h3>';
            for($i=0; $i<count($doc['products']); $i++){
                echo '<p>Product Name: ' . $doc['products'][$i]['name'] . ' | Price: £' . $doc['products'][$i]['price'];
            }
            echo '<div class="divider"></div> <br>';
            
            echo '<div class="divider"></div> <br>';           
        }
    }
}
    echo '</div>';
} 
}

?>


<?php
showFooter();
?>