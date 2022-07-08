<?php
/* Smarty version 3.1.34-dev-7, created on 2022-07-08 07:11:48
  from 'C:\wamp64\www\rdcpublic\mod_employe\vue\employeVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62c7d8b4c2a105_72317199',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'c37d12f8a4310ae0f6cff24c5599004310b637d1' => 
    array (
      0 => 'C:\\wamp64\\www\\rdcpublic\\mod_employe\\vue\\employeVue.tpl',
      1 => 1650980544,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/sidebar.tpl' => 1,
    'file:public/header.tpl' => 2,
    'file:public/footer.tpl' => 2,
  ),
),false)) {
function content_62c7d8b4c2a105_72317199 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>12ème BSMAT - Administration</title>
    <meta name="description" content="12ème BSMAT - Gestion des utilisateurs">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link rel="stylesheet" href="public/assets/css/lib/vector-map/jqvmap.min.css">
    <link rel="stylesheet" href="public/style/AC-app.css">
    <link rel="stylesheet" href="public/style/QD-app.css">
    <link rel="stylesheet" href="public/style/app.css">
    <link rel="stylesheet" href="public/style/sidebar.css">
    <link rel="stylesheet" href="public/style/responsive.css">
    <link href="public/style/boxicons.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" href="public/images/logo.png"/>


</head>

<body>
<?php if ($_smarty_tpl->tpl_vars['role']->value == 'Administrateur') {?>

    <?php $_smarty_tpl->_subTemplateRender('file:public/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


    <section id="list" class="home_content">
        <!-- Header -->
        <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
        <!-- Fin header -->
        <div class="container-perso">
            <?php if (!empty($_smarty_tpl->tpl_vars['succes']->value)) {?><p class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['succes']->value;?>
</p><?php }?>
            <div class="content mt-3">
                <form method="post" action="index.php">
                    <input type="hidden" name="gestion" value="employe">
                    <input type="hidden" name="action" value="form_ajouter">
                    <button type="submit" class="btn redirect-create" href="">Ajouter un utilisateur</button>
                </form>
                <div class="animated fadeIn">

                    <div class="row">

                        <div class="col-md-12">

                            <div class="card">
                                <div class="card-body">
                                    <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                        <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Prénom Nom</th>
                                            <th>Rôle</th>
                                            <th>Login</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeEmployes']->value, 'employe');
$_smarty_tpl->tpl_vars['employe']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['employe']->value) {
$_smarty_tpl->tpl_vars['employe']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['employe']->value->getIdEmploye();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['employe']->value->getPrenom();?>
 <?php echo $_smarty_tpl->tpl_vars['employe']->value->getNom();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['employe']->value->getIdRole()->getIntitule();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['employe']->value->getLogin();?>
</td>
                                            <td class="td-perso">
                                                <form method="post" action="index.php">
                                                    <input type="hidden" name="gestion" value="employe">
                                                    <input type="hidden" name="action" value="form_modifier">
                                                    <input type="hidden" name="idEmploye" value="<?php echo $_smarty_tpl->tpl_vars['employe']->value->getIdEmploye();?>
">
                                                    <button type="submit" class="btn2 fiche-action">Modifier</button>
                                                </form>
                                                <a class="btn fiche-action" href="#" data-toggle="modal" data-target="#deleteModal-<?php echo $_smarty_tpl->tpl_vars['employe']->value->getIdEmploye();?>
">Supprimer</a>
                                            </td>
                                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div><!-- .animated -->
                </div><!-- .content -->
            </div>
        </div>
        <?php $_smarty_tpl->_subTemplateRender('file:public/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
    </section>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeEmployes']->value, 'employe');
$_smarty_tpl->tpl_vars['employe']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['employe']->value) {
$_smarty_tpl->tpl_vars['employe']->do_else = false;
?>
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal-<?php echo $_smarty_tpl->tpl_vars['employe']->value->getIdEmploye();?>
" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Supprimer</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Êtes-vous sur de vouloir supprimer cet utilisateur ?</div>
                    <div class="modal-footer">
                        <button class="btn2 fiche-action" type="button" data-dismiss="modal">Annuler</button>
                        <form method="post" action="index.php">
                            <input type="hidden" name="gestion" value="employe">
                            <input type="hidden" name="action" value="supprimer">
                            <input type="hidden" name="idEmploye" value="<?php echo $_smarty_tpl->tpl_vars['employe']->value->getIdEmploye();?>
">
                            <button type="submit" class="btn fiche-action">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php } else { ?>
    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
?>

    <div class="redirect-container">
        <div class="alert alert-danger">Vous n'avez pas les droits d'accès !</div>

        <a href="index.php" class="btn">Retour au menu</a>
    </div>

    <?php $_smarty_tpl->_subTemplateRender('file:public/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, true);
}?>

<?php echo '<script'; ?>
 src="public/assets/js/sidebar.js"><?php echo '</script'; ?>
>


<!-- Right Panel -->
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
