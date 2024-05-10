<?php

class Order
{
    private ?int $idOrder = null;
    private ?DateTime $orderDate = null;
    private ?string $orderState = null;
    private ?int $idClient = null;
    private ?int $priceTotal = null;

    public function __construct($idOrder=null,$orderDate,$orderState,$idClient,$priceTotal)
    {
        $this->idOrder = $idOrder;
        $this->orderDate = $orderDate;
        $this->orderState = $orderState;
        $this->idClient = $idClient;
        $this->priceTotal = $priceTotal;
    }


    public function getIdOrder()
    {
        return $this->idOrder;
    }



    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }


    public function getOrderState()
    {
        return $this->orderState;
    }
    public function setOrderState($orderState)
    {
        $this->orderState = $orderState;

        return $this;
    }




    public function getOrderDate()
    {
        return $this->orderDate;
    }
    public function setOrderDate($orderDate)
    {
        $this->orderDate = $orderDate;

        return $this;
    }



    public function getpriceTotal()
    {
        return $this->priceTotal;
    }
    public function setpriceTotal($priceTotal)
    {
        $this->priceTotal = $priceTotal;

        return $this;
    }

}
