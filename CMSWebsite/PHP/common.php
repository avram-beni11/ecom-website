<?php
function outputDefault($pageTitle){
    echo '<!DOCTYPE html>
    <html>
    <head>';
    echo '<title>' . $pageTitle . '</title>';
    // link to files and libraries
    echo '<link rel="stylesheet" type="text/css" href="../CSS/CMSstyle.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> 
    </head>';
    echo '<body style="background-color:#D8D8D8;"> ';
}

function outputNav($name) {
    $logoImg = '<img class="logo" src="../Images/logo.png" alt="Game Shop Logo" />'; // logo img in variable

    echo '<div class="navBar">'; // Adding content to navigation class, styled in CSS file
  
    echo '<div class="logoLeft">'; // Defining class to push logo to left side of page
    echo $logoImg; // printing logo image and pushing it to left side
    echo '</div>';
    
    // echo '<div class="navBarRight">'; 
    $pageNames = array("Home", "View Products", "Add Products", "Edit Products", "View/Delete Customer Orders", "Login"); // Defining array of names displayed on nav bar
    $pageAddresses = array("index.php", "viewProducts.php", "addProducts.php", "editProducts.php", "viewOrders.php", "login.php"); // Array of corresponding pages
// loop through all pages and compare each elements in arrays
$i = 0;
while ($i < 6) {
    echo '<a ';
    if($pageNames[$i] == $name) { 
      echo 'class="active" ';
    }
    // match pages and links
    echo 'href="' . $pageAddresses[$i] . '">' . $pageNames[$i] . '</a>';
    $i++;
}
echo '</div>';
echo '</div>';
 // display banner on all pages
echo '
    <div class="banner">
    <h1>CMS</h1>
    </div> ';
}

// function to display footer content
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
</body>
</html>';
}
?>