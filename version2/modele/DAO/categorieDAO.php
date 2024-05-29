<?php
require_once '../modele/DAO/connexion.php';
require_once '../modele/domaine/categorie.php';

class CategorieDAO {
    private $connexion;

    public function __construct() {
        $this->connexion = Connexion::getInstance()->getConnexion();
    }

    // Méthode pour récupérer toutes les catégories
    public function getAllCategories() {
        // Préparation de la requête
        $sql = "SELECT categorie.id, categorie.libelle FROM categorie";
        $stmt = $this->connexion->prepare($sql);
        $stmt->execute();
        
        // Récupération des résultats
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $categories = [];

        // On récupère toutes les catégories et pour chaque catégorie, on crée un objet Categorie et on l'ajoute à la liste
        foreach ($result as $row) {
            $categorie = new Categorie($row["id"], $row["libelle"]);
            $categories[] = $categorie;
        }

        // On retourne la liste des catégories
        return $categories;
    }

    // Méthode pour récupérer une catégorie par son id
    public function getCategorieById($id) {
        // Préparation de la requête
        $sql = $this->connexion->prepare("SELECT categorie.id, categorie.libelle FROM categorie WHERE id = :id");
        
        // Liaison de l'id à la requête SQL
        $sql->bindParam(':id', $id, PDO::PARAM_INT);

        // Exécution de la requête
        $sql->execute();

        // Récupération du résultat
        $result = $sql->fetch(PDO::FETCH_ASSOC);

        // Création de l'objet Categorie
        if ($result) {
            return new Categorie($result["id"], $result["libelle"]);
        } else {
            return null; // Retourner null si aucune catégorie n'est trouvée
        }
    }
}
?>
