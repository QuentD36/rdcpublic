<?php

class AdminControleur{

    private $parametre = array();
    private $oVue;
    private $oModele;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oModele = new AdminModele($this->parametre);
        $this ->oVue = new AdminVue($this->parametre);
    }

    public function form_admin(){

        $count = $this->oModele->chartConstruct();
        $stat1 = $this->oModele->getStats();
        $nbFicheAnnee = $this->oModele->getNbFicheAnnee();
        $nbFicheMois = $this->oModele->getNbFicheMois();

        $this->oVue->genererAffichage($stat1, $nbFicheAnnee, $nbFicheMois, $count);
    }


}