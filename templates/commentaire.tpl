 <div class="span8">
     <!--affichage de l'article -->
{foreach from=$tab_modar item=$value}
                <h2>{$value['titre']}</h2><!-- affichage titre-->
                <img src='img/{$value['id']}.jpg' width='100px'alt="{$value['id']}"/><!-- affichage icone-->
                <!-- contenu -->
                <p style="text-align:justify;"> {$value['texte']}</p>
                <p><em><u> Publié le {$value['date_fr']}</u></em></p>
                {/foreach}
<div class="">
{foreach from=$tab_com item=$value}
                <blockquote>
  <p>{$value['texte']}</p>
  <footer>par {$value['pseudo']}<cite title="Source Title"> le {$value['date_fr']}</cite></footer>
</blockquote>
                {/foreach}
</div>
<script type="text/javascript">// fonction jquery pour verif champ vide 
    $(function(){
    $("#ajouter").click(function(){
        valide=true;
        if($("#pseudo").val() == ""){
           $("#pseudo").css({ 
	    borderColor : 'red',
	    color : 'red'
	});
        valide=false;
    }
        if($("#texte").val()==""){
            $("#texte").css({ 
	    borderColor : 'red',
	    color : 'red'
	});
        valide=false;
        }
        if($("#email").val() == ""){
           $("#email").css({ 
	    borderColor : 'red',
	    color : 'red'
	});
        valide=false;
    }
    return valide;
    });
});
</script>
<form action="commentaire.php" method="post" enctype="multipart/form-data" id="form_article" name="form_commentaire">
    <input type="hidden" name="id_article" value=" {if isset($tab_modar)}{$tab_modar[0]['id']}{/if}"/>
        <div class="clearfix">
            <label for="pseudo">pseudo :</label>
            <div class="input"><input type="text" name ="pseudo" id="pseudo">
            </div></div>
        <div class="clearfix">
            <label for="pseudo">email :</label>
            <div class="input"><input type="email" name ="email" id="email">
            </div></div>
        <div class="clearfix">
            <label for="texte">Texte :</label>
            <div class="input"><textarea type="texte" name ="texte" id="texte"></textarea></div>
            <input type="submit" name="ajouter" id="ajouter" class="btn btn-large btn-primary">
        </div>
</form>

        </div>