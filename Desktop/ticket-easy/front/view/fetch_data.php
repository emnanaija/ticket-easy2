<?php
include '../controller/snackC.php';




$db = config::getConnexion();
if (isset($_POST["action"])) {
  $query = $query = "SELECT s.*, cs.* FROM snack s 
    INNER JOIN categoriesnack cs ON s.idcategoriesnack = cs.idcategoriesnack";


  if (isset($_POST["categoriesnack"])) {
    $category_filter = implode("','", $_POST["categoriesnack"]);
    $query .= "
	  where categoriesnack IN('" . $category_filter . "')
	 ";
  }
  $statement = $db->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  $total_row = $statement->rowCount();
  $output = '';
  if ($total_row > 0) {
    foreach ($result as $row) {
      if ($row['quantitySnack'] > 0) {
        $output .= '
            
            
                    <ul class="item">
                      <li data-category="" data-price=' . $row['priceSnack'] . '>
                        <div class="hover-effect">
                          <div class="image">
                          <img class="image-inner" src="./snacks/' . $row['imageSnack'] . '" alt="images">
                          </div>
                          <div class="product-actions">

                            <a href="addLineS.php?idSnack=' . $row['idSnack'] . '" class="tf-button color-text color-style1">Order Now</a>

                          </div>
                        </div>
                        <div class="product-content">
                          <h6 class="name-product">' . $row['snackName'] . '</h6>

                          <h6 class="pricing">' . $row['priceSnack'] . 'DT</h6>
                        </div>
                      </li>
                    </ul>
             
            
                                ';
      }
    }
  } else {
    $output = '<h3>No Data Found</h3>';
  }
  echo $output;
}
