<?php


namespace App\Entity;


class ProjetHasTechnologie
{

    /**
     * @var int $idProjetHasTechnologie  id de la ligne
     */
    private $idProjetHasTechnologie;

    /**
    * @var int $idProjet  id du projet
    */
    private $idProjet;
    
    /**
    * @var int $idTechnologie  id de la technologie relié au projet
    */
    private $idTechnologie;

    /**
     * @return int
     */
    public function getIdProjetHasTechnologie()
    {
        return $this->idProjetHasTechnologie;
    }

    /**
     * @return int
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }

    /**
     * @return int
     */
    public function getIdTechnologie()
    {
        return $this->idTechnologie;
    }

    /**
     * @param int $idTechnologie
     */
    public function setIdTechnologie($idTechnologie)
    {
        $this->idTechnologie = $idTechnologie;
    }

    /**
     * @param int $idProjet
     */
    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;
    }


}