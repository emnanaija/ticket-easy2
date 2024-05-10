<?php
include '../Controller/ReponseC.php';
$reponseC = new ReponseC();
$reponseC->deleteReponse($_POST["idRps"]);
header('Location:ListReponse.php');