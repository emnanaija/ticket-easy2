<?php
include '../config.php';
include '../model/categoriesnack.php';

class categoriesnackC
{
    public function listcategoriesnack()
    {
        $sql = "SELECT * FROM categoriesnack";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletecategoriesnack($id)
    {
        $sql = "DELETE FROM categoriesnack WHERE idcategoriesnack = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function ajoutercategoriesnack($categoriesnack)
    {
        $sql = "INSERT INTO categoriesnack  
        VALUES (NULL,:categoriesnack)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'categoriesnack' => $categoriesnack->getcategoriesnack()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updatecategoriesnack($categoriesnack, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE categoriesnack SET 
                    categoriesnack = :categoriesnack
                WHERE categoriesnack= :categoriesnack'
            );
            $query->execute([
                'idcategoriesnack' => $id,
                'categoriesnack' => $categoriesnack->getcategoriesnack()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showcategoriesnack($id)
    {
        $sql = "SELECT * from categoriesnack where idcategoriesnack = $id";
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



    
public function affichercategoriesnack($idcategoriesnack){
  try{
    $pdo = config::getConnexion();
    $query = $pdo->prepare(
        'SELECT * FROM categoriesnack where idcategoriesnack = :id'
    );
    $query->excute([
        'id' => $idcategoriesnack
        ]);
        return $query->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
}  



function tri()
    {
        $sql= "SELECT * from categoriesnack ORDER BY categoriesnack";
        $db= config::getConnexion();
        try{
            $liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

   /* public function listLineS()
    {
        $sql = "SELECT * FROM line_of_categoriesnack ";
        $db = config::getConnexion();
        try {
            $lista = $db->query($sql);
            return $lista;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }*/





}