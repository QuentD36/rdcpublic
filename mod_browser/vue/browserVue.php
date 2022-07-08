<?php

class BrowserVue{

    private $parametre = array();
    private $tpl;

    public function __construct($parametre){

        $this->parametre = $parametre;

        $this->tpl = new Smarty();
    }

    public function genererAffichage(){

        $this->tpl->assign('titreHeader', 'Erreur navigateur');

        $this->tpl->display('mod_browser/vue/browserError.tpl');
    }

}