<?php

class FicheTable{

    private $idFiche = "";
    private $idDiag = "";
    private $idRep = "";
    private $idCarrosserie = "";
    private $idCamGrue = "";
    private $dateCreation = "";
    private $vehicule = "";
    private $immatriculation = "";
    private $typeVehicule = "";
    private $kilometrage = "";
    private $idEmploye = "";
    private $idTypeFiche = "";
    private $idIdentificationFiche = "";

    private $comboType = [] ;

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    public function hydrater(array $row)
    {
        foreach ($row as $key => $valeur) {
            // Methode setter à appeler
            $setter = "set" . ucfirst($key);

            // Fonction prend 2 paramètres
            if (method_exists($this, $setter)) {
                // Invoquer la méthode
                $this->$setter($valeur);
            }
        }
    }

    public function __construct($data = null){
        if($data !=null){
            $this->hydrater($data);
        }else{

            $this->idTypeFiche = new TypeTable([]);
            $this->idIdentificationFiche = new IdentificationTable([]);
        }

        $this->setComboType();
    }

    /**
     * @return string
     */
    public function getIdFiche()
    {
        return $this->idFiche;
    }

    /**
     * @param string $idFiche
     */
    public function setIdFiche($idFiche)
    {
        $this->idFiche = $idFiche;
    }

    /**
     * @return string
     */
    public function getIdDiag()
    {
        return $this->idDiag;
    }

    /**
     * @param string $idDiag
     */
    public function setIdDiag($idDiag)
    {
        $this->idDiag = $idDiag;
    }

    /**
     * @return string
     */
    public function getIdRep()
    {
        return $this->idRep;
    }

    /**
     * @param string $idRep
     */
    public function setIdRep($idRep)
    {
        $this->idRep = $idRep;
    }

    /**
     * @return string
     */
    public function getIdCarrosserie()
    {
        return $this->idCarrosserie;
    }

    /**
     * @param string $idCarrosserie
     */
    public function setIdCarrosserie($idCarrosserie)
    {
        $this->idCarrosserie = $idCarrosserie;
    }

    /**
     * @return string
     */
    public function getIdCamGrue()
    {
        return $this->idCamGrue;
    }

    /**
     * @param string $idCamGrue
     */
    public function setIdCamGrue($idCamGrue)
    {
        $this->idCamGrue = $idCamGrue;
    }

    /**
     * @return string
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * @param string $dateCreation
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;
    }

    /**
     * @return string
     */
    public function getVehicule()
    {
        return $this->vehicule;
    }

    /**
     * @param string $vehicule
     */
    public function setVehicule($vehicule)
    {
        if(ctype_space($vehicule) || empty($vehicule)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("Veuillez saisir un véhicule valide ! <br>");
        }
        $this->vehicule = $vehicule;
    }

    /**
     * @return string
     */
    public function getImmatriculation()
    {
        return $this->immatriculation;
    }

    /**
     * @param string $immatriculation
     */
    public function setImmatriculation($immatriculation)
    {
        if(ctype_space($immatriculation) || empty($immatriculation)){
            $this->setAutorisationBD(false);
            self::setMessageErreur("Veuillez saisir une immatriculation valide ! <br>");
        }
        $this->immatriculation = $immatriculation;
    }

    /**
     * @return string
     */
    public function getTypeVehicule()
    {
        return $this->typeVehicule;
    }

    /**
     * @param string $typeVehicule
     */
    public function setTypeVehicule($typeVehicule)
    {
        $this->typeVehicule = $typeVehicule;
    }

    /**
     * @return string
     */
    public function getKilometrage()
    {
        return $this->kilometrage;
    }

    /**
     * @param string $kilometrage
     */
    public function setKilometrage($kilometrage)
    {
        if(!ctype_digit($kilometrage)){
            $this->setAutorisationBD(false);
            self::setMessageErreur(("Veuillez saisir un nombre de kilomètre valide !<br>"));
        }
        $this->kilometrage = $kilometrage;
    }

    /**
     * @return string
     */
    public function getIdEmploye()
    {
        return $this->idEmploye;
    }

    /**
     * @param string $idEmploye
     */
    public function setIdEmploye($idEmploye)
    {
        $objEmploye = new EmployeModele(['idEmploye' => $idEmploye]);


        $this->idEmploye = $objEmploye->getUnEmploye();
    }

    /**
     * @return string
     */
    public function getIdTypeFiche()
    {
        return $this->idTypeFiche;
    }

    /**
     * @param string $idTypeFiche
     */
    public function setIdTypeFiche($idTypeFiche)
    {
        if($idTypeFiche == null){
            $this->setAutorisationBD(false);
            self::setMessageErreur('Veuillez choisir un type de fiche valide !<br>');
        }

        $objType = new TypeModele(['idTypeFiche' => $idTypeFiche]);

        $this->idTypeFiche = $objType->getTypeFiche();
    }

    /**
     * @return array
     */
    public function getComboType()
    {
        return $this->comboType;
    }

    /**
     * @param array
     */
    public function setComboType()
    {
        $oComboType = new TypeModele(array());

        $this->comboType = $oComboType->getListeType();
    }

    /**
     * @return string
     */
    public function getIdIdentificationFiche()
    {
        return $this->idIdentificationFiche;
    }

    /**
     * @param string $idIdentificationFiche
     */
    public function setIdIdentificationFiche($idIdentificationFiche)
    {
        $objIdentification = new IdentificationModele(['idIdentificationFiche' => $idIdentificationFiche]);


        $this->idIdentificationFiche = $objIdentification->getIdentification();
    }

    /**
     * @return bool
     */
    public function getAutorisationBD()
    {
        return $this->autorisationBD;
    }

    /**
     * @param bool $autorisationBD
     */
    public function setAutorisationBD($autorisationBD)
    {
        $this->autorisationBD = $autorisationBD;
    }

    /**
     * @return string
     */
    public static function getMessageErreur()
    {
        return self::$messageErreur;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageErreur($messageErreur)
    {
        self::$messageErreur .= $messageErreur;
    }

    /**
     * @return string
     */
    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }

    /**
     * @param string $messageSucces
     */
    public static function setMessageSucces($messageSucces)
    {
        self::$messageSucces .= $messageSucces;
    }
}