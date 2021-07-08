<?php
    function insertion(){
        include_once('connexion.php');
        include_once('biblio_modu.php');

        $numM = htmlentities(addslashes($_POST['numM']));
        $isb = htmlentities(addslashes($_POST['isbn']));
        $dateA = htmlentities(addslashes($_POST['dat']));
        $biblio = new biblio($numM, $isb, $dateA);

            $sql_aff = $connexion->prepare(
                "SELECT * FROM `biblio`"
            );
            $sql_aff->execute();
            $sql_aff->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($lig=$sql_aff->fetch()){
                if(($lig['numMus'] == $biblio->getNumMus()) && ($lig['isbn'] == $biblio->getIsbn())){
                    $i = $i=1;
                }
            }
            if($i > 0){
                header('Location: ../vue/biblio_vue.php?errCode');
                exit();
            }else{
                $sql_ins = $connexion->prepare(
                    "INSERT INTO `biblio` (`numMus`, `isbn`, `dateAchat`) VALUES (?,?,?)"
                );
                try { 
                    $sql_ins->execute(array($biblio->getNumMus(),  $biblio->getIsbn(), $biblio->getDateAchat()));
                } catch(Exception $e) {
                    header('Location: ../vue/biblio_afficher.php');
                }
                header('Location: ../vue/biblio_afficher.php?er');
            }
    }
    
    function suppression($num, $is){
        include_once('connexion.php');
        include_once('biblio_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `biblio` WHERE numMus = '$num' AND isbn = '$is'"
        );
        $sql_delet->execute();
    }

    function updatePaye($nM, $Isbn){
        include_once('connexion.php');
        include_once('biblio_modu.php');

        $numM = htmlentities(addslashes($_POST['num']));
        $isb = htmlentities(addslashes($_POST['isbn']));
        $dateA = htmlentities(addslashes($_POST['dat']));
        $biblio = new biblio($numM, $isb, $dateA);

        $n = $biblio->getNumMus();
        $it = $biblio->getIsbn();
        $d = $biblio->getDateAchat();

        $sql_ins = $connexion->prepare(
            "UPDATE `biblio` SET numMus='$n', isbn ='$it', dateAchat= '$d' WHERE numMus = '$nM' AND isbn = '$Isbn'"
        );
        try { 
        } catch(Exception $e) {
            header('Location: ../vue/biblio_afficher.php?er');
        }
        $sql_ins->execute();
        header('Location: ../vue/biblio_afficher.php');
    }
    
    if(isset($_POST['numM'])){
        insertion();
    }

    if(isset($_REQUEST['n'])){
        $num = $_REQUEST['n'] ;
        $is = $_REQUEST['isb'] ;
        suppression($num, $is);
        header('Location: ../vue/biblio_afficher.php');
    }
    if(isset($_REQUEST['edit'])){
        $numMu = $_REQUEST['edit'] ;
        $is = $_REQUEST['isb'] ;
        updatePaye($numMu, $is);
    }
?>