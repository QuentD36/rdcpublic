<?php

class IdentificationTable{

    private $idIdentificationFiche = '';
    private $intitule = '';

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
        }
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
        $this->idIdentificationFiche = $idIdentificationFiche;
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
        $this->intitule = $intitule;
    }


}