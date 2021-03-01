<?php


namespace App\Entity;


class ProjetHasImage
{
    
    /**
    * @var int $idProjetHasImage  id de la ligne
    */
    private $idProjetHasImage;
    

    /**
    * @var int $idProjet  id du projet
    */
    private $idProjet;
    
    /**
    * @var int $idImage  id de l'image
    */
    private $idImage;

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
    public function getIdImage()
    {
        return $this->idImage;
    }

    /**
     * @param int $idImage
     */
    public function setIdImage($idImage)
    {
        $this->idImage = $idImage;
    }

    /**
     * @return int
     */
    public function getIdProjetHasImage()
    {
        return $this->idProjetHasImage;
    }



}