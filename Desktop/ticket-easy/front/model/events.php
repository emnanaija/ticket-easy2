<?php

include 'C:\xampp\htdocs\project2223_2a29-2a29_ticketeasy-main - Copy\front\controller\EventC.php';

$error = "";

session_start();


$name = 'rihem';

$productC = new EventC();

$product = null;



if (
    isset($_POST["titre"]) &&
    isset($_POST["idUser"]) &&
    isset($_POST["dateEvent"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["budget"])


) {


    if ($error == "")


        if (
            !empty($_POST['titre']) &&
            !empty($_POST["idUser"]) &&
            !empty($_POST["dateEvent"]) &&
            !empty($_POST["lieu"]) &&
            !empty($_POST["budget"])


        ) {
            $product = new Event(
                null,
                $_POST['titre'],
                $_POST['idUser'],
                $_POST['dateEvent'],
                $_POST['lieu'],
                $_POST['budget'],
                $_POST['categorie']
            );
            $productC->ajouterevents($product);
            header('Location:events.php');
        } else
            $error = "Missing information";
}


?>


<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
    <title>Book Now</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="./Images/Logo/titlee.png" type="image/x-icon">


    <!-- Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="./static/style.css" rel="stylesheet" type="text/css" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include jQuery library -->
    <script src="jquery-ui-1.13.2\jquery-ui-1.13.2\external\jquery\jquery.js"></script>

    <!-- Include jQuery UI library -->
    <script src="jquery-ui-1.13.2\jquery-ui-1.13.2\jquery-ui.js"></script>

    <!-- Include raindrops.js -->
    <script src="raindrops-master/raindrops-master/raindrops.js"></script>

    <style>
        /* navbar css */
        #header-nav .nav-link {
            color: white;
            font-size: 20px;
            margin-left: 20px;

        }

        .menu li a {
            text-decoration: none;
        }

        .nav-item :hover {
            margin-bottom: 10px;
            /* background-color: aquamarine; */
            border-bottom: 3px;
            border-color: red;
            border-bottom-style: solid;
        }

        .menu li a:hover {
            color: red !important;
            opacity: 0.5;
        }

        #variety {
            margin: 0.5rem;
        }

        .btn-outline-danger,
        .btn-outline-danger:focus {
            outline: none;
            box-shadow: none;
        }

        .contactForm {
            margin: 5px;
        }

        /* <!------------------------Scroll to top button------------------------------------------------> */

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

        .btn-sm a {
            color: white;
            transition: all 0.3s ease;
            float: right;
            font-size: medium;
        }

        .btn-sm a:hover {
            color: red;
            transition: all 0.3s ease;
        }

        #nav:hover {
            background-color: #e60e23 !important;

        }

        #header-nav .nav-link {
            color: white;
            font-size: 20px;
            margin-left: 20px;
        }

        @media only screen and (max-width: 1400px) {
            #header-nav .nav-link {
                color: white;
                font-size: 18px;
                margin-left: 18px;
            }
        }

        @media only screen and (min-width: 1133px) and (max-width: 1275px) {
            #header-nav .nav-link {
                color: white;
                font-size: 15px;
                margin-left: 10px;
            }
        }

        @media only screen and (min-width: 1035px) and (max-width: 1132px) {
            #header-nav .nav-link {
                color: white;
                font-size: 15px;
                margin-left: 10px;
            }

            #searchText {
                width: 120px;
            }

            #submitBtn {
                width: 60px;
                display: flex;
                justify-content: center;
            }
        }

        @media only screen and (min-width: 993px) and (max-width: 1034px) {
            #header-nav .nav-link {
                color: white;
                font-size: 14px;
                margin-left: 10px;
            }

            #searchText {
                width: 100px;
            }

            #submitBtn {
                width: 50px;
                display: flex;
                justify-content: center;
            }
        }

        select[name="typee"] option:hover,
        select[name="typee"] option:hover:not(:first-child) {
            background-color: red;
            color: white;
        }

        #alert-box {
            background-color: red;
            color: white;
            padding: 20px;
            border-radius: 10px;
            text-align: center;
            position: fixed;
            top: 18%;
            left: 50%;
            transform: translateX(-50%);
            z-index: 9999;
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
</head>

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
                            <a class="nav-link active" aria-current="page" href="home.html">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="movies.html">Movies</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" onmouseover="booknow()" onmouseout="hideAlert()" href="Book Now.html">Book Now</a>
                            <script>
                                function booknow() {
                                    var alertBox = document.createElement("div");
                                    alertBox.id = "alert-box";
                                    alertBox.innerHTML = "Pick a movie in Home First and then click Buy Now";
                                    alertBox.style.backgroundColor = "red";
                                    alertBox.style.color = "white";
                                    alertBox.style.padding = "20px";
                                    alertBox.style.borderRadius = "10px";
                                    alertBox.style.textAlign = "center";
                                    alertBox.style.position = "fixed";
                                    alertBox.style.top = "18%";
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
                            <a class="nav-link" href="kids.html">Kids</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="tv.html">TV</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="premium.html">Premium</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="contactus.html">Contact Us</a>
                        </li>
                        <li>
                            <!-- Genre dropdown starts
              <div>
                <div class="dropdown" style="position: relative; display: inline-block; padding-top: 5px; padding-left: 15px;">
                    <button class="btn btn-outline-danger dropdown-toggle" type="button" id="dropdownMenuButton" style="font-size:20px;">
                        Genres
                    </button>
                    <div class="dropdown-content" style="color: white;">
                        <a href="popular.html">Popular</a>
                        <a href="crime.html">Crime</a>
                        <a href="suspense.html">Suspense & Thriller</a>
                        <a href="action.html">Action</a>
                        <a href="fantasy.html">Sci-Fi & Fantasy</a>
                        <a href="documentary.html">Documentary</a>
                        <a href="horror.html">Horror</a>
                        <a href="drama.html">Drama</a>
                        <a href="war.html">War & Politics</a>
                        <a href="comedy.html">Comedy</a>
                        <a href="romance.html">Romance</a>
                        <a href="anime.html">Anime</a>
                      </div>
                </div>
              </div>-->
                            <!-- Genre dropdown ends-->
                        </li>
                        <div style="position: relative; display: inline-block; padding-top: 5px; padding-left: 15px;">
                            <li>
                                <button type="button" class="btn btn-light" onclick="logout()">Logout</button>
                            </li>
                        </div>
                    </ul>
                    <form id="searchForm" class="d-flex">
                        <input class="form-control me-2" type="text" id="searchText" placeholder="Search" aria-label="Search">
                        <button class="btn btn-danger" type="submit">Search</button>
                    </form>
                </div>
            </div>
        </nav>

        <!-- navbar ends -->


        <div class="container">
            <div id="movies" class="row"></div>
        </div>
        <hr>


        <div class="box">

            <div class="text">
                <h1>Book <span class="red">Now</span></h1>
                <div class="redline"></div>
                <p>Escape into a world of entertainment. Book your film tickets now!</p>
            </div>
        </div>

        <div class="touch">
            <h2>Make your reservation with ease</h2>
            <div class="redline"></div>
        </div>
        <div class="container fill">
            <div class="forthis">
                <form action="" method="POST" name="contact-form" id="contact-form" onsubmit="return validateForm();">

                    <div class="form-row two2">
                        <div class="form-group col-md-6 column">
                            <input type="text" class="form-control input" id="firstname" name="categorie" placeholder=" ">
                            <label for="firstname" class="">categorie</label>
                            <div class="underline">
                            </div>
                        </div>
                        <div class="form-group col-md-6 column">
                            <input type="text" class="form-control input" id="roomId" name="budget" placeholder=" " value="<?php echo $roomId; ?>">
                            <label for="idRoom" class="">budget</label>
                            <div class="underline"></div>
                        </div>
                    </div>

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

                    <div class="form-row two2">
                        <div class="form-group col-md-6 column">
                            <input type="text" class="form-control input" name="titre" id="Contact" placeholder=" ">
                            <label for="Contact" class="">title</label>
                            <div class="underline">
                            </div>

                        </div>
                        <div class="form-group col-md-6 column">
                            <input type="number" class="form-control input" name="idUser" id="nbr_ticket" placeholder=" ">
                            <label for="nbr_ticket" class="">idUser</label>
                            <div class="underline">
                            </div>
                        </div>
                    </div>
                    <!--*****************-->
                    <div class="form-row two2">
                        <div class="form-group col-md-6 column">
                            <input type="text" class="form-control input" name="lieu" id="mail" placeholder=" ">
                            <label for="mail" class="">lieu</label>
                            <div class="underline">
                            </div>

                        </div>
                        <div class="form-group col-md-6 column">

                            <input type="date-local" class="form-control input" id="datee" name="dateEvent" placeholder=" ">
                            <label for="datee" class="">dateEvent</label>
                            <div class="underline"></div>
                        </div>
                    </div>


                    <script>
                        // Get the current datetime
                        const now = new Date();

                        // Format the datetime string with seconds
                        const dateTimeString = now.toISOString().slice(0, 10);

                        // Set the value of the input field to the current datetime with seconds
                        document.getElementById("datee").value = dateTimeString;
                    </script>



                    <div class="btn-sm">
                        <input type="submit" value="register" class="sm-button" id="submit-btn">
                        <a href="#" onclick="clearFunc()">Reset</a>
                    </div>
                </form>
            </div>
        </div>

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

        <script type="text/javascript">
            function validateForm() {
                const movieName = document.getElementById("movieName");
                const roomId = document.getElementById("roomId");
                const firstname = document.getElementById("firstname");
                const lastname = document.getElementById("lastname");
                const Contact = document.getElementById("Contact");
                const nbr_ticket = document.getElementById("nbr_ticket");
                const datee = document.getElementById("datee");
                const mail = document.getElementById("mail");
                let alphabets = /^[A-Za-z]+$/;
                let movie = /^[A-Za-z ' 0-9]+$/;
                let roomid = /^[A-Za-z0-9]+$/;


                if (firstname.value.trim().length === 0 && lastname.value.trim().length === 0 && mail.value.trim().length === 0 && roomId.value.trim().length === 0 && movieName.value.trim().length === 0 && Contact.value.trim().length === 0 && nbr_ticket.value.trim().length === 0) {
                    swal("Oops...", "Please! Enter the credentials first .", "error");
                    return false;
                }
                if (movieName.value.trim().length === 0) {
                    swal("Oops...", "Please! Enter your Movie Name .", "error");
                    return false;
                }
                if (!movieName.value.trim().match(movie)) {
                    swal("Oops...", "Please! Enter a valid Movie Name.", "error");
                    return false;
                }
                if (firstname.value.trim().length > 0) {
                    if (!firstname.value.trim().match(alphabets)) {
                        swal("Oops...", "Please! Enter a valid First Name.", "error");
                        return false;
                    }
                }
                if (lastname.value.trim().length > 0) {
                    if (!lastname.value.trim().match(alphabets)) {
                        swal("Oops...", "Please! Enter a valid last Name.", "error");
                        return false;
                    }
                }
                if (mail.value.trim().length === 0) {
                    swal("Oops...", "Please! Enter your E-Mail address.", "error");
                    return false;
                }
                if (!mail.value.trim().includes("@gmail.com")) {
                    swal("Oops...", "Please! Enter a valid E-Mail address.", "error");
                    return false;
                }
                if (Contact.value.trim().length != 8 || isNaN(Contact.value.trim())) {
                    swal("Oops...", "Phone number should be 8 digits. ", "error");
                    return false;
                }
                if (nbr_ticket.value.trim().length === 0) {
                    swal("Oops...", "Please! Enter the Number Of Tickets.", "error");
                    return false;
                }
                if (isNaN(nbr_ticket.value.trim())) {
                    swal("Oops...", "Please! Enter a valid Number Of Tickets.", "error");
                    return false;
                }
                if (!roomId.value.trim().match(roomid) || roomId.value.trim().length === 0) {
                    swal("Oops...", "Please! Go Back Home and Choose the film again.", "error");
                    return false;
                }

                swal("Congrats!", "Reservation was delivered successfully! Thanks for your Submission. You Will Receive a Mail of Confirmation Soon", "success");
                return true;
            }

            document.getElementById("submit-btn").addEventListener("click", validateForm);

            function clearFunc() {
                document.getElementById("movieName").value = "";
                document.getElementById("roomId").value = "";
                document.getElementById("firstname").value = "";
                document.getElementById("lastname").value = "";
                document.getElementById("Contact").value = "";
                document.getElementById("nbr_ticket").value = "";
                document.getElementById("datee").value = "";
                document.getElementById("mail").value = "";
            }
        </script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>