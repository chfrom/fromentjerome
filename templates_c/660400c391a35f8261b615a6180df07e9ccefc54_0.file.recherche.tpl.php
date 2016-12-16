<?php
/* Smarty version 3.1.30, created on 2016-11-25 09:29:30
  from "C:\wamp64\www\monsite\templates\recherche.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5838047a658671_25903595',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '660400c391a35f8261b615a6180df07e9ccefc54' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\recherche.tpl',
      1 => 1480066165,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5838047a658671_25903595 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="span8">
    <form action="recherche.php" enctype="multipart/form-data" method="Post" id="form_recherche" name="form_recherche">
<input type="text" name="recherche" size="10">
<input type="submit" name="recherche" value="recherche" class="btn btn-large btn-primary">
<input type="button" value="retour" onclick="history.go(-1)" class="btn btn-large btn-primary"> 
</form>
  <?php if (isset($_smarty_tpl->tpl_vars['rech']->value)) {?>
      
                <h2><?php echo $_smarty_tpl->tpl_vars['tab_recherche']->value['titre'];?>
</h2><!-- affichage titre-->
                <img src='img/<?php echo $_smarty_tpl->tpl_vars['tab_article']->value['id'];?>
.jpg' width='100px'alt="<?php echo $_smarty_tpl->tpl_vars['tab_recherche']->value['id'];?>
"/><!-- affichage icone-->
                <!-- contenu -->
                <p style="text-align:justify;"> <?php echo $_smarty_tpl->tpl_vars['tab_recherche']->value['texte'];?>
</p>
                <p><em><u> Publié le <?php echo $_smarty_tpl->tpl_vars['tab_recherche']->value['date_fr'];?>
</u></em></p>
                <!--affichage date publication-->
                <?php if ($_smarty_tpl->tpl_vars['connect']->value == TRUE) {?> 
                <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['tab_recherche']->value['id'];?>
">MODIFIER</a>
              <?php }?>
                
                <div class="pagination">
                    <ul>
                        <li><a>Page :</a></li> 
            
<?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 1;
if ($_smarty_tpl->tpl_vars['i']->value <= $_smarty_tpl->tpl_vars['nb_pgcre']->value) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value <= $_smarty_tpl->tpl_vars['nb_pgcre']->value; $_smarty_tpl->tpl_vars['i']->value++) {
?>        
         <ul>
<li><a href="index.php?p=<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</a></li>
</ul>   
</ul>
 <?php }
}
?>

                </div>
 <?php }?>

</div><?php }
}
