<?php
    function insertion(){
        include_once('connexion.php');
        include_once('site_modu.php');

        $nomS = htmlentities(addslashes($_POST['nomSite']));
        $andc = htmlentities(addslashes($_POST['anne']));
        $codeP = htmlentities(addslashes($_POST['cp']));
        $site = new site($nomS, $andc, $codeP);
    
            $sql_aff = $connexion->prepare(
                "SELECT * FROM `site`"
            );
            $sql_aff->execute();
            $sql_aff->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($lig=$sql_aff->fetch()){
                if($lig['nomSite'] == $site->getNomSite()){
                    $i = $i=1;
                }
            }
            if($i > 0){
                header('Location: ../vue/site_vue.php?errCode');
                exit();
            }else{
                $sql_ins = $connexion->prepare(
                    "INSERT INTO `site` ( `nomSite`, `anneedecouv`, `codePays`) VALUES (?,?,?)"
                );
                try { 
                    $sql_ins->execute(array($site->getNomSite(), $site->getAnneedecouv(), $site->getCodePays()));
                    header('Location: ../vue/site_afficher.php');
                } catch(Exception $e) {
                    header('Location: ../vue/site_afficher.php?er');
                }
            }
    }
    
    function suppression($nomSit){
        include_once('connexion.php');
        include_once('site_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `site` WHERE nomSite = '$nomSit'"
        );
        $sql_delet->execute();
    }

    function updatePaye($nomSi){
        include_once('connexion.php');
        include_once('site_modu.php');

        $nomS = htmlentities(addslashes($_POST['nomSit']));
        $andc = htmlentities(addslashes($_POST['anne']));
        $codeP = htmlentities(addslashes($_POST['cp']));
        $site = new site($nomS, $andc, $codeP);
    
        $nS = $site->getNomSite();
        $an = $site->getAnneedecouv();
        $cd = $site->getCodePays();

            $sql_ins = $connexion->prepare(
                "UPDATE `site` SET nomSite = '$nS',anneedecouv='$an',codePays='$cd' WHERE nomSite = '$nomSi'"
            );
            try { 
                $sql_ins->execute();
                header('Location: ../vue/site_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/site_afficher.php?er');
            }
    }
    
    if(isset($_POST['nomSite'])){
        insertion();
    }

    if(isset($_REQUEST['codeD'])){
        $code = $_REQUEST['codeD'] ;
        suppression($code);
        header('Location: ../vue/site_afficher.php');
    }
    if(isset($_REQUEST['edit'])){
        $cd = $_REQUEST['edit'];
        updatePaye($cd);
    }
?>