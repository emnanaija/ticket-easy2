
<!DOCTYPE html>
<html>
  <head>
    <title>Profil de l'administrateur</title>
    <link rel="icon" type="image/png" sizes="16x16" href="./images/TheaterLogo.png">
	<link href="./vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="./vendor/bootstrap-select/dist/css/bootstrap-select.min.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://cdn.lineicons.com/2.0/LineIcons.css" rel="stylesheet">
    <style>
        
		body {
			font-family: Arial, sans-serif;
			background-color: #f7f7f7;
		}

		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 20px;
			background-color: #fff;
			box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
		}

		h1 {
			margin-top: 0;
			font-size: 32px;
			color: #333;
		}

		.profile-pic {
			width: 150px;
			height: 150px;
			border-radius: 50%;
			object-fit: cover;
			margin-right: 20px;
		}

		.profile-info {
			display: flex;
			align-items: center;
			margin-bottom: 20px;
		}

		.profile-name {
			font-size: 24px;
			font-weight: bold;
			color: #333;
			margin: 0;
		}

		.profile-role {
			font-size: 18px;
			color: #555;
			margin: 0;
		}

		.profile-bio {
			font-size: 16px;
			line-height: 1.5;
			color: #333;
		}

	
      /* Style CSS pour le profil */
      .profile {
        background-color: #f5f5f5;
        border-radius: 10px;
        padding: 20px;
        width: 500px;
        margin: 0 auto;
      }

      /* Style CSS pour le bouton */
      
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
  <div class="container">
		<div class="profile-info">
			<img class="profile-pic" src="images/profile/profilepic.jpg" alt="Photo de profil de l'administrateur">
			<div>
				<h1 class="profile-name">Emna naija</h1>
				<p class="profile-role">Administrator system</p>
			</div>
		</div>
		<p class="profile-bio"> hello,iam an experienced backend administrator with particular expertise in managing CRUD operations. I have worked for several leading technology companies, gaining a strong background in designing and maintaining databases and content management systems. In MY  current role at INNOVATORS Corporation, i am  responsible for managing CRUD operations for several critical applications. He is an expert in writing complex SQL queries to retrieve and modify data, as well as designing efficient database models </p>
	
      <button class="btn btn-primary light" onclick="history.go(-1)">Retour</button>
    </div>
  </body>
</html>