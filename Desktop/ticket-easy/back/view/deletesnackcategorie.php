<?php
include '../controller/categoriesnackC.php';
$productC = new categoriesnackC();
$productC->deletecategoriesnack($_GET["idcategoriesnack"]);
header('Location:affichersnackcategorie.php');