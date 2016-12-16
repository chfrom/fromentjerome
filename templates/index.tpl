<div class="span8">
              <!-- notifications -->
{if $connect==true && empty($connexion_nok)}

<div class="alert alert-success" role="alert">
    <strong> Bienvenue ! </strong>Vous êtes connecté .
</div>
{/if}
                {foreach from=$tab_article item=$value}
                <h2>{$value['titre']}</h2><!-- affichage titre-->
                <img src='img/{$value['id']}.jpg' width='100px'alt="{$value['id']}"/><!-- affichage icone-->
                <!-- contenu -->
                <p style="text-align:justify;"> {$value['texte']}</p>
                <p><em><u> Publié le {$value['date_fr']}</u></em></p>
                <!--affichage date publication-->
                {if isset($connexion) && $connexion==true} 
                <a class="btn btn-mini btn-primary" href="article.php?id={$value['id']}">MODIFIER</a>
                
              {/if}
              <a class="btn btn-mini btn-primary" href="commentaire.php?id={$value['id']}">Commenter</a>
                {/foreach}
                <div class="pagination">
                    <ul>
                        <li><a>Page :</a></li> 
            
{for $i=1;$i<=$nb_pgcre;$i++ }        
         <ul>
<li><a href="index.php?p={$i}">{$i}</a></li>
</ul>   
</ul>
 {/for}
                </div>
          </div>