<?php
class Menu
{
    private ?int $idMovie = null;
    private ?string $movieName = null;
    private ?int $priceTicket = null;
    private ?string $moviePoster = null;
    private ?DateTime $date = null;
    private ?INT $idroom = null;
    private ?INT $quantityTickets = null;
    private ?string $description = null;
    private ?string $trailer = null;
    private ?INT $duration = null;
    private ?string $dateR = null;
    private ?float $rate = null;

    


    public function __construct($idMovie = null, $movieName, $priceTicket,
     $moviePoster, $date, $idroom,$quantityTickets,$description,$trailer,$duration,$dateR,$rate )
    {
        $this->idMovie = $idMovie;
        $this->movieName = $movieName;
        $this->priceTicket = $priceTicket;
        $this->moviePoster = $moviePoster;
        $this->date = $date;
        $this->idroom = $idroom;
        $this->quantityTickets = $quantityTickets;
        $this->description = $description;
        $this->trailer = $trailer;
        $this->duration = $duration;
        $this->dateR = $dateR;
        $this->rate = $rate;
       
    }

    /**
     * Get the value of idMenu
     */
    public function getidMovie()
    {
        return $this->idMovie;
    }

    /**
     * Get the value of menuName
     */
    public function getmovieName()
    {
        return $this->movieName;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setmovieName($movieName)
    {
        $this->movieName = $movieName;

        return $this;
    }

    /**
     * Get the value of priceMenu
     */
    public function getpriceTicket()
    {
        return $this->priceTicket;
    }

    /**
     * Set the value of priceMenu
     *
     * @return  self
     */
    public function setpriceTicket($priceTicket)
    {
        $this->priceTicket = $priceTicket;

        return $this;
    }

    /**
     * Get the value of quantityMenu
     */
    public function getmoviePoster()
    {
        return $this->moviePoster;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setmoviePoster($moviePoster)
    {
        $this->moviePoster = $moviePoster;

        return $this;
    }



    public function getdate()
    {
        return $this->date;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }



    public function getidroom()
    {
        return $this->idroom;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setidroom($idroom)
    {
        $this->idroom = $idroom;

        return $this;
    }

    public function getiquantityTickets()
    {
        return $this->quantityTickets;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setquantityTickets($quantityTickets)
    {
        $this->quantityTickets = $quantityTickets;

        return $this;
    }



    public function getdescription()
    {
        return $this->description;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setdescription($description)
    {
        $this->description = $description;

        return $this;
    }
    public function gettrailer()
    {
        return $this->trailer;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function settrailer($trailer)
    {
        $this->trailer = $trailer;

        return $this;
    }
    public function getduration()
    {
        return $this->duration;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setduration($duration)
    {
        $this->duration = $duration;

        return $this;
    }
    public function getdateR()
    {
        return $this->dateR;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setdateR($dateR)
    {
        $this->dateR = $dateR;

        return $this;
    }

    public function getrate()
    {
        return $this->rate;
    }

    /**
     * Set the value of quantityMenu
     *
     * @return  self
     */
    public function setrate($rate)
    {
        $this->rate = $rate;

        return $this;
    }


}