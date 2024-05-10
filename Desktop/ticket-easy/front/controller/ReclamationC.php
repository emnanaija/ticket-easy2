<?php
include '../config.php';
include '../Model/reclamation.php';

class ReclamationC
{
    public function listReclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteReclamation($id)
    {
        $sql = "DELETE FROM reclamation WHERE idRec = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addReclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation  
        VALUES (NULL, :fn,:ln, :ad,:dor, :tx)";
        $db = config::getConnexion();
        try {
            print_r($reclamation->getdor()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $reclamation->getFirstName(),
                'ln' => $reclamation->getLastName(),
                'ad' => $reclamation->getAddress(),
                'dor' => $reclamation->getdor()->format('Y/m/d'),
                'tx' => $reclamation->gettexte()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateReclamation($reclamation, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    address = :address, 
                    dor = :dor,
                    texte = :texte
                WHERE idRec= :idRec'
            );
            $query->execute([
                'idRec' => $id,
                'firstName' => $reclamation->getFirstName(),
                'lastName' => $reclamation->getLastName(),
                'address' => $reclamation->getAddress(),
                'dor' => $reclamation->getdor()->format('Y/m/d'),
                'texte' => $reclamation->gettexte()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showReclamation($id)
    {
        $sql = "SELECT * from reclamation where idRec = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
