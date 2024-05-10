<?php
include '../Controller/ReclamationC.php';
$reclamationC = new ReclamationC();
$reclamationC->deleteReclamation($_POST["idRec"]);
header('Location:ListReclamation.php');