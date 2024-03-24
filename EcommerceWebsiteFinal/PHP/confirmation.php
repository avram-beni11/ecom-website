<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
<body style="background-color:#D8D8D8;"> 
<?php
$br = '<br><br><br><br><br><br><br><br>';

require __DIR__ . '/vendor/autoload.php';
session_start(); // start session
//Create MongoDB client stored in variable
$mongoClient = (new MongoDB\Client);

//select specific database
$db = $mongoClient->gameShop;

//choose Orders document
$collection = $db->Orders;

$orders = $db->Orders->find();
foreach ($orders as $document) {    

    $databaseEmail = $document["email"]; 
    $loggedInUserEmail = $_SESSION['loggedInUserEmail']; // variable contains the currently logged in user

     if (isset($document["fname"])) { // if a username exists and - 
        if ($databaseEmail == $loggedInUserEmail) 
            if ($document["email"] === $loggedInUserEmail) { //  - email is equal to logged in users email then display confirmation
            echo '<h1 class="confirm_header">Thank You For Your Order</h1>';
            if (isset($_SESSION['custID'])) {
            echo '<p><h2>Your order ' . $document["_id"] . ' has been placed <br></h2>'; 
            echo '<div class="divider"></div> <br>';

            // display information from the Orders document in database
            echo '<div class="confirm_border">'; 
            echo '<p>Order ID: ' . $document["_id"] . '<br>';
            echo 'Order Date: ' . $document["date"] . '<br>';
            echo 'Delivery Address: ' . $document["billing_address"] . '<br><br>';
            echo '<div class="divider"></div> <br></p>';
            echo '<h3>Order List</h3>';
            for($i=0; $i<count($document['products']); $i++){
                echo '<p>Product Name: ' . $document['products'][$i]['name'];
            }
            echo '<div class="divider"></div> <br>';
            echo '<h3>Order Summary</h3>';
            for($i=0; $i<count($document['products']); $i++){
                echo '<p>Price: £' . $document['products'][$i]['price'];
            }
            
            echo '<div class="divider"></div> <br>';
            echo '<h3>Contact</h3>';
            echo '<p>Name: ' . $_SESSION['firstName'] . ' ' . $_SESSION['lastName'] . '<br>';
            echo 'Phone Number: ' . $_SESSION['phone_no'] .'<br>';
            echo 'Email: ' . $loggedInUserEmail .'<br></p>';
            // echo 'Products: ' . $document["products"] . '<br><br>';

            echo '<p>Return to <a href="index.php">Home</a></p>';
        }
    }
    }
}


// $databaseEmail = $document["email"]; 
// $loggedInUserEmail = $_SESSION['loggedInUserEmail'];
// echo '<br>Email in database: ' . $databaseEmail . '<br>';
// echo 'Logged in email: ' . $loggedInUserEmail . '<br>';

// if ($databaseEmail == $loggedInUserEmail) {
//     echo 'Emails are equal';
// } else {
//     echo 'Emails are NOT equal';
// }
?>







