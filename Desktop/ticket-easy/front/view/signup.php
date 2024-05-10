<?php

include '../controller/ClientC.php';

$error = "";

// create client
$client = null;

// create an instance of the controller
$clientC = new ClientC();
if (
    isset($_POST["firstName"]) &&
    isset($_POST["lastName"]) &&
    isset($_POST["address"]) &&
    isset($_POST["email"]) &&
    isset($_POST["numberClient"]) &&
    isset($_POST["dob"])&&
    isset($_POST["password"]) 
) {
    if (
        !empty($_POST['firstName']) &&
        !empty($_POST["lastName"]) &&
        !empty($_POST["address"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["numberClient"]) &&
        !empty($_POST["dob"])&&
        !empty($_POST["password"])

    ) {
        $client = new Client(
            null,
            $_POST['firstName'],
            $_POST['lastName'],
            $_POST['address'],
            $_POST["email"],
            $_POST["numberClient"],
            $_POST['dob'],
            $_POST["password"]
        );
        $clientC->addClient($client);
        header('Location:login.php');
    } else
        $error = "Missing information";
}


?>
<!DOCTYPE html>
<link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link href="./static/style.css" rel="stylesheet" type="text/css" />
<html>
  <head>
    <title>Sign Up</title>

    <!-- Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
 
    <!------------------------Scroll to top button------------------------------------------------>
<style>
  #scrollToTopButton{
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
    box-shadow: 0 6px 10px 0px gray;
}

#scrollToTopButton:hover , i:hover{
background-color:white;
color:red;
}


      h1 {
        margin: auto;
        width: max-content;
        color: white;
      }
      span {
        display: inline-block;
        padding: 5px;
      }
      .img-logo{
          height: 94px;
          margin-left: 45px;
      }
      .seperator {
        height: 12px;
        display: block;
      }
      .main {
        padding: 70px;
        width: 300px;
        height: auto;
        border: 1.5px grey solid;
        border-radius: 5px;
        margin: -4.5px auto;
      }
      label {
        font-weight: bold;
        color: white;
        font-size: 1.25em;
      }
      input {
        width: 280px;
        border: none;
        border-radius: 5px;
        padding: 8px;
        outline: none;
      }
      input[type="submit"] {
        width: 260px;
        background-color: red;
        font-weight: bold;
      }
      input[type="submit"]:hover {
        cursor: pointer;
        border: 2px gray solid;
        background-color: red;
        transform: scale(0.95);
      }
      body {
        margin: 0;
        padding: 0;
        background: linear-gradient( rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.85) ),url("Images/background3.png") no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size: cover;
        background-size: cover;
        font-family: 'Helvetica Neue',Helvetica,Arial,sans-serif;

      }
      .brand {
        margin-bottom: 13px;
        color: red;
        padding-top: 15px;
      }
      #errormessage {
        display: flex;
        justify-content: center;
        border-radius: 12px;
      }
      p {
        display: inline-flex;
        font-size: 1em;
        align-items: center;
        background: rgb(220, 53, 69);
        padding: 0.5em;
        color: white;
        font-family: sans-serif;
      }
      p svg {
        width: 2em;
        height: 2em;
        margin-right: 0.5em;
        fill: lightgreen;
      }
      .login{
          margin: 0 auto;
          width: 400px;
          background-color: rgba(0, 0, 0, 0.6);
          border-radius: 5px;
          padding: 30px 70px 143px 70px;
          margin-bottom: 12px;
      }

      .login h1{
          color: white;
          padding-bottom: 10px;
      }

      .bottom{
          background-color: rgba(0, 0, 0, 0.35);
          color: #bdc7c9;
         

      }

      .bottom-width{
        max-width: 1000px;
          padding:8px 30px ;
      }

      .bottom-flex{
          display: flex;
          flex-wrap: wrap;
          padding: 15px 0 0 0;
          justify-content:center;
         
      }
      .bottom-flex li a{
         font-size: 15px;
      }
      .bottom-flex li{
          list-style: none;
          margin:0px 10px;
      }

      .list-bottom{
          /* width: 25%; */
          margin-top: 10px;
      }

      .link-bottom{
          text-decoration: none;
          color: #bdc7c9;
          font-size: 0.8rem;
      }

      .link-bottom:hover{
          text-decoration: underline;

      }
      .remember-flex{
          display: flex;
          justify-content: space-between;
          margin-top: 10px;
          font-size: 0.8rem;
      }

      .color_text{
          color: #bdc7c9;
      }

      .color_link{
          color: #bdc7c9;
      }

      .signup-link{
          color: white;
          text-decoration: none;
      }



      .signup-link:hover{
          text-decoration: underline;
      }

      .face_icon{
          color: #3b5998;
          margin-right: 6px;
          font-size: 20px;
      }

      .log_face{
          text-decoration: none;
          margin-left: 10px;
          font-size: 0.8rem;
      }

      .login-face{
          margin: 50px 0 15px 0;
          vertical-align: middle;
          color: #bdc7c9;
      }

      .new-members{
          margin-bottom: 10px;
          color: #bdc7c9;
      }

      .help a{
          text-decoration: none;
      }
      .help a:hover{
          text-decoration: underline;
      }

      .protection{
          font-size: 0.8rem;
          color: #bdc7c9;
      }

      .protection a{
          text-decoration: none;
      }

      .protection a:hover{
          text-decoration: underline;
      }

      .tel-link{
          text-decoration: none;
          color: #e1e5ea;
      }

      .tel-link:hover{
          text-decoration: underline;
      }

      .select-language{
          -webkit-appearance: none;
          -moz-appearance: none;
          background: url("data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiA/PjwhRE9DVFlQRSBzdmcgIFBVQkxJQyAnLS8vVzNDLy9EVEQgU1ZHIDEuMS8vRU4nICAnaHR0cDovL3d3dy53My5vcmcvR3JhcGhpY3MvU1ZHLzEuMS9EVEQvc3ZnMTEuZHRkJz48c3ZnIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDUwIDUwIiBoZWlnaHQ9IjUwcHgiIGlkPSJMYXllcl8xIiB2ZXJzaW9uPSIxLjEiIHZpZXdCb3g9IjAgMCA1MCA1MCIgd2lkdGg9IjUwcHgiIHhtbDpzcGFjZT0icHJlc2VydmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiPjxyZWN0IGZpbGw9Im5vbmUiIGhlaWdodD0iNTAiIHdpZHRoPSI1MCIvPjxwb2x5Z29uIHN0cm9rZT0id2hpdGUiICBwb2ludHM9IjQ3LjI1LDE1IDQ1LjE2NCwxMi45MTQgMjUsMzMuMDc4IDQuODM2LDEyLjkxNCAyLjc1LDE1IDI1LDM3LjI1ICIvPjwvc3ZnPg==");
          background-size: 12px;
          background-position-x: calc(100% - 7px);
          background-position-y: calc(100% - 14px);
          background-repeat: no-repeat;
          background-color: #000;
          color:#bdc7c9;
          padding: 14px 20px 14px 14px;
          margin: 30px 0 40px 0;
          font-size: 0.9rem;
          min-height: 40px;
          border: 1px solid #333;
      }

      .select-language option{
          padding-left: 10px;
      }
      .input-text{
          margin-bottom: 20px;
      }

      .input-text input{
          width: 100%;
          height: 45px;
          background-color: #333;
          color: white;
          border-radius:5px;
          border: none;
          outline: transparent;
          text-indent: 18px;
      }

      .input-text input::-webkit-input-placeholder {
          font-size: 1rem;
          color: #bdc7c9;
      }

      .input-text input::-moz-placeholder {
          font-size: 1rem;
          color: #bdc7c9;
          text-indent: 40px;
      }
      .signin-button{
          margin-top: 20px;
          padding: 13px;
          border-radius: 5px;
          background-color: red;
          color:white;
          border:none;
          font-weight: bold;
          font-size: 1.05rem;
          cursor: pointer;
      }
      .aftersubmit{
        opacity: 1;
        width: 400px;
        padding: 20px 75px 20px 65px;
        background-color: rgba(0, 0, 0, 0.6);
        border-radius: 5px;
        margin: 0px auto;
      }
      .field-icon{
     position: absolute;
     margin-left: -25px;
     margin-top: 15px;
     color: white;
   }
   .questions{
    display: flex;
    align-items: center;
    flex-wrap: wrap;
    justify-content: space-between;
}

@media only screen and (max-width: 450px) {
  .login, .aftersubmit {
    width: 300px;
    padding: 15px;
  }
}

@media only screen and (max-width: 350px) {
  .login, .aftersubmit {
    width: 240px;
    padding: 10px;
  }
  input[type="submit"] {
    width: 220px;
  }
  .help a {
    margin-left: 0% !important;
  }
  .error-message {
  display: none;
  color: white;
  margin-top: 5px;
}

input.error {
  border-color: red;}
}

body {
    white-space: z;
    margin: 0;
    font-family: var(--bs-font-sans-serif);
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: white;
    background-color: #fff;
    -webkit-text-size-adjust: 100%;
    -webkit-tap-highlight-color: transparent;
}
    </style>
    <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon">
  </head>
  <body>
    <div class="logo">
        <a href="login.php">
            <img src="Images/TheaterLogoFinal.png" class="img-logo"/>
        </a>
    </div>
    <div class="login-div">
      <form class="login"   
        name="regform"
        autocomplete="off" method="post">


      <h1 class="sign">Sign Up</h1>
      <div id="errormessage"></div>
      <span class="seperator"></span>
      <div class="input-text">
        <input
          type="text"
          name="firstName"
          placeholder="Enter your firstName"
          
        />
        <div class="error-message"></div>
      </div>
      <div class="input-text">
        <input
          type="text"
          name="lastName"
          placeholder="Enter your lastName"
        
        />
        <div class="error-message"></div>
      </div>
       <div class="input-text">
        <input
          type="text"
          name="address"
          placeholder="Enter your address"
        
        /><div class="error-message"></div>
      </div>
      <div class="input-text">
        <input
          type="email"
          name="email"
          placeholder="Enter your Email"
          
        />   <div class="error-message"></div>
      </div>
      <div class="input-text">
        <input
          type="number"
          name="numberClient"
          placeholder="Enter your numberClient"
          
        /><div class="error-message"></div>
      </div>
      <div class="input-text">
        <input
          type="date"
          name="dob"
          placeholder="date of birth"
          
        />   <div class="error-message"></div>
      </div>
      <div class="input-text">
        <input
          id = "pass_signup"
          type="password"
          name="password"
          placeholder="Enter your password"
         
        /><i class="fa fa-fw fa-eye field-icon toggle-password" id="togglePassword"></i>
        <div class="error-message"></div>
      </div>
      <div class="input-text">
        <input
        id = "pass_signup2"
          type="password"
          name="retypepassword"
          placeholder="Confirm password"
         
        /><i class="fa fa-fw fa-eye field-icon toggle-password2" id="togglePassword"></i>
        <div class="error-message"></div>
      </div>

 
      <div class="input-text">
      <input type="file" name="profile_picture" id="profile_picture" accept="image/*">
      </div>


        <input class="signin-button" type="submit" value="Sign Up" />
        <div class="remember-flex">
            <div>

            </div>
            <div class="help">
                <a class="color_text" href="https://www.google.com/gmail/">Need help?</a>
            </div>
        </div>

        
      </form>
     
      <span class="seperator"></span>
      
        <br>
        <br>

    </div>
    <div class="bottom">
        <div class="bottom-width">
          <div class="questions">
         <span> Questions? <br>Ask on : <a href="mailto: Apna_theatre@gmail.com" class="tel-link">Apna_theatre@gmail.com</a></span> 
            <select class="fa select-language">
                <option> &#xf0ac; &nbsp;&nbsp;&nbsp;English</option>
                <option> &#xf0ac; &nbsp;&nbsp;&nbsp;french</option>
            </select>
        </div>
            
            <div>
                <ul class="bottom-flex">
                    <li class="list-bottom">
                        <a href="faq.html" class="link-bottom">
                            FAQ
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Help Center
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Terms of Use
                        </a>
                    </li>
                    <li class="list-bottom">
                        <a href="#" class="link-bottom">
                            Privacy
                        </a>
                    </li>

                </ul>
            </div>
           
        </div>
    </div>
    <button  id="scrollToTopButton" title="Go to top" class="ml-5" >
      <i class="fa fa-angle-double-up" aria-hidden="true" ></i>
    </button>
    <script>
    $(document).ready(function(){
      var scrollTopButton = document.getElementById("scrollToTopButton");
      window.onscroll = function () { scrollFunction() };

      function scrollFunction() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        scrollTopButton.style.display = "block";
      } else {
        scrollTopButton.style.display = "none";
      }
    }

    $("#scrollToTopButton").click(function(){
    $('html ,body').animate({scrollTop : 0},800)
    });
    });
    </script>
    <script>
    $(".toggle-password").click(function() {
     $(this).toggleClass("fa-eye fa-eye-slash");
     if ($("#pass_signup").attr("type") == "password") {
      $("#pass_signup").attr("type", "text");
     } else {
       $("#pass_signup").attr("type", "password");
     }
    });
    </script>
    <script>
    $(".toggle-password2").click(function() {
     $(this).toggleClass("fa-eye fa-eye-slash");
     if ($("#pass_signup2").attr("type") == "password") {
      $("#pass_signup2").attr("type", "text");
     } else {
       $("#pass_signup2").attr("type", "password");
     }
    });
    </script>
  </body>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  
  <script src="https://smtpjs.com/v3/smtp.js"></script>
  <script>
    // Récupération des éléments HTML du formulaire
const form = document.querySelector('.login[name="regform"]');
const firstNameInput = form.querySelector('input[name="firstName"]');
const lastNameInput = form.querySelector('input[name="lastName"]');
const addressInput = form.querySelector('input[name="address"]');
const emailInput = form.querySelector('input[name="email"]');
const numberClientInput = form.querySelector('input[name="numberClient"]');
const dobInput = form.querySelector('input[name="dob"]');
const passwordInput = form.querySelector('input[name="password"]');
const retypePasswordInput = form.querySelector('input[name="retypepassword"]');

// Fonction de validation du formulaire
function validateForm(event) {
  // Empêcher la soumission du formulaire
  event.preventDefault();

  // Récupération des valeurs des champs
  const firstName = firstNameInput.value.trim();
  const lastName = lastNameInput.value.trim();
  const address = addressInput.value.trim();
  const email = emailInput.value.trim();
  const numberClient = numberClientInput.value.trim();
  const dob = dobInput.value.trim();
  const password = passwordInput.value.trim();
  const retypePassword = retypePasswordInput.value.trim();

  // Vérification du champ firstName
  if (!firstName || !/^[a-zA-Z]+$/.test(firstName)) {
    showError(firstNameInput, 'First name must be a string');
    return;
  }

  // Vérification du champ lastName
  if (!lastName || !/^[a-zA-Z]+$/.test(lastName)) {
    showError(lastNameInput, 'Last name must be a string');
    return;
  }

  // Vérification du champ address
  if (!address) {
    showError(addressInput, 'Address is required');
    return;
  }

  // Vérification du champ email
  if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
    showError(emailInput, 'Email is invalid');
    return;
  }

  // Vérification du champ numberClient
  if (!numberClient || !/^\d{8}$/.test(numberClient)) {
    showError(numberClientInput, 'Number client must be an 8-digit number');
    return;
  }

  // Vérification du champ dob
  if (!dob) {
    showError(dobInput, 'Date of birth is required');
    return;
  }

  // Vérification du champ password
  if (!password || password.length < 8 || !/[A-Z]/.test(password) || !/[a-z]/.test(password) || !/\d/.test(password)) {
    showError(passwordInput, 'Password must be at least 8 characters long and contain at least one uppercase letter, one lowercase letter, and one digit');
    return;
  }

  // Vérification du champ retypePassword
  if (password !== retypePassword) {
    showError(retypePasswordInput, 'Passwords do not match');
    return;
  }

  // Si toutes les validations sont passées, soumettre le formulaire
  form.submit();
}

// Fonction pour afficher un message d'erreur sous un champ de saisie
function showError(input, message) {
  const errorMessage = input.parentNode.querySelector('.error-message');
  errorMessage.innerText = message;
  input.classList.add('error');
}

// Ajout d'un écouteur d'événements sur la soumission du formulaire
form.addEventListener('submit', validateForm);


</script> 

</html>
