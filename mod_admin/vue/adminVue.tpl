<!doctype html>
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
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script src="public/assets/js/google.js"></script>

</head>
<body>
{include file='public/sidebar.tpl'}

<div class="home_content">
    {include file='public/header.tpl'}

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
                                        <div class="mb-0 font-weight-bold text-gray-800 text-perso">{$nbFicheAnnee}</div>
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
                                        <div class="mb-0 font-weight-bold text-gray-800 text-perso">{$nbFicheMois}</div>
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

        <input type="hidden" id="data" value="{$data}">


    {include file='public/footer.tpl'}
</div>
<script src="public/assets/js/vendor/chart.js/Chart.min.js"></script>
<script src="public/assets/js/sidebar.js"></script>
<script src="public/assets/js/jquery.min.js"></script>
<script src="public/assets/js/bootstrap.bundle.min.js"></script>
<script src="public/assets/js/chart.js"></script>
</body>
</html>

