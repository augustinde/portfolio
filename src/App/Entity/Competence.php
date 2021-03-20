<?php


namespace App\Entity;


class Competence
{

    
    /**
    * @var int $id  id de la compétence
    */
    private $id;
    
    /**
    * @var string $libelle  libelle de la compétence
    */
    private $libelle;

    /**
     * @return int
     */
    public function getIdCompetence()
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