<?php
include '../controller/LineOfOrderC.php';
$lineC = new LineC();
$lineC->deleteLine($_GET["idLine"]);
header('Location:CartView.php');