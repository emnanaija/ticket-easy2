<?php

class Snack
{
    private ?int $idSnack = null;
    private ?string $SnackName = null;
    private ?float $priceSnack = null;
    private ?int $quantitySnack = null;
    private ?string $imageSnack = null;
    private ?int $idcategoriesnack = null;

    public function __construct($idSnack = null, $SnackName, $priceSnack, $quantitySnack,$imageSnack,$idcategoriesnack)
    {
        $this->idSnack = $idSnack;
        $this->SnackName = $SnackName;
        $this->priceSnack = $priceSnack;
        $this->quantitySnack = $quantitySnack;
        $this->imageSnack = $imageSnack;
        $this->idcategoriesnack = $idcategoriesnack;
       
    }

    /**
     * Get the value of idSnack
     */
    public function getIdSnack()
    {
        return $this->idSnack;
    }
    public function getidcategoriesnack()
    {
        return $this->idcategoriesnack;
    }
    /**
     * Get the value of SnackName
     */
    public function getSnackName()
    {
        return $this->SnackName;
    }

    /**
     * Set the value of lastName
     */
    public function setSnackName($SnackName)
    {
        $this->SnackName = $SnackName;

        return $this;
    }

    /**
     * Get the value of priceSnack
     */
    public function getpriceSnack()
    {
        return $this->priceSnack;
    }

    /**
     * Set the value of priceSnack
     *
     * @return  self
     */
    public function setpriceSnack($priceSnack)
    {
        $this->priceSnack = $priceSnack;

        return $this;
    }

     /**
     * Get the value of quantitySnack
     */
    public function getquantitySnack()
    {
        return $this->quantitySnack;
    }

    /**
     * Set the value of quantitySnack
     *
     * @return  self
     */
    public function setquantitySnack($quantitySnack)
    {
        $this->quantitySnack = $quantitySnack;

        return $this;
    }

    /**
     * Get the value of imageSnack
     */
    public function getimageSnack()
    {
        return $this->imageSnack;
    }

    /**
     * Set the value of imageSnack
     */
    public function setimageSnack($imageSnack)
    {
        $this->imageSnack = $imageSnack;

        return $this;
    }

    
}
?>