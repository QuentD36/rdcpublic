<?php
class ActionTable
{

    // 1/ Déclaration des propriétés
    private $idAction = "";
    private $intitule = "";
    private $idFiche = "";
    private $idTypeRep = "";

    private $comboTypeRep = [] ;

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    // 2/ Importer la méthode hydrater

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

    // 3/ Le constructeur

    public function __construct($data = null)
    {
        if ($data != null) {
            $this->hydrater($data);
        }else{
            $this->idFiche = new FicheTable([]);
            $this->idTypeRep = new ReparationTable([]);
        }

        $this->setComboTypeRep();
    }

    /**
     * @return string
     */
    public function getIdAction()
    {
        return $this->idAction;
    }

    /**
     * @param string $idAction
     */
    public function setIdAction($idAction)
    {
        $this->idAction = $idAction;
    }

    /**
     * @return string
     */
    public function getIntitule()
    {
        return $this->intitule;
    }

    /**
     * @param string $intitule
     */
    public function setIntitule($intitule)
    {
        if (ctype_space($intitule) || empty($intitule)){
            $this->setAutorisationBD(false);
            self::setMessageErreur('Veuillez saisir une action valide !<br>');
        }
        $this->intitule = $intitule;
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
        $objIdFiche = new FicheModele(['idFiche' => $idFiche]);

        $this->idFiche = $objIdFiche->getUneFiche();
    }

    /**
     * @return string
     */
    public function getIdTypeRep()
    {
        return $this->idTypeRep;
    }

    /**
     * @param string $idTypeRep
     */
    public function setIdTypeRep($idTypeRep)
    {
        if($idTypeRep == 0){
            $this->setAutorisationBD(false);
            self::setMessageErreur('Veuillez choisir un type de réparation valide !<br>');
        }

        $objTypeRep = new ReparationModele(['idTypeRep' => $idTypeRep]);

        $this->idTypeRep = $objTypeRep->getTypeRep();
    }

    /**
     * @return array
     */
    public function getComboTypeRep()
    {
        return $this->comboTypeRep;
    }

    /**
     * @param array $comboTypeRep
     */
    public function setComboTypeRep()
    {
        $oComboTypeRep = new ReparationModele(array());

        $this->comboTypeRep = $oComboTypeRep->getListeTypeRep();
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
