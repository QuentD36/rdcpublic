<?php

class TypeTable {

    private $idTypeFiche = '';
    private $intitule = '';
    private $idIdentificationFiche = '';

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
    public function getIdTypeFiche()
    {
        return $this->idTypeFiche;
    }

    /**
     * @param string $idTypeFiche
     */
    public function setIdTypeFiche($idTypeFiche)
    {
        $this->idTypeFiche = $idTypeFiche;
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


}