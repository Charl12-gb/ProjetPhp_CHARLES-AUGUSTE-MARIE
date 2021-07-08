<?php
    function insertion(){
        include_once('connexion.php');
        include_once('pays_modu.php');

        $code = htmlentities(addslashes($_POST['cd']));
        $habitant = htmlentities(addslashes($_POST['nb']));
        $Pays = new Pays($code, $habitant);
    
        if($Pays->getNbreHabitant() < 0){
            header('Location : ../vue/pays_vue.php?err');
        }else{
            $sql_ins = $connexion->prepare(
                "INSERT INTO `pays`(`codePays`, `nbhabitant`) VALUES (?,?)"
            );
            try { 
                $sql_ins->execute(array($Pays->getCodePays(), $Pays->getNbreHabitant()));    
                header('Location: ../vue/pays_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/pays_vue.php?er');; 
            }
        }
    }
    
    function suppression($codeP){
        include_once('connexion.php');
        include_once('pays_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `pays` WHERE codePays = '$codeP'"
        );
        $sql_delet->execute();
    }

    function updatePaye($codeP){
        include_once('connexion.php');
        include_once('pays_modu.php');

        $code = htmlentities(addslashes($_POST['cod']));
        $habitant = htmlentities(addslashes($_POST['nbH']));
        $Pays = new Pays($code, $habitant);
    
        if($Pays->getNbreHabitant() < 0){
            header('Location : ../vue/pays_vue_modif.php?err');
        }else{
            $p = $Pays->getCodePays();
            $n = $Pays->getNbreHabitant();
            $sql_update = $connexion->prepare(
                "UPDATE `pays` SET codePays = '$p', nbhabitant = '$n' WHERE codePays = '$codeP'"
            );
            try { 
                $sql_update->execute();
                header('Location: ../vue/pays_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/pays_vue_modif.php?er');; 
            }
        }
    }

    if(isset($_REQUEST['codeD'])){
        $code = $_REQUEST['codeD'] ;
        suppression($code);
        header('Location: ../vue/pays_afficher.php');
    }
    if(isset($_POST['cd'])){
        insertion();
    }
    if(isset($_REQUEST['codeEdit'])){
        $cd = $_REQUEST['codeEdit'];
        updatePaye($cd);
    }
?>