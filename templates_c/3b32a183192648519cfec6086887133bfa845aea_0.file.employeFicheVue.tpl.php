<?php
/* Smarty version 3.1.34-dev-7, created on 2022-04-25 13:37:53
  from 'C:\wamp64\www\BSMAT-RDC\Version-5\mod_employe\vue\employeFicheVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_6266a43114df23_81150777',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3b32a183192648519cfec6086887133bfa845aea' => 
    array (
      0 => 'C:\\wamp64\\www\\BSMAT-RDC\\Version-5\\mod_employe\\vue\\employeFicheVue.tpl',
      1 => 1650893833,
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
function content_6266a43114df23_81150777 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>12ème BSMAT - Ajout utilisateur</title>
    <meta name="description" content="12ème BSMAT - Ajout utilisateur">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link rel="stylesheet" href="public/assets/css/qd.css">
    <link rel="stylesheet" href="public/assets/css/lib/vector-map/jqvmap.min.css">
    <link rel="stylesheet" href="public/style/AC-app.css">
    <link rel="stylesheet" href="public/style/QD-app.css">
    <link rel="stylesheet" href="public/style/sidebar.css">
    <link rel="stylesheet" href="public/style/app.css">
    <link rel="stylesheet" href="public/style/responsive.css">
    <link href="public/style/boxicons.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="public/images/logo.png"/>
</head>

<body>
<?php $_smarty_tpl->_subTemplateRender('file:public/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>



<!-- Body -->
<section id="listVue" class="home_content">
    <!-- Header -->

    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <!-- Fin header -->

    <?php if (!empty($_smarty_tpl->tpl_vars['error']->value)) {?><p class="alert alert-danger"><?php echo $_smarty_tpl->tpl_vars['error']->value;?>
</p><?php }?>
    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="employe">
        <input type="hidden" name="action" value="<?php echo $_smarty_tpl->tpl_vars['action']->value;?>
">
        <div class="container-perso">
            <div class="form-box">
                <div class="form-info">
                    <h2>Informations</h2>
                    <?php if ($_smarty_tpl->tpl_vars['action']->value == 'modifier') {?>
                        <input type="hidden" name="idEmploye" value="<?php echo $_smarty_tpl->tpl_vars['unEmploye']->value->getIdEmploye();?>
">
                    <?php }?>
                    <div class="input-box">
                        <label for="nom">
                            Nom
                        </label>
                        <input type="text" id="nom" name="nom" value="<?php echo $_smarty_tpl->tpl_vars['unEmploye']->value->getNom();?>
">
                    </div>
                    <div class="input-box">
                        <label for="prenom">
                            Prénom
                        </label>
                        <input type="text" id="prenom" name="prenom" value="<?php echo $_smarty_tpl->tpl_vars['unEmploye']->value->getPrenom();?>
">
                    </div>
                    <div class="input-box">
                        <label for="idRole">
                            Rôle
                        </label>
                        <select name="idRole" required>
                            <option value="">--- Choix ---</option>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['roleCombo']->value, 'role');
$_smarty_tpl->tpl_vars['role']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['role']->value) {
$_smarty_tpl->tpl_vars['role']->do_else = false;
?>
                                <option value="<?php echo $_smarty_tpl->tpl_vars['role']->value->getIdRole();?>
"
                                        <?php if ($_smarty_tpl->tpl_vars['role']->value->getIdRole() == $_smarty_tpl->tpl_vars['unEmploye']->value->getIdRole()->getIdRole()) {?>selected<?php }?>>
                                    <?php echo $_smarty_tpl->tpl_vars['role']->value->getIntitule();?>
</option>
                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="login">
                            Login
                        </label>
                        <input type="text" id="login" name="login" value="<?php echo $_smarty_tpl->tpl_vars['unEmploye']->value->getLogin();?>
" readonly>
                    </div>
                    <div class="input-box">
                        <label for="motDePasse">
                            Mot de passe
                        </label>
                        <input type="password" id="password" name="motDePasse" value="<?php echo $_smarty_tpl->tpl_vars['unEmploye']->value->getMotDePasse();?>
">
                        <img src="public/images/hidden.png" id="eye" alt="Afficher/cacher mot de passe" onclick="change()">
                    </div>
                </div>
            </div>

            <div class="redirect-btn">
                <a href="index.php?gestion=employe" class="btn2">Annuler</a>
                <input type="submit" class="btn"
                       value="<?php if ($_smarty_tpl->tpl_vars['action']->value == 'ajouter') {?>Ajouter<?php } elseif ($_smarty_tpl->tpl_vars['action']->value == 'modifier') {?>Modifier<?php }?>">

            </div>

        </div>
    </form>
    <?php $_smarty_tpl->_subTemplateRender('file:public/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</section>

<!-- Fin body -->

<!-- Script -->
<?php echo '<script'; ?>
 src="public/assets/js/showPass.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/sidebar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/login.js"><?php echo '</script'; ?>
>

<?php echo '<script'; ?>
 src="public/assets/js/vendor/jquery-2.1.4.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/popper.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/plugins.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/main.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/dataTables.buttons.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/jszip.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/pdfmake.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/vfs_fonts.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.html5.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.print.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/buttons.colVis.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/lib/data-table/datatables-init.js"><?php echo '</script'; ?>
>


<?php echo '<script'; ?>
 type="text/javascript">
    $(document).ready(function () {
        $('#bootstrap-data-table-export').DataTable();
    });
<?php echo '</script'; ?>
>


</body>
</html>
<?php }
}
