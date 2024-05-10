<?php

include '../Controller/ReclamationC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new ReclamationC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["address"]) &&
    isset($_POST["dor"]) &&
    isset($_POST["texte"])
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["dor"]) &&
        !empty($_POST["texte"])
    ) {
        $reclamation = new Reclamation(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['address'],
            new DateTime($_POST['dor']),
            $_POST['texte']
        );
        $reclamationC->addReclamation($reclamation);
        header('Location:accepter.html');
    } else
        $error = "Missing information";
}

  
?>

<!DOCTYPE html>
<html lang="en" data-theme="light">

<head>
  <title>Contact Us</title>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon">

  <!-- Font  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">

  <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.4/angular.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="./static/style.css" rel="stylesheet" type="text/css" />
  
  <script>
  // Récupérer la date courante au format "yyyy-mm-dd"
  var currentDate = new Date().toISOString().split("T")[0];
  // Définir la valeur par défaut du champ de saisie de date
  document.getElementById("date").value = currentDate;
</script>





  <style>


.alert {
  padding: 15px;
  border-radius: 5px;
  color: white;
  font-weight: bold;
  margin-bottom: 15px;
}

.success {
  background-color: green;
}

.error {
  background-color: red;
}

.warning {
  background-color: orange;
}
    /* navbar css */
    #header-nav .nav-link {
      color: white;
      font-size: 20px;
      margin-left: 20px;

    }

    .menu li a {
      text-decoration: none;
    }
    .nav-item :hover{
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
    @media only screen and (max-width: 1400px){
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
  #searchText{
    width: 120px;
  }
  #submitBtn{
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

#searchText{
  width: 100px;
}
#submitBtn{
  width: 50px;
  display: flex;
  justify-content: center;
}
}
  </style>




</head>

<body>


  <div class="scroll-bar">

    <!-- navbar starts -->

    <nav class="navbar navbar-expand-lg navbar-light bg-dark" id="header-nav">
      <div class="container-fluid">
        <a class="navbar-brand" href="home.html"><img class="logo" src="Title.PNG" alt="" width="30"
            height="24"></a>
        <button id="nav" class="navbar-toggler" id="nav" style="background-color:#8b0000" type="button" data-bs-toggle="collapse"
          data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon" style="background-color:dark-grey;"></span>
        </button>
        
        <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link active" aria-current="page" href="home.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="Events.php">Events</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="AfficherSnack.php">Snacks</a>
            </li>
        
            <li class="nav-item">
              <a class="nav-link" href="contactus.html">Contact</a>
            </li>
            <li>
              <!-- Genre dropdown starts-->
              
              <!-- Genre dropdown ends-->
            </li>
            <div style="position: relative; display: inline-block; padding-top: 5px; padding-left: 15px;">
              <li>
                <button  type="button" class="btn btn-light" onclick="logout()">Logout</button>
              </li>
            </div>
          </ul>
          
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
        <h1>Contact <span class="red">Us</span></h1>
        <div class="redline"></div>
        <p>Have Questions ? We have answers ( may be )</p>
      </div>
    </div>

    <div class="touch">
      <h2>Get in touch</h2>
      <div class="redline"></div>
    </div>
    <div class="container fill">
      <div class="forthis">

        <form action="" method="POST" name="contact-form" id="contact-form" >
          
            <div class="form-row two2">
            <div class="form-group col-md-6 column">
              <input  type="text" class="form-control input" pattern="[a-zA-Z]+"  name="firstName" id="firstName" maxlength="20" placeholder=" " >
              <label for="firstname" class="">First Name</label>
              <div class="underline">
              </div>
            </div>

            <div class="form-group col-md-6 column">
              <input  type="text" class="form-control input" pattern="[a-zA-Z]+" name="lastName" id="lastName" maxlength="20" placeholder=" " >
              <label for="lastname" class="">Last Name</label>
              <div class="underline"></div>
            </div>
          </div>

          <div class="form-row one1">
            <div class="form-group column">
              <input  type="email" class="form-control input" name="address" id="address" placeholder=" " >
              <label for="address" class="">Email</label>
              <div class="underline"></div>
            </div>
          </div>
         <br>
          
          <div class="form-row ">
            <div class="form-group  col-md-6 column">
            <input    type="date" class="form-control input" name="dor" id="dor"  max="<?php echo date("Y-m-d"); ?>" min="2023-01-01">
              <label for="dor" class="">Date of Reclamation</label>
              
            </div>
          </div>
        

          <div class="form-row size">
            <div class="form-group column">
              <textarea  type="text" class="form-control input" pattern="[a-zA-Z]+"  name="texte" id="texte" rows="5"  placeholder=" " minlength="15" maxlength="50"></textarea>
              <label for="texte" class="">Message</label>
              <div class="underline extra gap"></div>
            </div>
          </div>


          <div class="btn-sm">
            <input type="submit" value="save" class="sm-button" id="submit-btn" > 
            <input  align="right" type="reset" value="Reset" class="sm-button">
          </div>
        </form>
      </div>
    </div>





    <script>
// Sélectionnez le formulaire et les champs de saisie
const form = document.getElementById("contact-form");
const firstName = document.getElementById("firstName");
const lastName = document.getElementById("lastName");
const email = document.getElementById("address");
const date = document.getElementById("dor");
const message = document.getElementById("texte");

// Écoutez l'événement de soumission du formulaire
form.addEventListener("submit", function(event) {
  // Empêcher la soumission du formulaire par défaut
  event.preventDefault();

  // Valider les champs de saisie
  let isValid = true;

  // Valider le champ Prénom
  if (firstName.value.trim() === "") {
    isValid = false;
    firstName.classList.add("is-invalid");
    firstName.nextElementSibling.innerHTML = "Le prénom est requis.";
  } else {
    firstName.classList.remove("is-invalid");
    firstName.nextElementSibling.innerHTML = "";
  }

  // Valider le champ Nom
  if (lastName.value.trim() === "") {
    isValid = false;
    lastName.classList.add("is-invalid");
    lastName.nextElementSibling.innerHTML = "Le nom est requis.";
  } else {
    lastName.classList.remove("is-invalid");
    lastName.nextElementSibling.innerHTML = "";
  }

  // Valider le champ Email
  if (email.value.trim() === "") {
    isValid = false;
    email.classList.add("is-invalid");
    email.nextElementSibling.innerHTML = "L'adresse email est requise.";
  } else if (!isValidEmail(email.value.trim())) {
    isValid = false;
    email.classList.add("is-invalid");
    email.nextElementSibling.innerHTML = "Adresse email invalide.";
  } else {
    email.classList.remove("is-invalid");
    email.nextElementSibling.innerHTML = "";
  }

  // Valider le champ Date
  if (date.value.trim() === "") {
    isValid = false;
    date.classList.add("is-invalid");
    date.nextElementSibling.innerHTML = "La date est requise.";
  } else {
    date.classList.remove("is-invalid");
    date.nextElementSibling.innerHTML = "";
  }

  // Valider le champ Message
  if (message.value.trim() === "") {
    isValid = false;
    message.classList.add("is-invalid");
    message.nextElementSibling.innerHTML = "Le message est requis.";
  } else {
    message.classList.remove("is-invalid");
    message.nextElementSibling.innerHTML = "";
  }

  // Si tous les champs sont valides, soumettre le formulaire
  if (isValid) {
    form.submit();
  }
});

// Fonction de validation d'email simple
function isValidEmail(email) {
  const regex = /\S+@\S+\.\S+/;
  return regex.test(email);
}



</script>















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
              <p><span class="glyphicon glyphicon-envelope"> </span> ticket.easy@gmail.com</p>
              <p><span class="glyphicon glyphicon-phone"></span> +216 24665644</p>
            </div>
          </div>
          <div class="col-sm-6 map-padd">
            <!-- -map- -->
            
            <iframe src="https://www.google.com/maps/embed?pb=!1m26!1m12!1m3!1d2126.4762002828775!2d10.192338115603725!3d36.89745299817288!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m11!3e6!4m3!3m2!1d36.8979074!2d10.1934645!4m5!1s0x12e2cb745e5c6f1b%3A0xf69a51ee3c65c12e!2sEsprit%20School%20of%20Business!3m2!1d36.897233!2d10.193496399999999!5e0!3m2!1sfr!2stn!4v1679048787693!5m2!1sfr!2stn" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
          </div>
        </div>
      </div>
  
  
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>

    <div class="bottom-gap"></div>



    <!-------------------------------Footer-------------------------------->
    <div id="waterdrop"></div>
    <footer class="footer">
      <div class="footer-content">
        <div class="footer-left">
          <a href="home.html"><img class="footer-logo" src="Images/TheaterLogoFinal.png" alt="" width="30"
              height="24"></a>
          <p class="footer-bottom-tagline">Watch! Chill! Repeat!</p>
        </div>
        <div class="footer-middle">
          <h2 class="footer-heading">Follow Us</h2>
          <ul class="footer-middle-list icons">
            <a class="footer-links" href="https://www.facebook.com/" target="_blank"><i
                class="fab fa-facebook-f facebook" style="color:red"></i></a>
            <a class="footer-links" href="https://twitter.com/login?lang=en" target="_blank"><i
                class="fab fa-twitter twitter" style="color:red"></i></a>
            <a class="footer-links" href="https://www.linkedin.com/login" target="_blank"><i
                class="fab fa-linkedin linkedin" style="color:red"></i></a>
            <a class="footer-links" href="https://www.instagram.com/" target="_blank"><i
                class="fab fa-instagram instagram" style="color:red"></i></a>
            <a class="footer-links" href="https://github.com/QAZIMAAZARSHAD/Movie-Streaming-Website" target="_blank"><i
                class="fab fa-github github" style="color:red"></i></a>
          </ul>
        </div>
        <div class="footer-middle">
          <h2 class="footer-heading">Services</h2>
          <ul class="footer-middle-list">
            <li class="footer-middle-list-item"><a href="home.html">Enjoy Latest Movies</a> </li>
            <li class="footer-middle-list-item"><a href="web-series.html">Watch Web-Series</a> </li>
            <li class="footer-middle-list-item"><a href="kids.html">Everything for Kids</a> </li>
            <li class="footer-middle-list-item"><a href="news.html">Coming soon</a> </li>
            <li class="footer-middle-list-item"><a href="premium.html">Get Premium Subscription</a> </li>
            <li class="footer-middle-list-item"><a href="faq.html">FAQ</a> </li>
          </ul>
        </div>
        <div class="footer-middle">
          <h2 class="footer-heading">Try Our App</h2>
          <ul class="footer-middle-list icons">
            <a class="footer-links" href="#"><i class="fab fa-google-play" style="color:red"></i></a>
            <a class="footer-links" href="#"><i class="fab fa-app-store-ios" style="color:red"></i></a>
          </ul>
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
      $(document).ready(function () {
        var scrollTopButton = document.getElementById("scrollToTopButton");
        window.onscroll = function () {
          scrollFunction()
        };

        function scrollFunction() {
          if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
            scrollTopButton.style.display = "block";
          } else {
            scrollTopButton.style.display = "none";
          }
        }
        $("#scrollToTopButton").click(function () {
          $('html ,body').animate({
            scrollTop: 0
          }, 800)
        });
      });
    </script>
    <!-- offcanva JS and footer js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <script src="https://daniellaharel.com/raindrops/js/raindrops.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="js/main-min.js"></script>

    <script> jQuery('#waterdrop').raindrops({ color: '#292c2f', canvasHeight: 150, density: 0.1, frequency: 20 });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"></script>
    <script src="./static/script.js"></script>

    <script>
      function logout(){
        window.location.replace("login.html");
      }
    </script>

    <script type="text/javascript">

    document.getElementById("submit-btn").addEventListener("click" , validateForm);

      function clearFunc() {
        document.getElementById("firstname").value = "";
        document.getElementById("lastname").value = "";
        document.getElementById("email").value = "";
        document.getElementById("phone").value = "";
        document.getElementById("subject").value = "";
        document.getElementById("message").value = "";
      }

    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>


</body>

</html>
