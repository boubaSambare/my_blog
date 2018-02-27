<?php
require "config.php";
AutoloadClass::register();
$post = new Routeur();
$post->render();
