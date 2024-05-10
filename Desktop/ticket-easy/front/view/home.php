<?php






include '../controller/movieC.php';
include '../controller/moviecategoryC.php';
session_start();



$name=$_SESSION['firstName'] ;
$total = 0;
$menuC = new movieC();
$list = $menuC->listMovie();
$lineC = new movieC();
$list1 = $lineC->listLine();

$product = null;
/*
$lista = $productC->listSnack();
$lineC = new snackC();
$list2 = $lineC->listLineS();*/

$db = config::getConnexion();
$query = "SELECT * FROM categoriesnack ORDER BY categoriesnack DESC";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$query = "SELECT * FROM movie where quantityTickets > 0 ORDER BY idMovie DESC";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();



$total_lines = $db->query('SELECT * FROM line_of_order')->rowCount();
$total_linesP = $db->query('SELECT * FROM line_of_snack')->rowCount();
//$tot = $total_linesP;
$tot = $total_lines + $total_linesP;
$query1 = "SELECT imageSnack FROM snack where quantitySnack = (SELECT MAX(quantitySnack) as qmax from snack)";
$statement1 = $db->prepare($query1);
$statement1->execute();
$result1 = $statement1->fetchAll();


//$total_linesP = $db->query('SELECT * FROM line_of_snack')->rowCount();
//$tot = $total_lines + $total_linesP;
$productCc = new moviecategoryC();
$listaa = $productCc->listmoviecategory();
//metier agenda
$dbb = config::getConnexion();

$queryb = "SELECT DISTINCT(dateMovie) FROM movie ";
$statementb = $dbb->prepare($queryb);
$statementb->execute();
$resultb = $statementb->fetchAll();

?>



<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Ticketeasy</title>
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


</head>


<!------------------------Scroll to top button------------------------------------------------>
<style>
  .buddy {
    cursor: pointer;
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
  }




  .maincontainer h3 {
    color: white;
    text-align: center;
  }

  .container {
    text-align: center;
  }

  #navbarNav.nav-item.nav-link a:hover {
    color: red;
  }

  .nav-link:hover {
    color: red;
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
</style>

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


  #navbarNav.nav-itemm.nav-link a:hover {
    color: white;
  }

  .nav-item :hover {
    margin-bottom: 10px;
    /* background-color: aquamarine; */

  }

  .nav-itemm :hover {
    margin-bottom: 10px;
    /* background-color: aquamarine; */
    border-bottom: 3px;
    /* border-color: red;
    border-bottom-style: solid;*/
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



  .dropdown-menu {
            background-color: #fff;
            border: 1px solid #ccc;
            box-shadow: 0 2px 3px rgba(0, 0, 0, 0.3);
        }

        .dropdown-menu a {
            color: #333;
            text-decoration: none;
        }

        .dropdown-menu a:hover {
            background-color: #000000;
        }

        .dropdown-toggle {
            display: inline-block;
            padding: 6px 12px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .dropdown-toggle:hover {
            border-color: #999;
        }

        .dropdown-menu a {
            color: #c00;
            text-decoration: none;
        }

        img {
            width: 50%;
            transition: transform 1s;
        }

        .dropdown-toggle {
            display: inline-block;
            padding: 1.5px 0px;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.42857143;
            text-align: revert;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 2px solid #c00;
            border-radius: 10px;
        }
        .profile-link {
        display: block;
        width: 70px;
        /* ajustez la taille de l'icône selon vos besoins */
        height: 70px;
        text-align: center;
        margin-right: 5px;
    }

    .profile-link img {
        width: 70%;
        height: 70%;
        object-fit: cover;
        border-radius: 50%;
        cursor: pointer;
    }

  .flim {
    text-align: center;
    position: absolute;
    bottom: 0%;
    background: rgb(0, 0, 0);
    background: rgba(0, 0, 0, 0.5);
    color: white;
    width: 162%;
}
</style>
<script>
  setTimeout(function() {
    $('.section').fadeToggle();
  }, 4000);
</script>

<body class="counter-scroll  header-fixed2">



  <div id="wrapper">
    <div id="page" class="clearfix">
      <div class="scroll-bar">
        <!-- navbar starts -->

        <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
          <div class="container-fluid">
            <a class="navbar-brand" href="home.php"><img class="logo" src="Images/Logo/TheaterLogo.png" alt="" width="30" height="24"></a>
            <button id="nav" class="navbar-toggler" id="nav" style="background-color:#8b0000" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon" style="background-color:dark-grey;"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                  <a class="nav-link active s" aria-current="page" href="home.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Home</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link " href="Events.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Events</a>
                </li>
                <!--reservation-->

                <!--reservation-->
                <li class="nav-item">
                  <a class="nav-link" href="  AfficherSnack.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">snacks</a>
                </li>

                <li class="nav-item">
                  <a class="nav-link" href="contactus.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Contact</a>
                </li>
                <li>
                  <!-- Genre dropdown starts-->

                  <style>
                   
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
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownSnackButton1" style="font-size:20px;">
                      Genres
                    </button>
                    <div class="dropdown-menu">

                      <?php
                      foreach ($listaa as $row) {
                      ?>
                        <div class="list-group-item checkbox" style="color: #ff0000">
                          <label><input type="checkbox" class="common_selector categoryName" value="<?php echo $row['categoryName']; ?>"> <?php echo $row['categoryName']; ?></label>
                        </div>
                      <?php
                      }
                      ?>

                    </div>
                  </div>

                  <!-- Genre dropdown ends-->
                </li>
                <li>
                  <!-- Genre dropdown starts-->
                  <script>
                    $(document).ready(function() {
                      // Toggle the product category dropdown
                      $("#dropdownSnackButton1").click(function() {
                        $(".dropdown-menu").toggle();
                      });
                    });
                  </script>
                  <script>
                    $(document).ready(function() {
                      // Toggle the product category dropdown
                      $("#dropdownSnackButton").click(function() {
                        $(".dropdown-menuu").toggle();
                      });
                    });
                  </script>
                  <script>
                    $(document).ready(function() {
                      // Toggle the product category dropdown
                      $("#profileDropdown1").click(function() {
                        $(".dropdown1-menu").toggle();
                      });
                    });
                  </script>
                  <style>
                    .dropdown-menuu {
                      position: absolute;
                      top: 61%;
                      left: -21px;
                      z-index: 1000;
                      display: none;
                      float: left;
                      min-width: 10rem;
                      padding: 0.5rem 2px;
                      margin: 0.1rem 0 0;
                      font-size: -0.2rem;
                      color: #000;
                      text-align: -webkit-match-parent;
                      list-style: none;
                      background-color: #000;
                      background-clip: p;
                      border: 1px solid rgb(37 35 35);
                      border-radius: 2.25rem;
                    }

                    .dropdown1-menu {
                      position: absolute;
                      top: 71%;
                      left: 1382px;
                      z-index: 1000;
                      display: none;
                      float: left;
                      min-width: -12rem;
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

                    body {
                      color: var(--ltn__paragraph-color);
                      font-weight: 400;
                      font-style: normal;
                      font-size: 14px;
                      font-family: var(--ltn__body-font);
                      line-height: 1.8;
                      margin: 0 auto;
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

                    img {
                      margin: 0 !important;
                      padding: 0 !important;
                      max-width: 99% !important;
                    }
                  </style>
                  <div class="widget widget-list-product" style="position: relative;disPlay: inline-block;padding-top: 5px;padding-left: 0px;">
                    <button class="btn btn-outline-danger dropdown-togglee" type="button" id="dropdownSnackButton" style="font-size:20px;">
                      When
                    </button>
                    <div class="dropdown-menuu">

                      <?php
                      foreach ($result as $row) {
                      ?>
                        <div class="list-group-item checkbox" style="color: #ff0000">
                          <label><input type="checkbox" class="common_selector dateMovie" value="<?php echo $row['dateMovie']; ?>"> <?php echo $row['dateMovie']; ?></label>
                        </div>
                      <?php
                      }
                      ?>

                    </div>
                  </div>

                  <!-- Genre dropdown ends-->
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
                <div style=" padding-top: 5px; padding-left: 250px;">


                  <div class="dropdown1">
                    <a class="dropdown-toggle" href="#" role="button" id="profileDropdown1" data-bs-toggle="dropdown" aria-expanded="false">
                      <img src="../../back/view/images/avatar/4.jpg" width="50" alt="Icône de profil">
                    </a>
                    <ul class="dropdown1-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                      <li><a class="dropdown-item" href="page_profile.php">visit profile</a></li>
                      <li><a class="dropdown-item" href="login.php">Logout</a></li>
                    </ul>
                  </div>

                </div>



              </ul>

            </div>
          </div>
        </nav>

        <!-- navbar ends -->


        <marquee>Welcome To <i>Ticketeasy</i>.com<sup>&reg;</sup></marquee>
        <label class="online">Book Your Movies Ticket Now!</label>



        <div class="buddy">

          <div class="slider">
            <div class="slide_track">

              <div class="slide">
                <img src="./Images/apharan.jpg" alt="" />
              </div>

              <div class="slide">
                <img src="./Images/bat.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/breaking.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/criminal.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/got.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/infinity.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/kota.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/mirzapur.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/sacred.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/scam.jpg" alt="" />
              </div>


              <div class="slide">
                <img src="./Images/apharan.jpg" alt="" />
              </div>

              <div class="slide">
                <img src="./Images/bat.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/breaking.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/criminal.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/got.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/infinity.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/kota.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/mirzapur.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/sacred.jpg" alt="" />
              </div>
              <div class="slide">
                <img src="./Images/scam.jpg" alt="" />
              </div>





            </div>

          </div>


        </div>

      </div>

      <div class="maincontainer">

        <h2>Movies</h2>
        <hr>
        <div class="container">
          <div id="movies" class="row"></div>
        </div>

        <div class="container" id="Movies">
          <h3>Hollywood</h3>
          <hr>
          <div class="poster-container">
  <div class="row">
    <?php foreach ($list as $menu) { ?>
              <div class="poster">
                <div class="flip-card_i">
                  <div class="flip-card-inner_i">
                    <div class="flip-card-front_i">
                      <img src="./images/<?php echo $menu['moviePoster']; ?>" alt="Avatar" style="width:250px;height:360px;">
                    </div>
                    <div class="flip-card-back_i">
                      <h1><?php echo $menu['movieName']; ?></h1>
                      <button class="btn_i b3_i" title="Year" style="color:white"><?php echo $menu['dateR']; ?></button>
                      <button class="btn_i b2_i" title="Minutes" style="color:white"><?php echo $menu['duration']; ?><button>
                          <button class="btn_i b1_i" title="IMDb" style="color:white"><?php echo $menu['rate']; ?></button>
                          </span>
                          <br />
                          <br />
                          </p>

                          <p class="para_i"><?php echo $menu['descriptionMovie']; ?></p>

                          <!--<form action="https://youtu.be/YoHD9XEInc0&t=17s"> -->

                          <button class="trailer_i" type="submit" value="" onclick="openWin()">▶Trailer</button>
                          <script type="text/javascript">
                            function openWin() {
                              window.open("<?php echo $menu['trailer']; ?>?autoplay=1&controls=0&showinfo=0&modestbranding=1&loop=1&playlist=YoHD9XEInc0", "_blank", "top=1000,left=10,height=315,width=560,channelmode=no,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                            }
                          </script>
                          <!-- </form> -->
                          <br>
                          <br>
                    </div>
                  </div>
                  <div class="flim">
                    <b><?php echo $menu['movieName']; ?></b><br>IMDb -<?php echo $menu['rate']; ?>
                    <button class="btn_i b4_i" style="height: 0.75cm; width:2.5cm;">
                      <a href="addLine.php?idMovie=<?php echo $menu['idMovie']; ?>">
                        <img src="images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </a>
                    </button>



                  </div>
                </div>
              </div>
            <?php
            }
            ?>
          </div>

          <!--

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/dark knight.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1 style="font-size: 30px;">The Dark Knight</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2008</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h32m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">9.0</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">After Gordon, Dent and Batman begin an assault on Gotham's organised crime, the mobs hire the Joker, a psychopathic criminal mastermind who offers to kill Batman and bring the city to its knees.</p>


                      <button class="trailer_i" type="submit" value="" onclick="openWin1()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin1() {
                          window.open("https://www.youtube.com/embed/LDG9bisJEaI?autoplay=1&controls=0&showinfo=0&modestbranding=1&loop=1&playlist=LDG9bisJEaI", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script>
                      <br><br>
                      <button class="btn_i b4_i" type="submit" value="" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        <a href="addLine.php?idMovie=2">
                          Buy Now
                      </button>
                      <script type="text/javascript">
                        /* function openMovieWin11(movieName) {
                        var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                        window.location.href = url;
                      }*/
                      </script>
                </div>

              </div>
              <div class="flim">
                <b>The Dark Knight</b><br>IMDb - 9.0
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/Parasite.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Parasite</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2019</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h12m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.6</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">The struggling Kim family sees an opportunity when the son starts working for the wealthy Park family. Soon, all of them find a way to work within the same household and start living a parasitic life.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin2()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin2() {
                          window.open("https://www.youtube.com/embed/SEUXfv87Wpk?autoplay=1&controls=0&showinfo=0&modestbranding=1&loop=1&playlist=SEUXfv87Wpk", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('Parasite')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>

                </div>
              </div>
              <div class="flim">
                <b>Parasite</b><br>IMDb - 8.6
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/We're_the_Millers_poster.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>We're the Millers</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2013</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">1h58m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">7.0</button>
                  </span>
                  <br />

                  </p>

                  <p class="para_i">David, a drug dealer, is forced by his boss to smuggle drugs from Mexico. He hires a stripper, a petty thief and a teenage neighbour and forms a fake family to help him smuggle the drugs.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin3()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin3() {
                      window.open("https://www.youtube.com/embed/0Vsy5KzsieQ?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('We re the Millers')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin11(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>We're the Millers</b>
                <br>
                IMDb - 7.0
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/the terminal.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>The Terminal</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2004</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h8m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">7.4</button>
                      </span>
                      <br />

                      </p>

                      <p class="para_i">Viktor Navorski gets stranded at an airport when a war rages in his country. He is forced by the officials to stay at the airport until his original identity is confirmed.</p>


                      <button class="trailer_i" type="submit" value="" onclick="openWin4()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin4() {
                          window.open("https://www.youtube.com/embed/hjydAG1lG_8?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('The Terminal')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>The Terminal</b>
                <br>
                IMDb - 7.4
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/Matrix.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>The Matrix</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1999</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h16m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.7</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">Thomas Anderson, a computer programmer, is led to fight an underground war against powerful computers who have constructed his entire reality with a system called the Matrix.</p>


                      <button class="trailer_i" type="submit" value="" onclick="openWin5()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin5() {
                          window.open("https://www.youtube.com/embed/8xx91zoASLY?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('The Matrix')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>The Matrix</b>
                <br>
                IMDb - 8.7
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/joker.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Joker</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2019</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h2m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.4</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">Arthur Fleck, a party clown, leads an impoverished life with his ailing mother. However, when society shuns him and brands him as a freak, he decides to embrace the life of crime and chaos.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin6()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin6() {
                          window.open("https://www.youtube.com/embed/zAGVQLHvwOY?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('Joker')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>Joker</b><br>IMDb - 8.4
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/Hamilton.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Hamilton</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2020</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h40m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.4</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">Alexander Hamilton, an orphan, arrives in New York to work for George Washington. After the American Revolution, he goes on to become first Secretary of the Treasury of the US.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin7()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin7() {
                          window.open("https://www.youtube.com/embed/DSCKfXpAGHc?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('Hamilton')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          // Création de l'URL avec le nom du film encodé
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);

                          // Redirection vers la page de réservation avec l'URL modifiée
                          window.location.href = url;
                        }
                      </script>

                </div>
              </div>
              <div class="flim">
                <b>Hamilton</b>
                <br>
                IMDb - 8.4
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/goodfellas.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>GoodFellas</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1990</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h28m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.7</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">Young Henry Hill, with his friends Jimmy and Tommy, begins the climb from being a petty criminal to a gangster on the mean streets of New York.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin8()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin8() {
                          window.open("https://www.youtube.com/embed/qo5jJpHtI1Y?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('GoodFellas')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>GoodFellas</b>
                <br>
                IMDb - 8.7
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/the shawshank.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1 style="font-size: 30px;">The Shawshank Redemption</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1994</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h22m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">9.3</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i" style="margin-top: -20px;">Andy Dufresne, a successful banker, is arrested for the murders of his wife and her lover, and is sentenced to life imprisonment at the Shawshank prison. He becomes the most unconventional prisoner.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin9()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin9() {
                          window.open("https://www.youtube.com/embed/6hB3S9bIaco?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                        }
                      </script>
                      <br>
                      <br>

                      <button class="trailer_i" type="submit" value="" onclick="openMovieWin9('The Shawshank Redemption')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      -->
          <!-- right button is up all need to be like it |^ -->

          <!--       <script type="text/javascript">
                        function openMovieWin9(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>The Shawshank Redemption</b>
                <br>
                IMDb - 9.3
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/green mile.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>The Green Mile</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1999</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">3h9m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.6</button>
                      </span>
                      <br />

                      </p>

                      <p class="para_i">Paul, the head guard of a prison, meets an inmate, John, an African American who is accused of murdering two girls. His life changes drastically when he discovers that John has a special gift.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin10()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin10() {
                          window.open("https://www.youtube.com/embed/Ki4haFrqSrw?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");


                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin9('The Green Mile')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>

                      <script type="text/javascript">
                        function openMovieWin9(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>The Green Mile</b>
                <br>
                IMDb - 8.6
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/inter.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Interstellar</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2014</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h55m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.6</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">When Earth becomes uninhabitable in the future, a farmer and ex-NASA pilot, Joseph Cooper, is tasked to pilot a spacecraft, along with a team of researchers, to find a new planet for humans.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin11()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin11() {
                          window.open("https://www.youtube.com/embed/zSWdZVtXT7E", "_blank", "height=400,width=600,scrollbars=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin11('Interstellar')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin11(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>Interstellar</b>
                <br>
                IMDb - 8.6
              </div>
            </div>
          </div>
        </div>

        <div class="container" id="Movies">
          <h3>Bollywood</h3>
          <hr>
          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/aaa.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Andaz Apna Apna</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1994</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h41m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.1</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">Amar and Prem, who belong to middle-class families, compete to win over Raveena, a millionaire's daughter</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin12('Andaz Apna Apna')">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin12() {
                          window.open("https://www.youtube.com/embed/fd_w7Qw8biU", "_blank", "height=400,width=600,scrollbars=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Andaz Apna Apna')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin12(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>Andaz Apna Apna</b>
                <br>
                IMDb - 8.1
              </div>
            </div>
          </div>


          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/chakde.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Chakde India</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2007</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">2h33m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.2</button>
                      </span>
                      <br />

                      </p>

                      <p class="para_i">Kabir Khan, a former hockey star, is tainted as someone who betrayed his country. However, he begins coaching the Indian women's national hockey team to prove his loyalty to the nation.</p>


                      <button class="trailer_i" type="submit" value="" onclick="openWin13()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin13() {
                          window.open("https://www.youtube.com/embed/6a0-dSMWm5g", "_blank", "height=400,width=600,scrollbars=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Chakde India')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin12(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>Chakde India</b>
                <br>
                IMDb - 8.2
              </div>
            </div>
          </div>


          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/milkha.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1 style="font-size: 37px;">Bhaag Milkha Bhaag</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2013</button>
                  <button class="btn_i b2_i" title="Minutes" style="color:white">3h9m<button>
                      <button class="btn_i b1_i" title="IMDb" style="color:white">8.2</button>
                      </span>
                      <br />
                      <br />
                      </p>

                      <p class="para_i">Milkha Singh, an Indian athlete, overcomes many agonising obstacles in order to become a world champion, Olympian and one of India's most iconic athletes.</p>

                      <button class="trailer_i" type="submit" value="" onclick="openWin14()">▶Trailer</button>
                      <script type="text/javascript">
                        function openWin14() {
                          window.open("https://www.youtube.com/embed/3uICXnnW86U", "_blank", "height=400,width=600,scrollbars=no");
                        }
                      </script><br><br>
                      <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Bhaag Milkha Bhaag')" style=" height: 0.75cm; width:2.5cm; ">
                        <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                        Buy Now
                      </button>
                      <script type="text/javascript">
                        function openMovieWin12(movieName) {
                          var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                          window.location.href = url;
                        }
                      </script>
                </div>
              </div>
              <div class="flim">
                <b>Bhaag Milkha Bhaag</b>
                <br>
                IMDb - 8.2
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/wed.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>A Wednesday</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2008</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">1h44m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.1</button>
                  </span>
                  <br />

                  </p>

                  <p class="para_i">Prakash Rathod, a retired police commissioner recounts the most memorable case of his career wherein he was informed about a bomb scare in Mumbai by an ordinary commoner.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin15()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin15() {
                      window.open("https://www.youtube.com/embed/yry6pBiXx14", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('A Wednesday')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>A Wednesday</b>
                <br>
                IMDb - 8.1
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/dhoni.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>MS Dhoni</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2016</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">3h40m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">7.9</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">M S Dhoni, a boy from Ranchi, aspires to ▶▶Play cricket for India. Though he initially tries to please his father by working for the Indian Railways, he ultimately decides to chase his dreams.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin16()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin16() {
                      window.open("https://www.youtube.com/embed/6L6XqWoS8tw", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Ms Dhoni : The Untold Story')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Ms Dhoni : The Untold Story</b>
                <br>
                IMDb - 7.9
              </div>
            </div>
          </div>

          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/drishyam.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Drishyam</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2015</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">2h43m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.2</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">When the disappearance of a policewoman's son threatens to ruin Vijay's family, he leaves no stone unturned in order to shield his family.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin17()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin17() {
                      window.open("https://www.youtube.com/embed/AuuX2j14NBg", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Drishyam')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Drishyam</b>
                <br>
                IMDb - 8.2
              </div>
            </div>
          </div>


          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/dil.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Dilwale Dulhania</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1995</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">3h12m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.1</button>
                  </span>
                  <br />

                  </p>

                  <p class="para_i">Raj and Simran meet during a trip across Europe and the two fall in love. However, when Raj learns that Simran is already promised to another, he follows her to India to win her and her father over.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin18()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin18() {
                      window.open("https://www.youtube.com/embed/oIZ4U21DRlM", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Dilwale Dulhania Le Jayenge')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Dilwale Dulhania Le Jayenge</b>
                <br>
                IMDb - 8.1
              </div>
            </div>
          </div>


          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/gangs of wassepur.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Gangs of Wasseypur</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2012</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">2h40m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.2</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">A gangster (Manoj Bajpayee) clashes with the ruthless, coal-mining kingpin (Tigmanshu Dhulia) who killed his father (Jaideep Ahlawat).</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin19()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin19() {
                      window.open("https://www.youtube.com/embed/j-AkWDkXcMY", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Gangs of Wasseypur')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Gangs of Wasseypur</b>
                <br>
                IMDb - 8.2
              </div>
            </div>
          </div>



          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/sholay.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Sholay</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">1975</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">3h24m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.2</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">Jai and Veeru, two ex-convicts, are hired by Thakur Baldev Singh, a retired policeman, to help him nab Gabbar Singh, a notorious dacoit, who has spread havoc in the village of Ramgarh.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin20()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin20() {
                      window.open("https://www.youtube.com/embed/XjiluhItzIA", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Sholay')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Sholay</b>
                <br>
                IMDb - 8.2
              </div>
            </div>
          </div>


          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/rdb.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Rang De Basanti</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2006</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">2h51m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.1</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">When Sue selects a few students to portray various Indian freedom fighters in her film, she unwittingly awakens their patriotism</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin21()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin21() {
                      window.open("https://www.youtube.com/embed/l-BTOTtcGmk", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Rang De Basanti')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Rang De Basanti</b>
                <br>
                IMDb - 8.1
              </div>
            </div>
          </div>



          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/mbbs.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>Munna Bhai MBBS</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2003</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">2h36m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.1</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">Munna is a goon who sets out to fulfil his father's dream of becoming a doctor.</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin22()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin22() {
                      window.open("https://www.imdb.com/video/vi1188543257/", "_blank", "height=400,width=600,scrollbars=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Munna Bhai MBBS')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>Munna Bhai MBBS</b>
                <br>
                IMDb - 8.1
              </div>
            </div>
          </div>




          <div class="poster">
            <div class="flip-card_i">
              <div class="flip-card-inner_i">
                <div class="flip-card-front_i">
                  <img src="./Images/kgf.jpg" alt="Avatar" style="width:250px;height:360px;">
                </div>
                <div class="flip-card-back_i">
                  <h1>KGF</h1>
                  <button class="btn_i b3_i" title="Year" style="color:white">2018</button>
                  <button class="btn_i b2_i" title="Seasons" style="color:white">2h50m</button>
                  <button class="btn_i b1_i" title="IMDb" style="color:white">8.3</button>
                  </span>
                  <br />
                  <br />
                  </p>

                  <p class="para_i">Rocky, a young man, seeks power and wealth in order to fulfil a promise to his dying mother</p>

                  <button class="trailer_i" type="submit" value="" onclick="openWin23()">▶Trailer</button>
                  <script type="text/javascript">
                    function openWin23() {
                      window.open("https://www.youtube.com/embed/-KfsY-qwBS0?autoplay=1", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                    }
                  </script><br><br>
                  <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('KGF')" style=" height: 0.75cm; width:2.5cm; ">
                    <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                    Buy Now
                  </button>
                  <script type="text/javascript">
                    function openMovieWin12(movieName) {
                      var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                      window.location.href = url;
                    }
                  </script>
                </div>
              </div>
              <div class="flim">
                <b>KGF</b>
                <br>
                IMDb - 8.3
              </div>
            </div>
          </div>

                  -->

          <!---next block -->

          <!---third block -->








          <!--


          <h2>Kids</h2>
          <hr>
          <div class="container" id="Kids">

            <div class="poster">
              <div class="flip-card_i">
                <div class="flip-card-inner_i">
                  <div class="flip-card-front_i">
                    <img src="./Images/bat.jpg" alt="Avatar" style="width:250px;height:360px;">
                  </div>
                  <div class="flip-card-back_i">
                    <h1>
                      <font size="6">The Dark Knight Rises</font>
                    </h1>
                    <button class="btn_i b3_i" title="Year" style="color:white">2012</button>
                    <button class="btn_i b2_i" title="Minutes" style="color:white">2h44m</button>
                    <button class="btn_i b1_i" title="IMDb" style="color:white">8.4</button>
                    </span>
                    <br />

                    </p>

                    <p class="para_i">Bane, an imposing terrorist, attacks Gotham City and disrupts its eight-year-long
                      period of peace.</p>

                    <button class="trailer_i" type="submit" value="" onclick="openWin54()">▶Trailer</button>
                    <script type="text/javascript">
                      function openWin54() {
                        window.open("https://www.youtube.com/embed/ej3ioOneTy8", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                      }
                    </script><br><br>
                    <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('The Dark Knight Rises')" style=" height: 0.75cm; width:2.5cm; ">
                      <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                      Buy Now
                    </button>
                    <script type="text/javascript">
                      function openMovieWin12(movieName) {
                        var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                        window.location.href = url;
                      }
                    </script>

                  </div>
                </div>
                <div class="flim">
                  <b>The Dark Knight Rises</b>
                  <br>
                  IMDb - 8.4
                </div>
              </div>
            </div>

            <div class="poster">
              <div class="flip-card_i">
                <div class="flip-card-inner_i">
                  <div class="flip-card-front_i">
                    <img src="./Images/narnia.jpg" alt="Avatar" style="width:250px;height:360px;">
                  </div>
                  <div class="flip-card-back_i">
                    <h1 style="font-size: 30px;">The Chronicles of Narnia</h1>
                    <button class="btn_i b3_i" title="Year" style="color:white">2005</button>
                    <button class="btn_i b2_i" title="minutes" style="color:white">2h30m</button>
                    <button class="btn_i b1_i" title="IMDb" style="color:white">6.9</button>
                    </span>
                    <br />
                    <br />
                    </p>

                    <p class="para_i">While Playing, Lucy and her siblings find a wardrobe that lands them in a mystical
                      place called Narnia.</p>

                    <button class="trailer_i" type="submit" value="" onclick="openWin55()">▶Trailer</button>
                    <script type="text/javascript">
                      function openWin55() {
                        window.open("https://www.youtube.com/embed/ruGHxmjQ180", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                      }
                    </script><br><br>
                    <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('The Chronicles of Narnia')" style=" height: 0.75cm; width:2.5cm; ">
                      <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                      Buy Now
                    </button>
                    <script type="text/javascript">
                      function openMovieWin12(movieName) {
                        var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                        window.location.href = url;
                      }
                    </script>
                  </div>
                </div>
                <div class="flim">
                  <b>The Chronicles of Narnia</b>
                  <br>
                  IMDb - 6.9
                </div>
              </div>
            </div>

            <div class="poster">
              <div class="flip-card_i">
                <div class="flip-card-inner_i">
                  <div class="flip-card-front_i">
                    <img src="./Images/endgame.jpg" alt="Avatar" style="width:250px;height:360px;">
                  </div>
                  <div class="flip-card-back_i">
                    <h1>Avengers : Endgame</h1>
                    <button class="btn_i b3_i" title="Year" style="color:white">2019</button>
                    <button class="btn_i b2_i" title="Minutes" style="color:white">3h2m</button>
                    <button class="btn_i b1_i" title="IMDb" style="color:white">8.4</button>
                    </span>
                    <br />

                    </p>

                    <p class="para_i">After Thanos, an intergalactic warlord, disintegrates half of the universe, the
                      Avengers must reunite and assemble again to reinvigorate their trounced allies and restore balance.
                    </p>

                    <button class="trailer_i" type="submit" value="" onclick="openWin56()">▶Trailer</button>
                    <script type="text/javascript">
                      function openWin56() {
                        window.open("https://www.youtube-nocookie.com/embed/TcMBFSGVi1c?autoplay=1&fs=0&modestbranding=1&rel=0&showinfo=0&iv_load_policy=3", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");


                      }
                    </script><br><br>
                    <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Avengers : Endgame')" style=" height: 0.75cm; width:2.5cm; ">
                      <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                      Buy Now
                    </button>
                    <script type="text/javascript">
                      function openMovieWin12(movieName) {
                        var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                        window.location.href = url;
                      }
                    </script>
                  </div>
                </div>
                <div class="flim">
                  <b>Avengers : Endgame</b>
                  <br>
                  IMDb - 8.4
                </div>
              </div>
            </div>

            <div class="poster">
              <div class="flip-card_i">
                <div class="flip-card-inner_i">
                  <div class="flip-card-front_i">
                    <img src="./Images/infinity.jpg" alt="Avatar" style="width:250px;height:360px;">
                  </div>
                  <div class="flip-card-back_i">
                    <h1>Avengers : Infinity War</h1>
                    <button class="btn_i b3_i" title="Year" style="color:white">2018</button>
                    <button class="btn_i b2_i" title="Minutes" style="color:white">2h40m<button>
                        <button class="btn_i b1_i" title="IMDb" style="color:white">8.4</button>
                        </span>
                        <br />

                        </p>

                        <p class="para_i">The Avengers must stop Thanos, an intergalactic warlord, from getting his hands on
                          all the infinity stones. However, Thanos is prepared to go to any lengths to carry out his insane
                          plan.</p>

                        <button class="trailer_i" type="submit" value="" onclick="openWin57()">▶Trailer</button>
                        <script type="text/javascript">
                          function openWin57() {
                            window.open("https://www.youtube.com/embed/6ZfuNTqbHE8?rel=0&amp;autoplay=1&amp;mute=1&amp;showinfo=0&amp;controls=0", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                          }
                        </script><br><br>
                        <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Avengers : Infinity War')" style=" height: 0.75cm; width:2.5cm; ">
                          <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                          Buy Now
                        </button>
                        <script type="text/javascript">
                          function openMovieWin12(movieName) {
                            var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                            window.location.href = url;
                          }
                        </script>
                  </div>
                </div>
                <div class="flim">
                  <b>Avengers : Infinity War</b>
                  <br>
                  IMDb - 8.4
                </div>
              </div>
            </div>


            <div class="poster">
              <div class="flip-card_i">
                <div class="flip-card-inner_i">
                  <div class="flip-card-front_i">
                    <img src="./Images/spider.jpg" alt="Avatar" style="width:250px;height:360px;">
                  </div>
                  <div class="flip-card-back_i">
                    <h1>Spider Man</h1>
                    <button class="btn_i b3_i" title="Year" style="color:white">2002</button>
                    <button class="btn_i b2_i" title="Minutes" style="color:white">2h1m</button>
                    <button class="btn_i b1_i" title="IMDb" style="color:white">7.3</button>
                    </span>
                    <br />
                    <br />
                    </p>

                    <p class="para_i">Peter Parker, an outcast high school student, gets bitten by a radioactive spider and
                      attains superpowers.</p>

                    <button class="trailer_i" type="submit" value="" onclick="openWin58()">▶Trailer</button>
                    <script type="text/javascript">
                      function openWin58() {
                        window.open("https://www.youtube.com/embed/-tnxzJ0SSOw", "_blank", "top=100,left=250,height=400,width=600,channelmode=yes,fullscreen=yes,menubar=no,toolbar=no,location=no,status=no,scrollbars=no,noopener=no");
                      }
                    </script><br><br>
                    <button class="btn_i b4_i" type="submit" value="" onclick="openMovieWin12('Spider Man')" style=" height: 0.75cm; width:2.5cm; ">
                      <img src="Images\Logo\11.png" alt="Ticket" style="height: 80%; width: auto;">
                      Buy Now
                    </button>
                    <script type="text/javascript">
                      function openMovieWin12(movieName) {
                        var url = "Book Now.php?movie=" + encodeURIComponent(movieName);
                        window.location.href = url;
                      }
                    </script>
                  </div>
                </div>
                <div class="flim">
                  <b>Spider Man</b>
                  <br>
                  IMDb - 7.3
                </div>
              </div>
            </div>
                    -->

        </div>
      </div>
    </div>
  </div>
  </div>
  <!-------------------------------Footer-------------------------------->
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
  <!-- Wrapper -->
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
  <!-- footer scripts -->


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
      frequency: 20
    });
  </script>
  <script>
     $(document).ready(function() {

      filter_data();

      function filter_data() {
        $('.poster-container').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data1';

        var categoryName = get_filter('categoryName');

        $.ajax({
          url: "fetch_data1.php",
          method: "POST",
          data: {
            action: action,
            categoryName: categoryName
          },
          success: function(data) {
            $('.poster-container').html(data);
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
  <script>
    $(document).ready(function() {

      filter_data();

      function filter_data() {
        $('.poster-container').html('<div id="loading" style="" ></div>');
        var action = 'fetch_date';

        var dateMovie = get_filter('dateMovie');

        $.ajax({
          url: "fetch_date.php",
          method: "POST",
          data: {
            action: action,
            dateMovie: dateMovie
          },
          success: function(data) {
            $('.poster-container').html(data);
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

  <div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
    <div class="ltn__utilize-menu-inner ltn__scrollbar">
      <div class="ltn__utilize-menu-head">
        <span class="ltn__utilize-menu-title">Cart movies</span>
        <button class="ltn__utilize-close">×</button>
      </div>

      <div class="mini-cart-product-area ltn__scrollbar">

        <?php
        // $total=0;			
        foreach ($list1 as $line) {

        ?>
          <?php $movie = $menuC->showMovie($line['idMovie']); ?>
          <div class="mini-cart-item clearfix">

            <div class="mini-cart-img">
              <a href="#"><img src="../view/images/<?php echo $movie['moviePoster']; ?>"></a>
              <span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
            </div>
            <div class="mini-cart-info">
              <h6><a href="#"><?php $movie['movieName'];  ?></a></h6>
              <span class="mini-cart-quantity"><?php echo $line['quantity'] ?> x <?php $movie['priceTicket']; ?> DT</span>
              <?php ($movie['priceTicket']) * ($line['quantity']);

              $total = $total + (($movie['priceTicket']) * ($line['quantity'])); ?>
            </div>
          </div>
        <?php
        }

        ?>
        <?php

        ?>

      </div>
      <div class="mini-cart-product-area ltn__scrollbar">


        <div class="mini-cart-footer">
          <div class="mini-cart-sub-total">
            <h5>Subtotal: <span><?php echo  $total; ?> DT</span></h5>
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