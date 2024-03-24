<?php
    //Start session management
    session_start();

    //Get name and address strings. filter input used to reduce SQL injection 
    $Email= filter_input(INPUT_POST, 'Email', FILTER_SANITIZE_STRING);
    $Password = filter_input(INPUT_POST, 'Password', FILTER_SANITIZE_STRING);    
    $admin = "admin@gameshop.com";
    
    //Connect to MongoDB and select database
	require __DIR__ . '/vendor/autoload.php';//Include libraries
	$mongoClient = (new MongoDB\Client);//Create MongoDB client
	$db = $mongoClient->CMS; // access CMS database
	
    //Create array to search for emails
    $findCriteria = [ "Email" => $Email];

    //Find all of the members that match 
    $resultArray = $db->staff->find($findCriteria)->toArray();

    //Check 1 staff member exists
    if(count($resultArray) == 0){
        echo 'Customer Email not found';
        return;
    }
    else if(count($resultArray) > 1){
        echo 'Database error: Multiple customers have same Email address.';
        return;
    }
   
    //Get customer and check Password
    $customer = $resultArray[0];
    if($customer['Password'] != $Password){
        echo 'Password incorrect.';
        return;
    }
        
    //Start session for this user
    $_SESSION['loggedInUserEmail'] = $Email;
     
    //user is logged in and has access to different pages
    if ($Email == "admin@gameshop.com") {
       header("Location: CMS.php"); 
       exit();
    } else{
        header("Location: index.php");
        exit();
    }
    
   
   
	
    