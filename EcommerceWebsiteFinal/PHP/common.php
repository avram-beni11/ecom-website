<?php
function outputDefault($pageTitle){
    echo '<!DOCTYPE html>
    <html>
    <head>';
    echo '<title>' . $pageTitle . '</title>'; // title on page a parameter
    echo '<link rel="stylesheet" type="text/css" href="../CSS/style.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>'; // access font awesome library
    echo '<body style="background-color:#D8D8D8;"> '; // bg colour
}


function outputNav($name) {
    $logoImg = '<img class="logo" src="../Images/shopLogo.png" alt="Game Shop Logo" />'; // store logo in a variable
    $basket = '<img class="basket" src="../Images/basket.png"  alt="basket icon"/>';
    echo '<div class="navBar">'; 
    echo '<div class="logoLeft">'; // adding CSS to class enables logo to be on left side of nav bar
    echo $logoImg; // print logo img 
    echo '</div>';
    echo '   
    <form class="search-form" action="search.php">
          <input type="text" name="searchBar" id="search" placeholder="Search...">
          <input type="submit" value="Submit">
    </form>';
    echo '<div class="rightNavBar navElem">'; // // adding CSS to class enables content to be on right side of nav bar

    $arrOfNames = array("Home", "Games", "Login|Register", $basket); // array of page names including basket images
    $arrOfLinks = array("index.php", "products.php", "login.php", "basket.php"); 
// loop through all pages and compare each elements in arrays
$i = 0;
while ($i < 4) {
    echo '<a ';
    if($arrOfNames[$i] == $name) { 
        /* CSS displays bg img */
      echo 'class="active" ';
    }
    echo 'href="' . $arrOfLinks[$i] . '">' . $arrOfNames[$i] . '</a>';
    $i++;
}
echo '</div>';
echo '</div>';
}
// create footer and close tags
 function showFooter() {
    echo 
'<footer>
  <div class="footer">
    <p>GameShop<br></p>
    <!-- Add social media logos from font awesome library -->
    <a href="https://twitter.com/?lang=en" class="fa fa-twitter"></a>
    <a href="https://www.instagram.com/" class="fa fa-instagram"></a>
    <a href="https://www.snapchat.com/" class="fa fa-snapchat"></a>
    <a href="https://www.youtube.com/" class="fa fa-youtube"></a>
    <a href="https://www.facebook.com/" class="fa fa-facebook"></a>
  </div>
</footer> 
</body> ';
}
?>