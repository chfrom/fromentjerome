<?php
/* Smarty version 3.1.30, created on 2016-11-28 13:45:27
  from "/home/u653518821/public_html/templates/index.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583c34f76e7355_62889527',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14b0752770b792a40493e68bf13701e6ca686391' => 
    array (
      0 => '/home/u653518821/public_html/templates/index.tpl',
      1 => 1480340560,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583c34f76e7355_62889527 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="span8">
              <!-- notifications -->
<?php if (isset($_smarty_tpl->tpl_vars['connexion']->value) && $_smarty_tpl->tpl_vars['connexion']->value == TRUE) {?>

<div class="alert alert-success" role="alert">
    <strong> Félicitation ! </strong>Vous êtes connecté .
</div>
<?php }?>
                <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);
$_smarty_tpl->tpl_vars['i']->value = 0;
if ($_smarty_tpl->tpl_vars['i']->value < 2) {
for ($_foo=true;$_smarty_tpl->tpl_vars['i']->value < 2; $_smarty_tpl->tpl_vars['i']->value++) {
?>
                <h2><?php echo $_smarty_tpl->tpl_vars['tab_article']->value[$_smarty_tpl->tpl_vars['i']->value]['titre'];?>
</h2><!-- affichage titre-->
                <img src='img/<?php echo $_smarty_tpl->tpl_vars['tab_article']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
.jpg' width='100px'alt="<?php echo $_smarty_tpl->tpl_vars['tab_article']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
"/><!-- affichage icone-->
                <!-- contenu -->
                <p style="text-align:justify;"> <?php echo $_smarty_tpl->tpl_vars['tab_article']->value[$_smarty_tpl->tpl_vars['i']->value]['texte'];?>
</p>
                <p><em><u> Publié le <?php echo $_smarty_tpl->tpl_vars['tab_article']->value[$_smarty_tpl->tpl_vars['i']->value]['date_fr'];?>
</u></em></p>
                <!--affichage date publication-->
                <?php if ($_smarty_tpl->tpl_vars['connect']->value == TRUE) {?> 
                <a href="article.php?id=<?php echo $_smarty_tpl->tpl_vars['tab_article']->value[$_smarty_tpl->tpl_vars['i']->value]['id'];?>
">MODIFIER</a>
              <?php }?>
                <?php }
}
?>

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
          </div><?php }
}
