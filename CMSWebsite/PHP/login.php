<?php
include('common.php');
outputDefault("Login");
outputNav("Login");

?>

 <!-- add header border -->
 <div class="addHeader">
  <h2>Login</h2>
</div>
<!-- create border around main content -->
<div class="border">
  <form action="CMSLogin.php" method="post"> <!-- false - does not submit any data -->
    <img class="loginImg" src="../Images/loginIcon.png"  alt="Login Image"/>
    <br><br>
    <!-- add email label and input field -->
    <label>Email:</label> 
    <input type="text" name="Email"><br><br>
    <!-- add password label and input field -->
    <label>Password:</label>
    <input type="password" name="Password"><br><br>
    <p id="displayMsg" style="color:green;"></p><br><br>
    <!-- add button under labels and input fields -->
    <input class="loginBtn" type="submit" value="Login"> <br>
    <p class="loginTxt">Don't have an account? <a id="textLogin" href="register.php">Register</a> </p> <!-- add link to login page -->
    <br><br><br><br><br><br><br><br>
  </form>
</div>


<script>  
/*Function using ajax to retrieve code from logout.php */
  function logOut(){
  let request = new XMLHttpRequest(); 
  request.open("GET", "logout.php"); // run cpde from logout page
  request.send(); // send request
  }
</script>

<script src="login.js"></script>

<?php
showFooter();
?>