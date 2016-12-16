<?php

session_start();
$connect = false;
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation 
include_once'includes/header.inc.php'; //inclusion header
include_once'includes/connexion.inc.php'; //inclusion mode connecté
require_once('libs/Smarty.class.php'); //inclusion lib smarty
if (isset($_GET['recherche'])) {
    $nb_artpg = 2; //déclaration variable nbr par page
    $pgco = isset($_GET['p']) ? $_GET['p'] : 1; //déclaration de la variable qui contient la page courant  
    $debut = ($pgco - 1 ) * $nb_artpg; //calculer nb message publie dans la table & index de départ
    $recherche = $_GET['recherche']; //affectation de la valeur de recherche
 $sth = $bdd->prepare("SELECT id,titre,texte,DATE_FORMAT(date,'%d/%m/%Y') as date_fr FROM articles WHERE texte LIKE :recherche OR titre LIKE :recherche "); //préparation de la rêquete
    $sth->bindvalue(':recherche', '%' . $recherche . '%', PDO::PARAM_STR);
    $sth->execute(); //execute la requête
    $count = $sth->rowCount(); //compte resultat
    $sth = $bdd->prepare("SELECT id,titre,texte,DATE_FORMAT(date,'%d/%m/%Y') as date_fr FROM articles WHERE texte LIKE :recherche OR titre LIKE :recherche LIMIT $debut,$nb_artpg "); //préparation de la rêquete
    $sth->bindvalue(':recherche', '%' . $recherche . '%', PDO::PARAM_STR);
    $sth->execute(); //execute la requête
    
    $tab_rech = $sth->fetchAll(PDO::FETCH_ASSOC);
     if ($count>0) {
        $nb_pgcre = ceil($count / $nb_artpg); // calcule de page a créer 
    }
//echo $count;
//print_r($tab_rech);debug
    
    
    $smarty = new Smarty();
    $smarty->setTemplateDir('templates/');
    $smarty->setCompileDir('templates_c/');
    if (isset($connect)) {
        $smarty->assign('connect', $connect);
    }
    if (isset($nb_pgcre)) {
        $smarty->assign('nb_pgcre', $nb_pgcre);
    }
    if (isset($count)) {
        $smarty->assign('count', $count);
    }
    if (isset($recherche)) {
        $smarty->assign('recherche', $recherche);
    }
    if (isset($tab_rech)) {
        $smarty->assign('tab_rech', $tab_rech);
    }
    $smarty->debugging = false;
    $smarty->display('recherche.tpl');
}

include_once'includes/menu.inc.php'; //inclusion menu
include_once'includes/footer.inc.php'; //inclusion footer
?>
