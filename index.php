<?php
require "config.php";
AutoloadClass::register();
$request = $_GET["k"];
$post = new Routeur($request);
$post->render();
