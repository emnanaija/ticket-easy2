<?php

class categoriesnack
{
    private ?int $idcategoriesnack = null;
    private ?string $categoriesnack = null;


    public function __construct($idcategoriesnack = null, $categoriesnack)
    {
        $this->idcategoriesnack = $idcategoriesnack;
        $this->categoriesnack = $categoriesnack;

       
    }

    /**
     * Get the value of idSnack
     */
    public function getidcategoriesnack()
    {
        return $this->idcategoriesnack;
    }

    /**
     * Get the value of SnackName
     */
    public function getcategoriesnack()
    {
        return $this->categoriesnack;
    }
    
}
?>