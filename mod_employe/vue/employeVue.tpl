<!doctype html>
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
{if $role == 'Administrateur'}

    {include file='public/sidebar.tpl'}


    <section id="list" class="home_content">
        <!-- Header -->
        {include file='public/header.tpl'}
        <!-- Fin header -->
        <div class="container-perso">
            {if !empty($succes)}<p class="alert alert-success">{$succes}</p>{/if}
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
                                        {foreach from=$listeEmployes item=employe}
                                        <tr>
                                            <td>{$employe->getIdEmploye()}</td>
                                            <td>{$employe->getPrenom()} {$employe->getNom()}</td>
                                            <td>{$employe->getIdRole()->getIntitule()}</td>
                                            <td>{$employe->getLogin()}</td>
                                            <td class="td-perso">
                                                <form method="post" action="index.php">
                                                    <input type="hidden" name="gestion" value="employe">
                                                    <input type="hidden" name="action" value="form_modifier">
                                                    <input type="hidden" name="idEmploye" value="{$employe->getIdEmploye()}">
                                                    <button type="submit" class="btn2 fiche-action">Modifier</button>
                                                </form>
                                                <a class="btn fiche-action" href="#" data-toggle="modal" data-target="#deleteModal-{$employe->getIdEmploye()}">Supprimer</a>
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
    {foreach from=$listeEmployes item=employe}
        <!-- Delete Modal-->
        <div class="modal fade" id="deleteModal-{$employe->getIdEmploye()}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                            <input type="hidden" name="idEmploye" value="{$employe->getIdEmploye()}">
                            <button type="submit" class="btn fiche-action">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    {/foreach}
    {else}
    {include file='public/header.tpl'}

    <div class="redirect-container">
        <div class="alert alert-danger">Vous n'avez pas les droits d'accès !</div>

        <a href="index.php" class="btn">Retour au menu</a>
    </div>

    {include file='public/footer.tpl'}
{/if}

<script src="public/assets/js/sidebar.js"></script>


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
