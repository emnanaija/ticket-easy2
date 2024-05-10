<?php
include '../controller/movieC.php';
$productC = new MovieC();
$productC->deletemovie($_GET["idMovie"]);
header('Location:affichermovie.php');