<?php
/* Smarty version 3.1.34-dev-7, created on 2022-07-08 07:11:44
  from 'C:\wamp64\www\rdcpublic\mod_admin\vue\adminVue.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_62c7d8b03d0a63_77289743',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '599faa3f3ca9f410cbc4336adaaf9100353c4758' => 
    array (
      0 => 'C:\\wamp64\\www\\rdcpublic\\mod_admin\\vue\\adminVue.tpl',
      1 => 1650979693,
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
function content_62c7d8b03d0a63_77289743 (Smarty_Internal_Template $_smarty_tpl) {
?><!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>12ème BSMAT - Administration</title>
    <meta name="description" content="Fiche suiveuses - Administration">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" type="image/png" href="public/images/logo.png"/>

    <link rel="stylesheet" href="public/style/app.css">
    <link rel="stylesheet" href="public/style/QD-app.css">
    <link rel="stylesheet" href="public/style/AC-app.css">
    <link rel="stylesheet" href="public/style/responsive.css">
    <link rel="stylesheet" href="public/style/sidebar.css">
    <link href="public/assets/css/sb-admin-2.min.css" rel="stylesheet" type="text/css">
    <link href="public/style/boxicons.css" rel="stylesheet" type="text/css">
    <!--Load the AJAX API-->
    <?php echo '<script'; ?>
 type="text/javascript" src="https://www.gstatic.com/charts/loader.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="public/assets/js/google.js"><?php echo '</script'; ?>
>

</head>
<body>
<?php $_smarty_tpl->_subTemplateRender('file:public/sidebar.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

<div class="home_content">
    <?php $_smarty_tpl->_subTemplateRender('file:public/header.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>

    <div class="first-row">
        <div class="card shadow mb-4">
            <!-- Card Header - Accordion -->
            <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse"
               role="button" aria-expanded="true" aria-controls="collapseCardExample">
                <h6 class="m-0 font-weight-bold text-primary text-primary-perso">Statistiques</h6>
                <i class='bx bx-chevron-down bx-perso'></i>
            </a>
            <!-- Card Content - Collapse -->
            <div class="collapse show" id="collapseCardExample">
                <div class="card-body">
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-perso font-weight-bold text-primary mb-1">
                                            Nombre total de fiche (année) :</div>
                                        <div class="mb-0 font-weight-bold text-gray-800 text-perso"><?php echo $_smarty_tpl->tpl_vars['nbFicheAnnee']->value;?>
</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="font-weight-bold text-primary mb-1 text-perso">
                                            Nombre de fiche (mois) :</div>
                                        <div class="mb-0 font-weight-bold text-gray-800 text-perso"><?php echo $_smarty_tpl->tpl_vars['nbFicheMois']->value;?>
</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="second-row">
        <div class="card shadow mb-4 col-xl-6">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary text-primary-perso">Graphique</h6>
            </div>
            <div class="card-body">
                <div class="chart-area">
                    <canvas id="myAreaChart"></canvas>
                </div>
            </div>
        </div>
    </div>

        <input type="hidden" id="data" value="<?php echo $_smarty_tpl->tpl_vars['data']->value;?>
">


    <?php $_smarty_tpl->_subTemplateRender('file:public/footer.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</div>
<?php echo '<script'; ?>
 src="public/assets/js/vendor/chart.js/Chart.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/sidebar.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/jquery.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/bootstrap.bundle.min.js"><?php echo '</script'; ?>
>
<?php echo '<script'; ?>
 src="public/assets/js/chart.js"><?php echo '</script'; ?>
>
</body>
</html>

<?php }
}
