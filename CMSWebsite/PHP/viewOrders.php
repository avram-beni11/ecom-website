<?php
include('common.php');
outputDefault("View/Delete Customer Orders");
outputNav("View/Delete Customer Orders");
?>
<?php
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->gameShop;

//Find all products
$Games = $db->Orders->find();
session_start(); // check if user is logged in to access content
if(!array_key_exists("loggedInUserEmail", $_SESSION) ){
  echo 'Please <a href="login.php">Login</a> first to access this page.';
  return;
} else {
echo '
<h2 class="addHeader">View Orders</h2>
  <!-- create "view orders" tab" -->
  <a class="orders">View Orders</a>

<!-- create "delete orders" tab" -->
  <a class="delete" href="deleteOrders.php">Delete Orders</a>

  <!-- create border to contain main content of table -->
  <div class="addBorder">
    <table>
  <tr> <!-- create table rows -->
    <tr>
      <th>ID</th>
      <th>Products</th>
      <th>Customer ID</th>
      <th>Count</th>
      <th>Date</th>
      <th>Price</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Email</th>
      <th>Address</th>
      <th>Product IDs</th>

    </tr> ';
  // loop through all content in database
foreach ($Games as $document) {
  echo  '<tr>';
  echo     '<td>' . $document["_id"] . '</td>'; 
  echo    '<td>' . $document["products"][0]['name'] . '</td>';
  echo    '<td>' . $document["count"] . '</td>';
  echo    '<td>' . $document["count"] . '</td>';
  echo    '<td>' . $document["date"] . '</td>';
  echo    '<td>' . $document["count"] . '</td>';
  echo    '<td>' . $document["fname"] . '</td>';
  echo    '<td>' . $document["sname"] . '</td>';
  echo    '<td>' . $document["email"] . '</td>';
  echo    '<td>' . $document["billing_address"] . '</td>';
  echo    '<td>' . $document["products"][0]['id'] . '</td>';

  
  echo  '</tr>'; 

  
}

echo '</table>';
echo '</div>';
}
  ?>

<!-- Create footer -->
<?php

showFooter();
?>
