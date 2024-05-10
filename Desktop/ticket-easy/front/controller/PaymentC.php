<?php
include '../config.php';
include '../model/Payment.php';
include '../model/Client.php';

class PaymentC
{
    public function listPayments()
    {
        $sql = "SELECT * FROM Payment";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addPayment($Payment)
{
    $sql = "INSERT INTO Payment VALUES (null,:Total,:card_type,:cardNumber,:CVC,:idOrder)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'Total' => $Payment->getTotal(),
            'card_type' => $Payment->getcard_type(),
            'cardNumber' => $Payment->getcardNumber(),
            'CVC' => $Payment->getCVC(),
            'idOrder' => $Payment->getidOrder()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $last_insert_id = $db->lastInsertId();
    return $last_insert_id ;
}

    function deletePayment($id)
    {
        $sql = "DELETE FROM Payment WHERE idPay = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function updatePayment($Payment, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE Payment SET 
                    Total = :Total,
                    card_type = :card_type, 
                    cardNumber = :cardNumber,
                    CVC = :CVC,
                    idOrder = :idOrder
                WHERE idPay= :idPay'
            );
            $query->execute([
                'idPay' => $id,
                'Total' => $Payment->getTotal(),
                'card_type' => $Payment->getcard_type(),
                'cardNumber' => $Payment->getcardNumber(),
                'CVC' => $Payment->getCVC(),
                'idOrder' => $Payment->getidOrder()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showPayment($id)
    {
        $sql = "SELECT * from Payment where idPay = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Payment = $query->fetch();
            return $Payment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


  /*  function showDate()
    {
        $sql = "SELECT PaymentDate from Payment ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $Payment = $query->fetch();
            return $Payment;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }*/
    
}