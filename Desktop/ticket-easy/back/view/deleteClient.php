<?php
include '../controller/ClientC.php';
$clientC = new ClientC();
$clientC->deleteClient($_GET["idClient"]);
header('Location:ListClients.php');
