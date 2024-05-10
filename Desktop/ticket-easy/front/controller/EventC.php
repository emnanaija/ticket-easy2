<?php
include '../config.php';
include '../model/Event.php';

class EventC
{
    public function listEvent()
    {
        $sql = "SELECT * FROM events";
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
        $sql = "DELETE FROM events WHERE idEvent = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function ajouterevents($events)
    {
        $sql = "INSERT INTO events  
        VALUES (NULL, :titre,:idClient,:dateEvent,:lieu,:budget,:categorie)";
        $db = config::getConnexion();
        try {
            
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $events->gettitre(),
                'idClient' => $events->getidClient(),
                'dateEvent' => $events->getdateEvent()->format('Y-m-d'),
                'lieu' => $events->getlieu(),
                'budget' => $events->getbudget(),
                'categorie' => $events->getcategorie()
                
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function updateevents($events, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE events SET 
                    titre = :titre, 
                    idClient = :idClient, 
                    lieu = :lieu,
                    budget = :budget,
                    categories = :categories
                WHERE IDEvent= :IDEvent'
            );
            $query->execute([
                'IDEvent' => $id,
                'titre' => $events->gettitre(),
                'idClient' => $events->getidClient(),
                'lieu' => $events->getlieu(),
                'budget' => $events->getbudget(),
                'categories' => $events->getcategories()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showevents($id)
    {
        $sql = "SELECT * from events where IDEvent = $id";
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



    
public function afficherEvent($idevents){
  try{
    $pdo = config::getConnexion();
    $query = $pdo->prepare(
        'SELECT * FROM events where IDEvent = :id'
    );
    $query->excute([
        'id' => $idevents
        ]);
        return $query->fetchAll();
    }catch(PDOException $e){
        $e->getMessage();
    }
}  

/*

function tri()
    {
        $sql= "SELECT * from events ORDER BY priceEvent";
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