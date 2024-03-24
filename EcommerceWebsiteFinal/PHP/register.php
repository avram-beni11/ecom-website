<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php

// include functions from common file
include('common.php'); 
outputDefault('Register');
session_start(); // start session
outputNav('Login|Register');

//check if session exists - if user is logged in
if( array_key_exists("loggedInUserEmail", $_SESSION) ){
    echo 'You are logged in as ' . $_SESSION['loggedInUserEmail']; // print the name of the email account that is logged in
    echo '<form action="logout.php">
        <input type="submit" value="Logout"></input>
    </form>'; // display a button to take to and execute logout functionality 
echo '<br><br>';
} else {
  // otherwise display msg to prompt user to login
  echo 'You are logged in as a guest, please <a href="login.php">Login</a> or <a href="register.php">Register</a> if you have not already';
  echo '<br><br>';
}
?>
    
<!-- create tabs for user to access login page -->
<a class="log2" href="login.php">Login</a>
<a class="reg2">Register</a>

<div class="border">
  <form class="regForm" onsubmit="return false"> <!-- prevent data from being submitted -->
    <img class="loginImg" src="../Images/loginImg.png"  alt="Login Image"/> <!-- add image to page -->

    <!-- add multiple fields and labels to enable customer input-->
    <label class="nameLabel2">First Name:</label>
    <input type="text" id="name" name="firstName"><br><br><br><br><br><br>
    <label class="label1">Last Name:</label>
    <input type="text" id="sname" name="lastName"><br><br>
    <label class="label1">Email:</label>
    <input type="email" id="input2" name="email"><br><br>
    <label class="label1">Confirm Email:</label>
    <input type="email" id="input3" name="email2"><br><br>
    <label class="label1">Address:</label>
    <input type="address" id="address" name="billingAddress"><br><br>
    <label class="label1">Phone Number:</label>
    <input type="number" id="pn" name="phone_no"><br><br>
    <label class="label1">Password:</label>
    <input type="password" id="pass" name="password"><br><br>
    <label class="label1">Confirm Password:</label>
    <input type="password" id="pass2" name="password2">
    <button class="loginBtn2" onclick="register()">Register</button>
    <p class="loginTxt">Already Have an Account? <a id="textLogin" href="login.php">Login</a> </p> <!-- add link to login page -->
    <br><br>
    <p>
        <span id="regDetails"></span> <!-- create paragraph to display a response from the server using ajax -->
    </p>
    <br><br><br><br><br><br>

  </form>
</div>

<p id="RegFail" style="color:red" fontsize: 40px></p>
<p id="RegSuccess" style="color:green" fontsize: 40px></p>
<script>
            function register(){
                //initialise variable to make request object 
                let request = new XMLHttpRequest();

                //Create event handler that specifies what should happen when server responds
                request.onload = () => {
                    //Check HTTP status code
                    if(request.status === 200){
                        //Get data from server
                        let responseData = request.responseText;

                        //Add data to page
                        document.getElementById("regDetails").innerHTML = responseData;
                    }
                    else
                        alert("Error communicating with server: " + request.status);
                };

                //Set up request with HTTP method and URL 
                request.open("POST", "registerCustomer.php");
                request.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                
                //Extract registration data including name, surname, address, passoword, email and phone number
                let usrName = document.getElementById("name").value;
                let usrLname = document.getElementById("sname").value;
                let usrAddress = document.getElementById("address").value;
                let usrPassword = document.getElementById("pass").value;
                let usrEmail = document.getElementById("input2").value;
                let userNum = document.getElementById("pn").value;
                
                //Send request
                request.send("firstName=" + usrName + "&billingAddress=" + usrAddress + "&password=" + usrPassword 
                + "&lastName=" + usrLname + "&email=" + usrEmail + "&phone_no=" + userNum );
            }
        </script>

<!-- Create footer -->
<?php
showFooter();
?>
</body>
</html>