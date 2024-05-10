<?php
//include '../config.php';
include '../controller/LineOfOrderC.php';

session_start();



$name=$_SESSION['firstName'] ;


   $pdo=config::getConnexion();
    $result = $pdo->query('SELECT * from client where firstName ="'. $name.'"');

    $userdata = $result->fetch();
     echo($userdata['idClient']);






$error = "";

$line = null;

$lineC = new LineC();

$list1 = $lineC->listMovie(); 

$movieId=$lineC->showMovie($_GET['idMovie']);
//$listlines=$lineC->listLine();
//$Movie=$lineC->showMovieByName($MovieId['MovieName']);
$count=0;

foreach($list1 as $l)
{   //echo $l['MovieName'];
   // echo $Movie['MovieName'];
     if($l['movieName']==$movieId['movieName'])
     {//echo "hello";
        $idd=$lineC->showLineByIdMovie($l['idMovie']);
        $test=is_bool($idd);
       // echo $test;
        if($test!=1)
        {
        $qtf=$idd['quantity']+1;
        //echo $qtf;
        
        

            
       
        $line = new Line(
            $idd['idLine'],
			$qtf,
			$idd['idMovie'],
			$userdata['idClient']
			
        );
        //var_dump($line);
        $lineC->updateLine($line,$idd["idLine"]);
        $count++;
    }
        
}
    


}



$MovieId=$lineC->showMovie($_GET['idMovie']);
    if(($count==0) && ($MovieId['quantityTickets'] > 0))
    {            
        $line = new Line(
            null,
			1,
            $_GET["idMovie"],                 
            $userdata['idClient']
        );
   
        $lineC->addLine($line);
    }  
       header('Location:home.php');
    
    
?>