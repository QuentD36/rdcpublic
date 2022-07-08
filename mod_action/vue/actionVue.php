<?php

class ActionVue
{

    private $parametre = array(); // tableau $_REQUEST
    private $oModele;
    private $tpl; // object

    public function __construct($parametre)
    {

        $this->parametre = $parametre;

        $this->oModele = new ReparationModele($parametre);

        $this->tpl = new Smarty();
    }

    public function genererAffichageListe($valeurs)
    {
        switch ($this->parametre['action']){
            case 'ajouter':
            case 'form_ajouter':
            case 'supprimer' :

                $this->tpl->assign('titreHeader', 'Création fiche suiveuse');

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('listeActions', $valeurs);

                $this->tpl->assign('succes', ActionTable::getMessageSucces());

                $this->tpl->assign('error', ActionTable::getMessageErreur());

                $this->tpl->assign('action', 'ajouter');

                $this->tpl->assign('supprimer', 'supprimer');

            break;

            case 'modifier' :
            case 'form_modifier' :
            case 'supprimerEdit' :

                $this->tpl->assign('titreHeader', 'Création fiche suiveuse');

                $this->tpl->assign('login', $_SESSION['nomPrenom']);

                $this->tpl->assign('listeActions', $valeurs);

                $this->tpl->assign('succes', ActionTable::getMessageSucces());

                $this->tpl->assign('error', ActionTable::getMessageErreur());

                $this->tpl->assign('action', 'modifier');

                $this->tpl->assign('supprimer', 'supprimerEdit');

            break;
        }

        $this->tpl->assign('comboTypeRep', $this->oModele->getListeTypeRep());

        $this->tpl->display('mod_action/vue/actionVue.tpl');


    }

}