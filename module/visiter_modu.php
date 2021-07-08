<?php
class visiter{
    private $numMus;
    private $jour;
    private $nbvisiteurs;

    public function __construct($numM, $j, $nbvisit){
        $this->numMus = $numM;
        $this->jour = $j;
        $this->nbvisiteurs = $nbvisit;
    }

    public function getNumMus(){
        return $this->numMus;
    }
    public function getJour(){
        return $this->jour;
    }
    public function getNbvisiteurs(){
        return $this->nbvisiteurs;
    }

    public function setNumMus(){
        return $this->numMus;
    }
    public function setJour($j){
        $this->jour = $j;
    }
    public function setNbvisiteurs($nv){
        $this->nbvisiteurs = $nv;
    }
}
?>