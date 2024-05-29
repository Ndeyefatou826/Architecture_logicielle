<?php
class Categorie {
    private $id;
    private $libelle;

    public function __construct($id, $libelle) {
        $this->id = $id;
        $this->libelle = $libelle;
    }

    // Getters
    public function getId() {
        return $this->id;
    }

    public function getLibelle() {
        return $this->libelle;
    }

    // Setters
    public function setId($id) {
        $this->id = $id;
    }

    public function setLibelle($libelle) {
        $this->libelle = $libelle;
    }
}
?>