<?php    

class Users extends AbstractController {
    public function __construct() {
    }

    public function register() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        if (empty($_POST['username'])) {
            flash('flashName', 'Veuillez saisir un nom','alert alert-danger');
        }
        if (empty($_POST['email'])) {
            flash('flashEmail', 'Veuillez saisir un email','alert alert-danger'); 
        }
        if (empty($_POST['password'])) {
            flash('flashPassword', 'Veuillez saisir un mot de passe','alert alert-danger'); 
        }
        if (empty($_POST['confirm_password'])) {
            flash('flashConfirm', 'Veuillez confirmer votre mot de passe','alert alert-danger');
        }
        if ($_POST['password']!== $_POST['confirm_password']) {
            flash('flashConfirm2', 'Les mots de passe ne sont pas identiques','alert alert-danger');
        }
        if(empty($_SESSION['flashName']) && empty($_SESSION['flashEmail']) && empty($_SESSION['flashPassword']) && empty($_SESSION['flashConfirm']) && empty($_SESSION['flashConfirm2'])){

            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $confirmPassword = $_POST['confirm_password'];

            if ($this->userModel->register($username, $email, $password, $confirmPassword)) {
                header('Location: /login');
            } else {
                echo "Erreur lors de l'inscription.";
            }
        } else {
            $this->render('register', []);
        }
    } else {
        $this->render('register', []);
        }

    }
}