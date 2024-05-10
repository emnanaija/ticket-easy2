<?php
include '../controller/OrderC.php';
$orderC = new OrderC();
$orderC->deleteOrder($_GET["idOrder"]);
header('Location:ListOrders.php');