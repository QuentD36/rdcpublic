<?php

class Autoloader{

    public static function chargerClasses(){

        spl_autoload_register(array(__CLASS__, 'autoload'));
    }

    /**
     * Fonction qui permet de charger automatiquement tous les modules/classes du projet
     *
     *
     *
     * @param $maClasse correspond à la classe recherchée
     * @return void
     */
    public static function autoload($maClasse){
        // $maClasse = Nom de la classe recherchée

        // Mettre en miniscule la première lettre de la classe
        // pour rechercher le fichier correspondant

        $maClasse = lcfirst($maClasse);


        $repertoires = [
            'mod_login/',
            'mod_login/controleur/',
            'mod_login/modele/',
            'mod_login/vue/',
            'mod_accueil/',
            'mod_accueil/controleur/',
            'mod_accueil/modele/',
            'mod_accueil/vue/',
            'mod_fiche/',
            'mod_fiche/controleur/',
            'mod_fiche/modele/',
            'mod_fiche/vue/',
            'mod_action/',
            'mod_action/controleur/',
            'mod_action/modele/',
            'mod_action/vue/',
            'mod_type/',
            'mod_type/controleur/',
            'mod_type/modele/',
            'mod_identification/',
            'mod_identification/controleur/',
            'mod_identification/modele/',
            'mod_reparation/',
            'mod_reparation/controleur/',
            'mod_reparation/modele/',
            'mod_role/',
            'mod_role/controleur/',
            'mod_role/modele/',
            'mod_employe/',
            'mod_employe/controleur/',
            'mod_employe/modele/',
            'mod_employe/vue/',
            'mod_admin/',
            'mod_admin/controleur/',
            'mod_admin/modele/',
            'mod_admin/vue/',
            'mod_browser/',
            'mod_browser/controleur/',
            'mod_browser/vue/',
        ];

        // Gestion des droits : Si connecté en admin, accès au module admin
//        if ($_SESSION['role'] == 'Administrateur'){
//
//            array_push($repertoires, 'mod_admin/', 'mod_admin/controleur/', 'mod_admin/modele/', 'mod_admin/vue/',);
//
//        }


        // Rechercher dans chaque répertoire du tableau...
        foreach ($repertoires as $repertoire){
            // Vérifier si un fichier .php existe
            if(file_exists($repertoire.$maClasse.'.php')){
                require_once ($repertoire.$maClasse.'.php');
                return;
            }
        }
    }

}