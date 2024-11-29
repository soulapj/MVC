<?php

class Comments extends AbstractController
{
    //  chaque page est représentée par une méthode spécifique qui appelle une vue spécifique le model si besoin.
    private $commentModel;

    public function __construct()
    {
        // if (!isLoggedIn()){
        //     redirect('users/login');
        // }

        $this->commentModel = $this->model('Comment');
    }


    public function add($id)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'id_user' => $_SESSION['user_id'],
                'id_post' => $id,
                'comment' => htmlspecialchars(trim($_POST['comment']))
            ];
            if(empty($this->validateForm($_POST))){ 
                if ($this->commentModel->addComment($data)) {
                    flash('flashCommentSuccess', 'Commentaire envoyé avec succès', 'alert alert-success');
                    redirect('posts/details/' . $id);
                } else {
                    flash('flashCommentSuccess', "Erreur lors de l'ajout du commentaire", 'alert alert-danger');
                    redirect('posts/details/' . $id);
                }
            } else {
                redirect('posts/details/' . $id);
            }
        } else {
            redirect('posts/details/' . $id);
        }
    }

    public function update($id){
        if($_SERVER['REQUEST_METHOD']== 'POST'){
            $data = [
                'id_comment' =>$id,
                'comment' => htmlspecialchars(trim($_POST['comment']))
            ];
            if(empty($data['comment'])){
                flash('flashCommentFail','Le commentaire est vide', 'alert alert-danger');
                redirect('posts/details/' . $_POST['postId']);
            } else {
                if($this->commentModel->updateComment($data)){
                    flash('flashComment','Le commentaire a bien été ajouté', 'alert alert-success');
                    redirect('posts/details/'. $_POST['postId']);
                } else {
                flash('flashCommentFail','Erreur lors de la modification', 'alert alert-danger');
                redirect('posts/details/' . $_POST['postId']);
                }
            }
        }
        
        }
        
        public function delete($idPost, $idComment){
            if($this->commentModel->deleteComment($idComment)){
                flash('flashComment','Le commentaire a bien été supprimé', 'alert alert-success');
                redirect('posts/details/'. $idPost);
            } else {
            flash('flashCommentFail','Erreur lors de la suppression', 'alert alert-danger');
            redirect('posts/details/' . $idPost);
            }
        }
}