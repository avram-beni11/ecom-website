<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
<body style="background-color:#D8D8D8;"> <!-- bg colour -->
<?php
include('common.php'); 
outputDefault('Products');
outputNav('Games');
//Include libraries
require __DIR__ . '/vendor/autoload.php';
    
//Create MongoDB client
$mongoClient = (new MongoDB\Client);

//choose gameShop database
$db = $mongoClient->gameShop;

//Retrieve data from input field on common.php
$searchText = filter_input(INPUT_GET, 'searchBar', FILTER_SANITIZE_STRING);

//declare array search criteria - in this case the text the user inputs in search bar txt field
$find = [
    '$text' => [ '$search' => $searchText ]
 ];

//Find all of the customers that match  this criteria
$arrOfFoundCriteria = $db->Games->find($find);

//Output the results
echo '<h2>Search results for: "' . $searchText .'" </h2>';
if ($searchText == "") {
    echo 'Please enter a product'; 
}

echo '<div class="productBorder"> '; // create borders to hold main content 
echo '<table>'; // create table to hold products that have been searched

// loop through all the data that is in the database and matches the search critria 
foreach ($arrOfFoundCriteria as $games){
// neatly format all data obtained by search
   echo '<div class="row">';
   echo "<p>";

   // retrieve data of specifc item from database - img, name, console, description, price
   echo '<img class="psGame1_2" src="' . $games["img_url"] . '"<br><br>';
   echo '<h1 class="gameName">' . $games['name'] . '</h1> <br>';
   echo '<img class="ps5Logo" src="' . $games["console"] . '" <br>';
               
                echo '<div class="para">';
                echo $games["description"] . '<br><br>';
                echo '<div class="pricing">';
                echo '£' . $games["price"] . '<br><br>';
                echo '</div>';
                echo 'Current Stock: ' . $games["stock_available"];
                echo '</div>';
                echo '<button class="btnB" onclick=\'addToBasket("' . $games["_id"] . '", "' . $games["name"] . '", "' . $games["console"] . '", "' . $games["price"] . '", "' .'")\'>Add to Basket </button>';
                echo '</div>';
   echo "</p>";
   echo '</div>';
}
echo '</table>'; // close table tag
echo '</div>';

echo '<h3>Return to <a href="index.php">Home</a></h3>'; // provide option to navigate back to home page if needed
?>
<script src="../JavaScript/productBasket.js"></script>
<?php
showFooter();
?>
