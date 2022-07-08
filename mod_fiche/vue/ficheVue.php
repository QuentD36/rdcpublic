<?php

class FicheVue{

    private $parametre = array();
    private $tpl;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function genererAffichageListe($valeurs){

        $this->tpl->assign('titreHeader', 'Gestionnaire des<br>fiches suiveuses');

        $this->tpl->assign('login', $_SESSION['nomPrenom']);

        $this->tpl->assign('role', $_SESSION['role']);

        $this->tpl->assign('listeFiches', $valeurs);

        $this->tpl->assign('succes', FicheTable::getMessageSucces());

        $this->tpl->display('mod_fiche/vue/ficheListeVue.tpl');
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

                $this->tpl->assign('selected', $valeurs->getIdTypeFiche());

                $this->tpl->assign('uneFiche', $valeurs);



                break;
            case 'form_fiche_modifier':
            case 'fiche_modifier':

                $this->tpl->assign('titreHeader', 'Fiche suiveuse : Modification');

                $this->tpl->assign('action', 'fiche_modifier');

                $this->tpl->assign('operateur', $valeurs->getIdEmploye()->getNom() . ' '. $valeurs->getIdEmploye()->getPrenom());

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('idemploye', $_SESSION['idEmploye']);

                $this->tpl->assign('error', FicheTable::getMessageErreur());

                $this->tpl->assign('selected', $valeurs->getIdTypeFiche());

                $this->tpl->assign('uneFiche', $valeurs);



        }

        $this->tpl->assign('typeCombo', $valeurs->getComboType());

        $this->tpl->display('mod_fiche/vue/ficheVue.tpl');


    }



}