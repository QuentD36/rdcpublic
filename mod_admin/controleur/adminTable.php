<?php

class AdminTable{

    // Déclaration des propriétés :
    private $stat1 ='';

    private $autorisationSession = true;

    private static $messageErreur = '';
    private static $messageSucces = '';

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

    public function __construct($data = null){
        if($data !=null){
            $this->hydrater($data);
        }
    }


    /**
     * @return string
     */
    public function getStat1()
    {
        return $this->stat1;
    }

    /**
     * @param string $stat1
     */
    public function setStat1($stat1)
    {
        $this->stat1 = $stat1;
    }

    /**
     * @return bool
     */
    public function getAutorisationSession()
    {
        return $this->autorisationSession;
    }

    /**
     * @param bool $autorisationSession
     */
    public function setAutorisationSession($autorisationSession)
    {
        $this->autorisationSession = $autorisationSession;
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
        self::$messageErreur = $messageErreur;
    }

    /**
     * @return string
     */
    public static function getMessageSucces()
    {
        return self::$messageSucces;
    }

    /**
     * @param string $messageErreur
     */
    public static function setMessageSucces($messageSucces)
    {
        self::$messageSucces = $messageSucces;
    }
}