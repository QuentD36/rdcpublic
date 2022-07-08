<?php

class AdminVue{

    private $parametre = array();
    private $tpl;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function genererAffichage($stats, $nbFicheAnnee, $nbFicheMois, $count){

        $this->tpl->assign('titreHeader', 'Gestionnaire admin');

        $this->tpl->assign('login', $_SESSION['nomPrenom']);

        $this->tpl->assign('stat1', $stats);

        $this->tpl->assign('nbFicheAnnee', $nbFicheAnnee);

        $this->tpl->assign('nbFicheMois', $nbFicheMois);

        $this->tpl->assign('data', implode(", ", $count));

        $this->tpl->assign('succes', AdminTable::getMessageSucces());

        $this->tpl->display('mod_admin/vue/adminVue.tpl');
    }

    public function genererAffichageFiche($valeurs){

        switch ($this->parametre['action']) {
            case 'form_fiche_ajouter' :
            case 'fiche_ajouter' :

                $this->tpl->assign('titreHeader', 'Fiche suiveuse : Création');

                $this->tpl->assign('action', 'fiche_ajouter');

                $this->tpl->assign('operateur', $_SESSION['nomPrenom']);

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('idemploye', $_SESSION['idEmploye']);

                $this->tpl->assign('error', FicheTable::getMessageErreur());

                $this->tpl->assign('options', array(
                    0 => 'Veuillez choisir un type',
                    1 => 'Réparations (après diagnostic)',
                    2 => 'Retouches & complément de réparation (après contrôle)',
                    3 => 'Station (& banc de freinage)'));

                $this->tpl->assign('selected', $valeurs->getType_fiche());

                $this->tpl->assign('uneFiche', $valeurs);



                break;
            case 'form_fiche_modifier':
            case 'fiche_modifier':

                $this->tpl->assign('titreHeader', 'Fiche suiveuse : Modification');

                $this->tpl->assign('action', 'fiche_modifier');

                $this->tpl->assign('operateur', $valeurs->getOperateur());

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('idemploye', $_SESSION['idEmploye']);

                $this->tpl->assign('error', FicheTable::getMessageErreur());

                $this->tpl->assign('options', array(
                    0 => 'Veuillez choisir un type',
                    1 => 'Réparations (après diagnostic)',
                    2 => 'Retouches & complément de réparation (après contrôle)',
                    3 => 'Station (& banc de freinage)'));

                $this->tpl->assign('selected', $valeurs->getType_fiche());

                $this->tpl->assign('uneFiche', $valeurs);



        }

        $this->tpl->display('mod_fiche/vue/ficheVue.tpl');


    }



}