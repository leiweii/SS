<?php
require_once "bd.inc.php";
require_once "Favoris.php"; // Assurez-vous que vous incluez le fichier correspondant à la classe Favoris

class Accueil {
    private $favorisModel;

    public function __construct() {
        $this->favorisModel = new Favoris();
    }

    public function getFavoris() {
        return $this->favorisModel->getFavoris();
    }
}
?>
