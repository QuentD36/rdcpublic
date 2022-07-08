<?php
/* Smarty version 3.1.34-dev-7, created on 2021-11-08 15:28:22
  from 'C:\wamp64\www\BSMAT-RDC\Version-4\mod_admin\vue\adminVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_618942167be915_87904027',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d652b68afa836577e3060f7a53713529d1dec48' => 
    array (
      0 => 'C:\\wamp64\\www\\BSMAT-RDC\\Version-4\\mod_admin\\vue\\adminVue.tpl',
      1 => 1636385302,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/sidebar.tpl' => 1,
    'file:public/header.tpl' => 1,
    'file:public/footer.tpl' => 1,
  ),
),false)) {
function content_618942167be915_87904027 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>12ème BSMAT - Accueil</title>
    <meta name="description" content="Fiche suiveuses - Catalogue - Accueil">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="public/images/logo.png"/>

    <link rel="stylesheet" href="public/style/app.css">
    <link rel="stylesheet" href="public/style/QD-app.css">
    <link rel="stylesheet" href="public/style/AC-app.css">
    <link rel="stylesheet" href="public/style/responsive.css">
    <link rel="stylesheet" href="public/style/sidebar.css">

    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:public/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="home_content">
    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


test

    <?php $_smarty_tpl->_subTemplateRender('file:public/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php echo '<script'; ?>
 src="public/assets/js/sidebar.js"><?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
