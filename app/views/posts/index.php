<?php require APPROOT . '/views/bases/header.php'; ?>
<h1><?= $data['title'] ?></h1>
    <?php foreach($data['posts'] as $post) { ?>
        <!-- ici on affiche avec la syntaxe des objets en PHP car dans la requete on spécifie PDO::FETCH_OBJ -->
        <h3><?= $post->title ?></h3>
        <p><?= $post->content ?></p>
        <!-- redirection à faire sur la structure du router : controlerName/methodName/params -->
      <a href="<?= URLROOT ?>/posts/details/<?= $post->id?>">Voir details</a>
       
    <?php } ?> 
<?php require APPROOT . '/views/bases/footer.php'; ?>