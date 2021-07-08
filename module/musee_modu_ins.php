<?php
    function insertion(){
        include_once('connexion.php');
        include_once('musee_modu.php');

        $numMusee = NULL;
        $nom = htmlentities(addslashes($_POST['nom']));
        $nbliv = htmlentities(addslashes($_POST['nbl']));
        $codePays = htmlentities(addslashes($_POST['cp']));
        $musee = new musee($numMusee, $nom, $nbliv, $codePays);
    
        if($musee->getNblivres() < 0){
            header('Location : ../vue/musee_vue.php?err');
        }else{
            $sql_ins = $connexion->prepare(
                "INSERT INTO `musee`(`numMus`, `nomMus`, `nblivres`, `codePays`) VALUES (?,?,?,?)"
            );
            try { 
                $sql_ins->execute(array($musee->getNumMus(), $musee->getNomMus(), $musee->getNblivres(), $musee->getCodePays()));
                header('Location: ../vue/musee_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/musee_afficher.php?er');
            }
        }
    }
    
    function suppression($numMusee){
        include_once('connexion.php');
        include_once('musee_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `musee` WHERE numMus = '$numMusee'"
        );
        $sql_delet->execute();
    }

    function updatePaye($numMusee){
        include_once('connexion.php');
        include_once('musee_modu.php');

        $nom = htmlentities(addslashes($_POST['nom']));
        $nbliv = htmlentities(addslashes($_POST['nbl']));
        $codePays = htmlentities(addslashes($_POST['codeP']));
        $musee = new musee($numMusee, $nom, $nbliv, $codePays);
    
        $nm = $musee->getNomMus();
        $nb = $musee->getNblivres();
        $cp = $musee->getCodePays();

        if($musee->getNblivres() < 0){
            header('Location : ../vue/musee_vue.php?err');
        }else{
            $sql_ins_edit = $connexion->prepare(
                "UPDATE `musee` SET nomMus ='$nm', nblivres ='$nb', codePays='$cp' WHERE numMus ='$numMusee'"
            );
            try { 
                $sql_ins_edit->execute();
                header('Location: ../vue/musee_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/musee_afficher.php?er');
            }
        }
    }

    if(isset($_REQUEST['codeD'])){
        $code = $_REQUEST['codeD'] ;
        suppression($code);
        header('Location: ../vue/musee_afficher.php');
    }
    if(isset($_POST['cp'])){
        insertion();
    }
    if(isset($_REQUEST['codEdit'])){
        $cd = $_REQUEST['codEdit'];
        updatePaye($cd);
    }
?>