<?php
include '../controller/categoryEC.php';
$orderC = new EventCategoryc();
$orderC->deleteEvent($_GET["idCategorieE"]);
header('Location:affichercategoryE.php');