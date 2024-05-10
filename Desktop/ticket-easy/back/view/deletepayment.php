<?php
include '../controller/PaymentC.php';
$orderC = new PaymentC();
$orderC->deletePayment($_GET["idPay"]);
header('Location:afficherpayment.php');