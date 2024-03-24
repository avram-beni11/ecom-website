<?php
// call all functions from common file
include('common.php'); 
outputDefault('Home');
outputNav('Home'); // create nav bar

session_start(); // start session 
if(array_key_exists("loggedInUserEmail", $_SESSION) ){ // check if a user is logged in

    // if user is logged in, print content
echo ' 
    <div class="detHeader">
    <h1>My Account</h1>
    </div> ';
    echo '<div class="detBorder">';

    echo 'Email: ' . $_SESSION["email"]. '<br>'; // get data from session variable
    echo 'Full Name: ' . $_SESSION["firstName"] . ' ' . $_SESSION["lastName"] . '<br>';
    echo 'Address: ' . $_SESSION["billingAddress"] . '<br>';
    echo 'Phone Number ' . $_SESSION["phone_no"] . '<br><br>';
    echo 'Your ID: ' . $_SESSION['custID'] . '<br>';// generate customer ID 
    echo '<div class="divider"></div>';
    echo '<br>Click <a href="editReg2.php">Here</a> to Edit Details<br><br>';
    echo '<div class="divider"></div>';
    echo '<br>Click <a href="prevOrders.php">Here</a> to View Previous Orders<br><br>';
    echo '<div class="divider"></div>';

    echo '<br>Click "Continue" to proceed.<br>'; 
    echo '<a class="conBtn" href="products.php">Continue</a> <br><br><br>'; // button direct to another page
    echo '</div>';
}
showFooter();
