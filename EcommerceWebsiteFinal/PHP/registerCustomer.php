<?php
session_start(); // start session
require __DIR__ . '/vendor/autoload.php';
    
//Create instance of MongoDB client
$mongoClient = (new MongoDB\Client);

//Choose specific database
$db = $mongoClient->gameShop;

//choose Customer collection - to store data in this collection
$collection = $db->Customer;
//Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $firstName= filter_input(INPUT_POST, 'firstName', FILTER_SANITIZE_STRING);
    $lastName= filter_input(INPUT_POST, 'lastName', FILTER_SANITIZE_STRING);
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $billingAddress = filter_input(INPUT_POST, 'billingAddress', FILTER_SANITIZE_STRING);
    $phone_no = filter_input(INPUT_POST, 'phone_no', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    
    if($firstName != "" && $billingAddress != "" && $password != ""){// check that fields are not blank
        //Convert to array - store these values in the database under respective field names
    $customerArray = [
        "firstName" => $firstName,
        "lastName" => $lastName,
        "email" => $email, 
        "billing_address" => $billingAddress,
        "phoneNumber" => $phone_no,
        "password" => $password
 ];
 // Store user details in session variable to access across all pages
$_SESSION["firstName"] = $firstName;
$_SESSION["lastName"] = $lastName;
$_SESSION["email"] = $email;
$_SESSION["billingAddress"] = $billingAddress;
$_SESSION["phone_no"] = $phone_no;

//Add array information to database
$includeData = $collection->insertOne($customerArray);
//Output message confirming registration - print confirmation to user
if($includeData->getInsertedCount()==1){
    echo '
    <div class="detHeader">
    <h1>Registration Details</h1>
    </div> ';
    echo '<div class="detBorder">';
    echo '<br><h1>Thank you for registering ' . $firstName . '</h1>';
    echo 'Your registration has been completed successfully with the following information:<br><br>';
    echo 'Email: ' . $_SESSION["email"]. '<br>'; // get data from session variable
    echo 'Full Name: ' . $_SESSION["firstName"] . ' ' . $_SESSION["lastName"] . '<br>';
    echo 'Address: ' . $_SESSION["billingAddress"] . '<br>';
    echo 'Phone Number ' . $_SESSION["phone_no"] . '<br><br>';

    echo 'Click "Continue" to proceed.<br>'; 
    echo '<a class="conBtn" href="register.php">Continue</a> <br><br><br>';
    echo '</div>';
    $id = $includeData->getInsertedId();
    $_SESSION["custID"] = $id;
    echo $_SESSION['custID']; // generate customer ID 
} else {
    echo 'Error'; // display error message
}   
 } else{// display msg if fields are blank
        echo 'Please fill in all fields';
    }
?>