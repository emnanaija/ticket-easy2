<?php
class Reclamation
{
    private ?int $idRec= null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $address = null;
    private ?DateTime $dor= null;
    private ?string $texte = null;
   

    public function __construct($id = null, $n, $p, $a, $d, $t)
    {
        $this->idRec= $id;
        $this->lastName = $n;
        $this->firstName = $p;
        $this->address = $a;
        $this->dor= $d;
        $this->texte = $t;
     

    }

    /**
     * Get the value of idRec
     */
    public function getidRec()
    {
        return $this->idRec;
    }

    /**
     * Get the value of lastName
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get the value of address
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get the value of dor
     */
    public function getdor()
    {
        return $this->dor;
    }

    /**
     * Set the value of dor
     *
     * @return  self
     */
    public function setdor($dor)
    {
        $this->dor= $dor;

        return $this;
    }
    public function gettexte()
    {
        return $this->texte;
    }
    /**
     * Set the value of dor
     *
     * @return  self
     */
    public function settexte($texte)
    {
        $this->texte = $texte;

        return $this;
    }
  
}
