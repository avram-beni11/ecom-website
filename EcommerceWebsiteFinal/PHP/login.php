<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
include('common.php'); 
outputDefault('Login');
outputNav('Login|Register'); // include functions from common.php

session_start(); // start session

// if the session variable exists then displays who is logged in
if (isset($_SESSION['loggedInUserEmail'])) {
echo 'You are logged in as ' . $_SESSION['loggedInUserEmail'];
echo '<br>See <a href="account.php">Your Account</a>';
echo '<br><br>';
} else {
  // otherwise display msg to prompt user to login
  echo 'You are logged in as a guest, please <a href="login.php">Login</a> or <a href="register.php">Register</a> if you have not already';
  echo '<br><br>';
}
?>

<!-- create tabs for user to access reg page -->
<a class="log">Login</a>
<a class="reg" href="register.php">Register</a>

<div class="border">
  <form id="loginPara" action="loginCustomer.php" method="post"> <!-- prevent data from being submitted -->
    <img class="loginImg" src="../Images/loginImg.png"  alt="Login Image"/> <!-- add image to page -->
    <label class="emailLabel">Email:</label> 
    <input type="text" id="Lemail" name="email"><br> <!-- text field for email -->
    <label class="passwordLabel">Password:</label>
    <input type="password" id="Lpassword" name="password"><br><br><br><br> <!-- password field for password -->
    <button class="loginBtn">Register</button><!-- create button to submit data -->
    <p class="regTxt">Not Registered? <a href="register.php">Register</a> </p> <!-- add link to register page -->
    <br><br><br><br><br><br><br><br>
  </form>
  <form action="logout.php" method="post">
    <input type="submit" value="Logout" onclick="logout()"></input> <!-- call logout functiion -->
  </form>

</div>
<p id="loginFailure" style="color:red;"></p> <!-- id to display error messages when loggin in -->

<!-- <script src="login.js"> /script> -->

<script>  
/*Function using ajax to retrieve code from logout.php and clear 
  session storage - empties basket when user logs out */
  function logout(){
  let request = new XMLHttpRequest(); 
  sessionStorage.clear(); // clear session storage
  request.open("GET", "logout.php"); // run cpde from logout page
  request.send(); // send request
  }
</script>

<?php
showFooter(); // display footer
?>
</body>
</html>