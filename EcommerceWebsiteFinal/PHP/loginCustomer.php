
<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
<body style="background-color:#D8D8D8;"> 

<?php
    //Start session management
    session_start();

    //Get name and address strings - need to filter input to reduce chances of SQL injection etc.
    $email= filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);   

    //Connect to MongoDB
	require __DIR__ . '/vendor/autoload.php';
	$mongoClient = (new MongoDB\Client);
	$selectDb = $mongoClient->gameShop; // choose database
	
    //declare array search criteria - in this case the customers email
    $find = [ "email" => $email ];

    //locate all customers with an email and store in variable
    $arrOfFoundCriteria = $selectDb->Customer->find($find)->toArray(); // convert to array

    //Check that the same email is not repeated and there is 1 customer
    if(count($arrOfFoundCriteria) == 0){
        echo 'Email does not exist';
        return;
    }
    else if(count($arrOfFoundCriteria) > 1){
        echo 'Email is already registered. Please choose a different email';
        return;
    }
    

    //check if password matches password in database
    $customer = $arrOfFoundCriteria[0];
    if($customer['password'] != $password){
        echo 'Password incorrect.';
        return;
    }
    
    // start session - the users email is now stored in a session variable
    $_SESSION["loggedInUserEmail"] = $email;
    echo 'You are logged in as ' . $_SESSION["loggedInUserEmail"] . '<br>';
    echo '<h3>Return to <a href="index.php">Home</a></h3>'; 
    echo '<br>';

    // create login button to call form
    echo '<form action="logout.php" method="post">
        <input type="submit" value="Logout"></input>
    </form>

    ';

    //Inform web page that login is successful
    if (array_key_exists('loggedInUserEmail', $_SESSION)) {
        echo 'Your login is successful, thank you for registering ' . $_SESSION['firstName'] . '<br>';
        echo $_SESSION['custID'];
    } else {
        echo 'Account does not exist'; // print error msg
    }
