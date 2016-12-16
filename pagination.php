<?php
require_once 'settings/BDD.inc.php';//inclusion fichier BDD 
 require_once 'settings/init.inc.php';//inclusion fichier initialisation 
//affichage page courant, index de départ,index d'arrivée 
$nb_artpg =2;//déclaration variable nbr par page
$pgco=isset($_GET['p'])?$_GET['p']:1;//déclaration de la variable qui contient la page courant
//calculer nb message publie dans la table 
$debut=($pgco - 1 )*$nb_artpg;//index de départ
//ceil();//1-1*2 calcule de l'index de départ 
echo 'page '.$pgco. '<br> index depart '.$debut.'<br>';
$idx=$bdd->prepare("SELECT COUNT(*) as nbarticles FROM articles WHERE publie = 1");//preparation de la requête
$idx->bindValue(':publie',1,PDO::PARAM_BOOL);//ne récupère que les valeurs booléen de publie
$idx->execute();//execution de la requête
$tab_idx=$idx->fetchAll(PDO::FETCH_ASSOC);
//print_r($tab_idx);affichage de la requete  brute
$nbarticles=$tab_idx[0]['nbarticles'];// affectation du nb article 
echo 'nb article bdd '.$nbarticles.'<br>';
$nb_pgcre=ceil($nbarticles/$nb_artpg);// calcule de page a créer 
echo 'nb page créer '.$nb_pgcre.'<br>';
$pgco=isset($_GET['p'])?$_GET['p']:1;//déclaration de la variable qui contient la page courant
function returnidx($nb_artpg,$pgco)
{
//calculer nb message publie dans la table 
$debut=($pgco - 1 )*$nb_artpg;//index de départ
    return $debut ;
}
$debutidx=  returnidx(2,$pgco);
echo 'index départ par fonction '.$debutidx;