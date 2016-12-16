<?php
require_once 'settings/BDD.inc.php';//inclusion fichier BDD 
 require_once 'settings/init.inc.php';//inclusion fichier initialisation
if(isset($_COOKIE['sid'])){// test présence du cookie sid
 $tth=$bdd->prepare("SELECT * FROM utilisateurs WHERE sid= :sid");//preparation de la requête
    $tth->bindValue(':sid', $_COOKIE['sid'],PDO::PARAM_STR);// sécurisation des variable
    $tth->execute();//execute la requête
$count=$tth->rowCount();//compte resultat
if($count>0)//si on trouve un résultat 
{
 $connect=TRUE; 
}else //sinon la variable reste à false
{
    $connect=FALSE;
    
}
}
?>
