<?php

class Employe {

    private $parametre = array();
    private $oControleur;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oControleur = new EmployeControleur($this->parametre);
    }

    public function choixAction(){
        if (isset($this->parametre['action'])){
            switch ($this->parametre['action']){
                case 'form_ajouter':
                    $this->oControleur->form_ajouter();
                    break;
                case 'ajouter':
                    $this->oControleur->ajouter();
                    break;
                case 'form_modifier':
                    $this->oControleur->form_modifier();
                    break;
                case 'modifier':
                    $this->oControleur->modifier();
                    break;
                case 'supprimer':
                    $this->oControleur->supprimer();
                    break;

            }
        }else{
            $this->oControleur->afficher();
        }
    }
}