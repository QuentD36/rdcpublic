<?php


class AdminModele extends Modele {

    private $parametre = array(); // Tableau ($_REQUEST)

    public function __construct($parametre)
    {
        $this->parametre = $parametre;
    }

    public function getStats(){
        $this->getStat1();
    }

    public function getStat1(){
        $sql = 'SELECT COUNT(*) as \'compteur\' FROM ' . P . 'fiche';

        $resultat = $this->executeRequete($sql);

        return $resultat->fetchall(PDO::FETCH_ASSOC);

    }

    public function getNbFicheAnnee(){
        $year = DateHeure::actualYear();

        $sql = 'SELECT COUNT(idFiche) as \'nbFicheAnnee\' FROM ' . P . 'fiche 
        WHERE dateCreation LIKE "' . $year . "-" . '%"';

        $resultat = $this->executeRequete($sql);

        $row = $resultat->fetch(PDO::FETCH_ASSOC);

        return $row['nbFicheAnnee'];
    }

    public function getNbFicheMois(){
        $year = DateHeure::actualYear();
        $thisMonth = DateHeure::getMois();
        $compteur = 0;

        $sql = 'SELECT dateCreation as \'date\' FROM ' .  P . 'fiche 
        WHERE dateCreation LIKE "' . $year . "-" . $thisMonth . '%" ORDER BY idFiche DESC';

        $resultat = $this->executeRequete($sql);

        $row = $resultat->fetchall(PDO::FETCH_ASSOC);

        foreach ($row as $item){
            $month = DateHeure::getMois($item['date']);

            if($month == $thisMonth){
                $compteur++;
            }
        }

        return $compteur;
    }

    public function chartConstruct(){
        $year = DateHeure::actualYear();
        $month = ["01","02","03","04","05","06","07","08","09","10","11","12"];
        $results = [];
        $count = [];

        foreach($month as $value){
            $sql = 'SELECT dateCreation as \'date\' FROM ' .  P . 'fiche 
            WHERE dateCreation LIKE "' . $year . '-' . $value . '%" ORDER BY idFiche DESC';

            $resultat = $this->executeRequete($sql);

            array_push($results, $resultat->fetchAll(PDO::FETCH_ASSOC));

        }

        for ($i=0; $i<12; $i++){
            array_push($count, count($results[$i]));
        }
        return $count;

    }

}

