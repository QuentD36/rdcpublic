<?php
/* Smarty version 3.1.34-dev-7, created on 2022-07-08 07:03:43
  from 'C:\wamp64\www\rdcpublic\mod_fiche\vue\ficheListeVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62c7d6cf6c0805_96685299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7ad5900a7c88bdd0c7b3e7ee356d0e9a5a5b05ed' => 
    array (
      0 => 'C:\\wamp64\\www\\rdcpublic\\mod_fiche\\vue\\ficheListeVue.tpl',
      1 => 1650982042,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:public/header.tpl' => 1,
    'file:public/footer.tpl' => 1,
  ),
),false)) {
function content_62c7d6cf6c0805_96685299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_checkPlugins(array(0=>array('file'=>'C:\\wamp64\\www\\rdcpublic\\include\\libs\\plugins\\modifier.date_format.php','function'=>'smarty_modifier_date_format',),));
?>
<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>12ème BSMAT - Fiches suiveuses</title>
    <meta name="description" content="12ème BSMAT - Fiches suiveuses">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="public/assets/css/normalize.css">
    <link rel="stylesheet" href="public/assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="public/assets/css/themify-icons.css">
    <link rel="stylesheet" href="public/assets/css/flag-icon.min.css">
    <link rel="stylesheet" href="public/assets/css/cs-skin-elastic.css">
    <link rel="stylesheet" href="public/assets/css/lib/datatable/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="public/assets/scss/style.css">
    <link rel="stylesheet" href="public/assets/css/qd.css">
    <link rel="stylesheet" href="public/assets/css/lib/vector-map/jqvmap.min.css">
    <link rel="stylesheet" href="public/style/AC-app.css">
    <link rel="stylesheet" href="public/style/QD-app.css">
    <link rel="stylesheet" href="public/style/app.css">
    <link rel="stylesheet" href="public/style/responsive.css">
    <link rel="icon" type="image/png" href="public/images/logo.png"/>


</head>
<body>
<!-- Header -->

<?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<!-- Fin header -->
<section id="list">
    <?php if (!empty($_smarty_tpl->tpl_vars['succes']->value)) {?>
        <div class="flex-center">
            <p class="alert alert-success"><?php echo $_smarty_tpl->tpl_vars['succes']->value;?>
</p>
        </div>
    <?php }?>
    <div class="container-perso">
        <div class="content mt-3">
            <form method="post" action="index.php">
                <input type="hidden" name="gestion" value="fiche">
                <input type="hidden" name="action" value="form_fiche_ajouter">
                <button type="submit" class="btn redirect-create" href="">Créer une fiche</button>
            </form>
            <div class="animated fadeIn">

                <div class="row">

                    <div class="col-md-12">

                        <div class="card">
                            <div class="card-body">
                                <table id="bootstrap-data-table" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>N° Immatriculation</th>
                                        <th>Kilométrage</th>
                                        <th>Opérateur</th>
                                        <th>Date</th>
                                        <th>N° IT Diagnostic</th>
                                        <th>N° IT REP</th>
                                        <th>N° IT Carrosserie</th>
                                        <th>N° IT Camion grue</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeFiches']->value, 'fiche');
$_smarty_tpl->tpl_vars['fiche']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fiche']->value) {
$_smarty_tpl->tpl_vars['fiche']->do_else = false;
?>
                                        <tr>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getImmatriculation();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getKilometrage();?>
 km</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdEmploye()->getNom();?>
 <?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdEmploye()->getPrenom();?>
</td>
                                            <td><?php echo smarty_modifier_date_format($_smarty_tpl->tpl_vars['fiche']->value->getDateCreation(),"%d-%m-%Y");?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdDiag();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdRep();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdCarrosserie();?>
</td>
                                            <td><?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdCamGrue();?>
</td>
                                            <td>
                                                <form method="post" action="index.php" target="_blank">
                                                    <input type="hidden" name="gestion" value="fiche">
                                                    <input type="hidden" name="action" value="form_fiche_imprimer">
                                                    <input type="hidden" name="idFiche" value="<?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdFiche();?>
">
                                                    <button type="submit" class="btn fiche-action">Imprimer</button>
                                                </form>
                                                 <form method="post" action="index.php">
                                                    <input type="hidden" name="gestion" value="fiche">
                                                    <input type="hidden" name="action" value="form_fiche_modifier">
                                                    <input type="hidden" name="idFiche" value="<?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdFiche();?>
">
                                                     <button type="submit" class="btn2 fiche-action">Modifier</button>
                                                </form>
                                                <?php if ($_smarty_tpl->tpl_vars['role']->value == 'Administrateur') {?>
                                                    <a class="btn fiche-action" href="#" data-toggle="modal" data-target="#deleteModal-<?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdFiche();?>
">Supprimer</a>
                                                <?php }?>
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
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['listeFiches']->value, 'fiche');
$_smarty_tpl->tpl_vars['fiche']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['fiche']->value) {
$_smarty_tpl->tpl_vars['fiche']->do_else = false;
?>
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal-<?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdFiche();?>
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
                <div class="modal-body">Êtes-vous sur de vouloir supprimer cette fiche ?</div>
                <div class="modal-footer">
                    <button class="btn2 fiche-action" type="button" data-dismiss="modal">Annuler</button>
                    <form method="post" action="index.php">
                        <input type="hidden" name="gestion" value="fiche">
                        <input type="hidden" name="action" value="supprimer">
                        <input type="hidden" name="idFiche" value="<?php echo $_smarty_tpl->tpl_vars['fiche']->value->getIdFiche();?>
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
