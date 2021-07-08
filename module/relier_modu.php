<?php
class relier{
    private $nomSite1;
    private $nomSite2;
    private $distance;
    
    
    public function __construct($nomS1, $nomS2, $dis){
        $this->nomSite1 = $nomS1;
        $this->nomSite2 = $nomS2;
        $this->distance = $dis;
    }

    public function getNomSite1(){
        return $this->nomSite1;
    }
    public function getNomSite2(){
        return $this->nomSite2;
    }
    public function getDistance(){
        return $this->distance;
    }

    public function setNomSite1($nomSi1){
        $this->nomSite1 = $nomSi1;
    }
    public function setNomSite2($nomSi2){
        $this->nomSite2 = $nomSi2;
    }
    public function setDistance($dist){
        $this->distance = $dist;
    }
}
?>