<?php

class RoleModele extends Modele{

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getRole(){
        $sql = 'SELECT * FROM ' . P . 'role WHERE idRole = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['idRole']));

        $unRole = new RoleTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $unRole;
    }

    public function getListeRole(){
        $sql = 'SELECT * FROM ' . P . 'role';

        $resultat = $this->executeRequete($sql);


        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeRole[] = new RoleTable($row);
            }
        }else{
            return null;
        }

        return $listeRole;
    }
}
