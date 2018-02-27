<?php
class ControlerBlog
{
    public function readPost()
    {
        $view = new View("readPosts");
        $view->render();

    }
}