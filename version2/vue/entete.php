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
            <?php if (isset($categories) && !empty($categories)): ?>
                <?php foreach ($categories as $categorie): ?>
                    <a href="index.php?action=categorie&id=<?php echo $categorie->getId(); ?>"><?php echo $categorie->getLibelle(); ?></a>
                <?php endforeach; ?>
            <?php else: ?>
                <p>Aucune catégorie trouvée.</p>
            <?php endif; ?>
        </nav>
    </header>
</body>
</html>
