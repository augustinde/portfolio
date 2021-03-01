<?php


namespace App\Entity;


class Competence
{

    
    /**
    * @var int $id  id de la compétence
    */
    private $id;
    
    /**
    * @var libelle $libelle  libelle de la compétence
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
     * @return libelle
     */
    public function getLibelle()
    {
        return $this->libelle;
    }

    /**
     * @param libelle $libelle
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;
    }



}