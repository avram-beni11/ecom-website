<?php
    //Start session
    session_start();
    
    // check if a staff member is logged in, if they are then they have access
    if(array_key_exists("loggedInUserEmail", $_SESSION) ){
        echo "Access Authorised";
    }
    else{
        echo 'Please Login';
    }

