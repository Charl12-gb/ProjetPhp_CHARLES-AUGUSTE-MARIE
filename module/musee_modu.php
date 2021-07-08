<?php
class musee{
    private $numMus;
    private $nomMus;
    private $nblivres;
    private $codePays;

    public function __construct($numM, $nomM, $nbL, $cdeP){
        $this->numMus = $numM;
        $this->nomMus = $nomM;
        $this->nblivres = $nbL;
        $this->codePays = $cdeP;
    }

    public function getNumMus(){
        return $this->numMus;
    }
    public function getNomMus(){
        return $this->nomMus;
    }
    public function getNblivres(){
        return $this->nblivres;
    }
    public function getCodePays(){
        return $this->codePays;
    }

    public function setNumMus($num){
        $this->numMus = $num;
    }
    public function setNomMus($nom){
        $this->nomMus = $onm;
    }
    public function setNblivres($nl){
        $this->nblivres = $nl;
    }
    public function setCodePays($cp){
        $this->codePays = $cp;
    }
}
?>