<!DOCTYPE html>
<html>
	<head>
    	<meta charset="utf-8" />
    	<title>Le blog Acceuil</title>
    	<link href="style.css" rel="stylesheet" />
	</head>

	<body>
    	<h1>Le super blog de l'AVBN !</h1>
    	<p>Derniers posts du blog :</p>

    	<?php
    	foreach ($posts as $post) {
    	?>
        	<div class="news">
            	<h3>
                	<?=htmlspecialchars($post['post_title']); ?>
                	<em>le <?= $post['post_date_create']; ?></em>
            	</h3>
            	<p>
                	<?=nl2br(htmlspecialchars($post['post_content']));
                	?>
                	<br />
                	<em><a href="View/post.php?post_id=<?=urlencode($post['post_id']) ?>">Commentaires</a></em>
            	</p>
        	</div>
    	<?php
    	} // Fin de la boucle
    	?>
	</body>
</html>