<?php
session_start();
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation
require_once 'libs/Smarty.class.php'; //inclusion lib smarty
include_once'includes/connexion.inc.php'; //inclusion mode connecté
if ($connect == true || (isset($_SESSION['connexion']) && $_SESSION['connexion'] == true)) {// cette ligne permet la sécurisation de la page
    if (isset($_POST['suppression'])) {// Si utilisateur appuie sur supprimer
        $mod = $bdd->prepare("DELETE FROM `articles` WHERE id = :id"); //preparation requête     
        $mod->bindValue(':id', $_POST['id'], PDO::PARAM_INT); //ne recupere que id de l'article a supprimer 
        $mod->execute(); //excecution de la rêquete
        $suppression = true; // variable pour confirmation de suppression 
    }
    if (isset($_POST['ajouter'])) {// si utilisateur appui sur ajouter
        $_POST['date'] = date("Y-m-d"); // ajout d'un champ date en format SQL 
        $_POST['publie'] = isset($_POST['publie']) ? 1 : 0; // verification checkbox et assignation 0/1 =>publie en condition ternaire
        //print_r($_POST); //affichage élement formulaire
        //print_r($_FILES); //affichage img
        if ($_FILES['image']['error'] == 0) {// si j'ai pas erreur sur l'image
            if ($_POST['ajouter'] == 'modifier') {
                $id = $_POST['id']; // récupère  les valeurs du formulaire
                $titre = $_POST['titre'];
                $texte = $_POST['texte'];
                $publie = $_POST['publie'];
                $date = $_POST['date'];
                $sth = $bdd->prepare("UPDATE articles SET titre='$titre', texte='$texte', publie='$publie', date='$date' WHERE id='$id'"); //préparation de la rêquete
            } else {
                $sth = $bdd->prepare("INSERT INTO articles (titre,texte,publie,date)VALUES (:titre,:texte,:publie,:date)"); // requête SQL ajout
            }
            $sth->bindValue(':titre', $_POST['titre'], PDO::PARAM_STR);
            $sth->bindValue(':texte', $_POST['texte'], PDO::PARAM_STR); //verification des éléments sécurisation des variables.
            $sth->bindValue(':publie', $_POST['publie'], PDO::PARAM_INT);
            $sth->bindValue(':date', $_POST['date'], PDO::PARAM_STR);
            $sth->execute(); //execution de la rêquete
            if ($_POST['ajouter'] == 'ajouter') {
                $id = $bdd->lastInsertID(); // récupère le dernier id
//echo $id; variable de debug
                $_SESSION['ajout_article'] = TRUE;
                header("Location: article.php");
            }
            move_uploaded_file($_FILES['image']['tmp_name'], dirname(__FILE__) . "/img/$id.jpg"); //enregistre dans img
            $_SESSION['ajout_article'] = TRUE;// confirm l'ajout d'article
            header("Location: article.php");
        } else {
            echo'Image erreur';
            exit();
        }
    } else {
        $smarty = new Smarty();// init template smarty
        $smarty->setTemplateDir('templates/');
        $smarty->setCompileDir('templates_c/');
        include_once'includes/header.inc.php'; //inclusion header
        //si modification
        if (isset($_GET['id'])) {
//echo $_GET['id'];
            $idm = $_GET['id']; // affectation id dans une variable qui permet d'avoir une variable pour la modif
            $mod = $bdd->prepare("SELECT id,titre,texte,date FROM articles WHERE publie = :publie AND id = :id"); //preparation requête 
            $mod->bindValue(':publie', TRUE, PDO::PARAM_BOOL); //ne récupère que les valeurs booléen de publie = 1
            $mod->bindValue(':id', $idm, PDO::PARAM_INT); //ne recupere que id de l'article a modifier
            $mod->execute(); //execute la rêquete
            $tab_modar = $mod->fetchAll(PDO::FETCH_ASSOC);
//print_r($tab_modar);
        }
        if (isset($_SESSION['ajout_article'])) { {
                $smarty->assign('ajout_article', $_SESSION['ajout_article']); // permet passer  une variable php à smarty 
            }
            unset($_SESSION['ajout_article']);
        }
        if (isset($tab_modar)) {
            $smarty->assign('tab_modar', $tab_modar);
        }
        if (isset($_GET['id'])) {
            $smarty->assign('id', $_GET['id']); // permet passer  une variable php à smarty   
        }
        if (isset($suppression)) {
            $smarty->assign('suppression', $suppression); // permet passer  une variable php à smarty   
        }
        $smarty->debugging = false;
        $smarty->display('article.tpl');
        include_once'includes/menu.inc.php'; //inclusion menu
        include_once'includes/footer.inc.php'; //inclusion  footer
    }
} else {
    header("Location: index.php");
}
?>