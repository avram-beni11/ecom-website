<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php
include('common.php'); // get functions from file

outputDefault('Home'); // call functions
outputNav('Home');
?>
<style>
  #RecomendationDiv {
    margin-bottom: 500px;
  }

  #recHead {
    margin-top:-550px;
  }

  h1{
    text-align: center;
  }
  #search {
    margin-bottom: 50px;
  }
</style>
<form class="search-form" action="search.php">
          <input type="text" name="searchBar" id="search" placeholder="Search...">
          <input type="submit" value="Submit" id="SearchButton">
    </form>
</head>
<body>

<!-- display background image -->
<img class="backgroundImg" src="../Images/spiderman.png"  alt="background Image"/>
<br><br>
<!-- section of nintendo switch games -->
<a class="nintendo"><img class="consoleLogo_PS5" src="../Images/switchGames/logo.png" alt="Nintendo Switch Logo"/></a> <!-- display logo of console -->
<div class="box1"> <!-- create box with all switch games -->
  <p>Nintendo Switch Exclusives</p>
<!-- display images and title of nintendo switch games -->
<img class="switchGame1" src="../Images/switchGames/legendOfZelda.jpg"  alt="Legends of Zelda Image"/>
<div class="switchBorder1">
<p>The Legend of Zelda: Breath of the Wild</p>
</div>
<img class="switchGame2" src="../Images/switchGames/marioKart.jpg"  alt="Mario Kart 8 Game Image"/>
<div class="switchBorder2">
  <p>Mario Kart 8</p>
  </div>
<img class="switchGame3" src="../Images/switchGames/marioOdyssey.jpg"  alt="Mario Odyssey Image"/>
<div class="switchBorder3">
  <p>Mario Odyssey</p>
  </div>

</div>
<!-- section of PS5 games -->
<a class="playstation"><img class="consoleLogo_PS5" src="../Images/PS5Games/ps5Logo.png"/></a> <!-- display PS5 logo -->
<div class="box2"> <!-- create box with all PS5 games -->
  <p>PlayStation Exclusives</p>
  
  <img class="psGame1" src="../Images/PS5Games/spiderman.jpg"  alt="Spider-Man Game Image"/>
  <div class="psBorder1">
    <p>Spider-Man Miles Morales</p>
    </div>
  <img class="psGame2" src="../Images/PS5Games/lastOfUs.jpg"  alt="Last of Us 2 Game Image"/>
  <div class="psBorder2">
    <p>The Last Of Us Part II</p>
    </div>
  <img class="psGame3" src="../Images/PS5Games/fifa22.jpg"  alt="Fifa 22 Image"/>
  <div class="psBorder3">
    <p>FIFA 22</p>
    </div>
  </div>
  
  <!-- section of Xbox games -->
  <a class="xbox"><img class="consoleLogo_PS5" src="../Images/xboxGames/logo2.png"/></a> <!-- display Xbox logo -->
  <div class="box3"> <!-- create box with all Xbox games -->
    <p>Xbox Exclusives</p>
    <img class="xboxGame1" src="../Images/xboxGames/forza5.jpg"  alt="Forza 5 Game Image"/>
    <div class="xboxBorder1">
      <p>Forza 5</p>
    </div>
    <img class="xboxGame2" src="../Images/xboxGames/GTA.jpg"  alt="GTA 5 Game Image"/>
    <div class="xboxBorder2">
      <p>GTA 5</p>
    </div>
    <img class="xboxGame3" src="../Images/xboxGames/ori.jpg"  alt="Ori and the will of the wisps Image"/>
    <div class="xboxBorder3">
      <p>Ori And The Will Of The Wisps</p>
    </div>
    </div>
    <!---------------------------------------->
    <h2 id="recHead">Recommendations</h2>
        <div id="RecomendationDiv"></div>
    <script  type='module'>
            "use strict";

            //Import recommender class
            import {Recommender} from './recommender.js';

            //Create recommender object - it loads its state from local storage
            let recommender = new Recommender();
            
            /* Set up button to call search function. We have to do it here 
                because search() is not visible outside the module. */
            document.getElementById("SearchButton").onclick = search;
            
            //Display recommendation
            window.onload = showRecommendation;
            
            //Searches for products in database
            function search(){
                //Extract the search text
                let searchText = document.getElementById("search").value;
                
                //Add the search keyword to the recommender
                recommender.addKeyword(searchText);
                d();
                
            }

            /* this function is used to display all of the appropriate recommendations
              to a specifc customer */
            function showRecommendation(){
              
              if (recommender.getTopKeyword() == "nintendo" || recommender.getTopKeyword() == "switch" ) {
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML ="<img class=recImage src=../Images/switchGames/legendOfZelda.jpg  alt=Legends of Zelda Image/><div class=switchBorder1><h1>The Legend of Zelda: Breath of the Wild</h1>";
              } 
              if (recommender.getTopKeyword() == "mario" || recommender.getTopKeyword() == "mario kart" ){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML ="<img class=recImage src=../Images/switchGames/marioOdyssey.jpg  alt=Mario Odyssey Image/><div class=switchBorder1><h1>Super Mario Odyssey</h1>";
              } 
              if (recommender.getTopKeyword() == "mario odyssey"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML ="<img class=recImage src=../Images/switchGames/marioKart.jpg  alt=Mario Kart Image/><div class=switchBorder1><h1>Mario Kart 8 Deluxe</h1>";
              }  
              if (recommender.getTopKeyword() == "ps5" || recommender.getTopKeyword() == "last of us" || recommender.getTopKeyword() == "fifa" || recommender.getTopKeyword() == "fifa 22"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML = "<img class=recImage src=../Images/PS5Games/spiderman.jpg  alt=Spider-Man Game Image/><div class=psBorder1><h1>Spider-Man Miles Morales</h1>";
              } 
              if (recommender.getTopKeyword() == "ps5" || recommender.getTopKeyword() == "spiderman" || recommender.getTopKeyword() == "fifa" || recommender.getTopKeyword() == "fifa 22"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML = "<img class=recImage src=../Images/PS5Games/lastOfUs.jpg  alt=Last of Us 2 Game Image/><div class=psBorder1><h1>Last of Us 2</h1>";
              } 
              if (recommender.getTopKeyword() == "ps5" || recommender.getTopKeyword() == "spiderman" || recommender.getTopKeyword() == "last of us"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML = "<img class=recImage src=../Images/PS5Games/fifa22.jpg  alt=Fifa 22 Image/><div class=psBorder1><h1>Fifa 22</p>";
              } 
              if (recommender.getTopKeyword() == "xbox" || recommender.getTopKeyword() == "ori" || recommender.getTopKeyword() == "ori and the will of the wisps" || recommender.getTopKeyword() == "gta"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML = "<img class=recImage src=../Images/xboxGames/forza5.jpg  alt=Forza 5 Game Image/><div class=xboxBorder1><h1>Forza 5</h1>";
              }
              if (recommender.getTopKeyword() == "xbox" || recommender.getTopKeyword() == "ori" || recommender.getTopKeyword() == "ori and the will of the wisps" || recommender.getTopKeyword() == "forza"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML = "<img class=recImage src=../Images/xboxGames/GTA.jpg  alt=GTA 5 Game Image/><div class=xboxBorder1><h1>GTA 5</h1>";
              }
              if (recommender.getTopKeyword() == "xbox" || recommender.getTopKeyword() == "gta" || recommender.getTopKeyword() == "forza"){
                document.getElementById("recHead").innerHTML = "Recommendations, based on your searches for: " + recommender.getTopKeyword();
                document.getElementById("RecomendationDiv").innerHTML = "<img class=recImage src=../Images/xboxGames/ori.jpg  alt=Ori and the will of the wisps Image/><div class=xboxBorder1><h1>Ori and the will of the wisps</h1>";
              }
            }
        </script>
<!------------------------------------------------>

</body>
<?php
showFooter(); // display footer
?>
</html>