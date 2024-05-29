<?php
class Article {
    private $id;
    private $titre;
    private $contenu;
    private $categorie;

    public function __construct($id, $titre, $contenu, Categorie $categorie) {
        $this->id = $id;
        $this->titre = $titre;
        $this->contenu = $contenu;
        $this->categorie = $categorie;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getTitre() {
        return $this->titre;
    }

    public function getContenu() {
        return $this->contenu;
    }

    public function getCategorie() {
        return $this->categorie;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setTitre($titre) {
        $this->titre = $titre;
    }

    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }

    public function setCategorie(Categorie $categorie) {
        $this->categorie = $categorie;
    }
}
?>