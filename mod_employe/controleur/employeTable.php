<?php

class EmployeTable{

    private $idEmploye = "";
    private $nom = "";
    private $prenom = "";
    private $idRole = "";
    private $login = "";
    private $motDePasse = "";

    private $comboRole = [];

    private $autorisationBD = true;

    private static $messageErreur = "";
    private static $messageSucces = "";

    public function hydrater(array $row)
    {
        foreach ($row as $key => $valeur) {

            $setter = "set" . ucfirst($key);

            if (method_exists($this, $setter)) {
                $this->$setter($valeur);
            }
        }
    }

    public function __construct($data = null){
        if($data !=null){
            $this->hydrater($data);
        }else{
            $this->idRole = new RoleTable([]);
        }

        $this->setComboRole();
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
        $this->idEmploye = $idEmploye;
    }

    /**
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        if(!is_string($nom) || empty($nom) || strlen($nom) > 50){
            $this->setAutorisationBD(false);
            self::setMessageErreur("Veuillez saisir un nom valide !<br>");
        }
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * @param string $prenom
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;
    }

    /**
     * @return string
     */
    public function getIdRole()
    {
        return $this->idRole;
    }

    /**
     * @param string $idRole
     */
    public function setIdRole($idRole)
    {
        $objType = new RoleModele(['idRole' => $idRole]);

        $this->idRole = $objType->getRole();;
    }

    /**
     * @return string
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * @param string $login
     */
    public function setLogin($login)
    {
        $this->login = $login;
    }

    /**
     * @return string
     */
    public function getMotDePasse()
    {
        return $this->motDePasse;
    }

    /**
     * @param string $motDePasse
     */
    public function setMotDePasse($motDePasse)
    {
        $this->motDePasse = $motDePasse;
    }

    /**
     * @return array
     */
    public function getComboRole()
    {
        return $this->comboRole;
    }

    /**
     * @param array
     */
    public function setComboRole()
    {
        $oComboRole = new RoleModele(array());

        $this->comboRole = $oComboRole->getListeRole();
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