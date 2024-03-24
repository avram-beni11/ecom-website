<?php
// get content from pjp
include('common.php'); 
outputDefault('Basket');
$basket = '<img class="basket" src="../Images/basket.png"  alt="basket icon"/>'; // varaible containing basket img
outputNav($basket);

// echo all page content
echo '
<br>
<div class="header">
<h2 class="basketTitle">Basket</h2> <!-- create header at top of page -->
</div>
<div class="basketBorder"> <!-- create border around main content -->
  <br><br>
  <div class="product1"> <!-- create border around products-->
  <div id="table"></div>
  <div id="basketDiv"></div>
  </div>
  <br>
  <div class="divider"> <!-- add a line to seperate products on page -->
  </div> 


  <div class="divider">    
  </div>
  <p id="itemCount"> </p>
  <div class="bdr">
  <p id="total"> </p>
  </div>
  <br><br><br>
  </div>
</div>
';
?>



<script src="../JavaScript/customerBasket.js"></script>
<?php
showFooter();
?>