<?php
include '../controller/LineOfOrderC.php';





$error = "";

$line = null;

$lineC = new LineC();

$lin=$lineC->showLine($_POST['idLine']);   
        $line = new Line(
            $_POST['idLine'],
			$_POST['qt'],
			$lin['idMovie'],
			$lin['idClient']
			
        );
        $lineC->updateLine($line,$_POST["idLine"]);
        header('Location:CartView.php');


?>