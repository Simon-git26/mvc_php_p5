<?php

require('src/model.php');

$posts = getPosts();


// Indiquez d'utiliser mon homepage.php
require('templates/homepage.php');
?>