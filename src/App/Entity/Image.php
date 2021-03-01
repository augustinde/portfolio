<?php


namespace App\Entity;


class Image
{

    /**
    * @var int $id  id de l'image
    */
    private $id;

    /**
    * @var string $cheminImage  chemin de l'image
    */
    private $cheminImage;

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
    public function getCheminImage()
    {
        return $this->cheminImage;
    }

    /**
     * @param string $cheminImage
     */
    public function setCheminImage($cheminImage)
    {
        $this->cheminImage = $cheminImage;
    }

    public function __toString()
    {
        return "Id de l'image :" . $this->id . "<br> Chemin de l'image : " . $this->cheminImage;
    }

}
