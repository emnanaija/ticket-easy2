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


    public function getidcategoriesnack()
    {
        return $this->idcategoriesnack;
    }


    public function getcategoriesnack()
    {
        return $this->categoriesnack;
    }
    
}
?>