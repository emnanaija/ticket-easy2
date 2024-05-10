<?php
session_start();
/*

if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
	header('location:../Views/login.php');
}

    
    $email = $_SESSION['mail'];

    
   
    $role = $_SESSION['role'];

*/

$name = /*$_SESSION['name']*/ 'erij';
$total = 0;





include '../controller/movieC.php';

$movieC = new movieC();
$list = $movieC->listMovie();
$lineC = new movieC();
$list1 = $lineC->listLine();

$product = null;
$productC = new movieC();
//$lista = $productC->listPr();
$lineC = new movieC();
$list2 = $lineC->listLineP();

$db = config::getConnexion();

//$query = "SELECT * /*DISTINCT(category) */FROM menu where quantityMenu > 0 ORDER BY idMenu DESC";
$statement = $db->prepare($query);
$statement->execute();
$result = $statement->fetchAll();

$total_lines = $db->query('SELECT * FROM line_of_order')->rowCount();
//$total_linesP = $db->query('SELECT * FROM line_of_product')->rowCount();
$tot = $total_lines + $total_linesP










// echo ($name);






















?>





<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie" xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en-US" lang="en-US"><!--<![endif]-->

<head>
	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
	<title>Kababi - Restaurant HTML Template</title>

	<meta name="author" content="themesflat.com" />

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<!-- Theme Style -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet preload" as="style" href="Panier/css/preload.min.css" />
	<link rel="stylesheet preload" as="style" href="Panier/css/libs.min.css" />

	<link rel="stylesheet" href="Panier/css/cart.min.css" />

	<link href="css/jquery-ui.css" rel="stylesheet">

</head>

<body class="counter-scroll  header-fixed2">
	<!-- Preloader -->
	<div id="loading-overlay">
		<div class="loader"></div>
	</div>
	<div id="wrapper">
		<div id="page" class="clearfix">
			<div id="top-bar" class="top-bar-inner-page">
				<div class="top-bar-content">
					<p>Welcome to Bonsai where food is 大丈夫</p>
				</div>
			</div>
			<header id="site-header" class="site-header-inner-page">
				<div id="site-header-inner" class="container-fluid">
					<div class="wrap-inner flex">
						<div id="site-logo" class="cleafix">
							<a href="../../../../customer.php" class="logo">
								<img src="assets/img/logo/logo.png" alt="">
							</a>
						</div>
						<div class="mobile-button">
							<span></span>
						</div><!-- /.mobile-button -->
						<nav id="main-nav" class="main-nav">
							<ul id="menu-primary-menu" class="menu">
								<li class="menu-item ">
									<a href="../../../../customer.php">Home</a>

								</li>
								<li class="menu-item ">
									<a href="AfficherMenu.php">Menu</a>
								</li>
								<li class="menu-item ">
									<a href="">Reservation</a>

								</li>
								<li class="menu-item ">
									<a href="AfficherProduct.php">Products</a>

								</li>
								<li class="menu-item ">
									<a href="../../../../about.php">About</a>
								</li>
							</ul>
						</nav>

						<div class="flat-button flat-button-style3">
							<div class="mini-cart-icon">
								<a href="" class="tf-button color-text color-style1">Hello, <strong> <?php echo ($name);  ?></a>
								<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>
								<a href="#ltn__utilize-cart-menu" class="header_user-action d-inline-flex align-items-center justify-content-center ltn__utilize-toggle aziz ">
									<i class="icon-basket "></i>
									<sup><?php echo $tot ?></sup>
								</a>
							</div>

						</div>
					</div>
			</header>


			<!-- page-title -->
			<section class="page-title page-title-inner">
				<div class="overlay-pagetitle"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="page-title-heading">
							<h2 class="heading">Menu Pages</h2>
						</div>
						<div class="breadcrumbs">
							<ul>
								<li><a href="index.html">Home</a></li>
								<li>Our Menu</li>
							</ul>
						</div>
					</div>
				</div>
			</section>
			<!-- page-title -->
			<!--bditt min houni-->
			<!-- flat-tabs -->
			<section class="tf-section menu-product">

				<div class="container-fluid">
					<div class="row">
						<div class="flat-tabs flat-tabs-menu">

							<div class="col-md-2">
								<div class="list-group">
									<h3>Categories</h3>
									<div style="height: 300px; overflow-y: auto; overflow-x: hidden; color: #cc8800">
										<?php

										foreach ($result as $row) {
										?>

											<div class="list-group-item checkbox" style="color: #cc8800">
												<label><input type="checkbox" class="common_selector category" value="<?php echo $row['category']; ?>"> <?php echo $row['category']; ?></label>
											</div>

										<?php
										}

										?>
									</div>
								</div>

							</div>
						</div>
						<!-- <ul class="menu-tab">
                                <li class="active">
                                    <a href="#">Soupe</a>
                                </li>
                                <li>
                                    <a href="#">Sushi</a>
                                </li >
                                <li>
                                    <a href="#">Ramen</a>
                                </li>
                                <li>
                                    <a href="#">Onigiri</a>
                                </li>
                                <li>
                                    <a href="#">Takoyaki</a>
                                </li>
                            </ul>-->
						<div class="content-tab">

							<div class="content-inner">

								<div class="col-tab flex">

									<div class="col-box col-55">

										<div class="col-md-13">
											<br />



											<?php


											foreach ($list as $menu) {
											?>
												<div class="our-menu-box">
													<div class="row filter_data">
														<div class="our-menu-item-style3 style2 flex active">
															<div class="image">
																<img class="image-inner" src="../Back/uploads/<?php echo $menu['imageUpload']; ?>" alt="images">

															</div>
															<div class="content-menu-item">


																<h4 class="heading"><?php echo $menu['menuName']; ?></h4>
																<div class="sub-heading">ingredients: <?php echo $menu['ingredient']; ?></div>

																<a style="font-size:5px" href="addLine.php?idMenu=<?php echo $menu['idMenu']; ?>"><i class="cart_summary-btn btn" class="fa fa-shopping-cart">Add To Cart </i></a>
															</div>

															<div class="pricing"><?php echo $menu['priceMenu']; ?>DT</p>
																<div class="rotate">
																	<?php echo $menu['menuPrice']; ?>
																</div>
															</div>

														</div>



													<?php
												}

													?>
													</div>

												</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
			</section>


			<!--wssilt houni-->




			<!-- flat-tabs -->

			<section class="tf-section counter-chefs-about">
				<div class="overlay-inner"></div>
				<div class="container-fluid">
					<div class="row">
						<div class="wrap-counter wow fadeInUp animated" data-wow-delay="0.3ms" data-wow-duration="1500ms">
							<div class="col-box col-25">
								<div class="box box-countter-chefs text-center padding-right-121">
									<div class="wrap-icon">
										<i class="flaticon-chef"></i>
									</div>
									<div class="countter-box margin-top-3">
										<h6 class="heading">Professional Chefs</h6>
										<span class="number" data-from="0" data-to="309" data-speed="2500" data-inviewport="yes">309</span>
									</div>
								</div>
							</div>
							<div class="col-box col-25">
								<div class="box box-countter-chefs text-center padding-right-73">
									<div class="wrap-icon">
										<i class="flaticon-fast-food"></i>
									</div>
									<div class="countter-box">
										<h6 class="heading">Items Of Foods</h6>
										<span class="number" data-from="0" data-to="453" data-speed="2500" data-inviewport="yes">453</span>
									</div>
								</div>
							</div>
							<div class="col-box col-25">
								<div class="box box-countter-chefs text-center padding-right-5">
									<div class="wrap-icon">
										<i class="flaticon-fork"></i>
									</div>
									<div class="countter-box">
										<h6 class="heading">Years Of Experience</h6>
										<span class="number" data-from="0" data-to="64" data-speed="2500" data-inviewport="yes">64</span><span class="sub-number">+</span>
									</div>
								</div>
							</div>
							<div class="col-box col-25 no-pd-right">
								<div class="box box-countter-chefs text-center padding-left-106">
									<div class="wrap-icon">
										<i class="flaticon-pizza-1"></i>
									</div>
									<div class="countter-box">
										<h6 class="heading">Saticfied Customers</h6>
										<span class="number" data-from="0" data-to="302" data-speed="2500" data-inviewport="yes">302</span>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>

			<!-- Gallery -->

			<!-- Gallery -->

			<!--image brand  -->

			<!--image brand  -->

			<!-- footer -->
			<footer id="footer" class="footer-style03">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12">
							<div class="newsletters-subscribe flex">
								<h4 class="title">
									Newsletters Subscribe
								</h4>
								<div class="wrap-form-subscibe">
									<form action="#" id="subscribe-form" class="form-subscribe-footer2">
										<div id="subscribe-content" class="footer_input-footer">
											<input type="Email" id="subscribe-email" class="tb-my-input" placeholder="Enter Email Address" required>
											<button type="submit" id="subscribe-button" class="tf-button color-text color-style1">
												subscribe now
											</button>
										</div>
									</form>
								</div>
							</div>
						</div>
						<div class="col-md-5">
							<div class="widget widget-infor widget-footer">
								<div id="site-logo3" class="cleafix">
									<a href="index.html" class="logo">
										<img src="assets/img/logo/logo.svg" alt="">
									</a>
								</div>
								<p class="sub-heading-style2">Bonsai is a fancy farm to table focused restaurant located pricesly in Plage ، Sidi Dhrif ,Avenue Habib Bourguiba La Marsa, Carthage. Buying directly from small farmers and producers around Tunis. Bonsai utilizes the best vegetables, meat, fish, and grains at the height of their season. </p>
								<ul class="widget_socials">
									<li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
									<li><a href="#"><i class="fab fa-twitter"></i></a></li>
									<li><a href="#"><i class="fab fa-youtube"></i></a></li>
									<li><a href="#"><i class="fab fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget widget-link widget-about widget-footer ">
								<h4 class="widget-title">About</h4>
								<ul class="widget-list">
									<li><a href="#">Home</a></li>
									<li><a href="about.html">Our Story</a></li>
									<li><a href="#">The Setting</a></li>
									<li><a href="#">The Suites</a></li>
									<li><a href="our-menu.html">Food Lists</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-2">
							<div class="widget widget-link widget-Facilities widget-footer">
								<h4 class="widget-title">Facilities</h4>
								<ul class="widget-list">
									<li><a href="#">The Fontus Spa</a></li>
									<li><a href="#">Experiences</a></li>
									<li><a href="#">Private Functions</a></li>
									<li><a href="#">Gallery, Events</a></li>
									<li><a href="#">Special Offers</a></li>
								</ul>
							</div>
						</div>
						<div class="col-md-3">
							<div class="widget widget-link widget-contact widget-footer">
								<h4 class="widget-title">Contact</h4>
								<ul class="widget-list">
									<li class="adress margin-right-15">56 Main Street, Marsa,
										1st Floor, Carthage</li>
									<li class="mail">Bonsai@gmail.com</li>
									<li class="phone">+216 53 827 200</li>
									<li class="clock">08 am - 11 pm</li>
								</ul>
							</div>
						</div>
						<!-- scroll-top -->
						<div class="col-md-12">
							<div class="wrap-scroll wow fadeInUp animated" data-wow-delay="0.3ms" data-wow-duration="1000ms">
								<a id="scroll-top">
									<img src="assets/img/footer/iconup@2x.png" alt="images">
								</a>
							</div>
						</div>
						<!-- scroll-top -->
						<div class="col-md-12">
							<div id="bottom" class="tf-bottom-inner bottomstyle3">
								<div class="Copyright">
									<p>Copyright © 2022 Bonsai<a href="https://themeforest.net/user/themesflat/portfolio"></a></p>
								</div>
								<div class="sub-heading-style2">
									<ul>
										<li><a href="about.html">Setting & Privecy</a><span>,</span></li>
										<li><a href="about.html">Faqs</a><span>,</span></li>
										<li><a href="our-menu.html">Food Menu</a><span></span></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</footer>
			<!-- footer -->
		</div><!-- Page  -->
	</div><!-- Wrapper -->
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
	<script src="assets/js/countto.js"></script>
	<script src="assets/js/jquery.magnific-popup.min.js"></script>
	<script src="assets/js/jquery-validate.js"></script>
	<script src="assets/js/wow.min.js"></script>
	<script src="assets/js/parallax.js"></script>
	<script src="assets/js/swiper-bundle.min.js"></script>
	<script src="assets/js/swiper.js"></script>
	<script src="jquery-1.10.2.min.js"></script>
	<script src="jquery-ui.js"></script>
	<script href="bootstrap.min.js"></script>
	<style>
		#loading {
			text-align: center;
			background: url('images/loading.gif') no-repeat center;
			height: 150px;
		}
	</style>



	<script>
		$(document).ready(function() {

			filter_data();

			function filter_data() {
				$('.filter_data').html('<div id="loading" style="" ></div>');
				var action = 'fetch_data';

				var category = get_filter('category');

				$.ajax({
					url: "fetch_data.php",
					method: "POST",
					data: {
						action: action,
						category: category
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

	<script src="Cart/js/plugins.js"></script>
	<!-- Main JS -->
	<script src="Cart/js/main.js"></script>


	<div id="ltn__utilize-cart-menu" class="ltn__utilize ltn__utilize-cart-menu">
		<div class="ltn__utilize-menu-inner ltn__scrollbar">
			<div class="ltn__utilize-menu-head">
				<span class="ltn__utilize-menu-title">Cart カート</span>
				<button class="ltn__utilize-close">×</button>
			</div>

			<div class="mini-cart-product-area ltn__scrollbar">

				<?php
				// $total=0;			
				foreach ($list1 as $line) {

				?>
					<?php $menu = $movieC->showMovie($line['idMenu']); ?>
					<div class="mini-cart-item clearfix">

						<div class="mini-cart-img">
							<a href="#"><img src="../Back/uploads/<?php echo $menu['imageUpload']; ?>"></a>
							<span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
						</div>
						<div class="mini-cart-info">
							<h6><a href="#"><?= $menu['menuName']; ?></a></h6>
							<span class="mini-cart-quantity"><?php echo $line['quantity'] ?> x <?= $menu['priceMenu']; ?> DT</span>
							<?php ($menu['priceMenu']) * ($line['quantity']);

							$total = $total + (($menu['priceMenu']) * ($line['quantity'])); ?>
						</div>
					</div>

				<?php
				}

				?>

			</div>
			<div class="mini-cart-product-area ltn__scrollbar">
				<?php

				foreach ($list2 as $linep) {

				?>
					<?php $product = $productC->showSnack($linep['idProduct']); ?>
					<div class="mini-cart-item clearfix">
						<div class="mini-cart-img">
							<a href="#"><img src="../Back/uploads/<?php echo $product['imageProd']; ?>" alt="Image"></a>
							<span class="mini-cart-item-delete"><i class="icon-cancel"></i></span>
						</div>
						<div class="mini-cart-info">
							<h6><a href="#"><?= $product['productName']; ?></a></h6>
							<span class="mini-cart-quantity"><?php echo $linep['quantity'] ?> x <?= $product['priceProd']; ?> DT</span>
							<?php ($product['priceProd']) * ($linep['quantity']);
							$total = $total + (($product['priceProd']) * ($linep['quantity'])); ?>
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

</body>

</html>