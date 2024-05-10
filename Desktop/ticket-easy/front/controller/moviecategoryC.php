<?php

include '../model/moviecategory.php';


class moviecategoryC
{
    public function listmoviecategory()
    {
        $sql = "SELECT * FROM moviecategory";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deletemoviecategory($id)
    {
        $sql = "DELETE FROM moviecategory WHERE idcategory= :idcategory";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idcategory', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function ajoutermoviecategory($movie)
    {
        $sql = "INSERT INTO moviecategory  
        VALUES (NULL, :categoryName)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'categoryName' => $movie->getcategoryName()   
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updatemoviecategory($movie, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE moviecategory SET 
                    categoryName = :categoryName  
                WHERE idcategory= :idcategory'
            );
            $query->execute([
                'idcategory' => $id,
                'categoryName' => $movie->getcategoryName()   
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showmoviecategory($id)
    {
        $sql = "SELECT * from moviecategory where idcategory = $id";
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
   
   

}