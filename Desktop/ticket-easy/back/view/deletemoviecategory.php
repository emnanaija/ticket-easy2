<?php
include '../controller/moviecategoryC.php';
$productC = new moviecategoryC();
$productC->deletemoviecategory($_GET["idcategory"]);
header('Location:affichermoviecategory.php');