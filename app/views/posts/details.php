<?php require APPROOT . '/views/bases/header.php'; ?>
<a href="<?php echo URLROOT; ?>/posts" class="btn btn-light"><i class="fa fa-backward"></i> Retour</a>
<br>
<h1><?php echo $data['post']->title; ?></h1>
<div class="bg-secondary text-white p-2 mb-3">
    Publié par  
</div>
<p><?php echo $data['post']->content; ?></p>
<hr>
<div class="d-flex justify-content-between">
    <a href="" class="btn btn-dark">Modifier</a>
    <a href="" class="btn btn-danger">Supprimer</a>
</div>


<div class="comment-section">
  <h2>Commentaires</h2>
    <div class="comment">
      <div class="comment-header">
        <i class="fas fa-user-circle comment-icon"></i>
        <div class="comment-user">
          <div class="comment-author">Publié par :</div>
        </div>
      </div>
      <div class="comment-body">
        <p></p>
      </div>
    </div>
</div>


<!-- Formulaire pour ajouter un commentaire -->
<h3>Ajouter un commentaire</h3>

<form action="" method="POST">
  <div class="form-group">
    <textarea name="body" class="form-control" required></textarea>
  </div>
  <button type="submit" class="btn btn-primary">Commenter</button>
</form>



<?php require APPROOT . '/views/bases/footer.php'; ?>