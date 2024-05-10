<?php
class Line
{
    private ?int $idLine = null;
    private ?int $quantity = null;
    private ?int $idMovie = null;
    private ?int $idClient = null;
   

    public function __construct($idLine = null,$quantity, $idMovie, $idClient)
    {
        $this->idLine = $idLine;
        $this->quantity = $quantity;
        $this->idMovie = $idMovie;
        $this->idClient = $idClient;
        
    }

    

    public function getIdLine()
    {
        return $this->idLine;
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



    public function getidMovie()
    {
        return $this->idMovie;
    }
    public function setidMovie($idMovie)
    {
        $this->idMovie = $idMovie;

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