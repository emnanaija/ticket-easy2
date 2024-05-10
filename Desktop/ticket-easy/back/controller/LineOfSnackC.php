<?php
include '../config.php';
include '../model/LineOfSnack.php';
include '../model/Snack.php';

class LinePC
{
    public function listLineS()
    {
        $sql = "SELECT * FROM line_of_snack ";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addLineS($line)
    {
        $sql = "INSERT INTO line_of_snack  
        VALUES (NULL,:quantity,:idSnack, :idClient)";
        $db = config::getConnexion();
        try {
         
            $query = $db->prepare($sql);
            $query->execute([
                'quantity'  => $line->getquantity(),
                'idSnack' => $line->getidSnack(),
                'idClient' => $line->getidClient()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function deleteLineS($id)
    {
        $sql = "DELETE FROM line_of_snack WHERE idLineS = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function updateLineS($line, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE line_of_snack SET 
                    
                   
                    quantity = :quantity,
                    idSnack = :idSnack,
                    idClient = :idClient
                    
                WHERE idLineS= :idLineS'
            );
            $query->execute([
                'idLineS' => $id,
                'quantity' => $line->getquantity(),
                    'idSnack' => $line->getidSnack(),
                    'idClient' => $line->getidClient()
                    
               
                
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }


    public function listSnack()
    {
        $sql = "SELECT * FROM snack";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


   


    function showSnack($id)
    {
        $sql = "SELECT * from snack where idSnack = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function showLineS($id)
    {
        $sql = "SELECT * from line_of_snack where idLineS = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function showSnackByName($id)
    {
        $sql = "SELECT * from snack where snackName = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Snackuct = $query->fetch();
            return $Snackuct;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    function calc()
    {
// PDO object initialization
try {
    $pdo = new PDO("mysql:host=localhost;dbname=ticketeasy",'root', '');
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
        
        $sql = $pdo->query('SELECT * FROM snack')->rowCount();
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $menu = $query->fetch();
            return $menu;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }


    }
    


    function showLineByIdSnack($id)
    {
        $sql = "SELECT * from line_of_snack where idSnack = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Snackuct = $query->fetch();
            return $Snackuct;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




    function deleteBasket($id)
    {
        $sql = "DELETE FROM line_of_snack WHERE idClient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function updatesnack($snack, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE snack SET 
                    snackName = :snackName, 
                    priceSnack = :priceSnack, 
                    quantitySnack = :quantitySnack,
                    category = :category,
                    imageSnack = :imageSnack
                WHERE idSnack= :idSnack'
            );
            $query->execute([
                'idSnack' => $id,
                'snackName' => $snack->getsnackName(),
                'priceSnack' => $snack->getpriceSnack(),
                'quantitySnack' => $snack->getquantitySnack(),
                'category' => $snack->getcategory(),
                'imageSnack' => $snack->getimageSnack()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
}