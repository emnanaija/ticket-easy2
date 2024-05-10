<?php

include '..\config.php';

session_start();
$name=$_SESSION['firstName'] ;

   $pdo=config::getConnexion();
   
    $result = $pdo->query('SELECT * from client where firstName ="'. $name.'"');

    $userdata = $result->fetch();
  



    
$db = config::getConnexion();

$sql1 = "UPDATE Payment p INNER JOIN oorder o ON p.idOrder = o.idOrder SET orderState = 'Ready'";
$result1 = $db->query($sql1);



$last = $_GET['varname'];

header('Location:CartView.php');
?>