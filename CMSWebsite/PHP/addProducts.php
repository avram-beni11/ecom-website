<?php
include('common.php');
outputDefault("Add Products");
outputNav("Add Products");
?>
<?php
session_start(); // start session
if(!array_key_exists("loggedInUserEmail", $_SESSION) ){ // check if staff is logged in
  echo 'Please <a href="login.php">Login</a> first to access this page.';
  return;
} else {
echo '
<h2 class="addHeader">Add Products</h2>  <!-- create border containing title -->
<div class="addBorder"> <!-- create border containing main content -->
<!-- create labels and input fields -->
<form action="add_products.php" method="post">
<label>Name:</label>
<input type="text" name="name"> <br><br>
<label>Description:</label>
<input type="text" name="desc"> <br><br>
<label>Image URL:</label>
<input type="text" name="img"> <br><br>
<label>Console:</label>
<input type="text" name="console"> <br>
<h4>Console Image Suggestions: ../Images/xboxGames/logo.png, ../Images/PS5Games/ps5Logo.png, ../Images/switchGames/logo.png</h4>
<br>

<label>Price:</label>
<input type="text" name="price"> <br><br>
<label>Stock:</label>
<input type="text" name="stock"> <br><br>
<label>Keywords:</label>
<input type="text" name="keywords"> <br><br>
<input class="saveBtn" type="submit" value="Add Product">

</form>
</div> ';
}
?>
<?php
showFooter();
?>