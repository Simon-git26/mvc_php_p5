<?php
// post.php
 
require('src/model.php');
 
// Vérifie que j'ai bien recu en @param un id
if (isset($_GET['post_id']) && $_GET['post_id'] > 0) {
    $identifier = $_GET['post_id'];
} else {
    echo 'Erreur : aucun post !!';
 
    die;
}

// Appelez les deux fonctions du modele dont j'aurais besoin
$post = getPost($id);
$comments = getComments($id);

require('templates/post.php');