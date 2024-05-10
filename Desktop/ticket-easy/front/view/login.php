<?php

// Inclure le fichier de configuration
include '../config.php';

// Vérifier si le formulaire a été soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Récupérer les données du formulaire
  $email = $_POST['email'];
  $password = $_POST['password'];
  
  if (!empty($email) && !empty($password)) {
    
    try {
      $pdo = config::getConnexion();
    } catch (PDOException $e) {
      die("Erreur de connexion à la base de données : " . $e->getMessage());
    }

    $sql = "SELECT * FROM client WHERE email = ? AND password = ?";
    
    $stmt = $pdo->prepare($sql);

    $stmt->execute([$email, $password]);

    if ($stmt->rowCount() == 1) {
      $result = $stmt->fetch();
      //var_dump($result);
      $firstName = $result['firstName'];
     
      $lastName=$result['lastName'];
      $address=$result['address'];

      $email=$result['email'];
      $numberClient=$result['numberClient'];
      $dob=$result['dob'];
      $isBanned = $result['isbanned'];

      //echo "isBanned value: " . $isBanned . "<br>";
      
      if ($isBanned) {
        // Si l'utilisateur est banni, afficher un message d'erreur
        $message = "Vous êtes banni et ne pouvez pas accéder au site.";
        echo "<p style='color:white;'>$message</p>";
      } else {
        // Démarrer une session pour stocker les données de l'utilisateur
        session_start();
        $_SESSION['firstName'] = $firstName;
        $_SESSION['lastName'] = $lastName;
        $_SESSION['address'] = $address;
        $_SESSION['email'] = $email;
        $_SESSION['numberClient'] = $numberClient;
        $_SESSION['dob'] = $dob;
        $_SESSION['isBanned'] = $isBanned;
        $message = "Vous êtes client";
       // echo "<p style='color:white;'>$message</p>";
        // Rediriger vers la première page du site
        header('Location: page_profile.php');
        exit;
      }
    } else {
      $message = "Informations de connexion incorrectes.";
      echo "<p style='color:white;'>$message</p>";
    }

  } else {
    $message = "Veuillez remplir tous les champs du formulaire.";
    echo "<p style='color:white;'>$message</p>";
  }
}

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width">
    <title>Sign In</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <!-- Font  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="shortcut icon" href="./Images/Logo/Title.jpeg" type="image/x-icon">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="./static/style.css" rel="stylesheet" type="text/css" />
    <script src="https://apis.google.com/js/platform.js" async defer></script>



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

#scrollToTopButton:hover , i:hover {
  color: red;
  background-color: white;
}
      h1 {
        margin: auto;
        width: max-content;
        color: white;
      }
      span {
        display: inline-block;
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
          padding:8px 20px ;
          margin:auto;
      }

      .bottom-flex{
          display: flex;
          flex-wrap: wrap;
          padding: 15px 0 0 0;
          justify-content:center;
      }

      .bottom-flex li{
          list-style: none;
          margin:0px 10px;
      }
      .bottom-flex li a{
         font-size: 15px;
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
          margin-bottom: 25px;

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
      .fa-eye::before {
        margin-left: -15px;
      }
      .log_face{
          text-decoration: none;
          margin-left: 10px;
          font-size: 0.8rem;
      }

      .login-face{
          /* margin: 100px -20px 30px -260px; */
          text-align: center;
          vertical-align: middle;
          color: #bdc7c9;
      }

      .new-members{
          margin-bottom: 10px;

          color: #bdc7c9;
      }
      .or{
          margin-bottom: 5px;
          text-align: center;
          color: #bdc7c9;
      }

      .help a{
          text-decoration: none;
          padding-top: 10%;
          margin-left: 64%;
          text-align: right;
          
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
      .learnmore a{
        padding: 2px;
        margin: 0px;
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


      .logo img{
        position: relative;
        top: 30px;
        left: 10px;
        width: 110px;
        height: 90px;
        padding: 3px;
        margin: 0;
        padding: 0;
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
  .login {
    width: 300px;
    padding: 15px;
  }
}
@media only screen and (max-width: 350px) {
  .login {
    width: 240px;
    padding: 10px;
  }
  input[type="submit"] {
    width: 220px;
  }
  .abcRioButton {
  width: 220px !important;
  }
  .abcRioButtonIcon {
    padding: 15px 5px !important;
  }
  .abcRioButtonContents {
    font-size: 12px !important;
  }
  .help a {
      margin-left: 60% !important;
  }
}

    </style>
    <meta name="google-signin-client_id" content="556331998780-jhmmulhgm2s2fgrqqln50vmtp1fh41vc.apps.googleusercontent.com">
    <script src="https://apis.google.com/js/platform.js" async defer></script>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  </head>
  <body>
    <div class="logo">
        
            <img src="Images/TheaterLogoFinal.png" class="img-logo"/>
        
    </div>
    <div class="login-div">

    
      <form class="login" 
      name="regform"
      autocomplete="off" method="post">


      <h1 class="sign">Sign In</h1>
      <div id="errormessage"></div>
      <span class="seperator"></span>

  <div class="input-text">


    <input
      type="email"
      name="email"
      placeholder="Email"
      
    />
  </div>
      <div class="input-text">

        <input
          id = "pass_signup"
          type="password"
          name="password"
          placeholder="Password"
         
        /><i class="fa fa-fw fa-eye field-icon toggle-password" id="togglePassword"></i>

      </div>

        <span class="seperator"></span>
        <input class="signin-button" type="submit" value="Sign In" />
        <div class="remember-flex">
        <div> 
              <div class="or">OR</div>
              <div class="g-signin2" data-onsuccess="onSignIn" data-theme="dark" data-width="250" data-height="50" data-longtitle="true"  data-prompt="select_account"></div>
        </div>
          
        </div>
        <div class="help">
          <a class="color_text" href="https://www.google.com/gmail/">Need help?</a>
      </div>
        <div class="login-face">
        <br>
        <div class="new-members">
            New to Apna Theatre? <a href="signup.php" class="signup-link">Sign up now</a>.
        </div>
        <br>
        <div class="protection color_link help">
            This page is protected by Google reCAPTCHA to ensure you're not a bot.
           <div class="learnmore"> <a href="#">Learn more.</a></div>
        </div>
      </div>
      </form>
      <?php if (!empty($error_msg)): ?>
      <p>
        <?php echo $error_msg;
                  echo $password;
                  echo $client['password'];?></p>
    <?php endif; ?>
    </div>




    <div class="bottom">
        <div class="bottom-width">
          <div class ="questions">
          <span>Questions? <br>Ask on : <a href="mailto: Apna_theatre@gmail.com" class="tel-link">Apna_theatre@gmail.com</a></span>   
            <select class="fa select-language">
              <option> &#xf0ac; &nbsp;&nbsp;&nbsp;English</option>
              <option> &#xf0ac; &nbsp;&nbsp;&nbsp;French</option>
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
      <i class="fa fa-angle-double-up" aria-hidden="true" style="font-weight: bolder;"></i>
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
  var signInClicked = false; // Variable pour enregistrer si l'utilisateur a cliqué sur le bouton de connexion
  
  function onSignIn(googleUser) {
    if (signInClicked) { // Vérifier si l'utilisateur a cliqué sur le bouton de connexion
      // Récupérer les données de l'utilisateur
      var profile = googleUser.getBasicProfile();
      var name = profile.getName();
      var email = profile.getEmail();

      // Stocker les données dans LocalStorage
      localStorage.setItem("name", name);
      localStorage.setItem("email", email);

      // Rediriger l'utilisateur vers la page suivante
      document.location.href = 'http://localhost/rania%20panier/front/view/nextpage.php';
    } else {
      // L'utilisateur n'a pas cliqué sur le bouton, ne rien faire
    }
  }
  
  $('.g-signin2').click(function() { // Ajouter un gestionnaire d'événements de clic pour le bouton de connexion
    signInClicked = true; // Enregistrer que l'utilisateur a cliqué sur le bouton
  });
</script>


    
  </body>
</html>

