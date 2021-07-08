<?php
class site{
    private $nomSite;
    private $anneedecouv;
    private $codePays;

    public function __construct($nomS, $annee, $cdeP){
        $this->nomSite = $nomS;
        $this->anneedecouv = $annee;
        $this->codePays = $cdeP;
    }

    public function getNomSite(){
        return $this->nomSite;
    }
    public function getAnneedecouv(){
        return $this->anneedecouv;
    }
    public function getCodePays(){
        return $this->codePays;
    }

    public function setNomSite($nom){
        $this->nomSite = $nom;
    }
    public function setAnneedecouv($an){
        $this->anneedecouv = $an;
    }
    public function setCodePays($cp){
        $this->codePays = $cp;
    }
}
?>