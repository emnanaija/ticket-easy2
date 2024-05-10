<?php
class LineP
{
    private ?int $idLineP = null;
    private ?int $quantity = null;
    private ?int $idSnack = null;
    private ?int $idClient = null;
   

    public function __construct($idLineP = null,$quantity, $idSnack, $idClient)
    {
        $this->idLineP = $idLineP;
        $this->quantity = $quantity;
        $this->idSnack = $idSnack;
        $this->idClient = $idClient;
       
    }

    

    public function getIdLineP()
    {
        return $this->idLineP;
    }



    public function getquantity()
    {
        return $this->quantity;
    }
    public function setquantity($quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }




    



    public function getidSnack()
    {
        return $this->idSnack;
    }
    public function setidSnack($idSnack)
    {
        $this->idSnack = $idSnack;

        return $this;
    }


    public function getidClient()
    {
        return $this->idClient;
    }
    public function setidClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }



    


}