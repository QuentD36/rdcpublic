<?php

class EmployeVue{

    private $parametre = array();
    private $tpl;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function genererAffichage($listeEmployes){

        if ($_SESSION['role'] == 'Administrateur'){
            $this->tpl->assign('titreHeader', 'Gestion des utilisateurs');
        }else{
            $this->tpl->assign('titreHeader', 'Redirection');
        }


        $this->tpl->assign('login', $_SESSION['nomPrenom']);

        $this->tpl->assign('role', $_SESSION['role']);

        $this->tpl->assign('listeEmployes', $listeEmployes);

        $this->tpl->assign('succes', EmployeTable::getMessageSucces());

        $this->tpl->display('mod_employe/vue/employeVue.tpl');
    }

    public function genererAffichageFiche($unEmploye){

        switch ($this->parametre['action']) {
            case 'form_ajouter' :

                $this->tpl->assign('titreHeader', 'Ajouter un utilisateur');

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('error', EmployeTable::getMessageErreur());

                $this->tpl->assign('action', 'ajouter');

                $this->tpl->assign('unEmploye', $unEmploye);

                break;

            case 'form_modifier':

                $this->tpl->assign('titreHeader', 'Modifier un utilisateur');

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('error', EmployeTable::getMessageErreur());

                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('unEmploye', $unEmploye);

                break;

        }

        $this->tpl->assign('roleCombo', $unEmploye->getComboRole());
        $this->tpl->display('mod_employe/vue/employeFicheVue.tpl');

    }



}