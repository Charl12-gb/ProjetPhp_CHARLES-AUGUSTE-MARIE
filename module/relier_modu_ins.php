<?php
    function insertion(){
        include_once('connexion.php');
        include_once('relier_modu.php');

        $nomS1 = htmlentities(addslashes($_POST['nomSite1']));
        $nomS2 = htmlentities(addslashes($_POST['nomSite2']));
        $distance = htmlentities(addslashes($_POST['dist']));
        $relier = new relier($nomS1, $nomS2, $distance);

        if($nomS1 == $nomS2){
            header('Location: ../vue/relier_vue.php?errCode2');
            exit();
        }
        if($distance < 0){
            header('Location: ../vue/relier_vue.php?errCode3');
            exit();
        }
            $sql_aff = $connexion->prepare(
                "SELECT * FROM `relier`"
            );
            $sql_aff->execute();
            $sql_aff->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($lig=$sql_aff->fetch()){
                if(($lig['nomSite1'] == $relier->getNomSite1()) && ($lig['nomSite2'] == $relier->getNomSite2())){
                    $i = $i=1;
                }
            }
            if($i > 0){
                header('Location: ../vue/relier_vue.php?errCode');
                exit();
            }else{
                $sql_ins = $connexion->prepare(
                    "INSERT INTO `relier` (`nomSite1`, `nomSite2`, `distance`) VALUES (?,?,?)"
                );
                try { 
                    $sql_ins->execute(array($relier->getNomSite1(),  $relier->getNomSite2(), $relier->getDistance()));
                    header('Location: ../vue/relier_afficher.php');
                } catch(Exception $e) {
                    header('Location: ../vue/relier_afficher.php?er');
                }
            }
    }
    
    function suppression($nomS1, $nomS2){
        include_once('connexion.php');
        include_once('relier_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `relier` WHERE nomSite1 = '$nomS1' AND nomSite2 = '$nomS2'"
        );
        $sql_delet->execute();
    }

    function updatePaye($no1, $no2){
        include_once('connexion.php');
        include_once('relier_modu.php');

        $nomS1 = htmlentities(addslashes($_POST['nomS1']));
        $nomS2 = htmlentities(addslashes($_POST['nomS2']));
        $distan = htmlentities(addslashes($_POST['dist']));
        $relier = new relier($nomS1, $nomS2, $distan);

        if($nomS1 == $nomS2){
            header('Location: ../vue/relier_vue.php?errCode2');
            exit();
        }
        if($distan < 0){
            header('Location: ../vue/relier_vue.php?errCode3');
            exit();
        }

        $nom1 = $relier->getNomSite1();
        $nom2 = $relier->getNomSite2();
        $dista = $relier->getDistance();

        $sql_ins = $connexion->prepare(
            "UPDATE `relier` SET nomSite1 = '$nom1', nomSite2 = '$nom2', distance='$dista' WHERE nomSite1 = '$no1' AND nomSite2 = '$no2'"
        );
        try { 
            $sql_ins->execute();
            header('Location: ../vue/relier_afficher.php');
        } catch(Exception $e) {
            header('Location: ../vue/relier_afficher.php?er');
        }
    }
    
    if(isset($_POST['nomSite1'])){
        insertion();
    }

    if(isset($_REQUEST['n1'])){
        $ns1 = $_REQUEST['n1'] ;
        $ns2 = $_REQUEST['n2'] ;
        suppression($ns1, $ns2);
        header('Location: ../vue/relier_afficher.php');
    }
    if(isset($_REQUEST['edit'])){
        $ns1 = $_REQUEST['edit'] ;
        $ns2 = $_REQUEST['n2'] ;
        updatePaye($ns1, $ns2);
    }
?>