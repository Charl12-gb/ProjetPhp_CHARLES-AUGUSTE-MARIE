<?php
    function insertion(){
        include_once('connexion.php');
        include_once('referencer_modu.php');

        $nomS = htmlentities(addslashes($_POST['nomSite']));
        $np = htmlentities(addslashes($_POST['np']));
        $isb = htmlentities(addslashes($_POST['isbn']));
        $referencer = new referencer($nomS, $np, $isb);
    
            $sql_aff = $connexion->prepare(
                "SELECT * FROM `referencer`"
            );
            $sql_aff->execute();
            $sql_aff->setFetchMode(PDO::FETCH_ASSOC);
            $i = 0;
            while($lig=$sql_aff->fetch()){
                if(($lig['nomSite'] == $referencer->getNomSite()) && ($lig['numeroPage'] == $referencer->getNumeroPage()) && ($lig['isbn'] == $referencer->getIsbn() )){
                    $i = $i=1;
                }
            }
            if($i > 0){
                header('Location: ../vue/referencer_vue.php?errCode');
                exit();
            }else{
                $sql_ins = $connexion->prepare(
                    "INSERT INTO `referencer` ( `nomSite`, `numeroPage`, `isbn`) VALUES (?,?,?)"
                );
                try { 
                    $sql_ins->execute(array($referencer->getNomSite(),  $referencer->getNumeroPage(), $referencer->getIsbn()));
                    header('Location: ../vue/referencer_afficher.php');
                } catch(Exception $e) {
                    header('Location: ../vue/referencer_afficher.php?er');
                }
            }
    }
    
    function suppression($nomSit, $numP, $isbn){
        include_once('connexion.php');
        include_once('referencer_modu.php');

        $sql_delet = $connexion->prepare(
            "DELETE FROM `referencer` WHERE nomSite = '$nomSit' AND numeroPage = '$numP' AND isbn = '$isbn'"
        );
        $sql_delet->execute();
    }

    function updatePaye($nomSit, $numP, $isbn){
        include_once('connexion.php');
        include_once('referencer_modu.php');

        $nomS = htmlentities(addslashes($_POST['nomSit']));
        $np = htmlentities(addslashes($_POST['np']));
        $isb = htmlentities(addslashes($_POST['isbn']));
        $referencer = new referencer($nomS, $np, $isb);

        $nS = $referencer->getNomSite();
        $an = $referencer->getNumeroPage();
        $cd = $referencer->getIsbn();
            $sql_ins = $connexion->prepare(
                "UPDATE `referencer` SET nomSite = '$nS', numeroPage = '$an', isbn='$cd' WHERE nomSite = '$nomSit' AND numeroPage = '$numP' AND isbn = '$isbn'"
            );
            try { 
                $sql_ins->execute();
                header('Location: ../vue/referencer_afficher.php');
            } catch(Exception $e) {
                header('Location: ../vue/referencer_afficher.php?er');
            }
    }
    
    if(isset($_POST['nomSite'])){
        insertion();
    }

    if(isset($_REQUEST['n'])){
        $nom = $_REQUEST['n'] ;
        $nup = $_REQUEST['npage'] ;
        $is = $_REQUEST['i'] ;
        suppression($nom, $nup, $is);
        header('Location: ../vue/referencer_afficher.php');
    }
    if(isset($_REQUEST['edit'])){
        $nom = $_REQUEST['edit'] ;
        $nup = $_REQUEST['npage'] ;
        $is = $_REQUEST['i'] ;

        updatePaye($nom, $nup, $is);
    }
?>