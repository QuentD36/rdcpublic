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

{include file='public/header.tpl'}

<!-- Fin header -->
<section id="list">
    {if !empty($succes)}
        <div class="flex-center">
            <p class="alert alert-success">{$succes}</p>
        </div>
    {/if}
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
                                    {foreach from=$listeFiches item=fiche}
                                        <tr>
                                            <td>{$fiche->getImmatriculation()}</td>
                                            <td>{$fiche->getKilometrage()} km</td>
                                            <td>{$fiche->getIdEmploye()->getNom()} {$fiche->getIdEmploye()->getPrenom()}</td>
                                            <td>{$fiche->getDateCreation()|date_format:"%d-%m-%Y"}</td>
                                            <td>{$fiche->getIdDiag()}</td>
                                            <td>{$fiche->getIdRep()}</td>
                                            <td>{$fiche->getIdCarrosserie()}</td>
                                            <td>{$fiche->getIdCamGrue()}</td>
                                            <td>
                                                <form method="post" action="index.php" target="_blank">
                                                    <input type="hidden" name="gestion" value="fiche">
                                                    <input type="hidden" name="action" value="form_fiche_imprimer">
                                                    <input type="hidden" name="idFiche" value="{$fiche->getIdFiche()}">
                                                    <button type="submit" class="btn fiche-action">Imprimer</button>
                                                </form>
                                                 <form method="post" action="index.php">
                                                    <input type="hidden" name="gestion" value="fiche">
                                                    <input type="hidden" name="action" value="form_fiche_modifier">
                                                    <input type="hidden" name="idFiche" value="{$fiche->getIdFiche()}">
                                                     <button type="submit" class="btn2 fiche-action">Modifier</button>
                                                </form>
                                                {if $role == 'Administrateur'}
                                                    <a class="btn fiche-action" href="#" data-toggle="modal" data-target="#deleteModal-{$fiche->getIdFiche()}">Supprimer</a>
                                                {/if}
                                            </td>
                                    {/foreach}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div><!-- .animated -->
            </div><!-- .content -->


        </div>

    </div>
    {include file='public/footer.tpl'}
</section>

{foreach from=$listeFiches item=fiche}
    <!-- Delete Modal-->
    <div class="modal fade" id="deleteModal-{$fiche->getIdFiche()}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="hidden" name="idFiche" value="{$fiche->getIdFiche()}">
                        <button type="submit" class="btn fiche-action">Supprimer</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
{/foreach}

    <!-- Right Panel -->
    <script src="public/assets/js/vendor/jquery-2.1.4.min.js"></script>
    <script src="public/assets/js/popper.min.js"></script>
    <script src="public/assets/js/plugins.js"></script>
    <script src="public/assets/js/main.js"></script>


    <script src="public/assets/js/lib/data-table/datatables.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/dataTables.buttons.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.bootstrap.min.js"></script>
    <script src="public/assets/js/lib/data-table/jszip.min.js"></script>
    <script src="public/assets/js/lib/data-table/pdfmake.min.js"></script>
    <script src="public/assets/js/lib/data-table/vfs_fonts.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.html5.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.print.min.js"></script>
    <script src="public/assets/js/lib/data-table/buttons.colVis.min.js"></script>
    <script src="public/assets/js/lib/data-table/datatables-init.js"></script>


    <script type="text/javascript">
        $(document).ready(function () {
            $('#bootstrap-data-table-export').DataTable();
        });
    </script>

</body>
</html>
