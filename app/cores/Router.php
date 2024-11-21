<?php 

class Router {
    private $currentController = 'Pages';
    private $currentMethod = 'index';
    private $params = [];

    public function __construct() {
        // récupère l'url
        $url = $this->getUrl();

        // récupère le premier param de l'url et on défini le controller courant 
        if(!empty($url) && isset($url[0]) && file_exists('../app/controllers/' . ucwords($url[0]) . '.php')) {
            $this->currentController = ucwords($url[0]);
            // unset($url[0]);
        }

        // véifier le deuxième param de l'url et récupérer la méthode du controller

        // Vérifier le troisième param de l'url et récupérer les paramètres


        // Appeler le controller + méthode + param en fonction de ce qui est défini das l'url 
        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }


    // fonction pour récupérer l'url et la sécuriser
    public function getUrl(){
  if (isset($_GET['url'])) {
    $url = rtrim($_GET['url'], '/');
    $url = filter_var($url, FILTER_SANITIZE_URL);
    $url = explode('/', $url);
    return $url;
    }
}

}