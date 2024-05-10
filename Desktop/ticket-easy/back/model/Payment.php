<?php

class Payment
{
    private ?int $idPay = null;
    private ?int $Total = null;
    private ?string $card_type = null;
    private ?int $cardNumber = null;
    private ?int $CVC = null;
    private ?int $idOrder = null;
    

    public function __construct($idPay=null, $Total, $card_type, $cardNumber, $CVC,$idOrder)
    {
        $this->idPay = $idPay;
        $this->Total = $Total;
        $this->card_type = $card_type;
        $this->cardNumber = $cardNumber;
        $this->CVC = $CVC;   
        $this->idOrder = $idOrder;   
    }



    public function getidPay()
    {
        return $this->idPay;
    }
    public function getidOrder()
    {
        return $this->idOrder;
    }



    public function getcardNumber()
    {
        return $this->cardNumber;
    }
    public function setcardNumber($cardNumber)
    {
        $this->cardNumber = $cardNumber;

        return $this;
    }


    public function getcard_type()
    {
        return $this->card_type;
    }
    public function setcard_type($card_type)
    {
        $this->card_type = $card_type;

        return $this;
    }




    public function getTotal()
    {
        return $this->Total;
    }
    public function setTotal($Total)
    {
        $this->Total = $Total;

        return $this;
    }



    public function getCVC()
    {
        return $this->CVC;
    }
    public function setCVC($CVC)
    {
        $this->CVC = $CVC;

        return $this;
    }

}
