<?php

class TypeModele extends Modele {

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getTypeFiche(){
        $sql = 'SELECT * FROM ' . P . 'type_fiche WHERE idTypeFiche = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['idTypeFiche']));

        $type = new TypeTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $type;
    }

    public function getListeType(){
        $sql = 'SELECT * FROM ' . P . 'type_fiche';

        $resultat = $this->executeRequete($sql);

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeType[] = new TypeTable($row);
            }
        }else{
            return null;
        }

        return $listeType;
    }

}