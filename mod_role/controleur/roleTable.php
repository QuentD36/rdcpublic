<?php
class RoleTable
{

    private $idRole = "";
    private $intitule = "";


    public function hydrater(array $row)
    {
        foreach ($row as $key => $valeur) {
            $setter = "set" . ucfirst($key);

            if (method_exists($this, $setter)) {
                $this->$setter($valeur);
            }
        }
    }

    public function __construct($data = null)
    {
        if ($data != null) {
            $this->hydrater($data);
        }
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
        $this->idRole = $idRole;
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
