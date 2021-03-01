<?php


namespace App\Manager;

use PDO;
use App\Entity\Image;

class ImageManager
{
    
    private $pdo;
    
    private $pdostat;
    
    /**
    * @var int $lastId  dernier id insérer
    */
    private $lastId;
    
    public function __construct()
    {

        $this->pdo = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
    }
    


    public function read($id)
    {
        $this->pdostat = $this->pdo->prepare('SELECT * FROM image WHERE id = :id');
        
        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdostat->execute();
        
        if($executeIsOk){
        
            $image = $this->pdostat->fetchObject('App\Entity\Image');
            
            if($image === false){
            
                return null;
            }else{
            
                return $image;
            
            }
        }else{
        
            return false;
        
        }  
    
    }
    
    
    public function readall()
    {
    
        $this->pdostat = $this->pdo->query('SELECT * FROM image ORDER BY id');
    
        $images = [];
    
        while($image = $this->pdostat->fetchObject('App\Entity\Image')){
    
            $images[] = $image;
    
        }
    
        return $images;
    
    
    }
    
    public function delete(Image $image)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM image WHERE id = :id LIMIT 1');
        $this->pdostat->bindValue(':id', $image->getId(), PDO::PARAM_INT);
    
        return $this->pdostat->execute();
    
    }
    
    
    public function create(Image $image)
    {
    
        $this->pdostat = $this->pdo->prepare('INSERT INTO image VALUES (DEFAULT, :cheminImage)');
    
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':cheminImage', $image->getCheminImage(), PDO::PARAM_STR);

        $executeIsOk = $this->pdostat->execute();

        $this->lastId = $this->pdo->lastInsertId();

        if(!$executeIsOk) {
    
            return false;
    
        }else{
    
            $id = $this->pdo->lastInsertId();
            $image = $this->read($id);
    
            return true;
    
        }
    
    }
    
    private function update(Image $image)
    {
    
        $this->pdostat = $this->pdo->prepare('UPDATE image set cheminImage=:cheminImage WHERE id=:id LIMIT 1');
        
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':cheminImage', $image->getCheminImage(), PDO::PARAM_STR);


        return $this->pdostat->execute();
    
    }
    
    public function save(Image &$image)
    {
    
        if(is_null($image->getId())){
            return $this->create($image);
        }else{
            return $this->update($image);
        }
    
    }

    /**
     * @return int
     */
    public function getLastId()
    {
        return $this->lastId;
    }

}