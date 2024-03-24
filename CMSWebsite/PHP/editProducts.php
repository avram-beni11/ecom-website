<?php
include('common.php');
outputDefault("Edit Products");
outputNav("Edit Products");

session_start();
if(!array_key_exists("loggedInUserEmail", $_SESSION) ){
  echo 'Please <a href="login.php">Login</a> first to access this page.';
  return;
} else {
echo '
 <!-- add header for page -->
 <h2 class="addHeader">Edit Products</h2>
 <body>
      <form action="editProduct2.php" method="post">
          Product Name: <input type="text" name="SearchBar" required><br>
          <input type="submit">
      </form>
    </body>
</html> ';
}
?>
</div> 

<?php
showFooter();
?>

</body>
</html>