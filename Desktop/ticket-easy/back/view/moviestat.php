<?php
include '..\controller\movieC.php';

session_start();
/*
if(!isset( $_SESSION['mail'], $_SESSION['name'],$_SESSION['role'] )){
	header('location:Views/login.php');
}

    
    $email = $_SESSION['mail'];
    $name = $_SESSION['name'];
    
   
    $role = $_SESSION['role'];




*/

$name ='yosser';

$productC = new movieC();
$list = $productC->listmovie();
$qt=0;
$total_lines=0;
/*foreach($list as $l){
$qt=$qt+$l['quantitymovie'];

}*/
$db = config::getConnexion();
$total_lines=$db->query('SELECT * FROM movie')->rowCount();
?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Davur - Restaurant Food Order Bootstrap Admin Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/titlee.png">
    <link href="./vendor/jqvmap/css/jqvmap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="./vendor/chartist/css/chartist.min.css">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <style>
     
      .chartCard {
        width: 100vw;
        height: calc(100vh - 40px);
     
        display: flex;
        align-items: center;
        justify-content: center;
      }
      .chartBox {
        width: 80%;
        padding: 20px;
        border-radius: 20px;
        
        background: white;
      }
    </style>
</head>
<style>
	body {
		margin: 0;
		font-family: "Roboto", sans-serif;
		font-size: 0.875rem;
		font-weight: 400;
		line-height: 1.5;

		text-align: left;
		background-color: #fbfbfb;
	}

	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.h1,
	.h2,
	.h3,
	.h4,
	.h5,
	.h6 {
		margin-bottom: 0.5rem;
		font-weight: 500;
		line-height: 1.2;
		color: #800000 !important;
	}

	.footer .copyright a {
		color: #ff0000;
	}

	[data-sidebar-style="mini"][data-layout="vertical"] .deznav .metismenu>li.mm-active>a {
		background: #800000;
		color: #fff;
		border-radius: 12px;
	}

	.light.btn-primary {
		background-color: #fce8e3;
		border-color: #fce8e3;
		color: #ff0000;
	}

	.light.btn-primary:hover {
		background-color: #800000;
		border-color: #fff;
		color: #fff;
	}

	.btn-primary {
		color: #fff;
		background-color: #ff0000;
		border-color: #800000;
	}

	.btn-primary:not(:disabled):not(.disabled):active,
	.btn-primary:not(:disabled):not(.disabled).active,
	.show>.btn-primary.dropdown-toggle {
		color: #fff;
		background-color: #ff0000;
		border-color: #fff;
	}

	/*a {
    color: #ff0000;
    text-decoration: none;
    background-color: transparent;
}*/
	a:hover {
		color: #800000;
		text-decoration: underline;
	}

	.light.btn-primary {
		background-color: #fce8e3;
		border-color: #fce8e3;
		color: #ff0000;
	}


	.dropdown-item.active,
	.dropdown-item:active {
		color: #fff;
		text-decoration: none;
		background-color: #fce8e3;
	}

	.btn-primary:hover {
		color: #fff;
		background-color: #800000;
		border-color: #fff;
	}

	.btn-primary {
		color: #fff;
		background-color: #ff0000;
		border-color: #fff;
	}

	/*a {
    color: #fce8e3;
    text-decoration: none;
    background-color: transparent;
}*/
	.dropdown-item:focus,
	.dropdown-item:hover {
		background-color: #fce8e3;
		color: #ff0000;

	}

	[data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .deznav .metismenu>li:hover>a {
		border-radius: 0.375rem;
		background: #800000;
		color: #fff;
	}

	[data-sidebar-style="mini"][data-layout="vertical"] .deznav .metismenu>li.mm-active>a {
		background: #800000;
		color: #fff;
		border-radius: 12px;
	}

	[data-sidebar-style="full"][data-layout="vertical"] .deznav .metismenu>li.mm-active>a i {
		color: #800000;
	}

	[data-sidebar-style="full"][data-layout="vertical"] .deznav .metismenu>li.mm-active>a {
		background: #f4f6fd;
		color: #ff0000;
	}

	.deznav .metismenu ul a:hover,
	.deznav .metismenu ul a:focus,
	.deznav .metismenu ul a.mm-active {
		text-decoration: none;
		color: #ff0000;
	}

	[data-sidebar-style="full"][data-layout="vertical"] .deznav .metismenu>li>a:before {
		content: "";
		height: 100%;
		width: 0;
		position: absolute;
		left: 0;
		top: 0;
		background: #800000;
		-webkit-transition: all 0.5s;
		-ms-transition: all 0.5s;
		transition: all 0.5s;
		border-radius: 0 0.375rem 0.375rem 0;
	}

	[data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .deznav .metismenu>li.mm-active>a {
		background: #800000;
		border-radius: 0.375rem;
		color: #fff;
	}

	[data-sidebar-style="full"][data-layout="vertical"] .menu-toggle .nav-header .nav-control .hamburger .line {
		background-color: #ff0000 !important;
	}

	[data-headerbg="color_1"] .nav-header .hamburger.is-active .line,
	[data-headerbg="color_1"] .nav-header .hamburger .line {
		background: #ff0000 !important;
	}

	h1,
	h2,
	h3,
	h4,
	h5,
	h6,
	.h1,
	.h2,
	.h3,
	.h4,
	.h5,
	.h6 {
		margin-bottom: 0.5rem;
		font-weight: 500;
		line-height: 1.2;
		color: #800000 !important;
	}

	.dataTables_wrapper .dataTables_paginate .paginate_button.previous:hover,
	.dataTables_wrapper .dataTables_paginate .paginate_button.next:hover {
		background: #ff0000;
		color: #fff !important;
	}

	button,
	[type="button"],
	[type="reset"],
	[type="submit"] {
		/*-webkit-appearance: button;*/
		color: #fff;
		background-color: #ff0000;
		border-color: #fff;
		padding: 0.938rem 1.5rem;
		border-radius: 0.375rem;
		font-weight: 500;
		font-size: 1rem;
	}

	button,
	[type="button"],
	[type="reset"],
	[type="submit"]:hover {
		color: #fff;
		background-color: #800000;
		border-color: #fff;
	}

	.btn-primary {
		color: #fff;
		background-color: #ff0000;
		border-color: #fff;
	}

	.header-right .header-profile>a.nav-link {
		padding: 0 0 0 20px;
		display: flex;
		align-items: center;
		background: #ff0000;
		border-radius: 0.375rem 28px 28px 0.375rem;
	}

	.page-titles .breadcrumb li a {
		color: #ff0000;
	}
</style>

<body>

    <!--*******************
        Preloader start
    ********************-->
    <div id="preloader">
        <div class="sk-three-bounce">
            <div class="sk-child sk-bounce1"></div>
            <div class="sk-child sk-bounce2"></div>
            <div class="sk-child sk-bounce3"></div>
        </div>
    </div>
    <!--*******************
        Preloader end
    ********************-->

    <!--**********************************
        Main wrapper start
    ***********************************-->
    <div id="main-wrapper">

        <!--**********************************
            Nav header start
        ***********************************-->
        <div class="nav-header">
		<a href="../../../xhtml/admin.php" class="brand-logo">
				<img class="logo-abbr" src="./images/titlee.png" alt="">
				<img class="logo-compact" src="./images/tickete.png" width="450px" height="200px" alt="">
				<img class="brand-title" src="./images/tickete.png" width="450px" height="200px" alt="">
			</a>

            <div class="nav-control">
                <div class="hamburger">
                    <span class="line"></span><span class="line"></span><span class="line"></span>
                </div>
            </div>
        </div>
        <!--**********************************
            Header start
        ***********************************-->
        <div class="header">
            <div class="header-content">
                <nav class="navbar navbar-expand">
                    <div class="collapse navbar-collapse justify-content-between">
                        <div class="header-left">
                            <div class="search_bar dropdown show">
                                <div class="dropdown-menu p-0 m-0 show">
                                    <form>
                                        <input class="form-control" type="search" placeholder="Search Here" aria-label="Search">
                                    </form>
                                </div>
								<span class="search_icon p-3 c-pointer" data-toggle="dropdown">
                                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M23.7871 22.7761L17.9548 16.9437C19.5193 15.145 20.4665 12.7982 20.4665 10.2333C20.4665 4.58714 15.8741 0 10.2333 0C4.58714 0 0 4.59246 0 10.2333C0 15.8741 4.59246 20.4665 10.2333 20.4665C12.7982 20.4665 15.145 19.5193 16.9437 17.9548L22.7761 23.7871C22.9144 23.9255 23.1007 24 23.2816 24C23.4625 24 23.6488 23.9308 23.7871 23.7871C24.0639 23.5104 24.0639 23.0528 23.7871 22.7761ZM1.43149 10.2333C1.43149 5.38004 5.38004 1.43681 10.2279 1.43681C15.0812 1.43681 19.0244 5.38537 19.0244 10.2333C19.0244 15.0812 15.0812 19.035 10.2279 19.035C5.38004 19.035 1.43149 15.0865 1.43149 10.2333Z" fill="#A4A4A4"/></svg>
                                </span>
                            </div>
                        </div>

                        <ul class="navbar-nav header-right">
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link dz-fullscreen primary" href="#">
									<svg id="Capa_1" enable-background="new 0 0 482.239 482.239" height="22" viewBox="0 0 482.239 482.239" width="22" xmlns="http://www.w3.org/2000/svg"><path d="m0 17.223v120.56h34.446v-103.337h103.337v-34.446h-120.56c-9.52 0-17.223 7.703-17.223 17.223z" fill=""/><path d="m465.016 0h-120.56v34.446h103.337v103.337h34.446v-120.56c0-9.52-7.703-17.223-17.223-17.223z" fill=""/><path d="m447.793 447.793h-103.337v34.446h120.56c9.52 0 17.223-7.703 17.223-17.223v-120.56h-34.446z" fill="" /><path d="m34.446 344.456h-34.446v120.56c0 9.52 7.703 17.223 17.223 17.223h120.56v-34.446h-103.337z" fill=""/></svg>
                                </a>
							</li>
							<li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link bell bell-link primary" href="#">
                                    <svg width="24" height="24" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M20.4604 0.848846H3.31682C2.64742 0.849582 2.00565 1.11583 1.53231 1.58916C1.05897 2.0625 0.792727 2.70427 0.791992 3.37367V15.1562C0.792727 15.8256 1.05897 16.4674 1.53231 16.9407C2.00565 17.414 2.64742 17.6803 3.31682 17.681C3.53999 17.6812 3.75398 17.7699 3.91178 17.9277C4.06958 18.0855 4.15829 18.2995 4.15843 18.5226V20.3168C4.15843 20.6214 4.24112 20.9204 4.39768 21.1817C4.55423 21.4431 4.77879 21.6571 5.04741 21.8008C5.31602 21.9446 5.61861 22.0127 5.92292 21.998C6.22723 21.9833 6.52183 21.8863 6.77533 21.7173L12.6173 17.8224C12.7554 17.7299 12.9179 17.6807 13.0841 17.681H17.187C17.7383 17.68 18.2742 17.4993 18.7136 17.1664C19.1531 16.8334 19.472 16.3664 19.6222 15.8359L22.8965 4.05007C22.9998 3.67478 23.0152 3.28071 22.9413 2.89853C22.8674 2.51634 22.7064 2.15636 22.4707 1.8466C22.2349 1.53684 21.9309 1.28565 21.5822 1.1126C21.2336 0.93954 20.8497 0.849282 20.4604 0.848846ZM21.2732 3.60301L18.0005 15.3847C17.9499 15.5614 17.8432 15.7168 17.6964 15.8274C17.5496 15.938 17.3708 15.9979 17.187 15.9978H13.0841C12.5855 15.9972 12.098 16.1448 11.6836 16.4219L5.84165 20.3168V18.5226C5.84091 17.8532 5.57467 17.2115 5.10133 16.7381C4.62799 16.2648 3.98622 15.9985 3.31682 15.9978C3.09365 15.9977 2.87966 15.909 2.72186 15.7512C2.56406 15.5934 2.47534 15.3794 2.47521 15.1562V3.37367C2.47534 3.15051 2.56406 2.93652 2.72186 2.77871C2.87966 2.62091 3.09365 2.5322 3.31682 2.53206H20.4604C20.5905 2.53239 20.7187 2.56274 20.8352 2.62073C20.9516 2.67872 21.0531 2.7628 21.1318 2.86643C21.2104 2.97005 21.2641 3.09042 21.2886 3.21818C21.3132 3.34594 21.3079 3.47763 21.2732 3.60301Z" fill="#000"/><path d="M5.84161 8.42333H10.0497C10.2729 8.42333 10.4869 8.33466 10.6448 8.17683C10.8026 8.019 10.8913 7.80493 10.8913 7.58172C10.8913 7.35851 10.8026 7.14445 10.6448 6.98661C10.4869 6.82878 10.2729 6.74011 10.0497 6.74011H5.84161C5.6184 6.74011 5.40433 6.82878 5.2465 6.98661C5.08867 7.14445 5 7.35851 5 7.58172C5 7.80493 5.08867 8.019 5.2465 8.17683C5.40433 8.33466 5.6184 8.42333 5.84161 8.42333Z" fill="#000"/><path d="M13.4161 10.1066H5.84161C5.6184 10.1066 5.40433 10.1952 5.2465 10.3531C5.08867 10.5109 5 10.725 5 10.9482C5 11.1714 5.08867 11.3854 5.2465 11.5433C5.40433 11.7011 5.6184 11.7898 5.84161 11.7898H13.4161C13.6393 11.7898 13.8534 11.7011 14.0112 11.5433C14.169 11.3854 14.2577 11.1714 14.2577 10.9482C14.2577 10.725 14.169 10.5109 14.0112 10.3531C13.8534 10.1952 13.6393 10.1066 13.4161 10.1066Z" fill="#000"/></svg>
                                </a>
							</li>
                            <li class="nav-item dropdown notification_dropdown">
                                <a class="nav-link  ai-icon warning" href="#" role="button" data-toggle="dropdown">
                                    <svg width="24" height="24" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M21.75 14.8385V12.0463C21.7471 9.88552 20.9385 7.80353 19.4821 6.20735C18.0258 4.61116 16.0264 3.61555 13.875 3.41516V1.625C13.875 1.39294 13.7828 1.17038 13.6187 1.00628C13.4546 0.842187 13.2321 0.75 13 0.75C12.7679 0.75 12.5454 0.842187 12.3813 1.00628C12.2172 1.17038 12.125 1.39294 12.125 1.625V3.41534C9.97361 3.61572 7.97429 4.61131 6.51794 6.20746C5.06159 7.80361 4.25291 9.88555 4.25 12.0463V14.8383C3.26257 15.0412 2.37529 15.5784 1.73774 16.3593C1.10019 17.1401 0.751339 18.1169 0.75 19.125C0.750764 19.821 1.02757 20.4882 1.51969 20.9803C2.01181 21.4724 2.67904 21.7492 3.375 21.75H8.71346C8.91521 22.738 9.45205 23.6259 10.2331 24.2636C11.0142 24.9013 11.9916 25.2497 13 25.2497C14.0084 25.2497 14.9858 24.9013 15.7669 24.2636C16.548 23.6259 17.0848 22.738 17.2865 21.75H22.625C23.321 21.7492 23.9882 21.4724 24.4803 20.9803C24.9724 20.4882 25.2492 19.821 25.25 19.125C25.2486 18.117 24.8998 17.1402 24.2622 16.3594C23.6247 15.5786 22.7374 15.0414 21.75 14.8385ZM6 12.0463C6.00232 10.2113 6.73226 8.45223 8.02974 7.15474C9.32723 5.85726 11.0863 5.12732 12.9212 5.125H13.0788C14.9137 5.12732 16.6728 5.85726 17.9703 7.15474C19.2677 8.45223 19.9977 10.2113 20 12.0463V14.75H6V12.0463ZM13 23.5C12.4589 23.4983 11.9316 23.3292 11.4905 23.0159C11.0493 22.7026 10.716 22.2604 10.5363 21.75H15.4637C15.284 22.2604 14.9507 22.7026 14.5095 23.0159C14.0684 23.3292 13.5411 23.4983 13 23.5ZM22.625 20H3.375C3.14298 19.9999 2.9205 19.9076 2.75644 19.7436C2.59237 19.5795 2.50014 19.357 2.5 19.125C2.50076 18.429 2.77757 17.7618 3.26969 17.2697C3.76181 16.7776 4.42904 16.5008 5.125 16.5H20.875C21.571 16.5008 22.2382 16.7776 22.7303 17.2697C23.2224 17.7618 23.4992 18.429 23.5 19.125C23.4999 19.357 23.4076 19.5795 23.2436 19.7436C23.0795 19.9076 22.857 19.9999 22.625 20Z" fill="#000"/></svg>
                                    <div class="pulse-css"></div>
                                </a>
                            
                            </li>
                            <li class="nav-item dropdown header-profile">
                                <a class="nav-link" href="#" role="button" data-toggle="dropdown">
									<div class="header-info">
										<span>Hello, <strong><?php echo $name;  ?></strong></span>
									</div>
                                    <img src="./images/yosser.png" width="20" alt=""/>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a href="../../../../xhtml/app-profile.php" class="dropdown-item ai-icon">
                                        <svg id="icon-user1" xmlns="http://www.w3.org/2000/svg" class="text-primary" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path><circle cx="12" cy="7" r="4"></circle></svg>
                                        <span class="ml-2">Profile </span>
                                    </a>
                                    <!-- <a href="#" class="dropdown-item ai-icon">
                                        <svg id="icon-inbox" xmlns="http://www.w3.org/2000/svg" class="text-success" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg>
                                        <span class="ml-2">Inbox </span>
                                    </a> -->
                                    <a href="../../../../Views/logout.php" class="dropdown-item ai-icon">
                                        <svg id="icon-logout" xmlns="http://www.w3.org/2000/svg" class="text-danger" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"></path><polyline points="16 17 21 12 16 7"></polyline><line x1="21" y1="12" x2="9" y2="12"></line></svg>
                                        <span class="ml-2">Logout </span>
                                    </a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
        <!--**********************************
            Header end ti-comment-alt
        ***********************************-->

        <!--**********************************
            Sidebar start
        ***********************************-->
		<div class="deznav">
            <div class="deznav-scroll">
			<ul class="metismenu" id="menu">
                 
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-networking"></i>
							<span class="nav-text">client<br> </span>
						</a>
                        <ul aria-expanded="false">
							<li><a href="Listclients.php">List Of clients</a></li>
                            <li><a href="banClients.php">List of banned clients</a></li>
                           
                            
							
						</ul>
                    </li>
                <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Orders</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="ListOrders.php">List Of Orders</a></li>
                            <li><a href="afficherlineoforder.php">Line Of Order</a></li>
                            <li><a href="OrderStats.php">Orders stats</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Categories</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="affichermoviecategory.php">List Of Categories</a></li>


                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-television"></i>
                            <span class="nav-text">Movies</span>
                        </a>
                        <ul aria-expanded="false">

                            <li><a href="affichermovie.php">List Of Movies</a></li>
                            <li><a href="moviestat.php">Movies Stat</a></li>


                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-television"></i>
                            <span class="nav-text">Snacks</span>
                        </a>
                        <ul aria-expanded="false">

                            <li><a href="affichersnack.php">List Of Snacks</a></li>
                            <li><a href="statistiquesnack.php">Snacks Stats</a></li>

                        </ul>
                    </li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Snacks Categories</span>
						</a>
						<ul aria-expanded="false">

							<li><a href="affichersnackcategorie.php">List Of Snacks Categories</a></li>

						</ul>
					</li>
                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-networking"></i>
                            <span class="nav-text">Reclamations & <br> Reponses</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="listReclamation.php">List Of Reclamations</a></li>
                            <li><a href="listReponse.php">List Reponses</a></li>
                            <li><a href="addReclamation.php">Add Reclamation</a></li>


                        </ul>
                    </li>


                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
                            <i class="flaticon-381-television"></i>
                            <span class="nav-text">Payments</span>
                        </a>
                        <ul aria-expanded="false">

                            <li><a href="afficherpayment.php">List Of Payments</a></li>

                        </ul>
                    </li>

                    <li><a class="has-arrow ai-icon" href="javascript:void()" aria-expanded="false">
							<i class="flaticon-381-television"></i>
							<span class="nav-text">Events</span>
						</a>
						<ul aria-expanded="false">

							<li><a href="afficherevent.php">List Of Events</a></li>
							<li><a href="affichercategoryE.php">List Of Events Categories</a></li>

						</ul>
					</li>



                </ul>
            
				
				
			</div>
        </div>
        <!--**********************************
            Sidebar end
        ***********************************-->
		
		<!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">
            <!-- row -->
			<div class="container-fluid">
				<div class="form-head d-flex mb-3 align-items-start">
					<div class="mr-auto d-none d-lg-block">
						<h2 class="text-black font-w600 mb-0">Dashboard</h2>
						<p class="mb-0">Welcome to Ticketeasy Admin!</p>
					</div>
					
					
				</div>
                <div class="row">
					<div class="col-xl-3 col-xxl-3 col-lg-6 col-md-6 col-sm-6">
						<div class="widget-stat card">
							<div class="card-body p-4">
								<div class="media ai-icon">
									<span class="mr-3 bgl-primary text-primary">
										<!-- <i class="ti-user"></i> -->
										<svg width="36" height="28" viewBox="0 0 36 28" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M31.75 6.75H30.0064L30.2189 4.62238C30.2709 4.10111 30.2131 3.57473 30.0493 3.07716C29.8854 2.57959 29.6192 2.12186 29.2676 1.73348C28.9161 1.3451 28.4871 1.03468 28.0082 0.822231C27.5294 0.609781 27.0114 0.500013 26.4875 0.5H7.0125C6.48854 0.500041 5.9704 0.609864 5.49148 0.822391C5.01256 1.03492 4.58348 1.34543 4.23189 1.73392C3.88031 2.12241 3.61403 2.58026 3.45021 3.07795C3.28639 3.57564 3.22866 4.10214 3.28075 4.6235L5.2815 24.6224C5.31508 24.9222 5.38467 25.2168 5.48875 25.5H1.75C1.41848 25.5 1.10054 25.6317 0.866116 25.8661C0.631696 26.1005 0.5 26.4185 0.5 26.75C0.5 27.0815 0.631696 27.3995 0.866116 27.6339C1.10054 27.8683 1.41848 28 1.75 28H31.75C32.0815 28 32.3995 27.8683 32.6339 27.6339C32.8683 27.3995 33 27.0815 33 26.75C33 26.4185 32.8683 26.1005 32.6339 25.8661C32.3995 25.6317 32.0815 25.5 31.75 25.5H28.0115C28.1154 25.2172 28.1849 24.9229 28.2185 24.6235L28.881 18H31.75C32.7442 17.9989 33.6974 17.6035 34.4004 16.9004C35.1035 16.1974 35.4989 15.2442 35.5 14.25V10.5C35.4989 9.50577 35.1035 8.55258 34.4004 7.84956C33.6974 7.14653 32.7442 6.75109 31.75 6.75ZM9.0125 25.5C8.70243 25.501 8.40314 25.3862 8.17327 25.1782C7.9434 24.9701 7.79949 24.6836 7.76975 24.375L5.7685 4.37575C5.75109 4.20188 5.7703 4.0263 5.82488 3.86031C5.87946 3.69432 5.96821 3.5416 6.0854 3.412C6.2026 3.28239 6.34564 3.17877 6.50532 3.10781C6.665 3.03685 6.83777 3.00013 7.0125 3H26.4875C26.6622 3.00012 26.8349 3.03681 26.9945 3.10772C27.1541 3.17863 27.2972 3.28218 27.4143 3.4117C27.5315 3.54123 27.6203 3.69386 27.6749 3.85977C27.7295 4.02568 27.7488 4.20119 27.7315 4.375L25.7308 24.3762C25.7007 24.6848 25.5566 24.971 25.3267 25.1788C25.0967 25.3867 24.7975 25.5012 24.4875 25.5H9.0125ZM33 14.25C32.9998 14.5815 32.868 14.8993 32.6337 15.1337C32.3993 15.368 32.0815 15.4998 31.75 15.5H29.1311L29.7561 9.25H31.75C32.0815 9.2502 32.3993 9.38196 32.6337 9.61634C32.868 9.85071 32.9998 10.1685 33 10.5V14.25Z" fill="#2F4CDD"/></svg>

									</span>
									<div class="media-body">
										<h3 class="mb-0 text-black"><span class="counter ml-0"><?php echo $total_lines ?></span></h3>
										<p class="mb-0">Total Movies</p>
										
									</div>
								</div>
							</div>
						</div>
					</div>
					
					
					
					<div class="col-xl-6 col-xxl-6 col-lg-12 col-md-12">
						<div class="card">
							
							<div class="card-body orders-summary">
								
								<div class="row">
                                <div class="col-sm-4 mb-4">
										
									</div>
                                <div class="chartCard">
      <div class="chartBox">
        <canvas id="myChart" width="700" height="800"></canvas>
      </div>
    </div>
    <?php
                                $db = config::getConnexion();
                            try{
                                $sql = "SELECT * FROM movie ";
                                $result = $db->query($sql);

                                if($result->rowCount() > 0)
                                {
                                while($row = $result->fetch()){
                                    $menuArray[] = $row["movieName"];
                                    $quantityArray[] = $row["priceTicket"];
                                }
                                unset($result);
                                }else {
                                echo 'No Result';
                                }
                                }
                                catch(PDOException $e){
                                die("Error");
                                }

                            unset($db);
                            ?>
									
								</div>
								<div class="widget-timeline-icon">
									<div class="row align-items-center mx-0">
										
										<div class="col-xl-9 col-lg-8 col-xxl-8 col-sm-8 px-0">
												
                                        
											</div>
											
											<div class="d-flex align-items-center">
												
												</div>
												
											</div>
										</div>	
									</div>	
								</div>
							</div>
						</div>
					</div>
					
							
					
				 </div>
            </div>
        </div>
        <!--**********************************
            Content body end
        ***********************************-->

        <!--**********************************
            Footer start
        ***********************************-->
        <div class="footer">
            <div class="copyright">
                <p>Copyright © Designed &amp; Developed by <a href="http://dexignzone.com/" target="_blank">Innovators</a> 2020</p>
            </div>
        </div>
        <!--**********************************
            Footer end
        ***********************************-->

		<!--**********************************
           Support ticket button start
        ***********************************-->

        <!--**********************************
           Support ticket button end
        ***********************************-->


    </div>
    <!--**********************************
        Main wrapper end
    ***********************************-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
	<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
	<script src="./vendor/chart.js/Chart.bundle.min.js"></script>
    <script src="./js/custom.min.js"></script>
	<script src="./js/deznav-init.js"></script>
	
	<!-- Counter Up -->
    <script src="./vendor/waypoints/jquery.waypoints.min.js"></script>
    <script src="./vendor/jquery.counterup/jquery.counterup.min.js"></script>	
		
	<!-- Apex Chart -->
	<script src="./vendor/apexchart/apexchart.js"></script>	
	
	<!-- Chart piety plugin files -->
	<script src="./vendor/peity/jquery.peity.min.js"></script>
	
	<!-- Dashboard 1 -->
	<script src="./js/dashboard/dashboard-1.js"></script>
	<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>

const menuArrayJS = <?php echo json_encode($menuArray);?>;
const quantityArrayJS = <?php echo json_encode($quantityArray);?>;
    /*const dateChartJS = dateArrayJS.map((day, index)=>{
      let dayjs = new Date(day);
     
      return dayjs.setHours(0 , 0 , 0 , 0);
    });*/
    // setup 
    const data = {
      //labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat', 'Sun'],
      datasets: [{
        label: 'Price Movie',
        data: quantityArrayJS,
        backgroundColor: [
          'rgba(255, 26, 104, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(255, 206, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(153, 102, 255, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(0, 0, 0, 0.2)'
        ],
        borderColor: [
          'rgba(255, 26, 104, 1)',
          'rgba(54, 162, 235, 1)',
          'rgba(255, 206, 86, 1)',
          'rgba(75, 192, 192, 1)',
          'rgba(153, 102, 255, 1)',
          'rgba(255, 159, 64, 1)',
          'rgba(0, 0, 0, 1)'
        ],
        borderWidth: 1
      }]
    };

    // config 
    const config = {
      type: 'bar',
      data,
      options: {
        indexAxis: 'y',
        scales: {
          x: {
            beginAtZero: true
          },
          y: {
            type: 'category',
            labels: menuArrayJS, 
           // data: quantityArrayJS,
          }
          
        }
      }
    };

    // render init block
    const myChart = new Chart(
      document.getElementById('myChart'),
      config
    );
    </script>

	
</body>
</html>