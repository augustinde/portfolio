<?php

namespace App\Entity;

class Projet{


    /**
    * @var int $id  id du projet
    */
    private $id;
    
    /**
    * @var string $nom  nom du projet
    */
    private $nom;
    
    /**
    * @var string $description  description du projet
    */
    private $description;

    /**
    * @var null|string $urlProjet  url du projet
    */
    private $urlProjet;
    
    /**
    * @var string $urlDocFournit  url du document fournit
    */
    private $urlDocFournit;
    
    /**
    * @var array $arrayTechno Collection de technologies
    */
    private $arrayTechno;
    
    /**
    * @var array $arrayImage  Collection d'images du projet
    */
    private $arrayImage;

    /**
    * @var |array $arrayCompetence  Collection de compétences
    */
    private $arrayCompetence;

    /**
     * @return array
     */
    public function getArrayImage()
    {
        return $this->arrayImage;
    }

    public function getImage()
    {
        return $this->arrayImage[0];
    }

    /**
     * @param array $arrayImage
     */
    public function setArrayImage($arrayImage)
    {
        $this->arrayImage = $arrayImage;
    }

    /**
     * @return mixed
     */
    public function getArrayCompetence()
    {
        return $this->arrayCompetence;
    }

    /**
     * @param mixed $arrayCompetence
     */
    public function setArrayCompetence($arrayCompetence)
    {
        $this->arrayCompetence = $arrayCompetence;
    }

    /**
     * @return array
     */
    public function getArrayTechno()
    {
        return $this->arrayTechno;
    }

    /**
     * @param array $arrayTechno
     */
    public function setArrayTechno($arrayTechno)
    {
        $this->arrayTechno = $arrayTechno;
    }


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
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * @param string $nom
     */
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    /**
     * @return string
     */
    public function getUrlDocFournit()
    {
        return $this->urlDocFournit;
    }

    /**
     * @param string $urlDocFournit
     */
    public function setUrlDocFournit($urlDocFournit)
    {
        $this->urlDocFournit = $urlDocFournit;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }




    /**
     * @return string|null
     */
    public function getUrlProjet()
    {
        return $this->urlProjet;
    }

    /**
     * @param string|null $urlProjet
     */
    public function setUrlProjet($urlProjet)
    {
        $this->urlProjet = $urlProjet;
    }


}