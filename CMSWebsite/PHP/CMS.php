<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
include('common.php'); 
outputDefault('CMS Page');
outputNav('Login|Register');
?>
<style>
 .sideBar{
    width: 100%;
    display: block;
    padding: 8px 16px;
    text-align: left;
    border: none;
    white-space: normal;
    float: none;
    outline: 0;
}
.sideBar{
    border-color: initial;
    text-decoration-color: initial;
    color: inherit;
    background-color: inherit;
}
</style>
</head>
<body>

<div class="w3-sidebar w3-light-grey w3-bar-block" style="width:25%">
  <h3 class="w3-bar-item">Menu</h3>
  <a href="addProducts.php" class="sideBar">Add Products</a>
  <a href="viewProducts.php" class="sideBar">View Products</a>
  <a href="editProducts.php" class="sideBar">Edit Products</a>
  <a href="viewOrders.php" class="sideBar">View Customer Orders</a>
  <a href="deleteOrders.php" class="sideBar">Delete Customer Orders</a>
  <a href="login.php" class="sideBar">Login</a>
</div>

</body>
<?php
showFooter();
?>
</html>     