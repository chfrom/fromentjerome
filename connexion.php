<?php 
session_start();
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation
require_once('libs/Smarty.class.php');
//$bdd="SELECT * FROM utilisateurs WHERE email= :email AND mdp = :mdp";
if (isset($_POST['connexion'])) {
    
    $tth = $bdd->prepare("SELECT * FROM utilisateurs WHERE email= :email AND mdp = :mdp"); //preparation de la requête
    $tth->bindValue(':mdp', $_POST['mdp'], PDO::PARAM_STR);
    $tth->bindValue(':email', $_POST['email'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
    $tth->execute(); //execute la requête
    $count = $tth->rowCount(); //compte resultat
    $tab_co = $tth->fetchAll(PDO::FETCH_ASSOC);
//print_r($tab_co);
    if ($count > 0) {
        $email = $tab_co[0]['email'];
        $sid = md5($email . time()); // var aléatoire
//echo $sid;  
        $id = $tab_co[0]['id'];
        $tth = $bdd->prepare("UPDATE utilisateurs SET sid='$sid' WHERE id='$id'"); //préparation de la rêquete
        $tth->execute(); //insertion en BDD
        setcookie('sid', $sid, time() + 30); //création cookie 
        $_SESSION['connexion'] = TRUE;
        unset($_SESSION['connexion_nok']);
        header("Location: index.php");
}else{
    $_SESSION['connexion'] = FALSE; 
    header("Location: connexion.php");
}
    } else {
         
 unset($_SESSION['connexion']);
 unset($_COOKIE['sid']);
 $_SESSION['connexion_nok']=true;
        $smarty = new Smarty();
        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');
//$smarty->setConfigDir('/web/www.example.com/guestbook/configs/');
//$smarty->setCacheDir('/web/www.example.com/guestbook/cache/');
        if (isset($_SESSION['connexion'])) {
            $smarty->assign('connexion', $_SESSION['connexion']); // permet passer  une variable php à smarty      
        }
       //** un-comment the following line to show the debug console
        $smarty->debugging = false;
        include_once'includes/header.inc.php'; //inclusion menu
        $smarty->display('connexion.tpl');
        include_once'includes/menu.inc.php'; //inclusion menu
        include_once'includes/footer.inc.php'; //inclusion  footer
    }
?>
 