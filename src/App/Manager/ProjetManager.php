<?php

namespace App\Manager;

use PDO;
use App\Entity\Projet;

class ProjetManager
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

    //Retourne un projet si il y a un projet, null si pas de projet trouver, false si erreur lors de l'execution

    public function read($id)
    {

        $this->pdostat = $this->pdo->prepare('SELECT * FROM projet WHERE id = :id');

        $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);

        $executeIsOk = $this->pdostat->execute();

        if($executeIsOk){

            $projet = $this->pdostat->fetchObject('App\Entity\Projet');



            $this->pdostat = $this->pdo->prepare('SELECT technologie.id, technologie.libelle FROM technologie INNER JOIN projet_has_technologie ON technologie.id = projet_has_technologie.idTechnologie WHERE projet_has_technologie.idProjet = :id');
            $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);


            $executeIsOk = $this->pdostat->execute();

            if($executeIsOk){
                $arrayTechno = $this->pdostat->fetchAll(PDO::FETCH_ASSOC);
                $projet->setArrayTechno($arrayTechno);

            }


            $this->pdostat = $this->pdo->prepare('SELECT competence.id, competence.libelle FROM competence INNER JOIN projet_has_competence ON competence.id = projet_has_competence.idCompetence WHERE projet_has_competence.idProjet = :id');
            $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);

            $executeIsOk1 = $this->pdostat->execute();

            $arrayCompetence = $this->pdostat->fetchAll(PDO::FETCH_ASSOC);
            $projet->setArrayCompetence($arrayCompetence);



            $this->pdostat = $this->pdo->prepare('SELECT image.id, image.cheminImage FROM image INNER JOIN projet_has_image ON image.id = projet_has_image.idImage WHERE projet_has_image.idProjet = :id');
            $this->pdostat->bindValue(':id', $id, PDO::PARAM_INT);


            $executeIsOk2 = $this->pdostat->execute();

            $arrayImage = $this->pdostat->fetchAll(PDO::FETCH_ASSOC);
            $projet->setArrayImage($arrayImage);


            if($projet === false){

                return null;

            }else{

                return $projet;

            }

        }else{
            return false;
        }

    }


    public function readWithNom($nom)
    {

        $this->pdostat = $this->pdo->prepare('SELECT * FROM projet WHERE nom = :nom');

        $this->pdostat->bindValue(':nom', $nom, PDO::PARAM_STR);

        $executeIsOk = $this->pdostat->execute();

        if($executeIsOk){

            $projet = $this->pdostat->fetch();

            if($projet === false){

                return null;

            }else{

                return $projet;

            }

        }else{
            return false;
        }

    }


    //Retourne les projets si il y a des projets, null si pas de projet trouver, false si erreur lors de l'execution


    /*
     * Modification de readall de manière à récupérer chaque projet mais également chaque compétences,
     * technologies et images du projet et les regrouper par projet (GROUP BY??)
     */

    public function readall()
    {

        $this->pdostat = $this->pdo->query('SELECT * FROM projet ORDER BY id');

        $projets = [];

        while($projet = $this->pdostat->fetchObject('App\Entity\Projet')){


            $this->pdostat1 = $this->pdo->prepare('SELECT technologie.id, technologie.libelle FROM technologie INNER JOIN projet_has_technologie ON technologie.id = projet_has_technologie.idTechnologie WHERE projet_has_technologie.idProjet = :id');
            $this->pdostat1->bindValue(':id', $projet->getId(), PDO::PARAM_INT);

            $executeIsOk = $this->pdostat1->execute();


            if($executeIsOk){
                $arrayTechnologie = $this->pdostat1->fetchAll(PDO::FETCH_ASSOC);
                $projet->setArrayTechno($arrayTechnologie);

            }



            $this->pdostat1 = $this->pdo->prepare('SELECT competence.id, competence.libelle FROM competence INNER JOIN projet_has_competence ON competence.id = projet_has_competence.idCompetence WHERE projet_has_competence.idProjet = :id');
            $this->pdostat1->bindValue(':id', $projet->getId(), PDO::PARAM_INT);

            $executeIsOk1 = $this->pdostat1->execute();

            if($executeIsOk1) {
                $arrayCompetence = $this->pdostat1->fetchAll(PDO::FETCH_ASSOC);
                $projet->setArrayCompetence($arrayCompetence);
            }




            $this->pdostat1 = $this->pdo->prepare('SELECT image.id, image.cheminImage FROM image INNER JOIN projet_has_image ON image.id = projet_has_image.idImage WHERE projet_has_image.idProjet = :id');
            $this->pdostat1->bindValue(':id', $projet->getId(), PDO::PARAM_INT);


            $executeIsOk2 = $this->pdostat1->execute();

            if($executeIsOk2) {
                $arrayImage = $this->pdostat1->fetchAll(PDO::FETCH_ASSOC);
                $projet->setArrayImage($arrayImage);
            }


            $projets[] = $projet;

        }

        return $projets;


    }


    public function delete(Projet $projet)
    {
        $this->pdostat = $this->pdo->prepare('DELETE FROM projet WHERE id = :id LIMIT 1');
        $this->pdostat->bindValue(':id', $projet->getId(), PDO::PARAM_INT);

        return $this->pdostat->execute();

    }

    private function create(Projet $projet)
    {

        $this->pdostat = $this->pdo->prepare('INSERT INTO projet VALUES (DEFAULT, :nom, :description, :urlProjet, :urlDocFournit)');

        $this->pdostat->bindValue(':nom', $projet->getNom(),PDO::PARAM_STR);
        $this->pdostat->bindValue(':urlDocFournit', $projet->geturlDocFournit(),PDO::PARAM_STR);
        $this->pdostat->bindValue(':description', $projet->getDescription(),PDO::PARAM_STR);
        $this->pdostat->bindValue(':urlProjet', $projet->getUrlProjet(),PDO::PARAM_STR);
        $executeCreateIsOk = $this->pdostat->execute();

        $this->lastId = $this->pdo->lastInsertId();

        foreach ($projet->getArrayImage() as $itemImage) {
            $this->pdostat = $this->pdo->prepare('INSERT INTO projet_has_image VALUES(DEFAULT, :idProjet, :idImage)');

            $this->pdostat->bindValue(":idProjet", $this->lastId, PDO::PARAM_INT);
            $this->pdostat->bindValue(":idImage", $itemImage, PDO::PARAM_INT);
            $executeIsOkImage = $this->pdostat->execute();

        }

        foreach ($projet->getArrayCompetence() as $itemCompetence) {
            $this->pdostat = $this->pdo->prepare('INSERT INTO projet_has_competence VALUES(DEFAULT, :idProjet, :idCompetence)');

            $this->pdostat->bindValue(":idProjet", $this->lastId, PDO::PARAM_INT);
            $this->pdostat->bindValue(":idCompetence", $itemCompetence, PDO::PARAM_INT);
            $executeIsOkCompetence = $this->pdostat->execute();

        }

        foreach ($projet->getArrayTechno() as $itemTechno) {
            $this->pdostat = $this->pdo->prepare('INSERT INTO projet_has_technologie VALUES(DEFAULT, :idProjet, :idTechnologie)');

            $this->pdostat->bindValue(":idProjet", $this->lastId, PDO::PARAM_INT);
            $this->pdostat->bindValue(":idTechnologie", $itemTechno, PDO::PARAM_INT);
            $executeIsOkTechno = $this->pdostat->execute();

        }

        if(!$executeCreateIsOk) {

            return false;

        }else{

            $id = $this->pdo->lastInsertId();

            return true;

        }

    }

    private function update(Projet $projet)
    {

        $this->pdostat = $this->pdo->prepare('UPDATE projet set nom=:nom, description=:description, urlProjet=:urlProjet, urlDocFournit=:urlDocFournit WHERE id=:id LIMIT 1');

        $this->pdostat->bindValue(':nom', $projet->getNom(), PDO::PARAM_STR);
        $this->pdostat->bindValue(':urlDocFournit', $projet->geturlDocFournit(),PDO::PARAM_STR);
        $this->pdostat->bindValue(':description', $projet->getDescription(), PDO::PARAM_STR);
        $this->pdostat->bindValue(':urlProjet', $projet->getUrlProjet(), PDO::PARAM_STR);
        $this->pdostat->bindValue(':id', $projet->getId(), PDO::PARAM_INT);

        return $this->pdostat->execute();

    }




    public function save(Projet &$projet)
    {

        if(is_null($projet->getId())){
            return $this->create($projet);
        }else{
            return $this->update($projet);
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





