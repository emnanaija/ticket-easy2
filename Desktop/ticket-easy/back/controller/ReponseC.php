<?php
include '../config.php';
include '../Model/reponse.php';

class ReponseC
{
    public function listReponse()
    {
        $sql = "SELECT * FROM reponse";
        
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }




    function deleteReponse($id)
    {
        $sql = "DELETE FROM reponse WHERE idRps = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }








    
    function addReponse($reponse)
    {
        $sql = "INSERT INTO reponse  
        VALUES (NULL,:re,:fn,:ln)";
        $db = config::getConnexion();
        try {
           
            $query = $db->prepare($sql);
            $query->execute([
                're' => $reponse->getReclam(),
                'fn' => $reponse->getReponse(),
                'ln' => $reponse->getidRec()
               
            ]); 
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }









    function updateReponse($reponse, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reponse SET 
                    
                    reponse = :reponse, 
                   

                WHERE idRps= :idRps'
            );
            $query->execute([
                'idRec' => $id,
                'reclam' => $reponse->getReclam(),
                'reponse' => $reponse->getReponse(),
                'idRec' => $reponse->getidRec(),
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    function showReponse($id)
    {
        $sql = "SELECT * from reponse where idRps = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reponse = $query->fetch();
            return $reponse;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }




}
