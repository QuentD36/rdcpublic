<?php

class BrowserControleur{

    private $parametre = array();
    private $oVue;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this ->oVue = new BrowserVue($this->parametre);
    }

    public function error(){

        $this->oVue->genererAffichage();
    }


}