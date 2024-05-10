<?php
//include '../config.php';
include '../controller/LineOfSnackC.php';

include '../controller/LineOfOrderC.php';


session_start();


 $name=$_SESSION['firstName'] ;


$user = null;

$menu = null;
$menuC = new LineC();
$listt = $menuC->listMovie();
$lineCC = new LineC();

$list1 = $lineCC->listLine();



$product = null;
$productC = new LinePC();
$lista = $productC->listSnack();
$lineC = new LinePC();
$list2 = $lineC->listLineS();


$db = config::getConnexion();

$total_lines = $db->query('SELECT * FROM line_of_order')->rowCount();
$total_linesP = $db->query('SELECT * FROM line_of_snack')->rowCount();
$sql = "SELECT SUM(quantity) as total FROM line_of_order ";
$result = $db->query($sql);
?>


<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<head>
	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<title>Ticketeasy - Movie HTML Template</title>
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
	<link rel="stylesheet" href="Cart/css/font-icons.css">
	<!-- plugins css -->
	<link rel="stylesheet" href="Cart/css/plugins.css">
	<!-- Main Stylesheet -->
	<link rel="stylesheet" href="Cart/css/style.css">
	<!-- Responsive css -->

	<link href="css/jquery-ui.css" rel="stylesheet">
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
	<!-- FontAwesome 4.7.0 CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

	<link rel="stylesheet preload" as="style" href="Panier/css/preload.min.css" />
	<link rel="stylesheet preload" as="style" href="Panier/css/libs.min.css" />

	<link rel="stylesheet" href="Panier/css/cart.min.css" />
	<link href="popup.css" />


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

	.dropdown-contenta a {
		color: white;
		text-decoration: none;
		display: block;
		margin: 0px;
		padding: 0px;

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

	img {
		margin: 0 !important;
		padding: 0 !important;
		max-width: 62% !important;
	}

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


	.col-md-3 {
		flex: 0 0 25%;
		max-width: 25%;
	}

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
</style>
<style>
	.container#blur.active {
		filter: blur(200px);
		pointer-events: none;
		user-select: none;
	}

	.popup {
		width: 600px;

		background: #FEF5E7;
		border-radius: 6px;
		position: absolute;
		top: 0;
		left: 50%;
		transform: translate(-50%, -50%) scale(0.1);
		text-align: center;
		padding: 0 30px 30px;
		color: #333;
		visibility: hidden;
		transition: transform 0.4s, top 0.4s;
	}

	.open-popup {
		visibility: visible;
		top: 50%;
		transform: translate(-50%, -50%) scale(1);

	}

	.popup img {
		width: 100px;
		margin-top: -50px;
		border-radius: 50px;
		box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);

	}

	.popup h2 {
		font-size: 38px;
		font-weight: 500;
		margin: 30px 0 10px;
	}

	.popup button {
		width: 50px;
		margin-top: 50px;
		padding: 10px 0;
		background: #6fd649;
		color: #fff;
		border: 0;
		outline: none;
		font-size: 18px;
		border-radius: 4px;
		cursor: pointer;
	}

	.btn {
		display: -webkit-inline-box;
		display: -ms-inline-flexbox;
		display: inline-flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		text-align: center;
		background: #dcacac;
		color: #800000;
		border-radius: 24px;
		padding: 0 25px;
		font-family: NunitoSans, sans-serif;
		font-weight: 700;
		font-size: 17px;
		height: 48px;
	}

	.btn--underline {
		color: #ff0000;
		font-family: NunitoSans, sans-serif;
		font-weight: 700;
		font-size: 17px;
		text-transform: capitalize;
		position: relative;
		padding-bottom: 5px;
	}

	.btt--underline {
		color: #ff0000;
		font-family: NunitoSans, sans-serif;
		font-weight: 700;
		font-size: 17px;
		text-transform: capitalize;
		position: relative;
		padding-bottom: 5px;
	}

	.btn--underline:after {
		content: '';
		width: 100%;
		height: 2px;
		background: #bc8686;
		position: absolute;
		bottom: 0;
		left: 0;
		-webkit-transition: width .3s ease-in-out;
		-o-transition: width .3s ease-in-out;
		transition: width .3s ease-in-out;
	}

	.btt--underline:after {
		content: '';
		width: 100%;
		height: 2px;
		background: #bc8686;
		position: absolute;
		bottom: 0;
		left: 0;
		-webkit-transition: width .3s ease-in-out;
		-o-transition: width .3s ease-in-out;
		transition: width .3s ease-in-out;
	}

	.cart_summary-table {
		font-family: NunitoSans, sans-serif;
		font-weight: 700;
		color: #bc9797;
		font-size: 17px;
		line-height: 1.3;
	}

	.cart_main-list_item .wrapper .price--total {
		color: #ff0000;
		font-size: 24px;
		line-height: 1.1;
	}

	.cart_main-list_item .wrapper .price_wrapper .title {
		color: #000;
		font-size: 14px;
		font-weight: 500;
		font-family: inherit;
		margin-bottom: 5px;
	}

	.btn--green:focus,
	.btn--green:hover {
		background: #c47179;
		color: #fff;
		-webkit-transform: none;
		-ms-transform: none;
		transform: none;
	}

	.btt--green:focus,
	.btt--green:hover {
		background: #c47179;
		color: #fff;
		-webkit-transform: none;
		-ms-transform: none;
		transform: none;
	}

	.btn:hover {
		color: #fff;
		text-decoration: none;
	}

	.btt:hover {
		color: #fff;
		text-decoration: none;
	}

	input[type="text"],
	input[type="email"],
	input[type="password"],
	input[type="submit"],
	textarea {
		background-color: #f1c3c3;
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

	.carttt {
		margin-top: 237px;
		width: 13%;
	}

	.btt {
		display: -webkit-inline-box;
		display: -ms-inline-flexbox;
		display: inline-flex;
		-webkit-box-align: center;
		-ms-flex-align: center;
		align-items: center;
		-webkit-box-pack: center;
		-ms-flex-pack: center;
		justify-content: center;
		text-align: center;
		background: #dcacac;
		color: #800000;
		border-radius: 24px;
		padding: 0 25px;
		font-family: NunitoSans, sans-serif;
		font-weight: 700;
		font-size: 20px;
		height: 48px;
	}
</style>

<body class="header-fixed2">
	<!-- Preloader -->

	<div id="wrapper">
		<div id="page" class="clearfix">

			<div class="scroll-bar">
				<nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
					<div class="container-fluid">
						<a class="navbar-brand" href="home.html"><img class="logo" src="Images/Logo/TheaterLogo.png" alt="" width="30" height="24"></a>
						<button id="nav" class="navbar-toggler" id="nav" style="background-color:#8b0000" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon" style="background-color:dark-grey;"></span>
						</button>
						<div class="collapse navbar-collapse" id="navbarNav">
							<ul class="navbar-nav me-auto mb-2 mb-lg-0">
								<li class="nav-item">
									<a class="nav-link active s" aria-current="page" href="home.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Home</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " href="movies.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Movies</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " href="Events.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Events</a>
								</li>
								<li class="nav-item">
									<a class="nav-link " onmouseover="booknow()" onmouseout="hideAlert()" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Book Now</a>
									<script>
										function booknow() {
											var alertBox = document.createElement("div");
											alertBox.id = "alert-box";
											alertBox.innerHTML = "Pick a Movie First and then click Buy Now";
											alertBox.style.backgroundColor = "red";
											alertBox.style.color = "white";
											alertBox.style.padding = "20px";
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
								<li class="nav-item">
									<a class="nav-link" href="AfficherSnack.php" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Snack</a>
								</li>
								<li class="nav-item">
									<a href="cart.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">
										<img>
									</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" href="contactus.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Contact Us</a>
								</li>
								<li>
									<!-- Genre dropdown starts-->
									<script>
										$(document).ready(function() {
											$(".dropdown-toggle").click(function() {
												$(".dropdown-menu").toggle();
											});
										});
									</script>

								</li>
								<div style="position: relative; display: inline-block; padding-top: 5px; padding-left: 15px;">
									<li>
										<button type="button" class="btn btn-light" onclick="logout()" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Logout</button>
									</li>
								</div>

								<div class="flat-button flat-button-style3">


							</ul>
						</div>


					</div>
				</nav>



			</div>
			<!-- page-title -->
			<marquee>Welcome To <i>Ticketeasy</i>.com<sup>&reg;</sup></marquee>
			<label class="online">Snack and movie, let's choose, Munch and watch, we can't lose!</label>

			<!-- page-title -->

			<!-- about-us -->
			<section>

				<div class="container-fluid cleafix" id="blur">
					<div>
						<main>

							<section class="cart section">
								<div class="container d-md-flex justify-content-between align-content-start">
									<div class="cart_main">
										<?php $total = 0;
										$total1 = 0;
										?>
										<h3 class="cart_main-header d-flex align-items-center justify-content-between">
											Your Shop List
											<span><?php //echo $qtm 
													?> Items</span>
										</h3>
										<ul class="cart_main-list">
										<?php

foreach ($list2 as $linep) {

?>

	<li class="cart_main-list_item">

		<div class="wrapper d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between">

			<?php $product = $productC->showSnack($linep['idSnack']); ?>

			<div class="wrapper_item d-flex align-items-center">

				<div class="wrapper_item-media">
					<picture>

						<img class="lazy" src="./snacks/<?php echo $product['imageSnack']; ?>" alt="media" />
					</picture>
				</div>

				<div class="wrapper_item-info">
					<h4 class="title"><?= $product['snackName']; ?></h4>

				</div>
			</div>
			<div class="price_wrapper d-flex flex-column">

				<span class="price price--new" id="priceU"><?= $product['priceSnack']; ?> DT</span>
			</div>
			<div class="price_wrapper price_wrapper--subtotal d-flex flex-column">
				<h5 class="title">Subtotal</h5>
				<span class="price price--total"><?php echo ($product['priceSnack']) * ($linep['quantity']) ?> DT</span>
			</div>
			<?php


			$total = $total + (($product['priceSnack']) * ($linep['quantity']));
			?>



			<div class="qty d-flex align-items-center justify-content-between">
				<div>
					<form method="POST" action="UpdateLineS.php">




						<button type="submit" class="decreaseVal" value="-"> <i class="icon-minus"></i></button>

						<input type="number" value="<?php echo $linep['quantity'] ?>" min="1" max="<?php echo $product['quantitySnack'] ?>" class="val" id="qt" name="qt">

						<button type="submit" value="+" class="increaseVal"> <i class="icon-plus"></i></button>
						<input type="hidden" value="<?PHP echo $linep['idLineS']; ?>" name="idLineS" id="idLineS">

					</form>
				</div>
			</div>

			<div class=" d-flex align-items-center align-items-sm-start">
				<a href="deleteLineS.php?idLineP=<?php echo $linep['idLineS']; ?>" class="icon-close "></a>
			</div>

		</div>
	</li>
<?php
}
?>

											<?php

											foreach ($list1 as $line) {

											?>

												<li class="cart_main-list_item">

													<div class="wrapper d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between">

														<?php $menu = $menuC->showMovie($line['idMovie']); ?>

														<div class="wrapper_item d-flex align-items-center">

															<div class="wrapper_item-media">
																<picture>

																	<img class="lazy" src="../view/images/<?php echo $menu['moviePoster']; ?>" alt="media" />
																</picture>
															</div>

															<div class="wrapper_item-info">
																<h4 class="title"><?= $menu['movieName']; ?></h4>

															</div>
														</div>
														<div class="price_wrapper d-flex flex-column">

															<span class="price price--new" id="priceU"><?= $menu['priceTicket']; ?> DT</span>
														</div>
														<div class="price_wrapper price_wrapper--subtotal d-flex flex-column">
															<h5 class="title">Subtotal</h5>
															<span class="price price--total"><?php echo ($menu['priceTicket']) * ($line['quantity']) ?> DT</span>
														</div>
														<?php

														//$qut=$qut+$line['quantity'];
														$total = $total + (($menu['priceTicket']) * ($line['quantity']));
														?>



														<div class="qty d-flex align-items-center justify-content-between">
															<div>

																<form method="POST" action="UpdateLine.php">




																	<button type="submit" class="decreaseVal" value="-"> <i class="icon-minus"></i></button>

																	<input type="number" value="<?php echo $line['quantity'] ?>" min="1" max="<?php echo $menu['quantityTickets'] ?>" class="val" id="qt" name="qt">

																	<button type="submit" value="+" class="increaseVal"> <i class="icon-plus"></i></button>
																	<input type="hidden" value="<?PHP echo $line['idLine']; ?>" name="idLine" id="idLine">


															</div>
														</div>
														</form>

														<div class=" d-flex align-items-center align-items-sm-start">
															<a href="DeleteLine.php?idLine=<?php echo $line['idLine']; ?>" class="icon-close "></a>
														</div>

													</div>
												</li>


											<?php
											}

											?>

											<style>
												img {
													margin: 0 !important;
													padding: 0 !important;
													max-width: 120% !important;
												}
											</style>
											<?php

											foreach ($list2 as $linep) {

											?>

												<li class="cart_main-list_item">

													<div class="wrapper d-flex flex-wrap flex-xl-nowrap align-items-center justify-content-between">

														<?php $product = $productC->showSnack($linep['idSnack']); ?>

														<div class="wrapper_item d-flex align-items-center">

															<div class="wrapper_item-media">
																<picture>

																	<img class="lazy" src="./snacks/<?php echo $product['imageSnack']; ?>" alt="media" />
																</picture>
															</div>

															<div class="wrapper_item-info">
																<h4 class="title"><?= $product['snackName']; ?></h4>

															</div>
														</div>
														<div class="price_wrapper d-flex flex-column">

															<span class="price price--new" id="priceU"><?= $product['priceSnack']; ?> DT</span>
														</div>
														<div class="price_wrapper price_wrapper--subtotal d-flex flex-column">
															<h5 class="title">Subtotal</h5>
															<span class="price price--total"><?php echo ($product['priceSnack']) * ($linep['quantity']) ?> DT</span>
														</div>
														<?php


														$total = $total + (($product['priceSnack']) * ($linep['quantity']));
														?>



														<div class="qty d-flex align-items-center justify-content-between">
															<div>
																<form method="POST" action="UpdateLineS.php">




																	<button type="submit" class="decreaseVal" value="-"> <i class="icon-minus"></i></button>

																	<input type="number" value="<?php echo $linep['quantity'] ?>" min="1" max="<?php echo $product['quantitySnack'] ?>" class="val" id="qt" name="qt">

																	<button type="submit" value="+" class="increaseVal"> <i class="icon-plus"></i></button>
																	<input type="hidden" value="<?PHP echo $linep['idLineS']; ?>" name="idLineS" id="idLineS">

																</form>
															</div>
														</div>

														<div class=" d-flex align-items-center align-items-sm-start">
															<a href="deleteLineS.php?idLineP=<?php echo $linep['idLineS']; ?>" class="icon-close "></a>
														</div>

													</div>
												</li>
											<?php
											}
											if (($total_linesP == 0)) {

											?>
												<h3 align="center">There Is Nothing In Your Basket !</h3>
											<?php

											}
											?>



										</ul>



										<div class="cart_main-action d-flex flex-column flex-sm-row align-items-center justify-content-sm-between">
											<a class="btn--underline" href="AfficherSnack.php">Keep Shopping</a>

											<a class="btn btn--green" href="#">Update cart</a>
										</div>
									</div>


									<form action="addNewOrder.php" method="POST">
										<!---->
										<div class="cart_summary">
											<h3 class="cart_summary-header">Order Summary</h3>

											<div class="cart_summary-table">
												<div class="cart_summary-table_row d-flex justify-content-between">
													<span class="property">Items <?php //echo $qut 
																					?></span>
													<span class="value"><?php echo $total ?> DT</span>
												</div>
												<div class="cart_summary-table_row d-flex justify-content-between">
													<span class="property">Shipping</span>
													<span class="value">Free</span>
												</div>

												<div class="cart_summary-table_row cart_summary-table_row--total d-flex justify-content-between">
													<span class="property">Total</span>
													<span class="value" id="priceTotal"><?php echo $total ?> DT</span>
													<input type="hidden" id="priceTotal" name="priceTotal" value="<?php echo $total ?>">
												</div>

											</div>

											<button type="button" class="cart_summary-btn btn" value="Checkout" id="button" onclick="openPopup()">Checkout</button>

											<div class="popup" id="popup">
												<img src="tick.png">
												<p>
												<h4>Your order is complete! Thank you for shopping at Ticketeasy.</h4>
												</p>
												<button type="submit" class="cart_summary-btn btn">Confirm Order</button>
												<button type="button" class="cart_summary-btn btn" onclick="closePopup()">Cancel</button>
											</div>
										</div>
									</form>
									<script>
										function openPopup() {
											document.getElementById("popup").style.display = "block";
										}

										function closePopup() {
											document.getElementById("popup").style.display = "none";
										}
									</script>



								</div>
							</section>

						</main>


					</div>
				</div>
			</section>



			<!-- footer -->
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
			<!-- footer -->
		</div><!-- Page  -->
	</div><!-- Wrapper -->

	<!-- Javascript -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/shortcodes.js"></script>
	<script src="assets/js/main.js"></script>
	<script src="assets/js/countto.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/parallax.js"></script>
	<script src="assets/js/swiper-bundle.min.js"></script>
	<script src="assets/js/swiper.js"></script>
	<script src="js/common_scripts.min.js"></script>
	<script src="js/common_func.js"></script>
	<script src="Basket/assets/validate.js"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


	<!-- SPECIFIC SCRIPTS -->
	<script src="js/sticky_sidebar.min.js"></script>
	<script>
		$('#sidebar_fixed').theiaStickySidebar({
			minWidth: 991,
			updateSidebarHeight: false,
			additionalMarginTop: 30
		});
	</script>



	<script>
		$(".decreaseVal").click(function() {
			var input_el = $(this).next('input');
			var v = input_el.val() - 1;
			if (v >= input_el.attr('min'))
				input_el.val(v)
		});


		$(".increaseVal").click(function() {
			var input_el = $(this).prev('input');
			var v = input_el.val() * 1 + 1;
			if (v <= input_el.attr('max'))
				input_el.val(v)
		});
	</script>

	<script>
		let popup = document.getElementById("popup");

		function openPopup() {
			popup.classList.add("open-popup");
			blur.classList.toggle('active');
		}

		function closePopup() {
			popup.classList.remove("open-popup");
		}

		function toggle() {
			var blur = document.getElemnetById('blur');
			blur.classList.toggle('active');

		}
		submitForms = function() {
			document.getElementById("form1").submit();
			document.getElementById("form2").submit();
		}
	</script>








</body>

</html>