<?php
include '../controller/LineOfSnackC.php';
$lineC = new LinePC();
$lineC->deleteLineS($_GET["idLineP"]);
header('Location:CartView.php');