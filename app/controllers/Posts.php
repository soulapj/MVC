<?php 

class Posts extends AbstractController   {
//  chaque page est représentée par une méthode spécifique qui appelle une vue spécifique le model si besoin.
    private $postModel;

    public function __construct() {
        // if (!isLoggedIn()){
        //     redirect('users/login');
        // }


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

    public function addPost(){
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $data = [
                'title' => htmlspecialchars(trim($_POST['title'])),
                'body' => htmlspecialchars(trim($_POST['body'])),
                'id_user' => $_SESSION['user_id'],
            ];
        if (empty($data['title'])) {
            flash('flashTitle', 'Le titre est vide','alert alert-danger');
        }
        if (empty($data['body'])) {
            flash('flashBody', 'Le contenu est vide','alert alert-danger');
        }
        if (empty($_SESSION['flashTitle']) && empty($_SESSION['flashBody'])) {
            if ($this->postModel->addPost($data)){
                flash('flashAdd', 'Le post à été bien ajouté', 'alert alert-success');
                redirect('posts/index');
            } else {
                flash('flashFailure', "Le post n'a pas été publié", 'alert alert-danger');
                redirect('posts/addPost');
            }
        } else {
            redirect('posts/addPost');
        }
        } else {
        $data = [];
        $this->render('addPost', $data);
    }
    }

}