<?php

class Eventcategory
{
    private ?int $idCategoryE = null;
    private ?string $EventCategoryE = null;


    public function __construct($idCategoryE = null, $EventCategoryE)
    {
        $this->idCategoryE = $idCategoryE;
        $this->EventCategoryE = $EventCategoryE;
    }

    /**
     * Get the value of idEvent
     */
    public function getidCategoryE()
    {
        return $this->idCategoryE;
    }

    /**
     * Get the value of titre
     */
    public function getEventCategoryE()
    {
        return $this->EventCategoryE;
    }

    /**
     * Set the value of lastName
     */
    public function setEventCategoryE($EventCategoryE)
    {
        $this->EventCategoryE = $EventCategoryE;

        return $this;
    }

    
}
?>