<?php


namespace App\Manager;

use PDO;
use App\Entity\ProjetHasTechnologie;

class ProjetHasTechnologieManager
{
    
    private $pdo;
    
    private $pdostat;
    
    public function __construct()
    {
    
        $this->pdo = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
    
    }
    
    
    public function read($id)
    {
        $this->pdostat = $this->pdo->prepare('SELECT * FROM projet_has_technologie WHERE idProjet = :id');
        
        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdostat->execute();
        
        if($executeIsOk){
        
            $projetHasTechnologie = $this->pdostat->fetchObject('App\Entity\ProjetHasTechnologie');
            
            if($projetHasTechnologie === false){
            
                return null;
            }else{
            
                return $projetHasTechnologie;
            
            }
        }else{
        
            return false;
        
        }  
    
    }
    
    
    public function readall()
    {
    
        $this->pdostat = $this->pdo->query('SELECT * FROM projet_has_technologie ORDER BY idProjet');
    
        $projetHasTechnologies = [];
    
        while($projetHasTechnologie = $this->pdostat->fetchObject('App\Entity\ProjetHasTechnologie')){
    
            $projetHasTechnologies[] = $projetHasTechnologie;
    
        }
    
        return $projetHasTechnologies;
    
    
    }
    
    public function delete(ProjetHasTechnologie $projetHasTechnologie)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM projet_has_technologie WHERE idProjetHasTechnologie = :id LIMIT 1');
        $this->pdostat->bindValue(':id', $projetHasTechnologie->getId(), PDO::PARAM_INT);
    
        return $this->pdostat->execute();
    
    }
    
    
    public function create(ProjetHasTechnologie $projetHasTechnologie)
    {
    
        $this->pdostat = $this->pdo->prepare('INSERT INTO projet_has_technologie VALUES (DEFAULT, :idProjet, :idTechnologie)');
    
        //Ajout des paramètres (Raccourcis : addbv)

        $this->pdostat->bindValue(':idProjet', $projetHasTechnologie->getIdProjet(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idTechnologie', $projetHasTechnologie->getIdTechnologie(), PDO::PARAM_INT);


        $executeIsOk = $this->pdostat->execute();
    
        if(!$executeIsOk) {
    
            return false;
    
        }else{
    
            $id = $this->pdo->lastInsertId();
            $projetHasTechnologie = $this->read($id);
    
            return true;
    
        }
    
    }
    
    private function update(ProjetHasTechnologie $projetHasTechnologie)
    {
    
        $this->pdostat = $this->pdo->prepare('UPDATE projet_has_technologie set idProjet=:idProjet, idTechnologie=:idTechnologie WHERE idProjetHasTechnologie=:idProjetHasTechnologie');
        
        //Ajout des paramètres (Raccourcis : addbv)

        $this->pdostat->bindValue(':idProjetHasTechnologie', $projetHasTechnologie->getIdProjetHasTechnologie(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idProjet', $projetHasTechnologie->getIdProjet(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idTechnologie', $projetHasTechnologie->getIdTechnologie(), PDO::PARAM_INT);
        
    
        return $this->pdostat->execute();
    
    }

    
    public function save(ProjetHasTechnologie &$projetHasTechnologie)
    {
    
        if(is_null($projetHasTechnologie->getIdProjetHasTechnologie())){
            return $this->create($projetHasTechnologie);
        }else{
            return $this->update($projetHasTechnologie);
        }
    
    }

}