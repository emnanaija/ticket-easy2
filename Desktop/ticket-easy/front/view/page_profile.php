<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
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
    <title>Informations sur votre compte</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
        }

        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
        }

        h1 {
            text-align: center;
            margin-top: 0;
        }

        p {
            line-height: 1.5;
        }

        .info {
            margin-bottom: 20px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        span {
            font-weight: normal;
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
    </style>
</head>
<style>
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

    a {
        color: #c00;
        text-decoration: none;
        background-color: transparent;
    }



    .poster {
        box-shadow: 0 0 15px red !important;

    }

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

    .online {
        color: #fff;
        font-size: 20px;
        padding: 10px 25px;
        text-align: center;
        display: block;
        background: black;
    }

    .maincontainer h2 {
        color: #c00;
        text-align: center;
    }

    .footer-bottom-tagline {
        color: #dee2e6;
        font-size: 15px;
        font-family: cursive;
        margin-bottom: 25px;
    }

    .footer-contact-button {
        font-size: 20px;
        background-color: red;
        color: black;
        padding: 10px;
        border: none;
        border-radius: 10px;
        text-decoration: none;
    }

    ::-webkit-scrollbar-track {
        border: 5px solid #2c2f30;
        background-color: red;
    }

    body {
        background-color: rgba(0, 0, 0, .9);
        font-family: Arial, sans-serif;
    }
</style>

<body>
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
                        <a class="nav-link " href="movies.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Movies</a>
                    </li>
                    <!--reservation-->
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
                    <!--reservation-->



                    <li class="nav-item">
                        <a class="nav-link" href="contactus.html" onMouseOver="this.style.color='red'" onMouseOut="this.style.color='white'">Contact Us</a>
                    </li>
                    <li>
                        <!-- Genre dropdown starts-->

                        <!-- Genre dropdown ends-->
                    </li>


            </div>


            <div class="dropdown" style="display: inline-block;">
                <a class="dropdown-toggle" href="#" role="button" id="profileDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../../back/view/images/avatar/4.jpg" width="10" alt="Icône de profil">
                </a>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" href="page_profile.php">visit profile</a></li>
                    <li><a class="dropdown-item" href="login.php">Logout</a></li>
                </ul>
            </div>


            </ul>
        </div>
    </nav>

    <div class="online">
        <marquee>information de votre compte<sup>&reg;</sup></marquee>
        <p>Bonjour, <strong><?php echo $_SESSION['firstName'] . " " .  $_SESSION['lastName']; ?></strong> !</p>

        <div class="info">
            <label>Email:</label>
            <span><?php echo $_SESSION['email']; ?></span>
        </div>

        <div class="info">
            <label>Adresse:</label>
            <span><?php echo $_SESSION['address']; ?></span>
        </div>

        <div class="info">
            <label>Date de naissance:</label>
            <span><?php echo $_SESSION['dob']; ?></span>
        </div>

        <div class="info">
            <label>Téléphone:</label>
            <span><?php echo $_SESSION['numberClient']; ?></span>
        </div>
    </div>

    <!-------------------------------Footer-------------------------------->

    <footer class="footer">
        <hr class="footer-hr">
        <div class="footer-content">
            <div class="footer-left">
                <a href="home.php"><img class="footer-logo" src="Images/Logo/TheaterLogo.png" alt="" width="30" height="24"></a>
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
                    <li class="footer-middle-list-item"><a href="home.php">Enjoy Latest Movies</a> </li>
                    <li class="footer-middle-list-item"><a onmouseover="booknow()" onmouseout="hideAlert()" href="home.php">Book Your Ticket Now</a>
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
                <p class="footer-bottom-tagline"> Book your tickets now for an unforgettable cinematic experience.
                </p>
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
        function logout() {
            window.location.replace("login.php");
        }
    </script>
    <!-- bootsstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous">
    </script>
    <script src="./static/script.js"></script>
</body>

</html>