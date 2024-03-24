<?php
include('common.php');
outputDefault("View Products");
outputNav("View Products");
?>
<?php
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->gameShop; // access database

//Find all products
$Games = $db->Games->find();

session_start(); // check if user is logged in to access content
if(!array_key_exists("loggedInUserEmail", $_SESSION) ){
  echo 'Please <a href="login.php">Login</a> first to access this page.';
  return;
} else {
echo '
<table>
  <tr> <!-- create table rows -->
    <tr>
      <th>ID</th>
      <th>Image</th>
      <th>Name</th>
      <th>Description</th>
      <th>Console</th>
      <th>Price</th>
      <th>Stock</th>
    </tr> ';
    // loop through database to view all products
foreach ($Games as $products) {
  echo  '<tr>';
  echo     '<td>' . $products["_id"] . '</td>';
  echo    '<td><img class="games" src="' . $products["img_url"] . '"/></td>'; //add image of product
  
  echo    '<td>' . $products["name"] . '</td>';
  echo    '<td class="descriptionCol">' . $products["description"] . '</td>';
  echo    '<td><img class="gameLogos" src="' . $products["console"] . '"/></td>';
  echo    '<td> £' . $products["price"] . '</td>';
  echo    '<td>' . $products["stock_available"] . '</td>';
  echo  '</tr>'; 
  
}
echo '</table>';
}
  ?>

<!-- Create footer -->
<?php
showFooter();
?>
