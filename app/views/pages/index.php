<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1><?= $data['title'] ?></h1>
    <?php foreach($data['posts'] as $post) { ?>
        <span><?= $post->dateCreated?></span>
        <h3><?= $post->title ?></h3>
        <p><?= $post->content ?></p>
    <?php } ?>
</body>
</html>