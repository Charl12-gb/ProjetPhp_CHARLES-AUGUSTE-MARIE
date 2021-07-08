<?php
     class referencer{
        private  $nomSite;
        private  $numeroPage;
        private  $isbn;

        public function __construct($nomS, $numPage, $isb){
              $this->nomSite=$nomS; 
              $this->numeroPage=$numPage; 
              $this->isbn=$isb;
         }
        
        public function getNomSite(){
            return $this->nomSite;
        }
        public function getNumeroPage(){
            return $this->numeroPage;
        }
        public function getIsbn(){
            return $this->isbn;
        }

        public function setNomSite($nom){
            $this->nomSite = $nom;
        }
        public function setNumeroPage($nPge){
            $this->numeroPage = $nPge;
        }
        public function setIsbn($isb){
            $this->isbn=$isb;
        }

    
    }
    

?>