<?php

class Order
{
    private ?int $idOrder = null;
    private ?DateTime $orderDate = null;
    private ?string $orderState = null;
    private ?int $idclient = null;
    private ?int $priceTotal = null;

    public function __construct($idOrder=null, $orderDate, $orderState, $idclient, $priceTotal)
    {
        $this->idOrder = $idOrder;
        $this->orderDate = $orderDate;
        $this->orderState = $orderState;
        $this->idclient = $idclient;
        $this->priceTotal = $priceTotal;
    }



    public function getIdOrder()
    {
        return $this->idOrder;
    }



    public function getIdclient()
    {
        return $this->idclient;
    }
    public function setIdclient($idclient)
    {
        $this->idclient = $idclient;

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
