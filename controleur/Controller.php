<?php
require_once 'modele/bd.inc.php';
require_once 'modele/Romans.php';
require_once 'modele/Jeux.php';
require_once 'modele/Favoris.php';

class Controller {
    private $favoris;
    private $romans;
    private $jeux;

    public function __construct() {
        $this->favoris = new Favoris();
        $this->romans = new Romans();
        $this->jeux = new Jeux();
    }

    public function afficherFavoris() {
        $favoris = $this->favoris->getFavoris();
        include 'vue/a.php';
    }

    public function afficherRomans() {
        $romans = $this->romans->getRomans();
        include 'vue/romans.php';
    }

    public function afficherJeux() {
        $jeux = $this->jeux->getJeux();
        include 'vue/jeux.php';
    }

    public function getFavoris() {
        return $this->favoris->getFavoris();
    }

    public function getRomans() {
        return $this->romans->getRomans();
    }

    public function getJeux() {
        return $this->jeux->getJeux();
    }

    public function ajouterRoman($auteur, $titre, $description, $photo) {
        // Appel de la méthode d'ajout de roman de la classe Romans
        return $this->romans->ajouterRoman($auteur, $titre, $description, $photo);
    }
    
    public function modifierRoman($id, $auteur, $titre, $description, $photo) {
        // Appel de la méthode de modification de roman de la classe Romans
        return $this->romans->modifierRoman($id, $auteur, $titre, $description, $photo);
    }
    
    public function supprimerRoman($id) {
        return $this->romans->supprimerRoman($id);
    }
    

    // Méthodes CRUD pour les jeux
    public function ajouterJeu($nom, $description, $logo) {
        return $this->jeux->ajouterJeu($nom, $description, $logo);
    }

    public function modifierJeu($id, $nom, $description, $logo) {
        return $this->jeux->modifierJeu($id, $nom, $description, $logo);
    }

    public function supprimerJeu($id) {
        return $this->jeux->supprimerJeu($id);
    }

    // Méthode pour diriger vers la vue appropriée en fonction de l'action
    public function controleurPrincipal($action) {
        $lesActions = array();
        $lesActions["accueil"] = "a.php";
        $lesActions["Romans"] = "romans.php";
        $lesActions["Jeux"] = "jeux.php";
        $lesActions["ML"] = "ML.php";
        $lesActions["connexion"] = "connexion.php";
        $lesActions["inscription"] = "inscription.php";
        $lesActions["defaut"] = "a.php";
    
        if (array_key_exists($action, $lesActions)){
            return $lesActions[$action];
        } else {
            return $lesActions["defaut"];
        }
    }  
}
?>