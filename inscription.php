<?php

session_start();
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation
require_once('libs/Smarty.class.php');
include_once'includes/header.inc.php'; //inclusion header
include_once'includes/connexion.inc.php'; //inclusion mode connecté
$error_email = false;
$error_mdp = false;
$error_prenom = false;
$error_nom = false;
$error=false;

if($connect==false && (empty($_SESSION['connexion']) || $_SESSION['connexion']==false) ){
if (isset($_POST['inscription'])) {
     $tth = $bdd->prepare("SELECT * FROM utilisateurs WHERE email= :email "); //preparation de la requête
    $tth->bindValue(':email', $_POST['email'], PDO::PARAM_STR);
    $tth->execute(); //execute la requête
    $count_email = $tth->rowCount(); //compte resultat
    if($count_email>0)
    {
        $error_email=true;
        $error=true;
    }
    if (empty($_POST['mdp'])) {
        $error_mdp = true; //erreur de non saisi mdp
        $error=true;
    }
    if (empty($_POST['email'])) {
        $error_email = true; //erreur de non saisi email
        $error=true;
    }
    if (empty($_POST['prenom'])) {
        $error_prenom = true; //erreur de non saisi email
        $error= true;
    }
    if (empty($_POST['nom'])) {
        $error_nom = true; //erreur de non saisi email
        $error=true;
    }
    if ($error==false) {
        //requête SQL pour inscription 
        $tth = $bdd->prepare("INSERT INTO utilisateurs (nom,prenom,email,mdp)VALUES (:nom,:prenom,:email,:mdp)"); //preparation de la requête
        $tth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $tth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
        $tth->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        $tth->bindValue(':email', $_POST['email'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
        $tth->execute(); //execute la requête
        $inscription = true;
        //une fois que l'inscription est faite nous connectons l'utilisateur à son compte
        $sid = md5($_POST['email'] . time()); // var aléatoire
        $tth = $bdd->prepare("UPDATE utilisateurs SET sid='$sid' WHERE prenom= :prenom AND nom = :nom AND email= :email AND mdp = :mdp "); //préparation de la rêquete
        $tth->bindValue(':nom', $_POST['nom'], PDO::PARAM_STR);
        $tth->bindValue(':prenom', $_POST['prenom'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
        $tth->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
        $tth->bindValue(':email', $_POST['email'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
        $tth->execute(); //insertion en BDD
        setcookie('sid', $sid, time() + 30); //création cookie 
        $_SESSION['connexion'] = TRUE;
        
    }
}
//config smarty template
$smarty = new Smarty();
$smarty->setTemplateDir('templates/');
$smarty->setCompileDir('templates_c/');
//passage des variable php à smarty
if (isset($error_email)) {
    $smarty->assign('error_email', $error_email); // permet passer  une variable php à smarty
}
if (isset($error_mdp)) {
    $smarty->assign('error_mdp', $error_mdp); // permet passer  une variable php à smarty
}
if (isset($inscription)) {
    $smarty->assign('inscription', $inscription); // permet passer  une variable php à smarty
}
if (isset($error_nom)) {
    $smarty->assign('error_nom', $error_nom); // permet passer  une variable php à smarty
}
if (isset($error_prenom)) {
    $smarty->assign('error_prenom', $error_prenom); // permet passer  une variable php à smarty
}
$smarty->debugging = false;
$smarty->display('inscription.tpl');
include_once'includes/menu.inc.php'; //inclusion menu
include_once'includes/footer.inc.php'; //inclusion  footer
}
else
{
 header("Location: index.php");
}
?>