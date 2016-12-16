<?php
/* Smarty version 3.1.30, created on 2016-11-23 20:27:47
  from "C:\wamp64\www\monsite\templates\article.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5835fbc31da493_68129462',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '5ec2fc8e706d490d968ee1635cf3c8bc8953885a' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\article.tpl',
      1 => 1479932769,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5835fbc31da493_68129462 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="span8">
<?php if (isset($_smarty_tpl->tpl_vars['ajout_article']->value)) {?><div class="alert alert-success" role="alert">
    <strong> Félicitation ! </strong>Votre  article a été ajouté.
</div><?php }?>
    <!--Formulaire-->
    <form action="article.php" method="post" enctype="multipart/form-data" id="form_article" name="form_article">
        <input type="hidden" name="id" value=" <?php if (isset($_smarty_tpl->tpl_vars['tab_modar']->value)) {
echo $_smarty_tpl->tpl_vars['tab_modar']->value[0]['id'];
}?>"/>
        <div class="clearfix">
            <label for="titre">Titre</label>
            <div class="input"><input type="text" name ="titre" id="titre" value="<?php if (isset($_smarty_tpl->tpl_vars['tab_modar']->value[0]['titre'])) {
echo $_smarty_tpl->tpl_vars['tab_modar']->value[0]['titre'];
}?>">            
            </div></div>
        <div class="clearfix">
            <label for="texte">Texte</label>
            <div class="input"><textarea type="texte" name ="texte" id="texte"><?php if (isset($_smarty_tpl->tpl_vars['tab_modar']->value[0]['texte'])) {
echo $_smarty_tpl->tpl_vars['tab_modar']->value[0]['texte'];
}?>  </textarea> </div></div>
        <div class="clearfix">
            <label for="image">Image</label>
            <div class="input"><input type="file" name ="image" id="image" > 
                <?php if (isset($_smarty_tpl->tpl_vars['tab_modar']->value[0]['id'])) {?>
                <br><img src='img/<?php echo $_smarty_tpl->tpl_vars['tab_modar']->value[0]['id'];?>
.jpg' width='150px'alt="<?php echo $_smarty_tpl->tpl_vars['tab_modar']->value[0]['id'];?>
"/>
                    <?php }?>
            </div></div>
        <div class="clearfix">
            <label for="publie">Publié :</label>  
            <div class="input"><input type="checkbox" name ="publie" id="publie" value="on" <?php if (isset($_smarty_tpl->tpl_vars['tab_modar']->value[0]['id'])) {
echo 'checked';
}?>          
            </div></div>
        <div class="form-actions">
            <input type="submit" name="ajouter" value="<?php if (isset($_smarty_tpl->tpl_vars['tab_modar']->value[0]['id'])) {
echo 'modifier';
} else {
echo 'ajouter';
}?>" class="btn btn-large btn-primary">
       <input type="button" value="retour" onclick="history.go(-1)" class="btn btn-large btn-primary"> 
        </div>
        </form>
</div>
        </div><?php }
}
