<div class="span8">
    <h3>Connexion :</h3>
  {if isset($connexion) AND $connexion==FALSE}
<div class="alert alert-error" role="alert" >
    <strong> MDP Mauvais ! </strong>MDP ou User mauvais.
</div>
 {/if}
<form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion" name="form_connexion">
     <div class="clearfix">
     <label for="titre">Email : </label>
     </div>
     <input type="email" name="email"/>
        <div class="clearfix">
            <label for="titre">Mot de passe </label>
            <div class="input">
                <input type="password" name ="mdp"> 
            </div>
        </div>
         <div class="form-actions">
            <input type="submit" name="connexion" value="connexion" class="btn btn-large btn-primary">
          
        </div>
           </form>
</div>