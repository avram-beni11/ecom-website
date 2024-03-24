<?php
include('common.php');
outputDefault("View/Delete Customer Orders");
outputNav("View/Delete Customer Orders");

session_start(); // check if user is logged in
if(!array_key_exists("loggedInUserEmail", $_SESSION) ){
  echo 'Please <a href="login.php">Login</a> first to access this page.';
  return;
} else {
  echo '  
  <!-- add header for page -->
  <h2 class="addHeader">Delete Orders</h2>

  <a class="orders2" href="viewOrders.php">View Orders</a> <!-- create link to viewOrders page -->
  <a class="delete2">Delete Orders</a> <!-- current page -->
  <!-- border around main content -->
  <div class="productBorder">
    <!-- label, txt field and button to delete -->
<form action="delOrders.php" method="post">
  <label>Order ID:</label>
  <input type="text" name="id"> <br><br>
  <input type="submit" class="saveBtn" value="Delete">  
  </div>  
</form> ';
}
?>

<?php
showFooter();
?>

