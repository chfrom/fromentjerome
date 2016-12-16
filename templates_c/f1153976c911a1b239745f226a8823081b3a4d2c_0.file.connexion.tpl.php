<?php
/* Smarty version 3.1.30, created on 2016-11-28 13:24:31
  from "/home/u653518821/public_html/monsite/templates/connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_583c300f6a60a9_06350726',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f1153976c911a1b239745f226a8823081b3a4d2c' => 
    array (
      0 => '/home/u653518821/public_html/monsite/templates/connexion.tpl',
      1 => 1480339439,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_583c300f6a60a9_06350726 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="span8">
  <?php if (isset($_smarty_tpl->tpl_vars['connexion']->value) && $_smarty_tpl->tpl_vars['connexion']->value == FALSE) {?>
<div class="alert alert-error" role="alert" >
    <strong> MDP Mauvais ! </strong>MDP ou User mauvais.
</div>
 <?php }?>
<form action="connexion.php" method="post" enctype="multipart/form-data" id="form_connexion" name="form_connexion">
     <div class="clearfix">
     <label for="titre">Email : </label>
     </div>
     <input type="email" name="email"/>
        <div class="clearfix">
            <label for="titre">Mot de passe </label>
            <div class="input"><input type="password" name ="mdp"> 
            </div>
        </div>
         <div class="form-actions">
            <input type="submit" name="connexion" value="connexion" class="btn btn-large btn-primary">
            <input type="button" value="retour" onclick="history.go(-1)" class="btn btn-large btn-primary"> 
        </div>
           </form>
</div><?php }
}
