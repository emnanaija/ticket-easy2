<?php
class User
{
    private ?int $idUser = null;
    private ?string $name = null;
    private ?string $lastName = null;
    private ?string $sexe = null;
    private ?string $email = null;
    private ?string $adress = null;
    private ?int $phoneNumber = null;


    public function __construct($idUser = null,$name,$lastName,$sexe,$email,$adress,$phoneNumber)
    {
        $this->idUser = $idUser;
        $this->name = $name;
        $this->lastName = $lastName;
        $this->sexe = $sexe;
        $this->email = $email;
        $this->adress = $adress;
        $this->phoneNumber = $phoneNumber;
    }

    

    public function getidUser()
    {
        return $this->idUser;
    }



    public function getname()
    {
        return $this->name;
    }
    public function setname($name)
    {
        $this->name = $name;

        return $this;
    }




    public function getlastName()
    {
        return $this->lastName;
    }
    public function setlastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }




    public function getsexe()
    {
        return $this->sexe;
    }
    public function setsexe($sexe)
    {
        $this->sexe = $sexe;

        return $this;
    }


    public function getemail()
    {
        return $this->email;
    }
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }


    public function getadress()
    {
        return $this->adress;
    }
    public function setadress($adress)
    {
        $this->adress = $adress;

        return $this;
    }


    public function getphoneNumber()
    {
        return $this->phoneNumber;
    }
    public function setphoneNumber($phoneNumber)
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

}