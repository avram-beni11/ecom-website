<?php
include('common.php'); 
outputDefault('Products');

outputNav('Games');
session_start();
//Connect to MongoDB 
require __DIR__ . '/vendor/autoload.php';
$mongoClient = (new MongoDB\Client);
$db = $mongoClient->gameShop; // select specific database
        
//search for products in specific document
$Games = $db->Games->find();
$orders = $db->Orders->find();

// create borders and header for title of page
echo '
<br>
<div class="header"> 
  <h2 class="basketTitle">Products</h2>
</div>
';

echo '
<!-- Add border around main content -->
<div class="productBorder"> ';

echo '<table>'; // load data from database and put in table
        $br = '<br><br><br>';
        foreach ($Games as $databaseDocument) { 
                echo '<div class="row">'; // create border to style products

                // retrieve image link, product name and console image link from database
                echo '<img class="psGame1_2" src="' . $databaseDocument["img_url"] . '"<br><br>'; 
                echo '<h1 class="gameName">' . $databaseDocument["name"] . '</h1> <br>';
                echo '<img class="ps5Logo" src="' . $databaseDocument["console"] . '" <br>';

                echo '<div class="para">'; // style description and pricing on products
                echo $databaseDocument["description"] . '<br><br>'; // retrieve description of each product from database
                echo '<div class="pricing">';
                echo '£' . $databaseDocument["price"] . '<br><br><br>'; // retrieve price of each product from database
                echo '</div>';
                echo '</div>';
                $prodQuantity = 0;
                echo '<button class="btnB" onclick=\'addToBasket("' . $databaseDocument["_id"] . '", "' . $databaseDocument["name"] . '", "' . $databaseDocument["console"] . '", "' . $databaseDocument["price"] . '", "' . $prodQuantity . '")\'>Add to Basket </button>';

                echo '</div>';
        }
                echo '</table>';
                echo '</div>';

?>

<!-- link to javascript file-->
<script src="../JavaScript/productBasket.js"></script>
     
<?php
// display footer at bottom of page
showFooter();
?>
