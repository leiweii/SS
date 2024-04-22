<?php
require_once "bd.inc.php";

class Jeux {
    private $db;

    public function __construct() {
        $this->db = connexionPDO();
    }

    public function getJeux() {
        $query = $this->db->query("SELECT nomJ, DescriptionJ, Logo FROM Jeux");
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    // Méthodes CRUD
    public function ajouterJeu($nom, $description, $logo) {
        $stmt = $this->db->prepare("INSERT INTO Jeux (nomJ, DescriptionJ, Logo) VALUES (?, ?, ?)");
        return $stmt->execute([$nom, $description, $logo]);
    }

    public function modifierJeu($id, $nom, $description, $logo) {
        $stmt = $this->db->prepare("UPDATE Jeux SET nomJ = ?, DescriptionJ = ?, Logo = ? WHERE id = ?");
        return $stmt->execute([$nom, $description, $logo, $id]);
    }

    public function supprimerJeu($id) {
        $stmt = $this->db->prepare("DELETE FROM Jeux WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>