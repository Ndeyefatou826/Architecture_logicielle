<?php
class Connexion {
    private static $instance = null; // Instance unique de la classe Connexion
    private $connexion;

    // Constructeur de la classe Connexion
    private function __construct() {
        $servername = 'localhost';
        $username = 'mglsi_user';
        $password = 'passer';
        $dbname = 'mglsi_news';
        $dbport = 3308;

        // DSN (Data Source Name) pour la connexion PDO
        $dsn = "mysql:host=$servername;port=$dbport;dbname=$dbname;charset=utf8";

        try {
            // Création de la connexion PDO
            $this->connexion = new PDO($dsn, $username, $password);
            // Configuration des options PDO
            $this->connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            // En cas d'erreur de connexion, afficher le message d'erreur
            die("La connexion a échoué : " . $e->getMessage());
        }
    }

    // Méthode pour récupérer l'instance unique de la classe Connexion
    public static function getInstance() {
        // Si l'instance n'existe pas, on la crée
        if (self::$instance == null) {
            self::$instance = new Connexion();
        }
        return self::$instance;
    }

    // Méthode pour récupérer la connexion
    public function getConnexion() {
        return $this->connexion;
    }
}
?>
