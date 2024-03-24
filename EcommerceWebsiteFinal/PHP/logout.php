<?php
session_start();

session_unset();

session_destroy(); // destroy session to logout and clear session


echo 'Logged out<br>'; // display msg once logged out
echo '<h3>Return to <a href="index.php">Home</a></h3>'; // provide link to navigate to main website

if (array_key_exists('loggedInUserEmail', $_SESSION)) {
    echo $_SESSION['loggedInUserEmail'] . 'Exits';
} else {
    echo 'You have logged out. <a href="login.php">Login</a>'; // should display this msg as user should be logged out
}

?>