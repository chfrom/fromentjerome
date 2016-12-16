<?php
$connect=false;
try {
    $bdd=new PDO('mysql:host=mysql.hostinger.fr;dbname=u653518821_frome;charset=utf8','u653518821_frome','Napoleon-1');//connexion de la BDD
    $bdd->exec("set names utf8");//init du utf8
    $bdd->setAttribute(PDO::ATTR_ERRMODE,  PDO::ERRMODE_EXCEPTION);
} catch (Exception $e) {
    die('Erreur : '.$e->getMessage());//affiche erreur 
}