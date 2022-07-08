<?php

class FicheModele extends Modele {

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getListeFiches(){


        $sql = 'SELECT * FROM ' . P . 'fiche ORDER BY idFiche';

        $resultat = $this->executeRequete($sql);

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeFiches[] = new FicheTable($row);
            }
            return $listeFiches;

        }else{
            return null;
        }
    }

    public function addFiche(FicheTable $valeurs){

        $sql = 'INSERT INTO ' . P . 'fiche (idDiag, idRep, idCarrosserie, idCamGrue, dateCreation, vehicule,
         immatriculation, kilometrage, typeVehicule, idTypeFiche, idEmploye) '.'
         VALUES (?,?,?,?,?,?,?,?,?,?,?)';



        $resultat = $this->executeRequete($sql, array(
            $valeurs->getIdDiag(),
            $valeurs->getIdRep(),
            $valeurs->getIdCarrosserie(),
            $valeurs->getIdCamGrue(),
            DateHeure::getDateEcriture(),
            $valeurs->getVehicule(),
            $valeurs->getImmatriculation(),
            $valeurs->getKilometrage(),
            $valeurs->getTypeVehicule(),
            $valeurs->getIdTypeFiche()->getIdTypeFiche(),
            $_SESSION['idEmploye'],
        ));

        if($resultat){
            FicheTable::setMessageSucces('Création de la fiche effectuée avec succès !');
        }
    }

    public function getUneFiche(){

        $sql = 'SELECT * FROM ' . P . 'fiche WHERE idFiche = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['idFiche']));

        $uneFiche = new FicheTable($resultat->fetch(PDO::FETCH_ASSOC));
        $_SESSION['idFicheEdit'] = $this->parametre['idFiche'];

        return $uneFiche;
    }

    public function editFiche(FicheTable $valeurs){

        $sql = 'UPDATE ' . P . 'fiche SET idDiag = ?, idRep = ?, idCarrosserie = ?, idCamGrue = ?, vehicule = ?, immatriculation = ?, 
        kilometrage = ?, typeVehicule = ?, idTypeFiche = ? WHERE idFiche = ?';

        $resultat = $this->executeRequete($sql, array(
            $valeurs->getIdDiag(),
            $valeurs->getIdRep(),
            $valeurs->getIdCarrosserie(),
            $valeurs->getIdCamGrue(),
            $valeurs->getVehicule(),
            $valeurs->getImmatriculation(),
            $valeurs->getKilometrage(),
            $valeurs->getTypeVehicule(),
            $valeurs->getIdTypeFiche()->getIdTypeFiche(),
            $valeurs->getIdFiche(),
        ));

        if ($resultat){
            FicheTable::setMessageSucces('Modification de la fiche effectuée avec succès !');
        }
    }

    public function getActions(){
        $sql = 'SELECT * FROM ' . P . 'action WHERE idFiche = ? ORDER BY idTypeRep';

        $resultat = $this->executeRequete($sql, array($this->parametre['idFiche']));

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeActions[] = new ActionTable($row);
            }
            return $listeActions;

        }else{
            return null;
        }
    }

    public function supprimer(){

        $sql = 'DELETE FROM ' . P . 'fiche WHERE idFiche = ?';


        $resultat = $this->executeRequete($sql, array($this->parametre['idFiche']));


        FicheTable::setMessageSucces('Suppression de la fiche effectuée avec succès!');
    }
}