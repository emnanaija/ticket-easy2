<?php
include '../controller/OrderC.php';

session_start();


 $name=$_SESSION['firstName'];

$pdo = config::getConnexion();
$result = $pdo->query('SELECT * from client where firstName ="'. $name.'"');
$userdata = $result->fetch();

$error = "";
$order = null;
$orderC = new OrderC();



$order = new Order(
    null,
    new DateTime(date("m/d/Y")),
    "Pending",
    $userdata['idClient'],
    $_POST['priceTotal']
);

$last = $orderC->addOrder($order);
/*$name = 'erij';

$pdo=config::getConnexion();

 $result = $pdo->query('SELECT * from client where firstName ="'. $name.'"');

 $userdata = $result->fetch();*/




 
$db = config::getConnexion();

$sql1 = 'UPDATE snack p INNER JOIN line_of_snack l  ON p.idSnack= l.idSnack SET quantitySnack = (p.quantitySnack)-(l.quantity) ';
$result1 = $db->query($sql1);

$sql4 = 'DELETE FROM line_of_snack WHERE idClient ="'.$userdata['idClient'].'"';
$result4 = $db->query($sql4);

$sql2 = 'UPDATE movie m INNER JOIN line_of_order l  ON m.idMovie= m.idMovie SET quantityTickets = (m.quantityTickets)-(l.quantity) ';
$result2 = $db->query($sql2);

$sql5 = 'DELETE FROM line_of_order WHERE idClient = "'.$userdata['idClient'].'"';
$result5 = $db->query($sql5);


//$last = $_GET['varname'];
header("Location: payement.php?idOrder=$last&priceTotal=" . $_POST['priceTotal']);

//header("Location: payement.php?idOrder=".$order->getIdOrder());



?>