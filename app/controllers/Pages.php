<?php 

class Pages extends AbstractController   {
    private $postModel;

    public function __construct() {
        $this->postModel = $this->model('Post');
 
    }
    
    public function index() {
        $posts = $this->postModel->getPosts(); 
    
        
        $data = [
            'title' => 'Welcome',
            'posts' => $posts
        ];

        $this->render('index', $data);
    }

    public function about($id) {
        echo $id;
    }
}