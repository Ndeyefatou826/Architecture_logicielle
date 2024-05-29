<?php
require_once '../controleur/controleur.php';

$controleur = new Controleur();

if (isset($_GET['action'])) {
    $action = $_GET['action'];
    $id = isset($_GET['id']) ? intval($_GET['id']) : null;

    switch ($action) {
        case 'article':
            if ($id !== null) {
                $controleur->showArticle($id);
            } else {
                $controleur->showAccueil();
            }
            break;
        case 'categorie':
            if ($id !== null) {
                $controleur->showCategorie($id);
            } else {
                $controleur->showAccueil();
            }
            break;
        default:
            $controleur->showAccueil();
            break;
    }
} else {
    $controleur->showAccueil();
}
?>
