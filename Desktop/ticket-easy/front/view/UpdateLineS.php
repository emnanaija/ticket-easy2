<?php
include '../controller/LineOfSnackC.php';





$error = "";

$line = null;

$lineC = new LinePC();

$lin=$lineC->showLineS($_POST['idLineS']);   
        $line = new LineP(
            $_POST['idLineS'],
			$_POST['qt'],
			$lin['idSnack'],
			$lin['idClient']
			
        );
        $lineC->updateLineS($line,$_POST["idLineS"]);
        header('Location:CartView.php');


?>