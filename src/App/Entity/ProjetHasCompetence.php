<?php


namespace App\Entity;


class ProjetHasCompetence
{

    /**
     * @var int $idProjetHasCompetence  id de la ligne
     */
    private $idProjetHasCompetence;

    /**
    * @var int $idProjet  id du projet
    */
    private $idProjet;

    /**
    * @var int $idCompetence  id de la competence
    */
    private $idCompetence;

    /**
     * @return int
     */
    public function getIdProjet()
    {
        return $this->idProjet;
    }

    /**
     * @param int $idProjet
     */
    public function setIdProjet($idProjet)
    {
        $this->idProjet = $idProjet;
    }

    /**
     * @return int
     */
    public function getIdCompetence()
    {
        return $this->idCompetence;
    }

    /**
     * @param int $idCompetence
     */
    public function setIdCompetence($idCompetence)
    {
        $this->idCompetence = $idCompetence;
    }

    /**
     * @return int
     */
    public function getIdProjetHasCompetence()
    {
        return $this->idProjetHasCompetence;
    }


}