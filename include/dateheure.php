<?php

class DateHeure
{

    /**
     * Permet de générer une nouvelle valeur Heure/date en lien avec le système
     *
     * @param $valeur
     * @return DateTime
     * @throws Exception
     */
    private static function newDateHeure($valeur = null)
    {
        if ($valeur == null){
            return new DateTime('', new DateTimeZone('Europe/Paris'));

        }else{
            return new DateTime($valeur, new DateTimeZone('Europe/Paris'));

        }
    }

    /**
     * Renvoie une date au format Jour-Mois-Année
     *
     * @param $date
     * @return string
     * @throws Exception
     */
    public static function getDateFormat($date){

        $maDate = self::newDateHeure($date)->format('d-m-Y');

        return $maDate;
    }

    /**
     * Renvoie une date au format Année-Mois-Jour
     *
     * @return string
     * @throws Exception
     */
    public static function getDateEcriture(){

        return self::newDateHeure()->format('Y-m-d');

    }


    public static function getDateLectureFr($date){

        $maDate = self::newDateHeure($date)->format('l d F Y');

        return self::formatFr($maDate);
    }


    public static function getMois($valeur = null){
        if ($valeur == null){
            return self::newDateHeure()->format('m');

        }else{
            return self::newDateHeure($valeur)->format('m');
        }
    }

    public static function actualYear(){
        return self::newDateHeure()->format('Y');
    }


    private static function formatFr($maDate) {

        $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
        $jours = ['Lundi', 'Mardi', 'Mercredi', 'Jeudi', 'Vendredi', 'Samedi', 'Dimanche'];
        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];
        // Recherche une valeur du tableau days dans la chaine maDate et la remplace par la valeur correspondante
        // trouvée dans le tableau jours puis retourne une nouvelle chaine
        // Dans cette nouvelle chaine on recherche une valeur contenue dans le tableau months puis sera remplacée par
        // sa correspondance du tableau mois
        return str_replace($months, $mois, str_replace($days, $jours, $maDate));
    }

}
