<?php
class ActionModele extends Modele
{

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getLastFiche(){
        $sql = 'SELECT MAX(idFiche) as idFiche FROM ' . P . 'fiche WHERE idEmploye = ?';

        $resultat = $this->executeRequete($sql, array($_SESSION['idEmploye']));

        $row = $resultat->fetch(PDO::FETCH_ASSOC);

        $_SESSION['idFiche'] = $row['idFiche'];

        return $row['idFiche'];
    }

    public function getListeActions($lastFiche)
    {
        $sql = 'SELECT * FROM ' . P . 'action WHERE idFiche = ? ORDER BY idAction DESC';

        $resultat = $this->executeRequete($sql, array($lastFiche));

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeActions[] = new ActionTable($row);
            }
            return $listeActions;

        }else{
            return null;
        }
    }                                                                              

    public function addAction(ActionTable $valeurs){

        $sql = 'INSERT INTO ' . P . 'action (intitule, idFiche, idTypeRep) ' . 'VALUES(?,?,?)';
        $resultat = $this->executeRequete($sql, array(
            $valeurs->getIntitule(),
            $_SESSION['idFiche'],
            $valeurs->getIdTypeRep()->getIdTypeRep(),
        ));

    }

    public function getListeActionsEdit(){
        $sql ='SELECT * FROM ' . P . 'action WHERE idFiche = ? ORDER BY idAction DESC';

        $resultat = $this->executeRequete($sql, array($_SESSION['idFicheEdit']));

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeActions[] = new ActionTable($row);
            }
            return $listeActions;

        }else{
            return null;
        }
    }

    public function editActionAdd(ActionTable $valeurs){

        $sql = 'INSERT INTO ' . P . 'action (intitule, idFiche, idTypeRep) ' . 'VALUES(?,?,?)';
        $resultat = $this->executeRequete($sql, array(
            $valeurs->getIntitule(),
            $_SESSION['idFicheEdit'],
            $valeurs->getIdTypeRep()->getIdTypeRep(),
        ));

    }

    public function deleteAction(){
        $sql = 'DELETE FROM ' . P . 'action WHERE idAction=?';
        $resultat = $this->executeRequete($sql, array($this->parametre['idAction']));
    }


}