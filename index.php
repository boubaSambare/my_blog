<?php
 ini_set('display_errors','on');
  error_reporting(E_ALL);
require 'model/PostsManager.php';
$poust = new PostsManager();

$article = $poust->readAllPosts();
foreach ($article as $data) { 
	echo  "<h1>" .  $data->getPostsTitle() . "</h1>";
	echo  "<h4>" .  $data->getPostsDate() . "</h4>";
  	echo  "<p>" .  $data->getPostsContent() . "</p>";

   
}

