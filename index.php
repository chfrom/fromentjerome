<?php
session_start();
$connect=false;
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation 
include_once'includes/header.inc.php'; //inclusion header
include_once'includes/connexion.inc.php'; //inclusion mode connecté
require_once('libs/Smarty.class.php'); //inclusion lib smarty
$nb_artpg = 2; //déclaration variable nbr par page
$pgco = isset($_GET['p']) ? $_GET['p'] : 1; //déclaration de la variable qui contient la page courant
$debut = ($pgco - 1 ) * $nb_artpg; //calculer nb message publie dans la table & index de départ
//préparation et excecution de la requête
$idx = $bdd->prepare("SELECT COUNT(*) as nbarticles FROM articles WHERE publie = 1"); //preparation de la requête
$idx->bindValue(':publie', 1, PDO::PARAM_BOOL); //ne récupère que les valeurs booléen de publie
$idx->execute(); //execution de la requête
$tab_idx = $idx->fetchAll(PDO::FETCH_ASSOC);
//print_r($tab_idx);affichage de la requete  brute
$nbarticles = $tab_idx[0]['nbarticles']; // affectation du nb article 
$nb_pgcre = ceil($nbarticles / $nb_artpg); // calcule de page a créer 
$sth = $bdd->prepare("SELECT id,titre,texte,DATE_FORMAT(date,'%d/%m/%Y') as date_fr FROM articles WHERE publie = :publie LIMIT $debut,$nb_artpg"); //preparation requête et format date en date_fr
$sth->bindValue(':publie', TRUE, PDO::PARAM_BOOL); //ne récupère que les valeurs booléen de publie
$sth->execute(); //execute la rêquete
$tab_article = $sth->fetchAll(PDO::FETCH_ASSOC); // récupère le résultat rêquete et la transmet à un tableau
//print_r($tab_article); affiche en brute tableau
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
if (isset($_SESSION['connexion'])) {
    $smarty->assign('connexion', $_SESSION['connexion']);
}
if (isset($_SESSION['connexion_nok'])) {
    $smarty->assign('connexion_nok', $_SESSION['connexion_nok']);
}
if(isset($tab_article)){
   $smarty->assign('tab_article', $tab_article); 
}
if(isset($connect)){
   $smarty->assign('connect', $connect);  
}
if(isset($nb_pgcre)){
    $smarty->assign('nb_pgcre', $nb_pgcre);    
}
$smarty->debugging = false;
$smarty->display('index.tpl');
include_once'includes/menu.inc.php'; //inclusion menu
include_once'includes/footer.inc.php'; //inclusion footer
?>
