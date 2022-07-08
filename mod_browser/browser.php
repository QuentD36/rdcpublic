<?php

class Browser {

    private $parametre = array();
    private $oControleur;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->oControleur = new BrowserControleur($this->parametre);
    }

    public function choixAction(){
        $this->oControleur->error();
    }
}