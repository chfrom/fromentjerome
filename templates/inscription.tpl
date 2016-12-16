<div class="span8">
    {if isset($inscription)}
<div class="alert alert-success" role="alert" >
    <strong>Inscription Réussi !</strong>
</div>
 {/if}
    <h3>Inscription : </h3>
<form action="inscription.php" method="post" enctype="multipart/form-data" id="form_connexion" name="form_inscription">
     <div class="clearfix">
     <label for="titre">Nom : </label>
     </div>
     <input type="text" name="nom"/>
     {if $error_nom==TRUE}
        <div>
                        <span class="alert alert-error">Veuillez saisir un Nom</span>
        </div>
        <br>
        {/if}
        
        <div class="clearfix">
     <label for="titre">Prénom : </label>
     </div>
     <input type="text" name="prenom"/>
     {if $error_prenom==TRUE}
        <div>
                        <span class="alert alert-error">Veuillez saisir un prénom</span>
        </div>
        <br>
        {/if}
    <div class="clearfix">
     <label for="titre">Email : </label>
     </div>
    
     <input type="email" name="email"/>
     {if $error_email==TRUE}
        <div>
                        <span class="alert alert-error">Veuillez saisir un email</span>
        </div>
        <br>
        {/if}
        <div class="clearfix">
            <label for="titre">Mot de passe : </label>
            <div class="input"><input type="password" name ="mdp">
                {if $error_mdp==true}
                    <div>
                        <span class="alert alert-error">Veuillez saisir un mdp</span>
                    </div>
                {/if}
            </div>
        </div>
         <div class="form-actions">
            <input type="submit" name="inscription" value="inscription" class="btn btn-large btn-primary">
            <input type="button" value="retour" onclick="history.go(-1)" class="btn btn-large btn-primary"> 
        </div>
           </form>
</div>