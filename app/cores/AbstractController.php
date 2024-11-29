<?php

class AbstractController{

    public function model($model){
        // appel du model
        require_once '../app/models/' . $model . '.php';
        // instanciation du model
        return new $model();
    }


    public function render($view, $data = []){
        $controllerName = strtolower(get_called_class());
        // appel de la vue
        if(file_exists('../app/views/' .$controllerName. '/' .$view . '.php')){
        require_once '../app/views/' .$controllerName. '/' .$view . '.php';
        }else{
            die('La vue n\'existe pas');
        }
    }

    public function validateForm($array){
    $errors = [];
    $pass = '';
    foreach($array as $key => $value){
        $cleanField = htmlspecialchars(trim($value));
        switch ($key){
            case 'username':
                if(empty($cleanField)){
                    $errors[$key] = 'Veuillez saisir un nom';
                }
            break;
            case 'title':
                if(empty($cleanField)){
                    $errors[$key] = 'Le titre est vide';
                }
            break;
            case 'body':
                if(empty($cleanField)){
                    $errors[$key] = 'Le contenu est vide';
                }
            break;
            case 'email':
                if (empty($cleanField)) {
                    $errors[$key] = 'Veuillez saisir un email';
                }
                elseif(!filter_var($cleanField, FILTER_VALIDATE_EMAIL)){
                    $errors[$key] = 'Veuillez saisir un email valide';
                }
            break;
            case 'password':
                if(empty($cleanField)){
                    $errors[$key] = 'Veuillez saisir un mot de passe';
                } else {
                    $pass = $cleanField;
                }
            break;
            case 'confirm_password':
                if(empty($cleanField)){
                    $errors[$key] = 'Veuillez confirmer votre mot de passe';
                } elseif ($cleanField !== $pass) {
                    $errors[$key] = 'Les mots de passe ne sont pas identiques';
                }
            break;
            case 'comment':
                if(empty($cleanField)){
                    $errors[$key] = 'Veuillez entrer un commentaire';
                } 
            break;
            }
        
        }
    foreach($errors as $key => $error){
        $flashName = 'flash'. ucfirst($key);
        flash($flashName, $error, 'alert alert-danger');
    }
        return $errors;
    
    }
}