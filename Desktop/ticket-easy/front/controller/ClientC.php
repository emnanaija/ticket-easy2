<?php
include '../config.php';
include '../model/Client.php';

class ClientC
{
    public function listClients()
    {
        $sql = "SELECT * FROM client";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteClient($id)
    {
        $sql = "DELETE FROM client WHERE idClient = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addClient($client)
    {
        $sql = "INSERT INTO client  
        VALUES (NULL, :fn,:ln, :ad,:em,:num,:dob,:pass,null)";
        $db = config::getConnexion();
        try {
            print_r($client->getDob()->format('Y-m-d'));
            $query = $db->prepare($sql);
            $query->execute([
                'fn' => $client->getFirstName(),
                'ln' => $client->getLastName(),
                'ad' => $client->getAddress(),
                'em' => $client->getEmail(),
                'num' => $client->getNumberClient(),
                'dob' => $client->getDob()->format('Y/m/d'),
                'pass' => $client->getPassword()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateClient($client, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE client SET 
                    firstName = :firstName, 
                    lastName = :lastName, 
                    address = :address, 
                    email= :email,
                    numberClient= :numberClient,
                    dob = :dob,
                    password=:password,
                    isBanned=false
    
                
                WHERE idClient= :idClient'
            );
            $query->execute([
                'idClient' => $id,
                'firstName' => $client->getFirstName(),
                'lastName' => $client->getLastName(),
                'address' => $client->getAddress(),
                'email' => $client->getEmail(),
                'numberClient' => $client->getNumberClient(),
                'dob' => $client->getDob()->format('Y/m/d'),
                'password' => $client->getPassword(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
   

    function showClient($id)
    {
        $sql = "SELECT * from client where idClient = $id";
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

    public function getBannedClients() {
        $db = config::getConnexion();
        $sql = "SELECT * FROM client WHERE isBanned = 1";
        $query = $db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }
    
    public function banClient($idClient)
    {
        $db = config::getConnexion();
        $query = $db->prepare("UPDATE client SET  isBanned = true WHERE idClient = ?");
        $query->execute([$idClient]);
    }
    
    public function updateClientIsBanned($isBanned, $id)
    {
       
        try {
            $pdo = config::getConnexion();
            $query = "UPDATE client SET isBanned = :isBanned WHERE idClient = :id";
            $stmt = $pdo->prepare($query);
            $stmt->bindValue(':isBanned', $isBanned);
            $stmt->bindValue(':id', $id);
            $stmt->execute();
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    
    

    
public function getClientById($id)
{
    $db = config::getConnexion();
    $sql = "SELECT * FROM client WHERE idClient=:idClient";
    $query = $db->prepare($sql);
    $query->bindValue(":idClient", $id);
    $query->execute();
    $clientData = $query->fetch();

    if ($clientData) {
        $client = new Client(
            $clientData['firstName'],
            $clientData['lastName'],
            $clientData['address'],
            $clientData['email'],
            $clientData['numberClient'],
            $clientData['dob'],
            $clientData['password'],
           //$clientData['isBanned'],
         
            $clientData['idClient']
        );
        return $client;
    } else {
        return null;
    }
}



    }
    
    


