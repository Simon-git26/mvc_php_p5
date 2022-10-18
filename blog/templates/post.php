<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title>Le blog de l'AVBN</title>
        <link href="style.css" rel="stylesheet" />
    </head>
 
    <body>
        <h1>Le super blog de l'AVBN !</h1>
        <p><a href="index.php">Retour à la liste des billets</a></p>

        <div class="news">
            <h3>
                <?= htmlspecialchars($post['post_title']) ?>
                <em>le <?= $post['post_create_date'] ?></em>
            </h3>
 
            <p>
                <?= nl2br(htmlspecialchars($post['post_content'])) ?>
            </p>
        </div>
 
        <h2>Commentaires</h2>
 
        <?php
        foreach ($comments as $comment) {
        ?>
        <p><strong><?= htmlspecialchars($comment['comment_user']) ?></strong> le <?= $comment['comment_date'] ?></p>
        <p><?= nl2br(htmlspecialchars($comment['comment_content'])) ?></p>
        <?php
        }
        ?>
    </body>
</html>