<?php
class Client
{
    private ?int $idClient = null;
    private ?string $lastName = null;
    private ?string $firstName = null;
    private ?string $address = null;
    private ?string $email = null;
    private ?string $numberClient = null;
    private ?DateTime $dob = null;
    private ?string $password = null;
    private ?string $isBanned = null;
    
    public function __construct($id = null, $n, $p, $a, $e, $num, $d, $pass, $isBanned = null)
    {
        $this->idClient = (int)$id;
        $this->lastName = $n;
        $this->firstName = $p;
        $this->address = $a;
        $this->email = $e;
        $this->numberClient = $num;
        $this->dob = $d ? new DateTime($d) : null; // create new DateTime instance from string value
        $this->password = $pass;
        $this->isBanned = $isBanned;
    }


    
  public function getClientById($id)
    {
        $db = config::getConnexion();
        $sql = "SELECT * FROM client WHERE idClient = :id";
        $query = $db->prepare($sql);
        $query->bindParam(':id', $id);
        $query->execute();
        $clientData = $query->fetch();
    
        // check if the client exists
        if (!$clientData) {
            return null;
        }
    
        // create a new client object
        $client = new Client(
            $clientData['idClient'],
            $clientData['firstName'],
            $clientData['lastName'],
            $clientData['address'],
            $clientData['email'],
            $clientData['numberClient'],
            new DateTime($clientData['dob']),
            $clientData['password']
        );
    
        $client->setIsBanned($clientData['isBanned']);
       
    
        return $client;
    }
    
    /**
     * Get the value of idClient
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
    public function setIdClient($idClient)
    {
        $this->idClient = $idClient;
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

    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email= $email;

        return $this;
    }
    public function getNumberClient()
    {
        return $this->numberClient;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setNumberClient($numberClient)
    {
        $this->numberClient = $numberClient;

        return $this;
    }
    /**
     * Get the value of dob
     */
    public function getDob()
    {
        return $this->dob;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setDob($dob)
    {
        $this->dob = $dob;

        return $this;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getIsBanned()
    {
        return $this->isBanned;
    }

    /**
     * Set the value of address
     *
     * @return  self
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }
    public function setIsBanned($isBanned) {
        $this->isBanned = $isBanned;
    }
}
