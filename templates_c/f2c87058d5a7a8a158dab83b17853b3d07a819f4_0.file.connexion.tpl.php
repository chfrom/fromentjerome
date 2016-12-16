<?php
/* Smarty version 3.1.30, created on 2016-11-24 12:59:55
  from "C:\wamp64\www\monsite\templates\connexion.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5836e44b77c0a8_71856932',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f2c87058d5a7a8a158dab83b17853b3d07a819f4' => 
    array (
      0 => 'C:\\wamp64\\www\\monsite\\templates\\connexion.tpl',
      1 => 1479984156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5836e44b77c0a8_71856932 (Smarty_Internal_Template $_smarty_tpl) {
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
