<?php
class ouvrage{
    private $isbn;
    private $nbPage;
    private $titre;
    private $codePays;

    public function __construct($isb, $nbp, $tit, $cdeP){
        $this->isbn = $isb;
        $this->nbPage = $nbp;
        $this->titre = $tit;
        $this->codePays = $cdeP;
    }

    public function getIsbn(){
        return $this->isbn;
    }
    public function getNbPage(){
        return $this->nbPage;
    }
    public function getTitre(){
        return $this->titre;
    }
    public function getCodePays(){
        return $this->codePays;
    }

    public function setIsbn($isb){
        $this->isbn = $isb;
    }
    public function setNbPage($nbP){
        $this->nbPage = $nbP;
    }
    public function setTitre($tit){
        $this->titre = $tit;
    }
    public function setCodePays($cp){
        $this->codePays = $cp;
    }
}
?>