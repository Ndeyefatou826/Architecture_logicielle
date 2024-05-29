<?php
require_once '../modele/DAO/connexion.php';
require_once '../modele/domaine/article.php';

class ArticleDAO {
    private $connexion;

    public function __construct() {
        $this->connexion = Connexion::getInstance()->getConnexion();
    }

    // Méthode pour récupérer tous les articles
    public function getAllArticles() {
        $sql = "SELECT article.id, article.titre, article.contenu, categorie.id AS categorie_id, categorie.libelle AS categorie_libelle
                FROM article
                INNER JOIN categorie ON article.categorie = categorie.id";
        $stmt = $this->connexion->query($sql);
        $articles = [];

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie = new Categorie($row["categorie_id"], $row["categorie_libelle"]);
                $article = new Article($row["id"], $row["titre"], $row["contenu"], $categorie);
                $articles[] = $article;
            }
        }

        return $articles;
    }

    // Méthode pour récupérer un article par son id
    public function getArticleById($id) {
        $sql = "SELECT article.id, article.titre, article.contenu, categorie.id AS categorie_id, categorie.libelle AS categorie_libelle
                FROM article
                INNER JOIN categorie ON article.categorie = categorie.id
                WHERE article.id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categorie = new Categorie($row["categorie_id"], $row["categorie_libelle"]);
            return new Article($row["id"], $row["titre"], $row["contenu"], $categorie);
        }

        return null;
    }

    // Méthode pour récupérer les articles par id de catégorie
    public function getArticlesByCategorieId($id) {
        $sql = "SELECT article.id, article.titre, article.contenu, categorie.id AS categorie_id, categorie.libelle AS categorie_libelle
                FROM article
                INNER JOIN categorie ON article.categorie = categorie.id
                WHERE categorie.id = :id";
        $stmt = $this->connexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $articles = [];

        if ($stmt->rowCount() > 0) {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                $categorie = new Categorie($row["categorie_id"], $row["categorie_libelle"]);
                $article = new Article($row["id"], $row["titre"], $row["contenu"], $categorie);
                $articles[] = $article;
            }
        }

        return $articles;
    }
}
?>
