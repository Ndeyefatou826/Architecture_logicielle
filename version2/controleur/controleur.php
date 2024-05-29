<?php
require_once '../modele/DAO/articleDAO.php';
require_once '../modele/DAO/categorieDAO.php';
require_once '../modele/DAO/connexion.php';

class Controleur {

    // Constructeur
    public function __construct() {
        
    }

    // Affiche la page d'accueil
    function showAccueil() {
        $articleDAO = new ArticleDAO();
        $categorieDAO = new CategorieDAO();
    
        $categories = $categorieDAO->getAllCategories();
        $articles = $articleDAO->getAllArticles();
    
        require 'entete.php';
        require 'accueil.php';
    }
    
    // Affiche un article spécifique
    function showArticle($id) {
        $articleDAO = new ArticleDAO();
        $categorieDAO = new CategorieDAO();
    
        $categories = $categorieDAO->getAllCategories();
        $article = $articleDAO->getArticlesById($id); 
    
        require 'entete.php';
        require 'accueil.php';
    }

    // Affiche une catégorie spécifique
    function showCategorie($id) {
        $articleDAO = new ArticleDAO();
        $categorieDAO = new CategorieDAO();
    
        $categories = $categorieDAO->getAllCategories();
        $articles = $articleDAO->getArticlesByCategorieId($id);
    
        require 'entete.php';
        require 'accueil.php';
    }
}
?>
