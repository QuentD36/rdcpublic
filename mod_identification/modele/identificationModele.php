<?php

class IdentificationModele extends Modele {

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getIdentification(){
        $sql = 'SELECT * FROM ' . P . 'identification_fiche WHERE idIdentificationFiche = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['idIdentificationFiche']));

        $identification = new IdentificationTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $identification;
    }

}