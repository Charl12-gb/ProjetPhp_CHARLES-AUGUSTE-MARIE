<?php
if(!isset($_REQUEST['pg']))
{
    include('../vue/accueil.php');
}

else
{
    switch($_REQUEST['pg'])
    {
        case 'ajoutermus' : 
            header('Location: ../vue/musee_vue.php');
        break;
        case 'affichermus' : 
            header('Location: ../vue/musee_afficher.php');
        break;
        case 'ajouterpays' : 
            header('Location: ../vue/pays_vue.php');
        break;
        case 'afficherpays' : 
            header('Location: ../vue/pays_afficher.php');
        break;
        case 'ajoutervisiter' : 
            header('Location: ../vue/visiter_vue.php');
        break;
        case 'affichervisiter' : 
            header('Location: ../vue/visiter_afficher.php');
        break;
        case 'ajouterouvrage' : 
            header('Location: ../vue/ouvrage_vue.php');
        break;
        case 'afficherouvrage' : 
            header('Location: ../vue/ouvrage_afficher.php');
        break;
        case 'ajouterbiblio' : 
            header('Location: ../vue/biblio_vue.php');
        break;
        case 'afficherbiblio' : 
            header('Location: ../vue/biblio_afficher.php');
        break;
        case 'ajoutersite' : 
            header('Location: ../vue/site_vue.php');
        break;
        case 'affichersite' : 
            header('Location: ../vue/site_afficher.php');
        break;
        case 'ajouterrefer' : 
            header('Location: ../vue/referencer_vue.php');
        break;
        case 'afficherrefer' : 
            header('Location: ../vue/referencer_afficher.php');
        break;
        case 'ajouterrelier' : 
            header('Location: ../vue/relier_vue.php');
        break;
        case 'afficherrelier' : 
            header('Location: ../vue/relier_afficher.php');
        break;
        default: 
            header('Location: ../vue/accueil.php');
    }
}
?>