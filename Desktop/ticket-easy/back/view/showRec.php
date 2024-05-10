

<style>


.wrapper {
	 position: relative;
	 width: 100%;
	 margin: 0 auto;
	 max-width: 1000px;
}
 .wrapper video {
	 width: 100%;
}
 .wrapper svg {
	 position: absolute;
	 top: 0;
	 left: 0;
	 width: 100%;
	 height: 100%;
}
 .wrapper svg text {
	 font-family: 'Montserrat', sans-serif;
	 font-weight: 900;
	 text-transform: uppercase;
	 font-size: 40px;
}
 .wrapper svg > rect {
	 -webkit-mask: url(#mask);
	 mask: url(#mask);
}
 .wrapper svg rect {
	 fill: #fff;
}
 
 .wrapper:before, .wrapper:after {
	 content: '';
	 position: absolute;
	 top: 0;
	 width: 10px;
	 height: 100%;
	 background-color: #fff;
}
 .wrapper:before {
	 left: -9px;
}
 .wrapper:after {
	 right: -5px;
}
 




body {
  font-family: 'Waiting for the Sunrise', cursive; 
  font-size:60px; 
  margin: 60px 50px 0;
  letter-spacing:2px; 
  font-weight: bold;
}
</style>


<script>

// set up text to print, each item in array is new line
var aText = new Array(
"There are only 10 types of people in the world:", 
"Those who understand binary, and those who don't"
);
var iSpeed = 100; // time delay of print out
var iIndex = 0; // start printing array at this posision
var iArrLength = aText[0].length; // the length of the text array
var iScrollAt = 20; // start scrolling up at this many lines
 
var iTextPos = 0; // initialise text position
var sContents = ''; // initialise contents variable
var iRow; // initialise current row
 
function typewriter()
{
 sContents =  ' ';
 iRow = Math.max(0, iIndex-iScrollAt);
 var destination = document.getElementById("typedtext");
 
 while ( iRow < iIndex ) {
  sContents += aText[iRow++] + '<br />';
 }
 destination.innerHTML = sContents + aText[iIndex].substring(0, iTextPos) + "_";
 if ( iTextPos++ == iArrLength ) {
  iTextPos = 0;
  iIndex++;
  if ( iIndex != aText.length ) {
   iArrLength = aText[iIndex].length;
   setTimeout("typewriter()", 500);
  }
 } else {
  setTimeout("typewriter()", iSpeed);
 }
}


typewriter();




</script>










<?php
include '../Controller/ReclamationC.php';

// récupérer l'ID de la réclamation depuis une requête POST ou GET
$id =$_GET['id'];

// si l'ID est null, afficher un message d'erreur
if ($id === null) {
    echo "Erreur : ID de réclamation manquant";
    return;
}

// créer une instance du contrôleur de réclamation
$reclamationc = new ReclamationC();

// récupérer les détails de la réclamation
$reclamation=$reclamationc->showReclamation($id);

// afficher les détails dans la vue
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Reclamation</title>
    <link href="https://fonts.googleapis.com/css?family=Waiting+for+the+Sunrise" rel="stylesheet" type="text/css"/>
</head>
<body>
    





</body>
</html>



  

  




<div class="wrapper">
  <video autoplay playsinline muted loop preload poster="http://i.imgur.com/xHO6DbC.png">
    <source src="https://storage.coverr.co/videos/7RzPQrmB00s01rknm8VJnXahEyCy4024IMG?token=eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXVCJ9.eyJhcHBJZCI6Ijg3NjdFMzIzRjlGQzEzN0E4QTAyIiwiaWF0IjoxNjI5MTg2NjA0fQ.M8oElp5VNO8bWEWmdF2nGiu3qDOOYRFfP8wkKvl8I20" />
  </video>
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 285 80" preserveAspectRatio="xMidYMid slice">
    <defs>
      <mask id="mask" x="0" y="0" width="100%" height="100%" >
        <rect x="0" y="0" width="100%" height="100%" />
        <text x="72" y="50"> id :<?php echo $reclamation['idRec']; ?> </text>
       
        
      </mask>
    </defs>
    <rect x="0" y="0" width="100%" height="100%" />
  </svg>
</div>


<center>
<div class="container">
  

  
  <div class="subtitle"> Date: <?php echo $reclamation['dor']; ?> </div>
  <br>
  <div class="subtitle"> lastName: <?php echo $reclamation['lastName']; ?> </div>
  <br>
  <div class="subtitle"> firstName: <?php echo $reclamation['firstName']; ?> </div>
  <br>
  <div class="subtitle"> Email: <?php echo $reclamation['address']; ?> </div>
  <br>
  <div class="subtitle">Reclamation: <?php echo $reclamation['texte']; ?> </div>
  <br>

</div>
</center>









