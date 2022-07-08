<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>12ème BSMAT - Fiches suiveuses - Création</title>
    <meta name="description" content="12ème BSMAT - Fiches suiveuses - Création">
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

<!-- Body -->
<section id="listVue">
    {if !empty($error)}<p class="alert alert-danger">{$error}</p>{/if}
    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="fiche">
        <input type="hidden" name="action" value="{$action}">
        <div class="container-perso">
            <div class="form-box">
                <div class="form-info">
                    <h2>Informations du véhicule</h2>
                    {if $action eq 'fiche_modifier'}
                        <input type="hidden" name="idFiche" value="{$uneFiche->getIdFiche()}" readonly>
                    {/if}
                    <div class="input-box">
                        <label for="vehicule">
                            Véhicule *
                        </label>
                        <input type="text" name="vehicule" value="{$uneFiche->getVehicule()}">
                    </div>
                    <div class="input-box">
                        <label for="type_vehicule">
                            Type de véhicule
                        </label>
                        <input type="text" name="typeVehicule" value="{$uneFiche->getTypeVehicule()}">
                    </div>
                    <div class="input-box">
                        <label for="immatriculation">
                            Numéro d'immatriculation *
                        </label>
                        <input type="text" name="immatriculation" value="{$uneFiche->getImmatriculation()}">
                    </div>
                    <div class="input-box">
                        <label for="kilometrage">
                            Kilométrage *
                        </label>
                        <input type="text" name="kilometrage" value="{$uneFiche->getKilometrage()}">
                    </div>
                </div>
                <div class="form-info">
                    <h2>Informations complémentaires</h2>
                    <div class="input-box">
                        <label for="operateur">
                            Opérateur
                        </label>
                        {if $action eq 'fiche_modifier'}
                            <input type="text" name="nomPrenom" value="{$uneFiche->getIdEmploye()->getNom()} {$uneFiche->getIdEmploye()->getPrenom()}" readonly>
                            <input type="hidden" name="idEmploye" value="{$uneFiche->getIdEmploye()->getIdEmploye()}">
                        {elseif $action eq 'fiche_ajouter'}
                            <input type="text" name="operateur" placeholder="{$operateur}" readonly>
                            <input type="hidden" name="idEmploye" value="{$idemploye}">
                        {/if}
                    </div>
                    <div class="input-box">
                        <label for="date_creation">
                            Date
                        </label>
                        {if $action eq 'fiche_ajouter'}
                            <input type="text" name="dateCreation" value="{$smarty.now|date_format:"%d-%m-%Y"}"
                                   readonly>
                        {else}
                            <input type="text" name="dateCreation" value="{$uneFiche->getDateCreation()}" readonly>
                        {/if}
                    </div>
                    <div class="input-box">
                        <label for="idTypeFiche">
                            Type de fiche *
                        </label>
                        <select name="idTypeFiche">
                            <option value="">--- Choix ---</option>
                            {foreach from=$typeCombo item=type}
                                <option value="{$type->getIdTypeFiche()}"
                                        {if $type->getIdTypeFiche() == $uneFiche->getIdTypeFiche()->getIdTypeFiche()}selected{/if}>
                                    {$type->getIntitule()}</option>
                            {/foreach}
                        </select>

                    </div>
                    <div class="input-box">
                        <label for="idDiag">
                            Numéro IT Diagnostic
                        </label>
                        <input type="text" name="idDiag" value="{$uneFiche->getIdDiag()}">
                    </div>
                    <div class="input-box">
                        <label for="idRep">
                            Numéro IT Rep
                        </label>
                        <input type="text" name="idRep" value="{$uneFiche->getIdRep()}">
                    </div>
                    <div class="input-box">
                        <label for="idCarrosserie">
                            Numéro IT Carrosserie
                        </label>
                        <input type="text" name="idCarrosserie" value="{$uneFiche->getIdCarrosserie()}">
                    </div>
                    <div class="input-box">
                        <label for="idCamGrue">
                            Numéro IT Camion grue
                        </label>
                        <input type="text" name="idCamGrue" value="{$uneFiche->getIdCamGrue()}">
                    </div>
                </div>
            </div>

            <div class="redirect-btn">
                <a href="index.php?gestion=fiche" class="btn2">Annuler</a>
                <input type="submit" class="btn"
                       value="{if $action eq 'fiche_ajouter'}Ajouter{elseif $action eq 'fiche_modifier'}Modifier{/if}">

            </div>

        </div>
    </form>
    {include file='public/footer.tpl'}
</section>

<!-- Fin body -->

<!-- Script -->

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
