<?php
include '../config.php';
include '../model/categoryE.php';

class EventCategoryc
{
    public function listEvent()
    {
        $sql = "SELECT * FROM eventcategories";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function deleteEvent($id)
    {
        $sql = "DELETE FROM eventcategories WHERE idCategorieE = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function ajoutereventcategories($eventcategories)
    {
        $sql = "INSERT INTO eventcategories  
        VALUES (NULL, :EventCategoryE)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'EventCategoryE' => $eventcategories->getEventCategoryE()

                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateeventcategories($eventcategories, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE eventcategories SET 
                    EventCategoryE = :EventCategoryE
                WHERE idCategorieE= :idCategorieE'
            );
            $query->execute([
                'idCategorieE' => $id,
                'EventCategoryE' => $eventcategories->getEventCategoryE()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showeventcategories($id)
    {
        $sql = "SELECT * from eventcategories where idCategorieE = $id";
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



    
public function afficherEvent($ideventcategories){
  try{
    $pdo = config::getConnexion();
    $query = $pdo->prepare(
        'SELECT * FROM eventcategories where idCategorieE = :id'
    );
    $query->excute([
        'id' => $ideventcategories
        ]);
        return $query->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
}  

/*

function tri()
    {
        $sql= "SELECT * from eventcategories ORDER BY priceEvent";
        $db= config::getConnexion();
        try{
            $liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
    }

*/





}