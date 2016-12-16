<div class="span8">
    {if isset($id)}
    <h3>Modifier un article</h3>
    {else}
        <h3>Rédiger un article</h3>
        {/if}
{if isset($ajout_article)}<div class="alert alert-success" role="alert">
    <strong> Félicitation ! </strong>Votre  article a été ajouté.
</div>{/if}
{if isset($suppression)}<div class="alert alert-success" role="alert">
    <strong> Félicitation ! </strong>Votre  article a été suppression.
</div>{/if}
    <!--Formulaire-->
    <form action="article.php" method="post" enctype="multipart/form-data" id="form_article" name="form_article">
        <input type="hidden" name="id" value=" {if isset($tab_modar)}{$tab_modar[0]['id']}{/if}"/>
        <div class="clearfix">
            <label for="titre">Titre</label>
            <div class="input"><input type="text" name ="titre" id="titre" value="{if isset($tab_modar[0]['titre'])}{$tab_modar[0]['titre']}{/if}">            
            </div></div>
        <div class="clearfix">
            <label for="texte">Texte</label>
            <div class="input"><textarea type="texte" name ="texte" id="texte">{if isset($tab_modar[0]['texte'])}{$tab_modar[0]['texte']}{/if}  </textarea> </div></div>
        <div class="clearfix">
            <label for="image">Image</label>
            <div class="input"><input type="file" name ="image" id="image" > 
                {if isset($tab_modar[0]['id'])}
                <br><img src='img/{$tab_modar[0]['id']}.jpg' width='150px'alt="{$tab_modar[0]['id']}"/>
                    {/if}
            </div></div>
        <div class="clearfix">
            <label for="publie">Publié :</label>  
            <div class="input"><input type="checkbox" name ="publie" id="publie" value="on" {if isset($tab_modar[0]['id'])}{'checked'}{/if}          
            </div></div>
        <div class="form-actions">
            <input type="submit" name="ajouter" value="{if isset($tab_modar[0]['id'])}{'modifier'}{else}{'ajouter'}{/if}" class="btn btn-large btn-primary">
      {if isset($id)}
            <input type="submit" name="suppression" value="suppression"  class="btn btn-large btn-danger"> 
            {/if}
        </div>
        
</div>
</form>
        </div>