<?php


namespace App\Manager;

use App\Entity\Projet;
use PDO;
use App\Entity\ProjetHasCompetence;

class ProjetHasCompetenceManager
{

    private $pdo;

    private $pdostat;

    public function __construct()
    {

        $this->pdo = new PDO('mysql:host=localhost;dbname=portfolio;port=3306','root','');

    }


    public function read($id)
    {
        $this->pdostat = $this->pdo->prepare('SELECT * FROM projet_has_competence WHERE idProjetHasCompetence = :id');

        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);
        $executeIsOk = $this->pdostat->execute();

        if($executeIsOk){

            $projetHasCompetence = $this->pdostat->fetchObject('App\Entity\ProjetHasCompetence');

            if($projetHasCompetence === false){

                return null;
            }else{

                return $projetHasCompetence;

            }
        }else{

            return false;

        }

    }


    public function readall()
    {

        $this->pdostat = $this->pdo->query('SELECT * FROM projet_has_competence ORDER BY idProjet');

        $projetHasCompetences = [];

        while($projetHasCompetence = $this->pdostat->fetchObject('App\Entity\ProjetHasCompetence')){

            $projetHasCompetences[] = $projetHasCompetence;

        }

        return $projetHasCompetences;


    }

    public function delete(Projet $projet)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM projet_has_competence WHERE idProjet = :id');
        $this->pdostat->bindValue(':id', $projet->getId(), PDO::PARAM_INT);

        return $this->pdostat->execute();

    }


    private function create(ProjetHasCompetence $projetHasCompetence)
    {

        $this->pdostat = $this->pdo->prepare('INSERT INTO projet_has_competence VALUES (DEFAULT, :idProjet, :idCompetence)');

        $this->pdostat->bindValue(':idProjet', $projetHasCompetence->getIdProjet(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idCompetence', $projetHasCompetence->getIdCompetence(), PDO::PARAM_INT);


        $executeIsOk = $this->pdostat->execute();

        if(!$executeIsOk) {

            return false;

        }else{

            $id = $this->pdo->lastInsertId();
            $projetHasCompetence = $this->read($id);

            return true;

        }

    }

    private function update(ProjetHasCompetence $projetHasCompetence)
    {

        $this->pdostat = $this->pdo->prepare('UPDATE projet_has_competence set idProjet=:idProjet, idCompetence=:idCompetence WHERE idProjetHasCompetence=:id LIMIT 1');

        //Ajout des paramètres (Raccourcis : addbv)
        $this->pdostat->bindValue(':idProjet', $projetHasCompetence->getIdProjetHasCompetence(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idProjet', $projetHasCompetence->getIdProjet(), PDO::PARAM_INT);
        $this->pdostat->bindValue(':idCompetence', $projetHasCompetence->getIdCompetence(), PDO::PARAM_INT);


        return $this->pdostat->execute();

    }

    public function save(ProjetHasCompetence &$projetHasCompetence)
    {

        if(is_null($projetHasCompetence->getIdProjetHasCompetence())){
            return $this->create($projetHasCompetence);
        }else{
            return $this->update($projetHasCompetence);
        }

    }

}