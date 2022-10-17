<?php 

function getPosts() {

   // Connection a ma BDD
   try {
      $database = new PDO('mysql:host=localhost;dbname=p5_mvc_php;charset=utf8', 'root', 'root');
   } catch(Exception $e) {
      die('Erreur : '.$e->getMessage());
   }

   // On récupère les 5 derniers posts
   // Le retour d'une query s'appelle un statement
   $statement = $database->query(
      "SELECT post_id, post_title, post_content, DATE_FORMAT(post_date_create, '%d/%m/%Y à %Hh%imin%ss') AS date_creation_fr FROM posts ORDER BY post_date_create DESC LIMIT 0, 5"
   );


   $posts = [];

   while (($row = $statement->fetch())) {
      $post = [
         'post_title' => $row['post_title'],
         'post_content' => $row['post_content'],
         'creation_date' => $row['date_creation_fr'],
      ];

      $posts[] = $post;
   }

   return $posts;
}