<?php


namespace App\Entity;


class Technologie
{

    /**
    * @var int $id  id de la technologie
    */
    private $id;
    
    /**
    * @var string $libelle  nom de la technologie
    */
    private $libelle;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param string $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }


}
