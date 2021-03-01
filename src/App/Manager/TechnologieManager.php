<?php


namespace App\Manager;

use PDO;
use App\Entity\Technologie;

class TechnologieManager
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
        $this->pdostat = $this->pdo->prepare('SELECT * FROM technologie WHERE id = :id');
        
        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdostat->execute();
        
        if($executeIsOk){
        
            $technologie = $this->pdostat->fetchObject('App\Entity\Technologie');
            
            if($technologie === false){
            
                return null;
            }else{
            
                return $technologie;
            
            }
        }else{
        
            return false;
        
        }  
    
    }
    
    
    public function readall()
    {
    
        $this->pdostat = $this->pdo->query('SELECT * FROM technologie ORDER BY id');
    
        $technologies = [];
    
        while($technologie = $this->pdostat->fetchObject('App\Entity\Technologie')){
    
            $technologies[] = $technologie;
    
        }
    
        return $technologies;
    
    
    }
    
    public function delete(Technologie $technologie)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM technologie WHERE id = :id LIMIT 1');
        $this->pdostat->bindValue(':id', $technologie->getId(), PDO::PARAM_INT);
    
        return $this->pdostat->execute();
    
    }
    
    
    private function create(Technologie $technologie)
    {
    
        $this->pdostat = $this->pdo->prepare('INSERT INTO technologie VALUES (DEFAULT, :libelle)');
    
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':libelle', $technologie->getLibelle(), PDO::PARAM_STR);


        $executeIsOk = $this->pdostat->execute();
    
        if(!$executeIsOk) {
    
            return false;
    
        }else{
    
            $id = $this->pdo->lastInsertId();
            $technologie = $this->read($id);
    
            return true;
    
        }
    
    }
    
    private function update(Technologie $technologie)
    {
    
        $this->pdostat = $this->pdo->prepare('UPDATE technologie set libelle=:libelle WHERE id=:id LIMIT 1');
        
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':libelle', $technologie->getLibelle(), PDO::PARAM_STR);
        $this->pdostat->bindValue(':id', $technologie->getId(), PDO::PARAM_INT);


        return $this->pdostat->execute();
    
    }
    
    public function save(Technologie &$technologie)
    {
    
        if(is_null($technologie->getId())){
            return $this->create($technologie);
        }else{
            return $this->update($technologie);
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