<?php
require '../view/PHPMailer-master/src/PHPMailer.php';
require '../view/PHPMailer-master/src/SMTP.php';
require '../view/PHPMailer-master/src/Exception.php';
include '../controller/EventC.php';

use PHPMailer\PHPMailer\SMTP;


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

$name=$_SESSION['firstName'] ;
$pdo = config::getConnexion();
$result2 = $pdo->query('SELECT * from client where firstName ="' . $name . '"');

$userdata = $result2->fetch();

$product = null;
$db = config::getConnexion();
$query = "SELECT * from eventcategories ORDER BY EventCategoryE DESC;";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();
$mail = new PHPMailer(true);

// Connect to the database
$db = config::getConnexion();

// Get the data of the event you want to add
if (
  isset($_POST["titre"]) &&
  isset($_POST["idClient"]) &&
  isset($_POST["dateEvent"]) &&
  isset($_POST["lieu"]) &&
  isset($_POST["budget"])
)
  if (
    !empty($_POST['titre']) &&
    !empty($_POST["idClient"]) &&
    !empty($_POST["dateEvent"]) &&
    !empty($_POST["lieu"]) &&
    !empty($_POST["budget"])


  ) {
    $titre = $_POST['titre'];
    $idClient = $_POST['idClient'];
    $dateEvent = $_POST['dateEvent'];
    $lieu = $_POST['lieu'];
    $budget = $_POST['budget'];
    $idCategorieE = $_POST['idCategorieE'];

    // Execute a query to check if the date already exists in the table
    $query1 = "SELECT * FROM events WHERE dateEvent = :dateEvent";
    $statement1 = $db->prepare($query1);
    $statement1->bindValue(':dateEvent', $dateEvent);
    $statement1->execute();
    $result1 = $statement1->fetchAll();

    if (count($result1) > 0) {
      try {
        //Server settings
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'mazouz.erij@esprit.tn';
        $mail->Password   = '1209me@123';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        //Recipients
        $mail->setFrom('mazouz.erij@esprit.tn', 'mazouz.erij@esprit.tn');
        $mail->addAddress($userdata['email'], $userdata['email']);

        //Content
        $mail->isHTML(true);
        $mail->Subject = 'Event date reserved';
        $mail->Body    = 'The date ' . $_POST['dateEvent'] . ' is already reserved for an event.';
      } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
      }
      // The date is already reserved, send an email to notify the user
      $mail->send();
      //echo 'The date ' . $dateEvent . ' is already reserved for an event.';
    } else {
      // The date is available, insert the event into the database
      $product = new Event(null, $titre, $idClient, $dateEvent, $lieu, $budget, $idCategorieE);
      $productC = new EventC();
      $productC->ajouterevents($product);
      header('Location:Events.php');
    }
  } else {
    echo "Missing information";
  }


?>





<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <title>Make your own Event now</title>
  <meta name="author" content="themesflat.com" />
  <link rel="shortcut icon" href="./Images/Logo/titlee.png" type="image/x-icon">




  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Style -->




  <!-- Font   <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
  
  <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">








  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
  <link href="./static/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link rel="stylesheet" href="static/bootstrap.min.css">
  <link rel="stylesheet" href="static/style-min.css">
  <link rel="stylesheet" href="cards.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


  <!-- Include jQuery library -->
  <script src="jquery-ui-1.13.2\jquery-ui-1.13.2\external\jquery\jquery.js"></script>

  <!-- Include jQuery UI library -->
  <script src="jquery-ui-1.13.2\jquery-ui-1.13.2\jquery-ui.js"></script>

  <!-- Include raindrops.js -->
  <script src="raindrops-master/raindrops-master/raindrops.js"></script>
  <!-- Theme Style -->
  <!-- Favicon and Touch Icons  -->
  <link rel="shortcut icon" href="assets/icon/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/icon/icon.png">
  <link rel="shortcut icon" href="Cart/img/favicon.png" type="image/x-icon" />
  <!-- Font Icons css -->
  <link rel="stylesheet" href="Cart/css/font-icons.css">
  <!-- plugins css -->
  <link rel="stylesheet" href="Cart/css/plugins.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="Cart/css/style.css">
  <!-- Responsive css -->

  <link rel="stylesheet preload" as="style" href="Panier/css/preload.min.css" />
  <link rel="stylesheet preload" as="style" href="Panier/css/libs.min.css" />


  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">


  <link rel="stylesheet" href="Cart/css/style.css">
  <!-- Responsive css -->


  <link href="css/jquery-ui.css" rel="stylesheet">

<!-- Include sweetalert CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.min.css">

<!-- Include sweetalert JS -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.4/dist/sweetalert2.all.min.js"></script>
</head>

<style>
  .widget-title {
    text-align: center;
    display: flex;
    align-items: baseline;
    /*justify-content: space-evenly;*/
    align-content: flex-end;
    flex-wrap: wrap;
  }

  .h1,
  .h2,
  .h3,
  .h4,
  .h5,
  .h6,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6 {
    margin-bottom: 1.5 rem;
    font-weight: 800;
    line-height: 1;
    color: #ff0000;
    font-size: 30px;
  }



  .dropdown-contenta a h6 {
    font-family: 'Open Sans', sans-serif;
    font-weight: 500;
    margin: 0px;
    font-size: 50px;
  }


  .dropdowna {
    position: relative;
    display: inline-block;
  }



  .dropdowna:hover .dropdown-contenta {
    display: block;
  }

  .dropdown-contenta a:hover {
    background-color: #ddd;
  }

  #alert-box {
    background-color: red;
    color: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
    position: fixed;
    top: 16%;
    left: 50%;
    transform: translateX(-50%);
    z-index: 9999;
  }

  #scrollToTopButton {
    position: fixed;
    bottom: 40px;
    right: 25px;
    font-size: 25px;
    z-index: 99;
    width: 50px;
    height: 50px;
    background-color: red;
    color: black;
    border: none;
    cursor: pointer;
    outline: none;
    padding: 6px;
    border-radius: 50%;
  }

  #scrollToTopButton:hover,
  i:hover {
    background-color: white;
    color: red;
  }

  .navbar-nav {
    display: flex;
    align-items: center;
    padding: 0px 7.5px;
    margin: 0 !important;
    padding: 0 !important;
  }

  .maincontainer h3 {
    color: white;
    text-align: center;
  }

  .container {
    text-align: center;
  }


  #navbarNav.nav-item.nav-link a:hover {
    color: white;
  }

  .nav-item :hover {
    margin-bottom: 10px;


  }

  .nav-item :hover {
    margin-bottom: 10px;

    border-bottom: 3px;
    border-color: red;
    border-bottom-style: solid;
  }


  .page-title-inner .overlay-pagetitle {
    FONT-VARIANT: JIS04;
    FONT-VARIANT: JIS04;
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0);
  }

  .h2,
  h2 {
    font-size: 3.5rem;
  }

  .widget.widget_search .search-form .search {
    padding: 10px 25px 10px 25px;
    margin: 0;

    border-radius: 5px;
    background-color: #800000;
    font-size: 18px;
    text-align: left;
    float: left;
  }

  .widget-title {
    text-align: center;
    display: flex;
    align-items: center;
    /*justify-content: center;*/
  }

  .widget.widget_search .search-form .icon-search::after {
    content: "\f002";
    font-family: "Font Awesome 5 Pro";
    font-size: 18px;
    color: #fff;
    position: absolute;
    top: 10px;
    right: 25px;
    font-weight: 500;
    -webkit-transition: all .5s ease;
    -moz-transition: all .5s ease;
    -ms-transition: all .5s ease;
    -o-transition: all .5s ease;
    transition: all .5s ease;
  }

  input[type="text"],
  input[type="email"],
  input[type="password"],
  input[type="submit"],
  textarea {
    background-color: var(--white);
    border: 2px solid;
    border-color: var(--border-color-9);
    height: 65px;
    -webkit-box-shadow: none;
    box-shadow: none;
    padding-left: 20px;
    font-size: 16px;
    color: #fffdfd;
    width: 100%;
    margin-bottom: 30px;
    border-radius: 0;
    padding-right: 40px;
  }

  body {
    background: black;
    margin: 0 !important;
    padding: 0 !important;
  }

  /*
  img {
    margin: 0 !important;
    padding: 0 !important;
    max-width: 62% !important;
  }*/

  .row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: 160px;
    margin-left: -30px;
  }

  #scrollToTopButton:hover,
  i:hover {
    background-color: transparent;
    color: red;
  }

  .item .hover-effect.active::before,
  .item .hover-effect:hover::before {
    opacity: 0.25;
  }

  .item .hover-effect::before {
    background-color: #800000;
  }

  .tf-button.color-style1 {
    background-color: #ff0000;
    color: #fff;
  }

  .tf-button {
    position: unset;
    display: inline-block;
    cursor: pointer;
    font-weight: 700;
    padding: 10px 55px 10px 34px;
    letter-spacing: 0px;
    z-index: 2;
    font-size: 13px;
    font-weight: bold;
    font-family: 'Open Sans', sans-serif;
    line-height: 28px;
    text-transform: initial;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
    border-radius: 19px;
    overflow: hidden;
  }

  a {
    color: #ff0000;
    outline: 0;
    text-decoration: none;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
  }

  .name-Snack {
    color: #fff;
  }

  .basket {
    position: relative;
    left: 40px;
  }

  .slide img {
    max-width: 100% !important;
  }

  /*
  .item-box {
    display: flex;
    flex-wrap: wrap;
    align-items: center;
  }
*/
  .col-md-3 {
    flex: 0 0 25%;
    max-width: 25%;
  }

  /*
  .item-box {
    width: 122.333333%;
    margin-bottom: 30px;
  }*/
  .item-box {
    display: inline-block;
    margin-right: 100px;
  }



  .loader {
    border: 8px solid #f00;
    /* red border */
    border-top: 8px solid #000;
    /* black border top */
    border-radius: 50%;
    width: 50px;
    height: 50px;
    animation: spin 1s linear infinite;
  }

  @keyframes spin {
    0% {
      transform: rotate(0deg);
    }

    100% {
      transform: rotate(360deg);
    }
  }

  .our-shop {
    margin-top: 0;
  }

  #sidebar {
    padding-top: 0;
  }

  .items-shop {
    margin: 0;
    padding: 0;
  }

  .col-box {
    margin: 0;
    padding: 0;
  }

  /*
.container-fluid {
    max-width: 1500px;
}*/
  .page-title-inner .page-title-heading {
    width: 141%;
    text-align: -webkit-center;
    padding: 0 237px;
  }

  /*khribt 3liha eldenya hedhi our story*/
  .page-title.page-title-inner {
    margin-top: -2px;
    padding-top: 2px;
    padding-bottom: 0px;
    background: url(../img/page-title/imgbgpagetitleinner.jpg) no-repeat center center;
    background-size: cover;
    z-index: 66;
  }

  /*khribt 3liha eldenya hedhi search w emage hedhi weli fou9ha ta3 l'espace*/
  .tf-section.our-shop {
    overflow: hidden;
    padding: 10px 0 0px 0;
  }

  #sidebar .image,
  #sidebar .widget {
    margin-bottom: -11px;
  }

  img.left {
    float: left;
    margin-right: 100px;
    /* Ajoute une marge à droite pour éviter que le texte ne se chevauche */
  }

  p {
    color: #dee2e6;
    margin-bottom: 1.5em;
    -webkit-hyphens: auto;
    -moz-hyphens: auto;
    -ms-hyphens: auto;
    hyphens: auto;
  }


  .ui-state-default,
  .ui-widget-content .ui-state-default,
  .ui-widget-header .ui-state-default {
    border: 1px solid #c5dbec;
    background: #dfeffc url("images/ui-bg_glass_85_dfeffc_1x400.png") 50% 50% repeat-x;
    font-weight: bold;
    color: #ff0000;
  }

  .ui-slider .ui-slider-range {
    position: absolute;
    z-index: 1;
    font-size: .7em;
    display: block;
    border: 0;
    background-position: 0 0;
  }

  .list-group {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    padding-left: 0;
    margin-bottom: 39px;
    border-radius: 0.75rem;
  }

  .ui-corner-all,
  .ui-corner-bottom,
  .ui-corner-right,
  .ui-corner-br {
    border-bottom-right-radius: 5px;
  }

  /*
  .ui-slider-horizontal .ui-slider-range {
    top: 0;
    height: 100%;
  }*/

  element.style {
    left: 0%;
    width: 31.3131%;
  }

  .ui-corner-all,
  .ui-corner-bottom,
  .ui-corner-left,
  .ui-corner-bl {
    border-bottom-left-radius: 5px;
  }

  .ui-widget-header {
    border: 1px solid #4297d7;
    background: #5c9ccc url("images/ui-bg_gloss-wave_55_5c9ccc_500x100.png") 50% 50% repeat-x;
    color: #fff;
    font-weight: bold;
  }

  .ui-state-hover,
  .ui-widget-content .ui-state-hover,
  .ui-widget-header .ui-state-hover,
  .ui-state-focus,
  .ui-widget-content .ui-state-focus,
  .ui-widget-header .ui-state-focus {
    border: 1px solid #79b7e7;
    background: #d0e5f5 url("images/ui-bg_glass_75_d0e5f5_1x400.png") 50% 50% repeat-x;
    font-weight: bold;
    color: #1d5987;
  }

  .ui-slider-horizontal .ui-slider-handle {
    top: -.3em;
    margin-left: -.6em;
  }

  .ui-slider .ui-slider-handle {
    position: absolute;
    z-index: 2;
    width: 1.2em;
    height: 1.2em;
    cursor: default;
    -ms-touch-action: none;
    touch-action: none;
  }

  #scrollUp {
    background-color: transparent;
    color: var(--ltn__heading-color);
    bottom: 70px;
    font-size: 20px;
    font-weight: bold;
    height: 40px;
    width: 40px;
    right: 3%;
    text-align: center;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    -webkit-box-shadow: var(--ltn__box-shadow-3);
    box-shadow: var(--ltn__box-shadow-3);
  }

  #scrollUp:hover {
    background-color: transparent;
    color: var(--ltn__heading-color);
    bottom: 70px;
    font-size: 20px;
    font-weight: bold;
    height: 40px;
    width: 40px;
    right: 3%;
    text-align: center;
    -webkit-transform: rotate(45deg);
    -ms-transform: rotate(45deg);
    transform: rotate(45deg);
    -webkit-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    -webkit-box-shadow: var(--ltn__box-shadow-3);
    box-shadow: var(--ltn__box-shadow-3);
  }

  #scrollUp i {
    line-height: 0px;
    -webkit-transform: rotate(-45deg);
    -ms-transform: rotate(-45deg);
    transform: rotate(-45deg);
  }


  #scrollToTopButton:hover,
  i:hover {
    background-color: transparent;
    color: red;
  }

  .items-shop .d-flex {
    justify-content: space-between;
  }

  .items-shop .item-box {
    margin-bottom: 30px;
    width: calc(25% - 15px);
  }

  .product-actions .tf-button {
    padding: 1px 29px 0px 9px;
    margin: 0 7px;
  }



  .nav-item :hover {
    margin-bottom: 10px;
    /* background-color: aquamarine; */
    border-bottom: 3px;
    border-color: red;
    border-bottom-style: solid;
  }

  #navbarNav.nav-item.nav-link a:hover {
    color: red;
  }

  .nav-link:hover {
    color: red;
  }
</style>

<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/emailjs-com@3/dist/email.min.js"></script>
<script type="text/javascript">
  (function() {
    emailjs.init("user_3Y57GrE42p8s0kTrKxP0W");
  })();
</script>

<script type="text/javascript">
  window.onload = function() {
    document.getElementById('contact-form').addEventListener('submit', function(event) {
      event.preventDefault();
      // generate a five digit number for the contact_number variable
      this.contact_number.value = Math.random() * 100000 | 0;
      // these IDs from the previous steps
      emailjs.sendForm('contact_service', 'contact_form', this)
        .then(function() {
          console.log('SUCCESS!');
        }, function(error) {
          console.log('FAILED...', error);
        });
    });
  }
</script>


<body>


  <div class="scroll-bar">

    <!-- navbar starts -->

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.html"><img class="logo" src="Images/TheaterLogoFinal.png" alt="" width="30" height="24"></a>
        <button id="nav" class="navbar-toggler" id="nav" style="background-color:#8b0000" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="background-color:dark-grey;"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Events.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AfficherSnack.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Snacks</a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="contactus.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Contact</a>
            </li>



            <script>
              $(document).ready(function() {
                // Toggle the product category dropdown
                $("#profileDropdown1").click(function() {
                  $(".dropdown1-menu").toggle();
                });
              });
            </script>
            <style>
              .dropdown1-menu {
                position: absolute;
                top: 73%;
                left: 1375px;
                z-index: 1000;
                display: none;
                float: left;
                min-width: -15rem;
                padding: 0.5rem 2px;
                margin: 0.1rem 1px 0;
                font-size: -0.2rem;
                color: #000;
                text-align: -webkit-match-parent;
                list-style: none;
                background-color: #fff;
                background-clip: p;
                border: 1px solid rgb(37 35 35);
                border-radius: 0.25rem;
              }

              .btn-primary {
                color: #fff;
                background-color: #c00;
                border-color: #c00;
                border-color: #c00;
              }
            </style>

            <div style=" padding-top: 5px; padding-left: 840px;">


              <div class="dropdown1">
                <a class="dropdown-toggle" href="#" role="button" id="profileDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="../../back/view/images/avatar/4.jpg" width="20" alt="Icône de profil">
                </a>
                <ul class="dropdown1-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                  <li><a class="dropdown-item" href="page_profile.php">visit profile</a></li>
                  <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
              </div>

            </div>

          </ul>
        </div>
    </nav>

    <!-- navbar ends -->



    <div class="box">

      <div class="text">
        <h1>Create <span class="red">Now</span></h1>
        <div class="redline"></div>
        <p>Escape into a world of entertainment. Create your Event now!</p>
      </div>
    </div>

    <div class="touch">
      <h2>Make your Event with ease</h2>
      <div class="redline"></div>
    </div>
    <div class="container fill">
      <div class="forthis">
        <form method="POST" action="" id="OrderForm" enctype="multipart/form-data">

          <div class="form-row">

            <div class="form-group col-md-6">

              <input type="text" class="form-control" name="titre" id="titre" placeholder="Title">
            </div>

            <div class="form-group col-md-6">
              <input type="number" class="form-control" placeholder="Client ID" name="idClient" id="idClient">
            </div>

            <div class="form-group col-md-6">
              <input type="date" class="form-control" placeholder="Date" name="dateEvent" id="dateEvent" min="<?php echo date('Y-m-d'); ?>">
              <br>
            </div>




            <div class="form-group col-md-6">

              <input type="text" class="form-control" placeholder="place" name="lieu" id="lieu">
            </div>

            <div class="form-group col-md-6">

              <input type="number" class="form-control" placeholder="budget" name="budget" id="budget">
            </div>

            <style>
              ::placeholder {
                color: #aaa !important;
              }

              .btn-primary:hover {
                color: #fff;
                background-color: #dc3545;
                border-color: #c00;
              }

              label {
                display: inline-block;
                margin-bottom: -0.5rem;
                color: #fff
              }

              .list-group-item {
                position: relative;
                display: block;
                padding: -0.25rem 3.25rem;
                background-color: #000;
                border: 1px solid #000;
              }

              .list-group-item:hover {
                background-color: #d29097;
                color: #800000;
              }

              .col-md-6 {
                -ms-flex: 0 0 50%;
                flex: 0 0 50%;
                max-width: 50%;
                color: #fff;
              }

              .product-content {
                padding: 33px 108px 20px 35px;
              }

              body {
                margin: 0;
                font-family: var(--bs-font-sans-serif);
                font-size: 1rem;
                font-weight: 400;
                line-height: 1.5;
                color: #fff;
                -webkit-text-size-adjust: 100%;
                -webkit-tap-highlight-color: transparent;
              }

              .btn-primary:active {
                background-color: red !important;
                border-color: #800000 !important;
              }
            </style>
            <div class="widget widget-list-product" style="position: relative; display: inline-block; padding-top: 5px; padding-left: 68px;">
              <label for="categorySelect">Categories</label>
              <div id="categorySelect">
                <?php foreach ($result as $row) { ?>
                  <div class="form-check">
                    <input class="form-check-input categorySelect" type="radio" name="idCategorieE" id="<?php echo $row['EventCategoryE']; ?>" value="<?php echo $row['idCategorieE']; ?>">
                    <label class="form-check-label" for="<?php echo $row['EventCategoryE']; ?>">
                      <?php echo $row['EventCategoryE']; ?>
                    </label>
                  </div>
                <?php } ?>
              </div>
            </div>

            <script>
              $(document).ready(function() {
                // add event listener to checkboxes
                $(".common_selector").on("change", function() {
                  // get checked values
                  var checkedVals = $(".common_selector:checked").map(function() {
                    return this.value;
                  }).get();
                  // call filtering function with checked values
                  filterItems(checkedVals);
                });
              });

              function filterItems(checkedVals) {
                // your filtering code here
              }
            </script>




          </div>
          <div class="form-group row">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Confirm</button>
            </div>
          </div>




        </form>
      </div>
    </div>
    <script>
      /* function changeLabel() {
        var selectedOption = document.getElementById("categories").value;
        var label = document.getElementById("category-label");
        switch (selectedOption) {
          case "1":
            label.innerHTML = "Category 1";
            break;
          case "2":
            label.innerHTML = "Category 2";
            break;
          case "3":
            label.innerHTML = "Category 3";
            break;
            // Add more cases as needed
        }
      }*/
    </script>
    <script>
      // Get the current datetime
      const now = new Date();

      // Format the datetime string with seconds
      const dateTimeString = now.toISOString().slice(0, 10);

      // Set the value of the input field to the current datetime with seconds
      document.getElementById("dateEvent").value = dateTimeString;
    </script>
    <style>
      select[name="typee"] {
        font-size: 16px;
        padding: 8px;
        border-radius: 5px;
        border: 1px solid black;
        background-color: black;
        color: white;
        appearance: none;
        -webkit-appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg viewBox='0 0 10 10' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M1 3.5l4 4 4-4' stroke='%23000' fill='none'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: calc(100% - 12px) center;
        cursor: pointer;
      }
    </style>
    <!-- address -->

    <div class="container address">
      <div class="row add-row">
        <div class="col-sm-6">
          <h3>Our Address</h3>
          <div class="redline-address"></div>
          <p>ESPRIT</p>
          <p>ALghazela,Ariana soghra</p>
          <p>Tunis</p>
          <p></p>
          <div class="phone-e">
            <p><span class="glyphicon glyphicon-envelope"> </span> ticketeasy@gmail.com</p>
            <p><span class="glyphicon glyphicon-phone"></span> +216 24665644</p>
          </div>
        </div>
        <div class="col-sm-6 map-padd">
          <!-- -map- -->

          <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d2126.4762002828775!2d10.192338115603725!3d36.89745299817288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d36.8979074!2d10.1934645!4m5!1s0x12e2cb745e5c6f1b%3A0xf69a51ee3c65c12e!2sEsprit%20School%20of%20Business!3m2!1d36.897233!2d10.193496399999999!5e0!3m2!1sfr!2stn!4v1679048787693!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

        </div>
      </div>
    </div>


    <!-- offcanva JS and footer js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

    <div class="bottom-gap"></div>



    <!-------------------------------Footer-------------------------------->
    <div id="waterdrop"></div>
    <footer class="footer">
      <div class="footer-content">
        <div class="footer-left">
          <a href="home.html"><img class="footer-logo" src="C:\xampp\htdocs\ticketeasy  v1\Images\Logo\TheaterLogo.png" alt="" width="30" height="24"></a>
          <p class="footer-bottom-tagline">Buy! Chill! Repeat!</p>
        </div>
        <div class="footer-middle">
          <h2 class="footer-heading">Follow Us</h2>
          <ul class="footer-middle-list icons">
            <a class="footer-links" href="https://www.facebook.com/" target="_blank"><i class="fab fa-facebook-f facebook" style="color:red"></i></a>
            <a class="footer-links" href="https://twitter.com/login?lang=en" target="_blank"><i class="fab fa-twitter twitter" style="color:red"></i></a>
            <a class="footer-links" href="https://www.linkedin.com/login" target="_blank"><i class="fab fa-linkedin linkedin" style="color:red"></i></a>
            <a class="footer-links" href="https://www.instagram.com/" target="_blank"><i class="fab fa-instagram instagram" style="color:red"></i></a>
            <a class="footer-links" href="https://github.com/QAZIMAAZARSHAD/Movie-Streaming-Website" target="_blank"><i class="fab fa-github github" style="color:red"></i></a>
          </ul>
        </div>
        <div class="footer-middle">
          <h2 class="footer-heading">Services</h2>
          <ul class="footer-middle-list">
            <li class="footer-middle-list-item"><a href="home.html">Enjoy Latest Movies</a> </li>
            <li class="footer-middle-list-item"><a href="web-series.html">Book Your Ticket Now</a> </li>
            <li class="footer-middle-list-item"><a href="kids.html">Everything for Kids</a> </li>
            <li class="footer-middle-list-item"><a href="news.html">Coming soon</a> </li>
            <li class="footer-middle-list-item"><a href="premium.html">Get Premium Subscription</a> </li>
            <li class="footer-middle-list-item"><a href="faq.html">FAQ</a> </li>
          </ul>
        </div>
        <div class="footer-middle">
          <p class="footer-links">
          <h2 class="footer-heading">Book Now</h2>
          <p class="footer-bottom-tagline"> Book your tickets now for an unforgettable cinematic experience.</p>
          <a class="footer-contact-button" href="Book Now.html">Book Now</a>
          </p>
        </div>
        <div class="footer-right">
          <p class="footer-links">
          <h2 class="footer-heading">Contact Us</h2>
          <p class="footer-bottom-tagline">Feel free to contact us.</p>
          <a class="footer-contact-button" href="contactus.html">Contact</a>
          </p>
        </div>
      </div>
      <hr id="footer-hr">
      <div class="footer-copyright">
        <p>Copyright &copy; and &reg; Since
          <script>
            document.write(new Date().getFullYear())
          </script> Under Ticketeasy : (Project Is Done By Innovators )
        </p>
      </div>

    </footer>

    <!--------------scrool to top button-->
    <button id="scrollToTopButton" title="Go to top" class="ml-5">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </button>
    <script>
      $(document).ready(function() {
        var scrollTopButton = document.getElementById("scrollToTopButton");
        window.onscroll = function() {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
          } else {
            scrollTopButton.style.display = "none";
          }
        }
        $("#scrollToTopButton").click(function() {
          $('html ,body').animate({
            scrollTop: 0
          }, 800)
        });
      });
    </script>
    <!-- offcanva JS and footer js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/main-min.js"></script>

    <script>
      jQuery('#waterdrop').raindrops({
        color: '#292c2f',
        canvasHeight: 150,
        density: 0.1,
        frequency: 20
      });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="./static/script.js"></script>

    <script>
      function logout() {
        window.location.replace("login.html");
      }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script>
      const form = document.querySelector('#OrderForm');

      form.addEventListener('submit', (event) => {
        event.preventDefault(); // prevent form submission

        const titre = document.querySelector('#titre');
        const idClient = document.querySelector('#idClient');
        const dateEvent = document.querySelector('#dateEvent');
        const lieu = document.querySelector('#lieu');
        const budget = document.querySelector('#budget');

        let isValid = true;

        if (titre.value === '' || !/^[a-zA-Z]+$/.test(titre.value)) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid Title (only letters)',
          });
          isValid = false;
        }
        if (lieu.value === '' || !/^[a-zA-Z]+$/.test(lieu.value)) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid place (only letters)',
          });
          isValid = false;
        }
        if (dateEvent.value === '') {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid Date',
          });
          isValid = false;
        }
        if (idClient.value === '' || isNaN(idClient.value) || idClient.value < 0) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid idClient (numeric value greater than or equal to 0)',
          });
          isValid = false;
        }

        if (budget.value === '' || isNaN(budget.value) || budget.value < 0) {
          Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Please enter a valid budget (numeric value greater than or equal to 0)',
          });
          isValid = false;
        }


        if (isValid) {
          Swal.fire({
            icon: 'success',
            title: 'CONGRATS...',
            text: 'All the fields are valid',
          });
          form.submit(); // submit form if all fields are valid
        }
      });
    </script>
</body>

</html>