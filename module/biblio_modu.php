<?php
     class biblio{
        private $numMus;
        private $isbn;
        private $dateAchat;

        public function __construct($numM, $isb, $dAchat ){
              $this->numMus=$numM; 
              $this->isbn=$isb;
              $this->dateAchat=$dAchat;
         }
        
        public function getNumMus(){
            return $this->numMus;
        }
        public function getIsbn(){
            return $this->isbn;
        }
        public function getDateAchat(){
            return $this->dateAchat;
        }

        public function setNumMus($num){
            $this->numMus = $num;
        }
        public function setIsbn($isb){
            $this->isbn=$isb;
        }
        public function setDateAchat($dAchat){
            $this->dateAchat = $dAchat;
        }

    
    }
    

?>