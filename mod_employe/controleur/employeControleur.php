<?php

class EmployeControleur{

    private $parametre = array();
    private $oVue;
    private $oModele;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new EmployeModele($parametre);

        $this->oVue = new EmployeVue($parametre);
    }

    public function afficher(){

        $listeEmployes = $this->oModele->getAllEmploye();

        $this->oVue->genererAffichage($listeEmployes);
    }

    public function form_ajouter(){
        $newEmploye = new EmployeTable();

        $this->oVue->genererAffichageFiche($newEmploye);
    }

    public function ajouter(){
        $controleEmploye = new EmployeTable($this->parametre);

        if ($controleEmploye->getAutorisationBD() == false){
            $this->oVue->genererAffichageFiche($controleEmploye);
        }else{
            $this->oModele->addEmploye($controleEmploye);
            $this->afficher();
        }
    }

    public function form_modifier(){
        $valeurs = $this->oModele->getUnEmploye();

        $this->oVue->genererAffichageFiche($valeurs);
    }

    public function modifier(){
        $controleEmploye = new EmployeTable($this->parametre);

        if($controleEmploye->getAutorisationBD() == false){
            $this->oVue->genererAffichageFiche($controleEmploye);
        }else{
            $this->oModele->editEmploye($controleEmploye);
            $this->afficher();
        }
    }

    public function supprimer(){
        $this->oModele->deleteEmploye();
        $this->afficher();
    }

}