<?php
class ReparationTable
{

    // 1/ Déclaration des propriétés
    private $idTypeRep = "";
    private $intitule = "";

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
        }
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
        $this->idTypeRep = $idTypeRep;
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
