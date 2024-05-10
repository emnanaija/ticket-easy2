<?php
include '../controller/EventC.php';
$orderC = new EventC();
$orderC->deleteEvent($_GET["IDEvent"]);
header('Location:afficherevent.php');