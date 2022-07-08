<!doctype html>
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
{include file='public/sidebar.tpl'}



<!-- Body -->
<section id="listVue" class="home_content">
    <!-- Header -->

    {include file='public/header.tpl'}

    <!-- Fin header -->

    {if !empty($error)}<p class="alert alert-danger">{$error}</p>{/if}
    <form method="post" action="index.php">
        <input type="hidden" name="gestion" value="employe">
        <input type="hidden" name="action" value="{$action}">
        <div class="container-perso">
            <div class="form-box">
                <div class="form-info">
                    <h2>Informations</h2>
                    {if $action eq 'modifier'}
                        <input type="hidden" name="idEmploye" value="{$unEmploye->getIdEmploye()}">
                    {/if}
                    <div class="input-box">
                        <label for="nom">
                            Nom
                        </label>
                        <input type="text" id="nom" name="nom" value="{$unEmploye->getNom()}">
                    </div>
                    <div class="input-box">
                        <label for="prenom">
                            Prénom
                        </label>
                        <input type="text" id="prenom" name="prenom" value="{$unEmploye->getPrenom()}">
                    </div>
                    <div class="input-box">
                        <label for="idRole">
                            Rôle
                        </label>
                        <select name="idRole" required>
                            <option value="">--- Choix ---</option>
                            {foreach from=$roleCombo item=role}
                                <option value="{$role->getIdRole()}"
                                        {if $role->getIdRole() == $unEmploye->getIdRole()->getIdRole()}selected{/if}>
                                    {$role->getIntitule()}</option>
                            {/foreach}
                        </select>
                    </div>
                    <div class="input-box">
                        <label for="login">
                            Login
                        </label>
                        <input type="text" id="login" name="login" value="{$unEmploye->getLogin()}" readonly>
                    </div>
                    <div class="input-box">
                        <label for="motDePasse">
                            Mot de passe
                        </label>
                        <input type="password" id="password" name="motDePasse" value="{$unEmploye->getMotDePasse()}">
                        <img src="public/images/hidden.png" id="eye" alt="Afficher/cacher mot de passe" onclick="change()">
                    </div>
                </div>
            </div>

            <div class="redirect-btn">
                <a href="index.php?gestion=employe" class="btn2">Annuler</a>
                <input type="submit" class="btn"
                       value="{if $action eq 'ajouter'}Ajouter{elseif $action eq 'modifier'}Modifier{/if}">

            </div>

        </div>
    </form>
    {include file='public/footer.tpl'}
</section>

<!-- Fin body -->

<!-- Script -->
<script src="public/assets/js/showPass.js"></script>
<script src="public/assets/js/sidebar.js"></script>
<script src="public/assets/js/login.js"></script>

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
