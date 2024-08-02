<?php 
// --------------------------------
// Classe des planètes
// --------------------------------

namespace App\Model;

use Exception;

class Planete {

    private int    $id;
    private string $imgUrl;
    private string $nom;
    private string $categorie;
    private int    $diametre;
    private float  $gravite;
    private string $lienNasa;


    // HYDRATE PLANETE
    public function hydrate(
        string $imgUrl,
        string $nom,
        string $categorie,
        int    $diametre,
        float  $gravite,
        string $lienNasa
    ){
        $this->setImgUrl($imgUrl);
        $this->setNom($nom);
        $this->setCategorie($categorie);
        $this->setDiametre($diametre);
        $this->setGravite($gravite);
        $this->setLienNasa($lienNasa);
    }
    // getId
    public function getId() : int {
        return $this->id;
    }
    // SETTER::GETTER ------->IMG URL
    public function getImgUrl() : string {
        return $this->imgUrl;
    }
    public function setImgUrl(string $imgUrl) : void {
        if($this->validateImgUrl($imgUrl)){
            $this->imgUrl = $imgUrl;
        }else{
            throw new Exception('L\'URL de l\'image doit être une URL valide');
        }
    }
    public function validateImgUrl(string $imgUrl) : bool {
        return filter_var($imgUrl, FILTER_VALIDATE_URL) !== false;
    }
    // SETTER::GETTER ------->NOM
    public function getNom() : string {
        return $this->nom;
    }
    public function setNom(string $nom) : void {
        if($this->validateNom($nom)){
            $this->nom = $nom;
        }else{
            throw new Exception('Le nom ne doit pas dépasser les 7 caractères');
        }
    }
    public function validateNom(string $nom) : bool {
        return strlen($nom) <= 7;
    }
    // SETTER::GETTER ------->CATEGORIE
    public function getCategorie() : string {
        return $this->categorie;
    }
    public function setCategorie(string $categorie) : void {
        if($this->validateCategorie($categorie)){
            $this->categorie = $categorie;
        }else{
            throw new Exception('La catégorie doit être soit tellurique soit gazeuse');
        }
    }
    public function validateCategorie(string $categorie) : bool {
        if ($categorie == "gazeuse" || $categorie == "tellurique"){
            return true;
        }else{
            return false;
        }
    }
    // SETTER::GETTER ------->DIAMETRE
    public function getDiametre() : int {
        return $this->diametre;
    }
    public function setDiametre(int $diametre) : void {
        if($this->validateDiametre($diametre)){
            $this->diametre = $diametre;
        }else{
            throw new Exception('Le diamètre doit être un nombre entier et ne peut pas être négatif');
        }
    }
    public function validateDiametre(int $diametre) : bool {
        return is_numeric($diametre) && $diametre > 0;
    }
    // SETTER::GETTER ------->GRAVITE
    public function getGravite() : float {
        return $this->gravite;
    }
    public function setGravite(float $gravite) : void {
        if($this->validateGravite($gravite)){
            $this->gravite = $gravite;
        }else{
            throw new Exception('La gravité doit être un nombre');
        }
    }
    public function validateGravite(float $gravite) : bool {
        return is_numeric($gravite);
    }
    // SETTER::GETTER ------->URL NASA
    public function getLienNasa() : string {
        return $this->lienNasa;
    }
    public function setLienNasa(string $lienNasa) : void {
        if($this->validateLienNasa($lienNasa)){
            $this->lienNasa = $lienNasa;
        }else{
            throw new Exception('Le lien NASA doit être une URL valide');
        }
    }
    public function validateLienNasa(string $lienNasa) : bool {
        return filter_var($lienNasa, FILTER_VALIDATE_URL) !== false;
    }
}
