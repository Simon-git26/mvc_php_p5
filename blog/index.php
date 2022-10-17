<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title>Le blog de l'AVBN</title>
      <link href="style.css" rel="stylesheet" />
   </head>

   <body>
      <h1>Le super blog de l'AVBN !</h1>
      <p>Derniers billets du blog :</p>

      <?php
      // Connexion à la base de données
      try
      {
          $bdd = new PDO('mysql:host=localhost;dbname=p5_mvc_php;charset=utf8', 'root', 'root');
      }
      catch(Exception $e){
            die( 'Erreur : '.$e->getMessage()   );
      }

      // On récupère les 5 derniers billets
      $req = $bdd->query('SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY post_date_create DESC LIMIT 0, 5');

      while ($donnees = $req->fetch())
      {
      ?>
      <div class="news">
         <h3>
            <?php echo htmlspecialchars($donnees['post_title']); ?>
            <em>le <?php echo $donnees['date_creation_fr']; ?></em>
         </h3>
         <p>
         <?php
         // On affiche le contenu du billet
                echo    nl2br ( htmlspecialchars( $donnees['post_content']));
         ?>
         <br />
         <em><a href="#">Commentaires</a></em>
         </p>
      </div>
      <?php
      } // Fin de la boucle des billets
      $req->closeCursor();
      ?>
   </body>
</html>
