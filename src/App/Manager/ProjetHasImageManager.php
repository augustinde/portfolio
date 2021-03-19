<?php


namespace App\Manager;

use App\Entity\Projet;
use PDO;
use App\Entity\ProjetHasImage;

class ProjetHasImageManager
{
    
    private $pdo;
    
    private $pdostat;
    
    public function __construct()
    {
    
        $this->pdo = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
    
    }
    

    public function read($id)
    {
        $this->pdostat = $this->pdo->prepare('SELECT * FROM projet_has_image WHERE idProjetHasImage = :id');
        
        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdostat->execute();
        
        if($executeIsOk){
        
            $projetHasImage = $this->pdostat->fetchObject('App\Entity\ProjetHasImage');
            
            if($projetHasImage === false){
            
                return null;
            }else{
            
                return $projetHasImage;
            
            }
        }else{
        
            return false;
        
        }  
    
    }

    public function readallProjet($id)
    {

        $this->pdostat = $this->pdo->query('SELECT * FROM projet_has_image WHERE idProjet = :id');

        $projetHasImages = [];

        while($projetHasImage = $this->pdostat->fetchObject('App\Entity\ProjetHasImage')){

            $projetHasImages[] = $projetHasImage;

        }

        return $projetHasImages;


    }

    
    
    public function readall()
    {
    
        $this->pdostat = $this->pdo->query('SELECT * FROM projet_has_image ORDER BY idProjet');
    
        $projetHasImages = [];
    
        while($projetHasImage = $this->pdostat->fetchObject('App\Entity\ProjetHasImage')){
    
            $projetHasImages[] = $projetHasImage;
    
        }
    
        return $projetHasImages;
    
    
    }


    public function delete(Projet $projet)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM projet_has_image WHERE idProjet = :id');
        $this->pdostat->bindValue(':id', $projet->getId(), PDO::PARAM_INT);
    
        return $this->pdostat->execute();
    
    }
    
    
    private function create(ProjetHasImage $projetHasImage)
    {
    
        $this->pdostat = $this->pdo->prepare('INSERT INTO projet_has_image VALUES (DEFAULT, :idProjet, :idImage)');
    
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':idProjet', $projetHasImage->getIdProjet(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idImage', $projetHasImage->getIdImage(), PDO::PARAM_INT);


        $executeIsOk = $this->pdostat->execute();
    
        if(!$executeIsOk) {
    
            return false;
    
        }else{
    
            $id = $this->pdo->lastInsertId();
            $projetHasImage = $this->read($id);
    
            return true;
    
        }
    
    }
    
    private function update(ProjetHasImage $projetHasImage)
    {
    
        $this->pdostat = $this->pdo->prepare('UPDATE projet_has_image set idProjet=:idProjet, idImage=:idImage WHERE idProjetHasImage=:id LIMIT 1');
        
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':id', $projetHasImage->getIdProjetHasImage(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idProjet', $projetHasImage->getIdProjet(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idImage', $projetHasImage->getIdImage(), PDO::PARAM_INT);
        
    
        return $this->pdostat->execute();
    
    }
    
    public function save(ProjetHasImage &$projetHasImage)
    {
    
        if(is_null($projetHasImage->getIdProjetHasImage())){
            return $this->create($projetHasImage);
        }else{
            return $this->update($projetHasImage);
        }
    
    }

}