<?php


namespace App\Manager;

use PDO;
use App\Entity\Competence;

class CompetenceManager
{

    
    private $pdo;
    
    private $pdostat;
    
    public function __construct()
    {
    
        $this->pdo = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');
    
    }
    
    
    public function read($id)
    {
        $this->pdostat = $this->pdo->prepare('SELECT * FROM competence WHERE id = :id');
        
        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdostat->execute();
        
        if($executeIsOk){
        
            $competence = $this->pdostat->fetchObject('App\Entity\Competence');
            
            if($competence === false){
            
                return null;
            }else{
            
                return $competence;
            
            }
        }else{
        
            return false;
        
        }  
    
    }
    
    
    public function readall()
    {
    
        $this->pdostat = $this->pdo->query('SELECT * FROM competence ORDER BY id');
    
        $competences = [];
    
        while($competence = $this->pdostat->fetchObject('App\Entity\Competence')){
    
            $competences[] = $competence;
    
        }
    
        return $competences;
    
    
    }
    
    public function delete(Competence $competence)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM competence WHERE id = :id LIMIT 1');
        $this->pdostat->bindValue(':id', $competence->getId(), PDO::PARAM_INT);
    
        return $this->pdostat->execute();
    
    }
    
    
    private function create(Competence $competence)
    {
    
        $this->pdostat = $this->pdo->prepare('INSERT INTO competence VALUES (DEFAULT, :libelle)');
    
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':libelle', $competence->getLibelle(), PDO::PARAM_INT);


        $executeIsOk = $this->pdostat->execute();
    
        if(!$executeIsOk) {
    
            return false;
    
        }else{
    
            $id = $this->pdo->lastInsertId();
            $competence = $this->read($id);
    
            return true;
    
        }
    
    }
    
    private function update(Competence $competence)
    {
    
        $this->pdostat = $this->pdo->prepare('UPDATE competence set libelle = :libelle WHERE id=:id LIMIT 1');
        
        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':libelle', $competence->getLibelle(), PDO::PARAM_STR);
        $this->pdostat->bindValue(':id', $competence->getId(), PDO::PARAM_INT);



        return $this->pdostat->execute();
    
    }
    
    public function save(Competence &$competence)
    {
    
        if(is_null($competence->getId())){
            return $this->create($competence);
        }else{
            return $this->update($competence);
        }
    
    }
    
}