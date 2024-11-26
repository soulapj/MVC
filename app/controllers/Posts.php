<?php 

class Posts extends AbstractController   {
//  chaque page est représentée par une méthode spécifique qui appelle une vue spécifique le model si besoin.
    private $postModel;

    public function __construct() {
        if (!isLoggedIn()){
            redirect('users/login');
        }


        //  Instanciation du model post pour récupérer les données de la BDD concernant les posts 
        $this->postModel = $this->model('Post');
 
    }
    public function index(){
        // On appel la méthode getPosts du model Post pour récupérer les posts
        $posts = $this->postModel->getPosts();
        // Le tableau data contient les données à envoyer à la vue
        $data = [
            'title' => 'Posts page',
            'posts' => $posts
        ];
        //  On appel la méthode render de la class AbstractController pour afficher la vue index
        $this->render('index', $data);
    }

    public function details($id){
        // On appel la méthode getPostById du model Post pour récupérer un post en fonction de son id
        $post = $this->postModel->getPostById($id);

        $data = [
            'title' => 'Posts page',
            'post' => $post
        ];
        $this->render('details', $data);
    }

}