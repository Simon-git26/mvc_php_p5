<?php 

// Recuperation de tous les posts
function getPosts() {

   // Connection a ma BDD
   $database = bddConnect();
   // On récupère les 5 derniers posts
   // Le retour d'une query s'appelle un statement
   $statement = $database->query(
      "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts ORDER BY post_date_create DESC LIMIT 0, 5"
   );


   $posts = [];

   while (($row = $statement->fetch())) {
      $post = [
         'post_title' => $row['post_title'],
         'post_content' => $row['post_content'],
         'post_date_create' => $row['post_date_create'],
         // Recuperer l'id du post pour affichage d'un post précis selon son id
         'post_id' => $row['post_id'],
      ];

      $posts[] = $post;
   }

   return $posts;
}


// Recuperation d'un post selon son id
function getPost($id) {
   // Connection a ma BDD
   $database = bddConnect();

   $statement = $database->prepare(
      "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS post_date_create FROM posts WHERE post_id = ?"
   );
   $statement->execute([$id]);

   $row = $statement->fetch();
   $post = [
      'post_title' => $row['post_title'],
      'post_date_create' => $row['post_date_create'],
      'post_content' => $row['post_content'],
   ];

   return $post;
}



// Recuperation de tous les commentaires associés à un id de post
function getComments($id) {
   // Connection a ma BDD
   $database = bddConnect();

   $statement = $database->prepare(
      "SELECT comment_id, comment_user, comment_content, DATE_FORMAT(comment_date, '%d/%m/%Y à %Hh%imin%ss') AS comment_date FROM comments WHERE post_id = ? ORDER BY comment_date DESC"
   );
   $statement->execute([$id]);

   $comments = [];

   while (($row = $statement->fetch())) {
      $comment = [
         'comment_user' => $row['comment_user'],
         'comment_date' => $row['comment_date'],
         'comment_content' => $row['comment_content'],
      ];

      $comments[] = $comment;
   }

   return $comments;
}


// Nouvelle fonction qui nous permet d'éviter de répéter du code
function bddConnect()
{
	try {
      $database = new PDO('mysql:host=localhost;dbname=p5_mvc_php;charset=utf8', 'root', 'root');
    	return $database;
	} catch(Exception $e) {
    	die('Erreur : '.$e->getMessage());
	}
}