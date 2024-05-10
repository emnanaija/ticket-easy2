<!DOCTYPE html>
<html>
<style>
 @charset "UTF-8";
/*********** reset **********/
html,
body,
div {
  margin:0;
  padding:0;
  border:0;
}

/* ------------------------------------------------------ */
html,
body {
  position: relative;
  width: 100vw;
  height: 100vh;
  overflow: hidden;
}

/* -----------------------
animation circle 回る玉 ~4s
----------------------- */
.circle {
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
  background: #3a6e9a;
}

.circle div {
  position: absolute;
  top: calc((50% - 10px));
  left: calc((50% - 10px));
  width: 20px;
  height:20px;
  background: #fff;
  border-radius: 50%;
}

.circle div:nth-child(1) { animation: anim_01 2s forwards;}
.circle div:nth-child(2) { animation: move_01 2s 2s; }
.circle div:nth-child(4) { animation: move_03 2s 2s; }
.circle div:nth-child(3) { animation: move_02 2s 2s; }
.circle div:nth-child(5) { animation: move_04 2s 2s; }

@keyframes anim_01 {
  0% {   transform: scale(0);}
  20% {  transform: scale(3);}
  50% {  transform: scale(1);}
  90% {  transform: scale(5);}
  100% { transform: scale(0);}
}

@keyframes move_01 {
  0% {   transform: translate(0) scale(0);}
  20% {  transform: translate(-100px, -100px) scale(1);}
  40% {  transform: translate(-100px, 100px) scale(1);}
  60% {  transform: translate(100px, 100px) scale(1);}
  80% {  transform: translate(100px, -100px) scale(1);}
  100% { transform: translate(0) scale(1);}
}

@keyframes move_02 {
  0% {   transform: translate(0) scale(0);}
  20% {  transform: translate(-100px, 100px) scale(1);}
  40% {  transform: translate(100px, 100px) scale(1);}
  60% {  transform: translate(100px, -100px) scale(1);}
  80% {  transform: translate(-100px, -100px) scale(1);}
  100% { transform: translate(0) scale(1);}
}

@keyframes move_03 {
  0% {   transform: translate(0px) scale(0);}
  20% {  transform: translate(100px, 100px) scale(1);}
  40% {  transform: translate(100px, -100px) scale(1);}
  60% {  transform: translate(-100px, -100px) scale(1);}
  80% {  transform: translate(-100px, 100px) scale(1);}
  100% { transform: translate(0) scale(1);}
}

@keyframes move_04 {
  0% {   transform: translate(0px) scale(0);}
  20% {  transform: translate(100px, -100px) scale(1);}
  40% {  transform: translate(-100px, -100px) scale(1);}
  60% {  transform: translate(-100px, 100px) scale(1);}
  80% {  transform: translate(100px, 100px) scale(1);}
  100% { transform: translate(0) scale(1);}
}

/* -----------------------
animation big 広がる玉 4s~5.6s
----------------------- */
.big {
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
}
.big div{
  position: absolute;
  top: calc((50% - 1500px));
  left: calc((50% - 1500px));
  width: 3000px;
  height: 3000px;
  border-radius: 50%;
  transform: scale(0);
}

.big div:nth-child(1) { background: #fffcee; animation: big .5s 4s forwards;}
.big div:nth-child(2) { background: #bd8e99; animation: big .5s 4.5s forwards;}
.big div:nth-child(3) { background: #9e3f57;  animation: big .5s 5s forwards;}

@keyframes big {
  0% {  transform: scale(0);}
  100% {transform: scale(1);}
}

/* -----------------------
animation tri 突き上げる三角 ~5.9s
----------------------- */
.tri {
  position: absolute;
  bottom: -300vw;
  left: -100vw;
  width: 0;
  height: 0;
  border-left: 150vw solid rgba(255, 0, 0, 0);
  border-right: 150vw solid rgba(255, 0, 0, 0);
  border-bottom: 300vw solid  rgb(255, 251, 189);
  animation: tri .6s 5.3s linear forwards;
}

@keyframes tri {
  100% {transform: translateY(-300vw); }
}

/* -----------------------
animation squ 現れる四角 7.3s
----------------------- */
.squ {
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
}

.squ div {
  position: absolute;
  top: calc((50% - 50px));
  left: calc((50% - 50px));
  width: 100px;
  height:100px;
  background: #3a6e9a;
  border-radius: 50%;
  transform: scale(0);
}

.squ div:nth-child(1) { animation: squ .6s 5.8s cubic-bezier(0, 0.73, 0.54, 2.4) forwards;}
.squ div:nth-child(2) { animation: moveSqu_01 .8s 6.5s forwards;}
.squ div:nth-child(3) { animation: moveSqu_02 .8s 6.5s forwards;}
.squ div:nth-child(4) { animation: moveSqu_03 .8s 6.5s forwards;}

@keyframes squ {
  0% {   transform: translateY(100px) scale(0);}
  20% {  transform: translateY(100px) scale(1);}
  99% {  transform: translateY(0) scale(1);}
  100% { transform: translateY(0) scale(0);}
}

@keyframes moveSqu_01 {
  0% {   transform: translateX(0);}
  100% { transform: translateX(-300px); border-radius: 0;}
}

@keyframes moveSqu_02 {
  0% {   transform: translateX(0);}
  100% { transform: translateX(0px); border-radius: 0;}
}

@keyframes moveSqu_03 {
  0% {   transform: translateX(0);}
  100% { transform: translateX(300px); border-radius: 0;}
}

/* -----------------------
animation end  
----------------------- */
.end {
  position: absolute;
  top: 0;
  left: 0;
  width: 100vw;
  height: 100vh;
}

.end div {
  position: absolute;
  top: calc((50% - 50px));
  left: calc((50% - 50px));
  width: 100px;
  height:100px;
  font-size: 70px;
  color: #fff;
  line-height: 100px;
  text-align: center;
  opacity: 0;
  animation: end 1s 7.4s forwards;
}

.end div:nth-child(1) {
  transform: translateX(-300px);
}

.end div:nth-child(3) {
  transform: translateX(300px);
}

@keyframes end {
  100% { opacity: 1;}
}

</style>
  </head>
  <body>  
  <div class="circle">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    </div> 
  <div class="big">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div class="tri"></div>
  <div class="squ">
    <div></div>
    <div></div>
    <div></div>
    <div></div>
  </div>
  <div class="end">
    <div>S</div>
    <div>N</div>
    <div>D</div>
  
  </div>
  </body>
</html>















<?php
//require "repondreReclamation.php";
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

$email=$_GET['email'];
$id=$_GET['id'];
$reclam=$_GET['reclamation'];






 
  require_once "mailer/autoload.php";
    
    
  $mail = new PHPMailer(true);
  
  //Enable SMTP debugging.
  $mail->SMTPDebug = 3;                               
  //Set PHPMailer to use SMTP.
  $mail->isSMTP();            
  //Set SMTP host name                          
  $mail->Host = "smtp.gmail.com";
  //Set this to true if SMTP host requires authentication to send email
  $mail->SMTPAuth = true;                          
  //Provide username and password     
  $mail->Username = "medali.farhat@esprit.tn";                 
  $mail->Password = "dali0000";                           
  //If SMTP requires TLS encryption then set it
  $mail->SMTPSecure = "tls";                           
  //Set TCP port to connect to
  $mail->Port = 587;                                   
  
  $mail->From = "medali.farhat@esprit.tn";
  $mail->FromName = "TicketEasy Response";
  
  //$mail->addAddress($email, "Recepient Name");
  $mail->addAddress($email);
  $mail->isHTML(true);
  
  $mail->Subject = "Reponse A Votre Reclamation";
  //$mail->Body = "<i>Cher Client nous sommes désolé d'apprendre que vous avez rencontré un problème avec notre site Nous prenons très au sérieux les commentaires de nos clients et nous sommes déterminés à résoudre ce problème  rapidement  alors nous allons vous répondre le plutôt  possible</i>";
 /*$mail->Body = '<div class="container">
  <h1>Reponse Réclamation </h1>
  <div class="response">
    <h2>Cher/Chère Client,</h2>
    <p>Nous sommes désolés d\'apprendre que vous avez rencontré des difficultés lors de votre réservation sur notre site web, TicketEasy.<br>
     Nous sommes là pour vous aider à résoudre ce problème et nous sommes impatients de vous donner entière satisfaction.</p>
    <p>Pourriez-vous s\'il vous plaît nous donner plus de détails sur ce qui s\'est passé ? Quel était le film que vous essayiez de réserver et à quelle date ? Avez-vous reçu un message d\'erreur spécifique ou avez-vous eu des difficultés à effectuer le paiement ?</p>
    <p>Nous allons examiner la situation et faire de notre mieux pour trouver une solution. Si nécessaire, nous pouvons également vous rembourser pour votre achat.</p>
    <p>Merci de votre patience et de votre compréhension.</p>
    <p>
      Cordialement,<br />
      L\'équipe de TicketEasy
    </p>
    <p>
      <a class="button" href="mailto:medali.farhat@esprit.tn">Contacter le support</a>
    </p>
  </div>
</div>';
*/
$mail->Body=$_POST["message"];


  $mail->AltBody = "This is the plain text version of the email content";
  try {
      $mail->send();
      echo "Message has been sent successfully";
      


  } catch (Exception $e) {
      echo "Mailer Error: " . $mail->ErrorInfo;
  }


 


include '../Controller/ReponseC.php';

$error = "";

// create reponse
$reponse = null;

// create an instance of the controller
if (!empty($_POST['message']) && !empty($_GET['reclamation']) && !empty($_GET['id'])) {
  // create an instance of the controller
  $reponseC = new ReponseC();

  $reponse = new Reponse(
      null,
      $_GET['reclamation'],
      $_POST['message'],
      $_GET['id']
  );

  $reponseC->addReponse($reponse);

  header('Location:listReclamation.php');
} else {
  $error = "Missing information";
}


?>

