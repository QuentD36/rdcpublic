<?php

class EmployeModele extends Modele {

    private $parametre = array();

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getAllEmploye(){
        $sql = 'SELECT * FROM ' . P . 'employe ORDER BY idEmploye DESC';

        $resultat = $this->executeRequete($sql);

        if($resultat->rowCount() > 0){
            while ($row = $resultat->fetch(PDO::FETCH_ASSOC)){

                $listeEmployes[] = new EmployeTable($row);
            }
            return $listeEmployes;

        }else{
            return null;
        }
    }

    public function getUnEmploye(){
        $sql = 'SELECT * FROM ' . P . 'employe WHERE idEmploye = ?';

        $resultat = $this->executeRequete($sql, array($this->parametre['idEmploye']));

        $unEmploye = new EmployeTable($resultat->fetch(PDO::FETCH_ASSOC));

        return $unEmploye;

    }

    public function addEmploye(EmployeTable $valeurs){
        $sql = 'INSERT INTO ' . P . 'employe (nom, prenom, idRole, login, motDePasse) '.'
         VALUES (?,?,?,?,?)';

        $resultat = $this->executeRequete($sql, array(
            $valeurs->getNom(),
            $valeurs->getPrenom(),
            $valeurs->getIdRole()->getIdRole(),
            $valeurs->getLogin(),
            $valeurs->getMotDePasse()
        ));

        if($resultat){
            EmployeTable::setMessageSucces('Création de l\'utilisateur effectuée avec succès !');
        }
    }

    public function editEmploye(EmployeTable $valeurs){
        $sql = 'UPDATE ' . P . 'employe SET nom = ?, prenom = ?, idRole = ?, login = ?, motDePasse = ?
         WHERE idEmploye = ?';

        $resultat = $this->executeRequete($sql, array(
            $valeurs->getNom(),
            $valeurs->getPrenom(),
            $valeurs->getIdRole()->getIdRole(),
            $valeurs->getLogin(),
            $valeurs->getMotDePasse(),
            $valeurs->getIdEmploye()
        ));

        if ($resultat){
            EmployeTable::setMessageSucces('Modification de l\'utilisateur effectuée avec succès !');
        }
    }

    public function deleteEmploye(){
        $sql = 'DELETE FROM ' . P . 'employe WHERE idEmploye=?';
        $resultat = $this->executeRequete($sql, array($this->parametre['idEmploye']));
        EmployeTable::setMessageSucces('Suppression de l\'utilisateur effectuée avec succès!');
    }


}