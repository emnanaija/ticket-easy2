<?php
include '../config.php';
include '../model/Snack.php';

class snackC
{
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
    function deleteSnack($id)
    {
        $sql = "DELETE FROM snack WHERE idSnack = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function ajoutersnack($snack)
    {
        $sql = "INSERT INTO snack  
        VALUES (NULL, :snackName,:priceSnack,:quantitySnack,:imageSnack,:idcategoriesnack)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'snackName' => $snack->getSnackName(),
                'priceSnack' => $snack->getpriceSnack(),
                'quantitySnack' => $snack->getquantitySnack(),
                'imageSnack' => $snack->getimageSnack(),
                'idcategoriesnack' => $snack->getidcategoriesnack()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
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
                    imageSnack = :imageSnack,
                    idcategoriesnack  = :idcategoriesnack 
                WHERE idSnack= :idSnack'
            );
            $query->execute([
                'idSnack' => $id,
                'snackName' => $snack->getSnackName(),
                'priceSnack' => $snack->getpriceSnack(),
                'quantitySnack' => $snack->getquantitySnack(),
                'imageSnack' => $snack->getimageSnack(),
                'idcategoriesnack' => $snack->getidcategoriesnack()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showsnack($id)
    {
        $sql = "SELECT * from snack where idSnack = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $client = $query->fetch();
            return $client;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }



    
public function afficherSnack($idsnack){
  try{
    $pdo = config::getConnexion();
    $query = $pdo->prepare(
        'SELECT * FROM snack where idSnack = :id'
    );
    $query->excute([
        'id' => $idsnack
        ]);
        return $query->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
}  



function tri()
    {
        $sql= "SELECT * from snack ORDER BY priceSnack";
        $db= config::getConnexion();
        try{
            $liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

    public function listLineS()
    {
        $sql = "SELECT * FROM line_of_snack ";
        $db = config::getConnexion();
        try {
            $lista = $db->query($sql);
            return $lista;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }





}