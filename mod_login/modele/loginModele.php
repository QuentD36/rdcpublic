<?php

class LoginModele extends Modele {

    private $parametre = array(); // Tableau ($_REQUEST)

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function rechercherEmploye(LoginTable $authEnCours){
        $sql = 'SELECT * FROM ' . P . 'employe WHERE login = ?';

        $resultat = $this->executeRequete($sql, array($authEnCours->getLogin()));



        $authExistant = new EmployeTable($resultat->fetch(PDO::FETCH_ASSOC));

        if($resultat->rowCount() == 1 && $authEnCours->getLogin() == $authExistant->getLogin() && $authEnCours->getMotDePasse() == $authExistant->getMotDePasse()){
            // Création de la session
            $_SESSION['login'] = $authExistant->getLogin();
            $_SESSION['nomPrenom'] = $authExistant->getPrenom() . ' ' . $authExistant->getNom();
            $_SESSION['role'] = $authExistant->getIdRole()->getIntitule();
            $_SESSION['idEmploye'] = $authExistant->getIdEmploye();

            return true;
        }

        LoginTable::setMessageErreur('Identifiant et/ou mot de passe invalide(s)');
        return false;
    }
}

