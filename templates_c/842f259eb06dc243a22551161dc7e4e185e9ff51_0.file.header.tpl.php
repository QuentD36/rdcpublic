<?php
/* Smarty version 3.1.34-dev-7, created on 2021-07-13 11:22:01
  from 'C:\wamp64\www\BSMAT-RDC\Version-3\public\header.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_60ed775970e656_48852612',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '842f259eb06dc243a22551161dc7e4e185e9ff51' => 
    array (
      0 => 'C:\\wamp64\\www\\BSMAT-RDC\\Version-3\\public\\header.tpl',
      1 => 1625736449,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_60ed775970e656_48852612 (Smarty_Internal_Template $_smarty_tpl) {
?>
<div class="header">
    <a class="header-redirect" href="index.php">
        <img src="public/images/logo.png" alt="logo">
    </a>
    <h1><?php echo $_smarty_tpl->tpl_vars['titreHeader']->value;?>
</h1>
    <?php if ($_smarty_tpl->tpl_vars['login']->value) {?>
        <div class="login-info">
            <p>Bienvenue,<br><?php echo $_smarty_tpl->tpl_vars['login']->value;?>
</p>
            <a href="index.php?gestion=login&action=deconnecter">
                <svg height="30px" viewBox="0 0 512 512" width="30px" xmlns="http://www.w3.org/2000/svg"><path d="m320.820312 371.792969h39.980469v79.957031c0 33.066406-26.902343 59.964844-59.96875 59.964844h-240.867187c-33.0625 0-59.964844-26.898438-59.964844-59.964844v-391.785156c0-33.0625 26.902344-59.964844 59.964844-59.964844h240.867187c33.066407 0 59.96875 26.902344 59.96875 59.964844v79.957031h-39.980469v-79.957031c0-11.019532-8.964843-19.988282-19.988281-19.988282h-240.867187c-11.019532 0-19.988282 8.96875-19.988282 19.988282v391.785156c0 11.019531 8.96875 19.988281 19.988282 19.988281h240.867187c11.023438 0 19.988281-8.96875 19.988281-19.988281zm96.949219-210.167969-28.269531 28.269531 45.972656 45.976563h-258.570312v39.976562h258.570312l-45.972656 45.972656 28.269531 28.269532 94.230469-94.230469zm0 0"></svg>
            </a>
        </div>
    <?php }?>
</div><?php }
}
