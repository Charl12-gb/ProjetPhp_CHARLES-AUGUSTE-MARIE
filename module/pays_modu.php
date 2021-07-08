<?php
    class Pays{
        private $codePays;
        private $nbreHabitant;

        public function __construct($cdePays, $nbhabitant){
            $this->codePays = $cdePays;
            $this->nbreHabitant = $nbhabitant;
        }

        public function getCodePays(){
            return $this->codePays;
        }
        public function getNbreHabitant(){
            return $this->nbreHabitant;
        }

        public function setCodePays($cdPays){
            $this->codePays = $cdPays;
        }
        public function setNbreHabitant($nbH){
            $this->nbreHabitant = $nbH;
        }
    }
?>