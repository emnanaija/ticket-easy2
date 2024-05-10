<?php
include '../config.php';
include '../model/Order.php';
include '../model/Client.php';

class OrderC
{
    public function listOrders()
    {
        $sql = "SELECT * FROM oorder";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function addOrder($order)
{
    $sql = "INSERT INTO oorder VALUES (null,:orderDate,:orderState,:idClient,:priceTotal)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'orderDate' => $order->getOrderDate()->format('Y/m/d'),
            'orderState' => $order->getOrderState(),
            'idClient' => $order->getIdClient(),
            'priceTotal' => $order->getpriceTotal()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }

    $last_insert_id = $db->lastInsertId();
    return $last_insert_id ;
}

    function deleteOrder($id)
    {
        $sql = "DELETE FROM oorder WHERE idOrder = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $id);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function updateOrder($order, $id)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE oorder SET 
                    orderDate = :orderDate,
                    orderState = :orderState, 
                    idClient = :idClient,
                    priceTotal = :priceTotal
                WHERE idOrder= :idOrder'
            );
            $query->execute([
                'idOrder' => $id,
                'orderDate' => $order->getOrderDate()->format('Y/m/d'),
                'orderState' => $order->getOrderState(),
                'idClient' => $order->getIdClient(),
                'priceTotal'=> $order->getpriceTotal()
                
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showOrder($id)
    {
        $sql = "SELECT * from oorder where idOrder = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $order = $query->fetch();
            return $order;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }


    function showDate()
    {
        $sql = "SELECT orderDate from oorder ";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $order = $query->fetch();
            return $order;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
}