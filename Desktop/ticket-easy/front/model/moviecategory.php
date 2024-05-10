<?php
class moviecategory
{
    private ?int $idcategory = null;
    private ?string $categoryName = null;
   

    


    public function __construct($idcategory = null, $categoryName)
    {    
        $this->idcategory = $idcategory;
        $this->categoryName = $categoryName;    
    }

    /**
     * Get the value of idMenu
     */
    public function getidcategory()
    {
        return $this->idcategory;
    }

    /**
     * Get the value of menuName
     */
    public function getcategoryName()
    {
        return $this->categoryName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setcategoryName($categoryName)
    {
        $this->categoryName = $categoryName;

        return $this;
    }

    /**
     * Get the value of priceMenu
     */
}