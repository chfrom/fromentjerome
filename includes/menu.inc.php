<?php
require_once 'settings/BDD.inc.php'; //inclusion fichier BDD 
require_once 'settings/init.inc.php'; //inclusion fichier initialisation

?>
<nav class="span4 nav-tabs-dropdown">
    <center><h3>Menu</h3></center>
    <form action="recherche.php" enctype="multipart/form-data" method="Get" id="form_recherche" name="form_recherche">
        <div class="clearfix">
            <div class="input">
                <input type="text" name="recherche" id="recherche" placeholder="Votre recherche...">
                <input type="submit"  value="recherche" class="btn btn-small btn-primary">
            </div>
        </div>
    </form>
    <ul id="nav-tabs-wrapper" class="nav nav-tabs nav-pills nav-stacked wells">
        <li><a href="index.php"><center>Accueil</center></a></li>

        <?php if (isset($_SESSION['connexion']) && $_SESSION['connexion']==true) { ?>
            <li><a href="article.php"><center>Rédiger un article</center></a></li>
        <?php } ?>
        <li><a href="connexion.php"><?php
        // ces lignes de commande php permet le réglage de l'affichage si connecté ou pas
        if (isset($_SESSION['connexion']) && $_SESSION['connexion']==true) {
            echo '<center> déconnecter</center>';
        } else {
            echo '<center> se connecter </center>';
            $inscri = true; // variable pour affichage de l'option inscription
        }
        ?></a></li>
                <?php if (isset($inscri)) {// ajout d'un élément du menu permettant de s'inscrire
                    ?>
            <li><a href="inscription.php"><center>s'inscrire</center></a></li>
        <?php } ?>
    </ul>
</nav>
