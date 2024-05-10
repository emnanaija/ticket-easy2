<?php

class Event
{
    private ?int $idEvent = null;
    private ?string $titre = null;
    private ?int $idClient = null;
    private ?DateTime $dateEvent = null;
    private ?string $lieu = null;
    private ?int $budget = null;
    private ?string $categorie = null;

    public function __construct($idEvent = null, $titre, $idClient, $dateEvent, $lieu, $budget, $categorie)
    {
        $this->idEvent = $idEvent;
        $this->titre = $titre;
        $this->idClient = $idClient;
        $this->dateEvent = DateTime::createFromFormat('Y-m-d', $dateEvent);
        $this->lieu = $lieu;
        $this->budget = $budget;
        $this->categorie = $categorie;
    }

    /**
     * Get the value of idEvent
     */
    public function getIDEvent()
    {
        return $this->idEvent;
    }

    /**
     * Get the value of titre
     */
    public function gettitre()
    {
        return $this->titre;
    }

    /**
     * Set the value of lastName
     */
    public function settitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get the value of idClient
     */
    public function getidClient()
    {
        return $this->idClient;
    }

    /**
     * Set the value of idClient
     *
     * @return  self
     */
    public function setidClient($idClient)
    {
        $this->idClient = $idClient;

        return $this;
    }

    /**
     * Get the value of dateEvent
     */
    public function getdateEvent()
    {
        return $this->dateEvent;
    }

    /**
     * Set the value of dateEvent
     *
     * @return  self
     */
    public function setdateEvent($dateEvent)
    {
        $this->dateEvent = $dateEvent;

        return $this;
    }
    /**
     * Get the value of lieu
     */
    public function getlieu()
    {
        return $this->lieu;
    }

    /**
     * Set the value of lieu
     */
    public function setlieu($lieu)
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * Get the value of budget
     */
    public function getbudget()
    {
        return $this->budget;
    }

    /**
     * Set the value of budget
     */
    public function setbudget($budget)
    {
        $this->budget = $budget;

        return $this;
    }
    public function getcategorie()
    {
        return $this->categorie;
    }

    /**
     * Set the value of budget
     */
    public function setcategorie($categorie)
    {
        $this->categorie = $categorie;

        return $this;
    }
}
