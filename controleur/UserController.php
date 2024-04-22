<?php
require_once 'modele/bd.inc.php';
require_once 'modele/User.php';

class UserController {
    private $userModel;

    public function __construct() {
        $this->userModel = new UserModel();
    }

    public function registerUser() {
        $registerMessage = ""; // Initialisez la variable pour éviter une erreur de variable non définie
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_register'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Appel de la méthode d'enregistrement de l'utilisateur dans le modèle
            $registerResult = $this->userModel->registerUser($username, $email, $password);
    
            if ($registerResult) {
                $registerMessage = "Inscription réussie!";
    
            } else {
                $registerMessage = "Erreur lors de l'inscription.";
            }
        }
        return $registerMessage; 
    }
    
    public function loginUser() {
        $loginMessage = "";
        if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action_login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            // Appel de la méthode de connexion de l'utilisateur dans le modèle
            $loggedInUser = $this->userModel->loginUser($email, $password);
    
            if ($loggedInUser) {
                $loginMessage = "Connexion réussie!";
                // Vous pouvez également rediriger ici si nécessaire
            } else {
                $loginMessage = "Adresse email ou mot de passe incorrect.";
            }
        }
        return $loginMessage;
    }
}
?>
