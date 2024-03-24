<?php
include('common.php');
outputDefault("Home");
outputNav("Home");
?>
<?php
echo '
 <!-- add header border -->
 </div>
 <!-- display message to users -->';
 //Start session 
 session_start();
    
 //check if session exists to access page
if(!array_key_exists("loggedInUserEmail", $_SESSION) ){
    echo 'Please <a href="login.php">Login</a> first to access this page.';
     return;
} else {
    echo '<p class="text">This website enables you to view products, edit products, view customer orders as well as delete customer orders.</p>
    <br> ';
}


?>
<?php
showFooter();
?>
<!-- close tags-->

</body>
</html>
<?php
    