<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css"> 
    <title>MGLSI News</title>
</head>
<body>
    <header>
        <h1>ACTUALITES POLYTECHNICIENNES</h1>
        <nav>
            <a href="index.php">Accueil</a>
            <a href="index.php?categorie=Sport">Sport</a>
            <a href="index.php?categorie=Santé">Santé</a>
            <a href="index.php?categorie=Education">Education</a>
            <a href="index.php?categorie=Politique">Politique</a>
        </nav>
    </header>
    <div class="container">
        <h2 class="titre">Les dernières actualités</h2>
        <?php
            $servername = 'localhost';
            $username = 'mglsi_user';
            $password = 'passer';
            $dbname = 'mglsi_news';
            $dbport = 3308;

            $conn = new mysqli($servername, $username, $password, $dbname, $dbport);

            if ($conn->connect_error) {
                die("La connexion a échoué : " . $conn->connect_error);
            }

            // on vérifie si une catégorie est spécifiée dans l'URL
            if (isset($_GET['categorie'])) {
                // Si oui, utiliser la catégorie pour filtrer les articles
                $categorie = $_GET['categorie'];
                $sql = "SELECT article.titre, article.contenu 
                        FROM article
                        INNER JOIN categorie ON article.categorie = categorie.id
                        WHERE categorie.libelle = '$categorie'";
            } else {
                // Sinon, sélectionner tous les articles
                $sql = "SELECT article.titre, article.contenu FROM article";
            }
        
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                // Afficher chaque article
                while($row = $result->fetch_assoc()) {
                    echo "<article>";
                    echo "<h2>" . $row["titre"] . "</h2>";
                    echo "<p>" . $row["contenu"] . "</p>";
                    echo "</article>";
                }
            } else {
                echo "0 résultats";
            }
            
            $conn->close();
        ?>
    </div>
</body>
</html>
