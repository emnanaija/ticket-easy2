<!DOCTYPE html>
<html>
  <head>
    <title>Page d'accueil</title>
    <style>
      body {
        background-color: #ffffff;
        font-family: Arial, sans-serif;
      }

      .header {
        display: flex;
        align-items: center;
        background-color: #F0FFFF;
        border-bottom: 1px solid #cccccc;
        height: 70px;
        padding: 0 20px;
      }

      .logo {
        margin-right: 20px;
        max-height: 50px;
      }

      h1 {
        color: #03224C;
        font-size: 24px;
        margin: 0;
        text-align: center;
      }

      p {
        color: #0a283e;
        font-size: 18px;
        margin: 30px 0;
        text-align: center;
      }

      button {
        background-color: #4d8bbd;
        border-radius: 4px;
        border: none;
        color: #ffffff;
        padding: 10px 20px;
        text-decoration: none;
        transition: background-color 0.2s ease;
      }

      button:hover {
        background-color: #386d98;
      }
    </style>
  </head>
  <body>
    <div class="header">
      <img class="logo" src="./images/TheaterLogo.png" alt="Logo de l'entreprise" />
      <center>
      <h1>Welcome dear administrator Emna</h1>
      </center>
    </div>
    <div class="container">
      <p>Vous êtes sur la page d'accueil du backend de notre site. Pour accéder à l'interface d'administration, veuillez vous connecter en cliquant sur le bouton ci-dessous.</p>
      <center>
     <button onclick="window.location.href='test.php'">Login</button>
     </center>
    </div>
  </body>
</html>