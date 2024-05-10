
<?php
$id=$_GET["id"];
$email=$_GET["email"];
$reclamation=$_GET["reclamation"];

echo ('<!DOCTYPE html>
<html>
<head>
<body>
<center>
<form name="fr" method="POST" action="envoyer.php?id='.$id.'&email='.$email.'&reclamation='.$reclamation.'">
<label><h3><u> Votre Réponse </u></h3></label>

<textarea class="textarea" name="message" id="message" cols="60" rows="30" placeholder="Votre Message"></textarea>
<br>
<input type="submit" id="button" name="send" value="Envoyer" class="btn">
</center>
</body>
</head>
</html>');

?>