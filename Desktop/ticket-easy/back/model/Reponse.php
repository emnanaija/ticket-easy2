<?php
class Reponse
{
    private ?int $idRps= null;
    private ?string $reclam = null;
    private ?string $reponse = null;
    private ?int $idRec= null;
  
   

    public function __construct($id = null,$r, $n, $p)
    {
        $this->idRps= $id;
        $this->reclam = $r;
        $this->reponse = $n;
        $this->idRec = $p;
      
     

    }



    public function getReclam()
    {
        return $this->reclam;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setReclam($reclam)
    {
        $this->reclam = $reclam;

        return $this;
    }















    /**
     * Get the value of idRps
     */
    public function getidRps()
    {
        return $this->idRps;
    }

    /**
     * Get the value of lastName
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setReponse($reponse)
    {
        $this->reponse = $reponse;

        return $this;
    }

   


    public function getidRec()
    {
        return $this->idRec;
    }
    

    /**
     * Set the value of idRec
     *
     * @return  self
     */
    public function setidRec($idRec)
    {
        $this->idRec = $idRec;

        return $this;
    }

}