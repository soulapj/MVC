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
                'comment' => htmlspecialchars(trim($_POST['body']))
            ];
            if (empty($data['comment'])) {
                flash('flashCommentFail', 'Veuillez entrer un commentaire', 'alert alert-danger');
                redirect('posts/details/' . $id);
            } else {
                if ($this->commentModel->addComment($data)) {
                    flash('flashComment', 'Commentaire envoyé avec succès', 'alert alert-success');
                    redirect('posts/details/' . $id);
                } else {
                    flash('flashComment', "Erreur lors de l'ajout du commentaire", 'alert alert-danger');
                    redirect('posts/details/' . $id);
                }
            }
        } else {
            redirect('posts/details/' . $id);
        }
    }

    public function update($id) {
            dd($id);
    }

    public function delete($id) {}
}