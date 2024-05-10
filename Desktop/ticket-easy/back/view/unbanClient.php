<?php
// Inclure le fichier contenant la classe ClientC
include '../controller/ClientC.php';

// Créer une nouvelle instance de la classe ClientC
$clientC = new ClientC();

// Vérifier si l'ID du client est fourni dans l'URL
if (isset($_GET['id'])) {
    $clientId = $_GET['id'];

    // Récupérer le client par son ID
   
    // Modifier la valeur de la colonne isBanned à false
    

    // Mettre à jour la colonne isBanned dans la base de données
    $clientC->updateClientIsBanned(false, $clientId);
    
    // Rediriger vers la page précédente
    header('Location: listclients.php');
    
    exit();
}
?>