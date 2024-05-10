<?php
include 'C:\xamppp\htdocs\rania panier\front\config.php';

include 'C:\xamppp\htdocs\rania panier\front\model\User.php';

class UserC
{




public function listUsers()
    {
        $sql = "SELECT * FROM user";
        $db = config::getConnexion();
        try {
            $list = $db->query($sql);
            return $list;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function showUser($id)
    {
        $sql = "SELECT * from user where idUSer = $id";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $product = $query->fetch();
            return $product;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

}