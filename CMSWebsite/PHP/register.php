<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
include('common.php'); 
outputDefault('Register');
outputNav('Login|Register');
?>

<div class="border">
  <form action="addCustomer2.php" method="post"> <!-- prevent data from being submitted -->
  <img class="loginImg" src="../Images/loginIcon.png"  alt="Login Image"/><br><br> <!-- add image to page -->

    <!-- add multiple fields and labels to enable customer input-->
    <label>Email:</label><br>
    <input type="email"  name="email" required><br>
    <label>Password:</label><br>
    <input type="password" name="password" required><br>
    <label class="passwordLabel3">Confirm Password:</label><br>
    <input type="password"  name="password" required><br>
    <input type="hidden" name="keyword" value="firstName" required>
    <input class="loginBtn" type="submit" value="Register" required>
    <p class="loginTxt">Already Have an Account? <a id="textLogin" href="login.php">Login</a> </p> <!-- add link to login page -->
    <br><br><br><br><br><br><br><br>
  </form>
</div>

<p id="RegFail" style="color:red" fontsize: 40px></p>
<p id="RegSuccess" style="color:green" fontsize: 40px></p>
<script>
  key = document.getElementById("name2");
  console.log(key);
</script>

<!-- Create footer -->
<?php
showFooter();
?>
</body>
</html>