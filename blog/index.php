<?php

require('Model/model.php');

$posts = getPosts();


// Indiquez d'utiliser mon homepage.php
require('View/homepage.php');
?>