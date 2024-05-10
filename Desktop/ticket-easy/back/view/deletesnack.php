<?php
include '../controller/snackC.php';
$productC = new snackC();
$productC->deletesnack($_GET["idSnack"]);
header('Location:affichersnack.php');