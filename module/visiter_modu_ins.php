<?php
    function insertion(){
        include_once('connexion.php');
        include_once('visiter_modu.php');

        $numMusee = NULL;
        $numMus = htmlentities(addslashes($_POST['numM']));
        $jour = htmlentities(addslashes($_POST['jour']));
        $nbvisiteur = htmlentities(addslashes($_POST['nbV']));
        $visiter = new visiter($numMus, $jour, $nbvisiteur);
    
        if($visiter->getNbvisiteurs() < 0){
            header('Location : ../vue/visiter_vue.php?err');
        }else{
            $sql_ins = $connexion->prepare(
                "INSERT INTO `visiter`(`numMus`, `jour`, `nbvisiteurs`) VALUES (?,?,?)"
            );
            try { 
                $sql_ins->execute(array($visiter->getNumMus(), $visiter->getJour(), $visiter->getNbvisiteurs()));
                header('Location: ../vue/visiter_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/visiter_afficher.php?er');
            }
        }
    }
    
    function suppression($numvisiter, $jour){
        include_once('connexion.php');
        include_once('visiter_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `visiter` WHERE numMus = '$numvisiter' AND jour = '$jour'"
        );
        $sql_delet->execute();
    }

    function updateVisiter($numMuse, $jours){
        include_once('connexion.php');
        include_once('visiter_modu.php');

        $numMus = htmlentities(addslashes($_POST['num']));
        $jour = htmlentities(addslashes($_POST['jour']));
        $nbvisiteur = htmlentities(addslashes($_POST['nbV']));
        $visiter = new visiter($numMus, $jour, $nbvisiteur);
    
        $n = $visiter->getNumMus();
        $jo = $visiter->getJour();
        $nb = $visiter->getNbvisiteurs();

        if($visiter->getNbvisiteurs() < 0){
            header('Location : ../vue/visiter_vue.php?err');
        }else{
            $sql_ins = $connexion->prepare(
                "UPDATE `visiter` SET numMus ='$n', jour ='$jo', nbvisiteurs ='$nb' WHERE numMus = '$numMuse' AND jour = '$jours'"
            );
            try { 
                $sql_ins->execute();
                header('Location: ../vue/visiter_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/visiter_afficher.php?er');
            }
        }
    }
    
    if(isset($_POST['numM'])){
        insertion();
    }

    if(isset($_REQUEST['codeD'])){
        $num = $_REQUEST['codeD'] ;
        $j = $_REQUEST['jour'] ;
        suppression($num, $j);
        header('Location: ../vue/visiter_afficher.php');
    }

    if(isset($_REQUEST['codeEdit'])){
        $num = $_REQUEST['codeEdit'];
        $jou = $_REQUEST['jou'];

        updateVisiter($num, $jou);
    }
?>