<?php

include '../Controller/ReponseC.php';

$error = "";

// create reponse
$reponse = null;

// create an instance of the controller
$reponseC = new ReponseC();

if (
    isset($_POST["message"]) 
  
) 


{
    if (
        !empty($_POST['reponse']) 
        
    ) {
        $reponse = new Reponse
        (
            null,
            $_POST['reclamation'],
            $_POST['reponse'],
            $_POST['idRec']
        );

        $reponseC->addReponse($reponse);

        header('Location:listRps.php');
    } else
        $error = "Missing information";
}


?>

