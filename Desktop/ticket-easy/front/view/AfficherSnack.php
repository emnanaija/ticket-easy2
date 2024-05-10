<?php
include '../controller/snackC.php';
session_start();

 $name=$_SESSION['firstName'] ;
$total = 0;


$SnackC = new SnackC();
$list = $SnackC->listSnack();

$Snack = null;
$SnackC = new SnackC();
$lista = $SnackC->listSnack();
$lineC = new snackC();
$list2 = $lineC->listLineS();

$db = config::getConnexion();

$query = "SELECT * FROM categoriesnack ORDER BY categoriesnack DESC";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$total_linesP = $db->query('SELECT * FROM line_of_snack')->rowCount();
$total_linesPp = $db->query('SELECT * FROM line_of_order')->rowCount();
$tot = $total_linesP + $total_linesPp;
$query1 = "SELECT imageSnack FROM snack where quantitySnack = (SELECT MAX(quantitySnack) as qmax from snack)";
$statement1 = $db->prepare($query1);
$statement1->execute();
$result1 = $statement1->fetchAll();

?>













<!DOCTYPE html>
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<head>
  <!-- Basic Page Needs -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Ticketeasy</title>
  <link rel="shortcut icon" href="./images/Logo/titlee.png" type="image/x-icon">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <meta name="author" content="themesflat.com" />

  <!-- Mobile Specific Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

  <!-- Theme Style -->
  <link rel="stylesheet" type="text/css" href="assets/css/style.css">

  <!-- Font Icons css -->
  
  <!-- plugins css -->
  <link rel="stylesheet" href="Cart/css/plugins.css">
  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="Cart/css/style.css">
  <!-- Responsive css -->


  <link href="./static/style.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link rel="stylesheet" href="static/bootstrap.min.css">
  <link rel="stylesheet" href="static/style-min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Favicon and Touch Icons  -->
  <link rel="shortcut icon" href="assets/icon/favicon.png">
  <link rel="apple-touch-icon-precomposed" href="assets/icon/icon.png">

  <link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <link rel="stylesheet preload" as="style" href="Panier/css/preload.min.css" />




  <link rel="stylesheet" href="Cart/css/style.css">
  <!-- Responsive css -->


  <link href="css/jquery-ui.css" rel="stylesheet">




</head>

<style>
 span, h1, h2, h3, h4, h5, h6, footer, header, menu, nav{
    font-family: arial;
    margin: 0;
    padding: 0;
    border: 0;
    outline: 0;
    font-size: 50%;
    vertical-align: baseline;
    font-size: 50%;
    font-style: inherit;
    font-weight: inherit;
}

a {
    color: #000;
    outline: 0;
    text-decoration: none;
    -webkit-transition: all 0.3s ease;
    -moz-transition: all 0.3s ease;
    -ms-transition: all 0.3s ease;
    -o-transition: all 0.3s ease;
    transition: all 0.3s ease;
}

.dropdown-menu {
    position: absolute;
    top: 72%;
    left: 51px;
    z-index: 1000;
    display: none;
    float: left;
    min-width: 16rem;
    padding: 0.5rem 0;
    margin: 0.125rem 0 0;
    font-size: 2.0rem;
    color: #000;
    text-align: -webkit-match-parent;
    list-style: none;
    background-color: #000;
    background-clip: p;
    border: 1px solid rgb(37 35 35);
    border-radius: 2.25rem;
}
.h2, h2 {
    font-size: 3.0rem !important;
}
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

  .ltn__utilize-menu-head .ltn__utilize-close {
    background-color: burlywood;
    font-size: 30px;
    padding: 0 15px;
  }

  .dropdown-contenta {
    display: none;
    position: relative;


    background-color: #000;
    min-width: 130px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;


  }

  .dropdownn-contenta {
    display: none;
    position: relative;


    background-color: #fff;
    min-width: 130px;
    box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    z-index: 1;


  }

  .dropdown-contenta a {
    color: red;
    text-decoration: none;
    display: block;
    margin: 0px;
    padding: 0px;

  }

  .dropdownn-contenta a {
    color: red;
    text-decoration: none;
    display: block;
    margin: 0px;
    padding: 0px;

  }

  .dropdown-contenta a h6 {
   
    font-weight: 500;
    margin: 0px;
    font-size: 50px;
  }

  .dropdownn-contenta a h6 {
  
    font-weight: 500;
    margin: 0px;
    font-size: 50px;
  }


  .dropdowna {
    position: relative;
    display: inline-block;
  }

  .dropdownna {
    position: relative;
    display: inline-block;
  }


  .dropdowna:hover .dropdown-contenta {
    display: block;
  }

  .dropdownna:hover .dropdownn-contenta {
    display: block;
  }

  .dropdown-contenta a:hover {
    background-color: #fff;
  }

  .dropdownn-contenta a:hover {
    background-color: #fff;
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

  .container,
  .container-fluid,
  .container-lg,
  .container-md,
  .container-sm,
  .container-xl {
    width: 100%;
    padding-right: 24px;
    padding-left: 15px;
    margin-right: auto;
    margin-left: auto;
  }

  #navbarNav.nav-item.nav-link a:hover {
    color: red;
  }
  #navbarNav.nav-item.nav-link a {
  color: red;
  font-family: Arial, sans-serif;
}

  .nav-item :hover {
    margin-bottom: 10px;
    /* background-color: aquamarine; */
    border-bottom: 3px;
    border-color: red;
    border-bottom-style: solid;
  }

  #header-nav .nav-link a:hover {
    color: red;
  }

  .page-title-inner .overlay-pagetitle {
    
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

  img {
    margin: 0 !important;
    padding: 0 !important;
    max-width: 62% !important;
  }

  .row {
    /*display: -ms-flexbox;*/
    display: flex;
    /*-ms-flex-wrap: wrap;*/
    flex-wrap: wrap;
    justify-content: space-between;
    margin-right: 160px;
    margin-left: -30px;
  }

  .filter_data {
    flex-wrap: wrap;
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
    display: flex;
    margin-right: 100px;
    flex-wrap: wrap;
    justify-content: space-between;
  }

  .items-shop .item-box {
    margin-bottom: 43px;
    width: calc(64% - 7px);
  }

  .item {
    width: calc(121% - 32px);
    margin-bottom: 7px;
  }

  .Snack-content {
    display: flex;
    flex-direction: column;
    align-items: center;
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

  /*.items-shop {
    margin: 0;
    padding: 0;
  }*/
  .items-shop {
    margin: 0px;
    padding: 50px;
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
  /*
  element.style {
    left: 0%;
    width: 31.3131%;
  }*/

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



  /* .product-actions .tf-button {
    padding: 1px 29px 0px 9px;
    margin: 0 7px;
  }*/
  .product-actions .tf-button {
    padding: 7px 33px 8px -21px;
    margin: 3px 15px;
  }

  .dropdownn-menu-end[data-bs-popper] {
    right: 58px;
    left: auto;
  }

  /*
.dropdownn-menu {
    position: absolute;
    top: 100%;
    left: 0;
    z-index: 997;
    display: none;
    float: left;
    min-width: 6rem;
    padding: .5rem 0;
    margin: 0.125rem 0px 0px;
    margin: -0.875rem -4px 0px;
    font-size: 1rem;
    text-align: left;
    list-style: none;
    background-color: #fff;
    background-clip: padding-box;
    border-radius: 0.25rem;
    border-radius: 1.25rem;
    border-radius: .25rem;
}*/
  .dropdownn-contenta a h6 {
   
    font-weight: 500;
    margin: 0px;
    font-size: 50px;
  }


  .dropdownna {
    position: relative;
    display: inline-block;
  }



  .dropdownn-contenta a:hover {
    background-color: #fff;
  }

  .dropdownna:hover .dropdownn-contenta {
    display: block;
  }

  .dropdownn-menu-end[data-bs-popper] {
    right: 58px;
    left: auto;
  }
</style>

<body class="counter-scroll  header-fixed2">
  <!-- Preloader -->
  <!-- <div id="loading-overlay">
    <div class="loader"></div>
  </div>-->
  <div id="wrapper">
    <div id="page" class="clearfix">
      <div class="scroll-bar">
        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
          <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img class="logo" src="Images/Logo/TheaterLogo.png" alt="" width="30" height="24"></a>
            <button id="nav" class="navbar-toggler" id="nav" style="background-color:#8b0000" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon" style="background-color:dark-grey;"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                  <a class="nav-link active s" aria-current="page" href="home.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Home</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link " href="Events.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Events</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="AfficherSnack.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Snacks</a>
                </li>
             
                <li class="nav-item">
                  <a class="nav-link" href="contactus.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Contact</a>
                </li>
                <div class="flat-button flat-button-style3">
                  <div class="mini-cart-icon">

                    <p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <a href="#ltn__utilize-cart-menu" class="header_user-action d-inline-flex align-items-center justify-content-center ltn__utilize-toggle basket ">
                      <i class="icon-basket"></i>
                      <sup><?php echo $tot ?></sup>
                    </a>
                  </div>
                </div>
                <div style="padding-top: 5px; padding-left: 550px;">


                  <div class="dropdownn" style="display: inline-block;">
                    <a class="dropdown-toggle" href="#" role="button" id="profileDropdownn" data-bs-toggle="dropdownn" aria-expanded="false">
                      <img src="../../back/view/images/avatar/4.jpg" width="30" alt="Icône de profil">
                    </a>
                    <ul class="dropdownn-menu dropdownn-menu-end dropdown-menu-top" aria-labelledby="profileDropdown">
                      <li><a class="dropdownn-item" href="page_profile.php">visit profile</a></li>
                      <li><a class="dropdownn-item" href="login.php">Logout</a></li>
                    </ul>
                  </div>

                </div>
                <script>
                  $(document).ready(function() {
                    // Toggle the product category dropdown
                    $("#dropdownSnackButton").click(function() {
                      $(".dropdown-menu").toggle();
                    });

                    // Toggle the profile dropdown
                    $("#profileDropdownn").click(function() {
                      $(".dropdownn-menu").toggle();
                    });
                  });
                </script>


              </ul>
            </div>


          </div>
        </nav>




        <marquee>Welcome To <i>Ticketeasy</i>.com<sup>&reg;</sup></marquee>
        <label class="online">Snack and movie, let's choose, Munch and watch, we can't lose!</label>

        <div class="slider">
          <div class="slide_track">
            <div class="slide">
              <img src="./snacks/ferrero.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/bugles_chips.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/coca_cola.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/deli'o.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/doritos.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/falfoul.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/ferrero.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/bnino1.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/dairy_milk.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/lay's.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/fini_pucks.png" alt="" />
            </div>

            <div class="slide">
              <img src="./snacks/bnino1.png" alt="" />
            </div>

            <div class="slide">
              <img src="./snacks/bugles_chips.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/coca_cola.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/deli'o.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/falfoul.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/ferrero.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/tropico1.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/dairy_milk.png" alt="" />
            </div>
            <div class="slide">
              <img src="./snacks/lay's.png" alt="" />
            </div>

          </div>

        </div>
      </div>
    </div>
    <!-- page-title -->
    <section class="page-title page-title-inner">
      <div class="overlay-pagetitle"></div>
      <div class="container-fluid">
        <div class="row">
          <div class="page-title-heading">
            <h2>Our Snacks</h2>
            <hr>

          </div>
        </div>
      </div>
    </section>
    <!-- page-title -->

    <style>
      #search-results {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
      }

      .snack {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
      }

      .snack img {
        max-width: 100%;
        height: auto;
      }

      .snack-details {
        text-align: center;
        margin-top: 10px;
      }
    </style>

    <section class="tf-section our-shop">
      <div class="container-fluid">
        <div class="row">
          <div class="col-box col-25">
            <!-- sidebar -->
            <div id="sidebar">
              <!-- search -->

              <!-- Genre dropdown starts-->
              <script>
                /*  $(document).ready(function() {
                  $(".dropdown-toggle").click(function() {
                    $(".dropdown-menu").toggle();
                  });
                });*/
              </script>

              <style>
                .dropdown-menu {
                  position: absolute;
                  top: 72%;
                  left: 86px;
                  z-index: 1000;
                  display: none;
                  float: left;
                  min-width: 15rem;
                  padding: 0.5rem 0;
                  margin: 0.125rem 0 0;
                  font-size: 1.875rem;
                  color: #000;
                  text-align: -webkit-match-parent;
                  list-style: none;
                  background-color: #000;
                  background-clip: p;
                  border: 1px solid rgb(37 35 35);
                  border-radius: 2.25rem;
                }

                .dropdownn-menu {
    position: absolute;
    top: 89%;
    left: 1165px;
    z-index: 1000;
    display: none;
    float: inline-start;
    min-width: 11rem;
    padding: 0.5rem 0;
    margin: 0.125rem -2px 0;
    font-size: 2.2rem;
    color: #fff;
    text-align: -webkit-match-parent;
    list-style: none;
    background-color: #fff;
    background-clip: p;
    border: 1px solid rgb(37 35 35);
    border-radius: 0.25rem;
}

                label {
                  display: inline-block;
                  margin-bottom: -0.5rem;
                }

                .list-group-item {
                  position: relative;
                  display: block;
                  padding: .75rem 1.25rem;
                  background-color: #000;
                  border: 1px solid #000;
                }

                .list-group-item:hover {
                  background-color: #d29097;
                  color: #800000;
                }

                .row.filter_data {
                  display: grid;
                  grid-template-columns: repeat(3, 1fr);
                  gap: 18px;
                }

                .row.filter_data li {
                  border: 1px solid black;
                  padding: 10px;
                }

                .product-content {
                  padding: 33px 108px 20px 35px;
                }
              </style>

              <div class="widget widget-list-product" style="position: relative;disPlay: inline-block;padding-top: 5px;padding-left: 68px;">
                <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownSnackButton" style="font-size:20px;">
                  Categories
                </button>
                <div class="dropdown-menu">
                  <?php
                  foreach ($result as $row) {
                  ?>
                    <div class="list-group-item checkbox" style="color: #ff0000">
                      <label><input type="checkbox" class="common_selector categoriesnack" value="<?php echo $row['categoriesnack']; ?>"> <?php echo $row['categoriesnack']; ?></label>
                    </div>
                  <?php
                  }
                  ?>
                </div>
              </div>
              <div class="widget widget_s">

              </div>
              <div class="widget widget_sddd">

              </div>

              <!-- HTML code -->
              <div class="widget widget_search">
                <form action="" method="POST" role="search" class="search-form">

                  <input type="text" class="search" placeholder="Search Product" title="Search for" id="search-item" onkeyup="search()">

                  <a class="icon-search"></a>
                </form>
              </div>



              <!-- other HTML code -->


              <!-- search -->

              <div class="widget widget-list-product">
                <ul>

                </ul>
                <?php foreach ($result1 as $Snack) { ?>
                  <h2 class="search">Best-Selling: </h2>
                  <div class="image">

                    <img src="./snacks/<?php echo $Snack['imageSnack']; ?> ">
                  </div>
                <?php } ?>
              </div>



            </div>
            <!-- sidebar -->
          </div>
          <style>
            /* .item {
    display: inline-block;
  width: 100px;*/
            /* adjust the width to your liking */
            /*margin: 10px;
}*/
          </style>
          <div class="col-box col-box2 col-75">

            <div class="items-shop">

              <h2 class="widget-title">

              </h2>
              <div class="d-flex flex-wrap">
                <div class="item-box " id="item-box">
                  <div class="row filter_data">
                    <?php
                    foreach ($lista as $snack) {
                      if ($snack['quantitySnack'] > 0) {
                    ?>
                        <ul class="item">
                          <li data-category="" data-price="<?php echo $snack['priceSnack']; ?>">
                            <div class="hover-effect">
                              <div class="image">
                                <img src="./snacks/<?php echo $snack['imageSnack']; ?> " alt="images">
                              </div>
                              <div class="product-actions">
                                <a href="addLineS.php?idSnack=<?php echo $snack['idSnack']; ?>" class="tf-button color-text color-style1">Order Now</a>
                              </div>
                            </div>
                            <div class="product-content">
                              <h6 class="name-product"><?php echo $snack['snackName']; ?></h6>
                              <h6 class="pricing"><?php echo $snack['priceSnack']; ?>DT</h6>
                            </div>
                          </li>
                        </ul>
                    <?php
                      }
                    }
                    ?>
                  </div>
                </div>
              </div>

            </div>
          </div>
          <div class="themesflat-pagination clearfix">
            <ul class="text-center">
              <!--<li>
										<a href="#" class="active page-numbers prev"><span><i class="fas fa-chevron-left"></i></span></a>
									</li>
									<li>
										<a href="#" class="page-numbers current">01</a>
									</li>
									<li>
										<a href="#" class="page-numbers">02</a>
									</li>
									<li class="pagination-style">
										<a href="#" class="page-numbers">03</a>
									</li>
									<li>
										<a href="#" class="page-numbers next"><span><i class="fas fa-chevron-right"></i></span></a> 
									</li>
								</ul>-->
          </div>

        </div>

      </div>
  </div>
  </section>


  <!-------------------------------Footer-------------------------------->
  <script>
    const searchResults = document.querySelector('#searchResults');

    // Handle form submit using AJAX
    document.querySelector('form').addEventListener('submit', (event) => {
      event.preventDefault();

      const searchTerm = document.querySelector('#searchTerm').value;

      fetch(`index.php?searchTerm=${searchTerm}`)
        .then(response => response.text())
        .then(html => {
          searchResults.innerHTML = html;
        })
        .catch(error => console.error(error));
    });
  </script>




  <div id="waterdrop"></div>
  <footer class="footer">
    <hr class="footer-hr">
    <div class="footer-content">
      <div class="footer-left">
        <a href="home.html"><img class="footer-logo" src="Images/Logo/TheaterLogo.png" alt="" width="30" height="24"></a>
        <p class="footer-bottom-tagline">Buy! Watch! Chill! </p>
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
          <li class="footer-middle-list-item"><a onmouseover="booknow()" onmouseout="hideAlert()" href="home.html">Book Your Ticket Now</a>
            <script>
              function booknow() {
                var alertBox = document.createElement("div");
                alertBox.id = "alert-box";
                alertBox.innerHTML = "Pick a Movie First and then click Buy Now";
                alertBox.style.backgroundColor = "red";
                alertBox.style.color = "white";
                alertBox.style.padding = "30px";
                alertBox.style.borderRadius = "10px";
                alertBox.style.textAlign = "center";
                alertBox.style.position = "fixed";
                alertBox.style.top = "16%";
                alertBox.style.left = "50%";
                alertBox.style.transform = "translateX(-50%)";
                alertBox.style.zIndex = "9999";
                document.body.appendChild(alertBox);
              }

              function hideAlert() {
                var alertBox = document.getElementById("alert-box");
                if (alertBox) {
                  alertBox.parentNode.removeChild(alertBox);
                }
              }
            </script>
          </li>
          <li class="footer-middle-list-item"><a href="snacks.php">check our Snacks</a> </li>
          <li class="footer-middle-list-item"><a href="news.html">Coming soon</a> </li>
          <li class="footer-middle-list-item"><a href="premium.html">Get Premium Subscription</a> </li>
          <li class="footer-middle-list-item"><a href="faq.html">FAQ</a> </li>
        </ul>
      </div>
      <div class="footer-middle">
        <p class="footer-links">
        <h2 class="footer-heading">Book Now</h2>
        <p class="footer-bottom-tagline"> Book your tickets now for an unforgettable cinematic experience.</p>
        <a class="footer-contact-button" onmouseover="booknow()" onmouseout="hideAlert()">Book Now</a>
        </p>
        <script>
          function booknow() {
            var alertBox = document.createElement("div");
            alertBox.id = "alert-box";
            alertBox.innerHTML = "Pick a Movie First and then click Buy Now";
            alertBox.style.backgroundColor = "red";
            alertBox.style.color = "white";
            alertBox.style.padding = "30px";
            alertBox.style.borderRadius = "10px";
            alertBox.style.textAlign = "center";
            alertBox.style.position = "fixed";
            alertBox.style.top = "16%";
            alertBox.style.left = "50%";
            alertBox.style.transform = "translateX(-50%)";
            alertBox.style.zIndex = "9999";
            document.body.appendChild(alertBox);
          }

          function hideAlert() {
            var alertBox = document.getElementById("alert-box");
            if (alertBox) {
              alertBox.parentNode.removeChild(alertBox);
            }
          }
        </script>
      </div>
      <div class="footer-right">
        <p class="footer-links">
        <h2 class="footer-heading">Contact Us</h2>
        <p class="footer-bottom-tagline">Feel free to contact us.</p>
        <a class="footer-contact-button" href="contactus.html">Contact</a>
        </p>
      </div>
    </div>
    <hr class="footer-hr">
    <div class="footer-copyright">
      <p>Copyright &copy; and &reg; Since
        <script>
          document.write(new Date().getFullYear())
        </script> Under Ticketeasy.com : (Project Is Done By Innovators)
      </p>
    </div>
  </footer>

  <!----------------------scroll back to top button-->
  <button id="scrollToTopButton" title="Go to top">
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

  </div><!-- Page  -->

  </div><!-- Wrapper -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/shortcodes.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/fiter.js"></script>
  <script src="assets/js/swiper-bundle.min.js"></script>

  <script src="search.js"></script>


  <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script src="jquery-1.10.2.min.js"></script>
  <script src="jquery-ui.js"></script>
  <script src="bootstrap.min.js"></script>
  <style>
    #loading {
      text-align: center;
      background: url('images/loading.gif') no-repeat center;
      height: 150px;
    }
  </style>
  <!-- footer scripts -->

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
      frequency: 20,
      height: 0

    });
  </script>
  <script>
    function logout() {
      window.location.replace("login.php");
    }
  </script>

  <script src="Cart/js/plugins.js"></script>
  <!-- Main JS -->
  <script src="Cart/js/main.js"></script>

  <!-- bootsstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
  <script src="./static/script.js"></script>
  <!-- Javascript -->
  <script src="assets/js/jquery.min.js"></script>
  <script src="assets/js/shortcodes.js"></script>
  <script src="assets/js/main.js"></script>
  <script src="assets/js/wow.min.js"></script>
  <script src="assets/js/fiter.js"></script>
  <script src="assets/js/swiper-bundle.min.js"></script>
  <script src="assets/js/swiper.js"></script>
  <script src="search.js"></script>

  <script>
    $(document).ready(function() {

      filter_data();

      function filter_data() {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';

        var categoriesnack = get_filter('categoriesnack');

        $.ajax({
          url: "fetch_data.php",
          method: "POST",
          data: {
            action: action,
            categoriesnack: categoriesnack
          },
          success: function(data) {
            $('.filter_data').html(data);
          }
        });
      }

      function get_filter(class_name) {
        var filter = [];
        $('.' + class_name + ':checked').each(function() {
          filter.push($(this).val());
        });
        return filter;
      }

      $('.common_selector').click(function() {
        filter_data();
      });



    });
  </script>

  <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
      <div class="ltn__utilize-menu-head">
        <span class="ltn__utilize-menu-title">Cart Snack</span>
        <button color=red; class="ltn__utilize-close">×</button>

      </div>


      <div class="mini-cart-product-area ltn__scrollbar">
        <?php

        foreach ($list2 as $lines) {

        ?>
          <?php $snack = $SnackC->showsnack($lines['idSnack']); ?>
          <div class="mini-cart-item clearfix">
            <div class="mini-cart-img">
              <a href="#"><img src="./snacks/<?php echo $snack['imageSnack']; ?>" alt="Image"></a>
              <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
            </div>
            <div class="mini-cart-info">
              <h6><a href="#"><?= $snack['snackName']; ?></a></h6>
              <span class="mini-cart-quantity"><?php echo $lines['quantity'] ?> x <?= $snack['priceSnack']; ?> DT</span>
              <?php ($snack['priceSnack']) * ($lines['quantity']);
              $total = $total + (($snack['priceSnack']) * ($lines['quantity'])); ?>
            </div>
          </div>
        <?php
        }

        ?>

        <div class="mini-cart-footer">
          <div class="mini-cart-sub-total">
            <h5>Subtotal:<span><?php echo  $total; ?> DT</span></h5>
          </div>
          <div class="btn-wrapper">
            <a href="CartView.php" class="theme-btn-1 btn btn-effect-1">Edit Your Shopping Cart</a>

          </div>

        </div>

      </div>
    </div>
  </div>

</body>

</html>