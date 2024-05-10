<?php
include '../controller/snackC.php';




$db = config::getConnexion();
if(isset($_POST["action"]))
{
    $query = "SELECT * FROM snack";
   
 
 if(isset($_POST["minimum_price"], $_POST["maximum_price"]) && !empty($_POST["minimum_price"]) && !empty($_POST["maximum_price"]))
 {
  $query .= " WHERE priceSnack BETWEEN '".$_POST["minimum_price"]."' AND '".$_POST["maximum_price"]."'";
   
  
 }
    $statement = $db->prepare($query);
    $statement->execute();
    $result = $statement->fetchAll();
    $total_row = $statement->rowCount();
    $output = '';
    if($total_row > 0)
    {
        foreach ($result as $row)
        {
            $output .='<div class="item-box " id="item-box">
            <ul class="item" >
                <li data-category="">
                <div class="hover-effect">
                    <div class="image">
                        <img src="./snacks/'. $row['imageSnack'] .'" alt="images" width="250" height="250">
                    </div>
                    <div class="product-actions">										
                       
                        <a href="addLineS.php?idProduct='. $row['idSnack'] .'" class="tf-button color-text color-style1">Order Now</a>
                       
                    </div>																				
                </div>
                <div class="product-content">
                    <h6 class="name-product">'. $row['snackName'] .'</h6>
                    
                    <h6 class="pricing" >'. $row['priceSnack'] .'DT</h6>
                </div>
</li>
</ul>
        </div>
            
                                ';
        }
    }
    else
    {
        $output = '<h3>No Data Found</h3>';
    }
    echo $output;
}