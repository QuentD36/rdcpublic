<?php

class ReparationModele extends Modele{

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getTypeRep(){
        $sql = 'SELECT * FROM ' . P . 'type_reparation WHERE idTypeRep = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['idTypeRep']));

        $unType = new ReparationTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $unType;
    }

    public function getListeTypeRep(){
        $sql = 'SELECT * FROM ' . P . 'type_reparation';

        $resultat = $this->executeRequete($sql);

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeTypeRep[] = new ReparationTable($row);
            }
        }else{
            return null;
        }

        return $listeTypeRep;
    }
}
