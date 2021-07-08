<?php
    function insertion(){
        include_once('connexion.php');
        include_once('ouvrage_modu.php');

        $isb = htmlentities(addslashes($_POST['isbn']));
        $nbP = htmlentities(addslashes($_POST['nbp']));
        $titre = htmlentities(addslashes($_POST['titre']));
        $codePays = htmlentities(addslashes($_POST['cp']));
        $ouvrage = new ouvrage($isb, $nbP, $titre, $codePays);
    
        if($ouvrage->getNbPage() < 0){
            header('Location : ../vue/ouvrage_vue.php?err');
        }else{
            $sql_aff = $connexion->prepare(
                "SELECT * FROM `ouvrage`"
            );
            $sql_aff->execute();
            $sql_aff->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($lig=$sql_aff->fetch()){
                if($lig['isbn'] == $ouvrage->getIsbn()){
                    $i = $i=1;
                }
            }
            if($i > 0){
                header('Location: ../vue/ouvrage_vue.php?errCode');
                exit();
            }else{
                $sql_ins = $connexion->prepare(
                    "INSERT INTO `ouvrage`(`isbn`, `nbpage`, `titre`, `codePays`) VALUES (?,?,?,?)"
                );
                try { 
                    $sql_ins->execute(array($ouvrage->getIsbn(), $ouvrage->getNbPage(), $ouvrage->getTitre(), $ouvrage->getCodePays()));
                    header('Location: ../vue/ouvrage_afficher.php');
                } catch(Exception $e) {
                    header('Location: ../vue/ouvrage_afficher.php?er');
                }
            }
        }
    }
    
    function suppression($isbn){
        include_once('connexion.php');
        include_once('ouvrage_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `ouvrage` WHERE isbn = '$isbn'"
        );
        $sql_delet->execute();
    }

    function updatePaye($is){
        include_once('connexion.php');
        include_once('ouvrage_modu.php');

        $isb = htmlentities(addslashes($_POST['is']));
        $nbP = htmlentities(addslashes($_POST['nbp']));
        $titre = htmlentities(addslashes($_POST['titre']));
        $codePays = htmlentities(addslashes($_POST['c']));
        $ouvrage = new ouvrage($is, $nbP, $titre, $codePays);
    
        $nb = $ouvrage->getNbPage();
        $tit = $ouvrage->getTitre();
        $cp = $ouvrage->getCodePays();

        if($ouvrage->getNbPage() < 0){
            header('Location : ../vue/ouvrage_vue.php?err');
        }else{
            $sql_ins = $connexion->prepare(
                "UPDATE `ouvrage` SET isbn='$isb', nbpage='$nb',titre='$tit',codePays='$cp' WHERE isbn = '$is'"
            );
            try { 
                $sql_ins->execute();
                header('Location: ../vue/ouvrage_afficher.php');
            } catch(Exception $e) { 
                header('Location: ../vue/ouvrage_afficher.php?er');
            }
        }
    }
    
    if(isset($_POST['isbn'])){
        insertion();
    }

    if(isset($_REQUEST['codeD'])){
        $code = $_REQUEST['codeD'] ;
        suppression($code);
        header('Location: ../vue/ouvrage_afficher.php');
    }
    if(isset($_REQUEST['isb'])){
        $cd = $_REQUEST['isb'];
        updatePaye($cd);
    }
?>