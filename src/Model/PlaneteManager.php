<?php
// --------------------------------
// Manager des planètes
// --------------------------------
namespace App\Model;

use App\Database;
use Exception;
use PDO;

class PlaneteManager {

    // method getAll
    public static function getAll() : array {
        $db = Database::getConnection();
        $stmtGetAll = $db->query('SELECT * FROM `planete`');
        return $result = $stmtGetAll->fetchAll(PDO::FETCH_CLASS, Planete::class);
        return $result;
    }

    // method getOne 
    public static function getOne(int $planeteId) : Planete {
        $db = Database::getConnection();
        $stmtGetOne = $db->prepare('SELECT * FROM planete WHERE id = ?'); 
        $stmtGetOne->execute([$planeteId]);

        $result = $stmtGetOne->fetchObject(Planete::class);
        if ($result == false) {
            throw new Exception ("La planète n'existe pas");
        } 
        return $result;
    }
    
    // méthode recherche par nom
    public static function getAllBy(string $search) : array {
        $db = Database::getConnection();
        $stmt = $db->prepare('SELECT * FROM planete WHERE nom LIKE ?');
        $search = "%$search%";
        $stmt->execute([$search]);
        $searchResult = $stmt->fetchAll(PDO::FETCH_CLASS, Planete::class);

        return $searchResult;
    }

    // méthode pour créer une donnée 
    public static function createOne(Planete $planete) : int {
        $db = Database::getConnection();

        $stmtCreateOne = $db->prepare('INSERT INTO `planete`(`imgUrl`, `nom`, `categorie`, `diametre`, `gravite`, `lienNasa`) VALUES (?,?,?,?,?,?)');
        $stmtCreateOne->execute([
            $planete->getImgUrl(), 
            $planete->getNom(), 
            $planete->getCategorie(), 
            $planete->getDiametre(), 
            $planete->getGravite(), 
            $planete->getLienNasa()
        ]);
        return $db->lastInsertId();
    }

    // méthode pour mettre à jour une donnée 
    public static function update(Planete $planete) : void {
        $db = Database::getConnection();

        $stmtUpdate = $db->prepare('UPDATE `planete` SET `imgUrl`= ?, `nom`= ?, `categorie`= ?, `diametre`= ?, `gravite`= ?, `lienNasa`= ? WHERE id = ?');
        $stmtUpdate->execute([
            $planete->getImgUrl(), 
            $planete->getNom(), 
            $planete->getCategorie(), 
            $planete->getDiametre(), 
            $planete->getGravite(), 
            $planete->getLienNasa(), 
            $planete->getId()
        ]);
    }

    // méthode pour supprimer une donnée 
    public static function delete(Planete $planete) : void {
        $db = Database::getConnection();

        $stmtDelete = $db->prepare('DELETE FROM planete WHERE id = ?');
        $stmtDelete->execute([$planete->getId()]);
    }

    // getaAll trié par catégorie (gazeuse ou tellurique)
    public static function getByCategorie(string $categorie) : array {
        $db = Database::getConnection();
    
        $stmt = $db->prepare('SELECT * FROM planete WHERE categorie = ?');
        $stmt->execute([$categorie]);
        return $stmt->fetchAll(PDO::FETCH_CLASS, Planete::class);
    }

}
