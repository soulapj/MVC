<?php require APPROOT . '/views/bases/header.php'; ?>
  <div class="row mb-3">
    <div class="col-md-6">
      <h1>Posts</h1>
    </div>
    <?php if(!empty($_SESSION['flashAdd'])){
                flash('flashAdd');
    } ?>
    <div class="col-md-6">
      <a href="" class="btn btn-primary pull-right">
        <i class="fa fa-pencil"></i> Ajouter un post
      </a>
    </div>
  </div>
  <?php foreach($data['posts'] as $post) : ?>
    <div class="card card-body mb-3">
      <!-- ici on affiche avec la syntaxe des objets en PHP car dans la requete on spécifie PDO::FETCH_OBJ -->
      <h4 class="card-title"><?= $post->title; ?></h4>
      <div class="bg-light p-2 mb-3">
        Publié par 
      </div>
      <p class="card-text"><?= $post->content; ?></p>
       <!-- redirection à faire sur la structure du router : controlerName/methodName/params -->
      <a href="<?php echo URLROOT; ?>/posts/details/<?php echo $post->id; ?>" class="btn btn-dark">Voir plus</a>
    </div>
  <?php endforeach; ?>
<?php require APPROOT . '/views/bases/footer.php'; ?>
