<?php
$connect=false;
try {
    $bdd=new PDO('mysql:host=mysql.hostinger.fr;dbname=u6535121_frome;charset=utf8','u6535121_frome','MDP');//connexion de la BDD
    $bdd->exec("set names utf8");//init du utf8
    $bdd->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());//affiche erreur 
}
