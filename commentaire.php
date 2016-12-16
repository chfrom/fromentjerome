<?php

$connect = false; // variable connexion
session_start();
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation
require_once 'libs/Smarty.class.php'; //inclusion lib smarty

if (isset($_POST['ajouter'])) {

    $_POST['date'] = date("Y-m-d");//ajout champs date
   $sth = $bdd->prepare("INSERT INTO commentaire (id_article,pseudo,date,texte,email)VALUES (:id_article,:pseudo,:date,:texte,:email)");
        $sth->bindValue(':id_article', $_POST['id_article'], PDO::PARAM_STR);
        $sth->bindValue(':pseudo', $_POST['pseudo'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
        $sth->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
        $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR);
        $sth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
        $sth->execute(); //execution de la rêquete
   $idm=$_POST['id_article'];
        header("Location: commentaire.php?id=$idm"); }
    else{
// init template smarty 
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
include_once'includes/header.inc.php'; //inclusion header
if (isset($_GET['id'])|| isset($_POST['ajouter'])) {// pour avoir affichage de l'article
//echo $_GET['id'];
    $idm = $_GET['id']; // affectation id dans une variable qui permet d'avoir une variable id article
    $mod = $bdd->prepare("SELECT id,titre,texte,DATE_FORMAT(date,'%d/%m/%Y') as date_fr FROM articles WHERE publie = :publie AND id = :id"); //preparation requête 
    $mod->bindValue(':publie', TRUE, PDO::PARAM_BOOL); //ne récupère que les valeurs booléen de publie = 1
    $mod->bindValue(':id', $idm, PDO::PARAM_INT); //selectionne l'article a com
    $mod->execute(); //execute la rêquete
    $tab_modar = $mod->fetchAll(PDO::FETCH_ASSOC);
    $com = $bdd->prepare("SELECT id_article,pseudo,DATE_FORMAT(date,'%d/%m/%Y') as date_fr,texte FROM commentaire WHERE id_article = :id_article"); //preparation requête 
    $com->bindValue(':id_article', $idm, PDO::PARAM_INT); //selectionne l'article a com
    $com->execute(); //execute la rêquete
    $tab_com = $com->fetchAll(PDO::FETCH_ASSOC);
//print_r($tab_modar);
}
if (isset($_GET['id'])) {//  transfere des variables a smarty
    $smarty->assign('id', $_GET['id']); // permet passer  une variable php à smarty   
}
if (isset($tab_modar)) {
    $smarty->assign('tab_modar', $tab_modar);
}
if (isset($tab_com)) {
    $smarty->assign('tab_com', $tab_com);
}
$smarty->debugging = false; // fenêtre de debug
$smarty->display('commentaire.tpl'); // affichage du template smarty
include_once'includes/menu.inc.php'; //inclusion menu
include_once'includes/footer.inc.php'; //inclusion  footer
    }
?>