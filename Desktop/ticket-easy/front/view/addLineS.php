<?php
include '../config.php';
include '../controller/LineOfSnackC.php';


session_start();


$name=$_SESSION['firstName'] ;



$pdo=config::getConnexion();
$result = $pdo->query('SELECT * from client where firstName ="'. $name.'"');

$userdata = $result->fetch();

//var_dump($_GET['idSnack']);

$error = "";

$line = null;

$lineC = new LinePC();

$list1 = $lineC->listSnack(); 
$productId=$lineC->showSnack($_GET['idSnack']);

$count=0;

foreach($list1 as $l)
{  
     if($l['snackName']==$productId['snackName'])
     {
        $idd=$lineC->showLineByIdSnack($l['idSnack']);
        $test=is_bool($idd);
        if($test!=1)
        {
        $qtf=$idd['quantity']+1;
       
        
        

            
       
        $line = new LineP(
            $idd['idLineS'],
			$qtf,
			$idd['idSnack'],
			$userdata['idClient']
			
        );
       
        $lineC->updateLineS($line,$idd["idLineS"]);
        $count++;
    }
        
}
    


}
$idd=$lineC->showSnack($_GET['idSnack']);


    if(($count==0) && ($idd['quantitySnack'] > 0))
    {            
        $line = new LineP(
            null,
			1,
            $_GET["idSnack"],                 
            $userdata['idClient']
            
           
        );
   
        $lineC->addLineS($line);
    }  
     header('Location:AfficherSnack.php');
    
    
?>