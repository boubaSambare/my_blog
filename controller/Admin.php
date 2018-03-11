<?php
/**
 * Created by PhpStorm.
 * User: sambare
 * Date: 01/03/2018
 * Time: 20:42
 */

class Admin
{
    public function adminFront($params)
    {
        $post = new PostsManager();
        $postts=$post->readAllPosts();
        //var_dump($postts);
        $view = new View("admin/posts");
        $view->render(array("postts"=>$postts));

    }
    public function addPost()
    {
        $values = $_POST["values"];
        $post = new Posts($values);
        $manager = new PostsManager();
        $manager->createPosts($post);
        $view = new View("admin/add_posts");
        $view->redirect("admin.html");

    }

    public function add()
    {
        $addPost = new View("admin/add_posts");
        $addPost->render();
    }

    public function delete($params)
    {
        extract($params);
        $post= new PostsManager();
        $post->deletePosts($id);
        $view = new View("admin/admin");
        $view->redirect("admin.html");
    }

    public function updatePost($params)
    {
        extract($params);
        $post = new PostsManager();
        $postt=$post->readById($id);
        $view= new View("admin/edit_post");
        $view->render(array("postt"=>$postt));
    }

    public function postUpdate()
    {
        $values = $_POST["values"];
        $post = new Posts($values);
        $posts = new PostsManager();
        $posts->udaptePost($post);
        $view = new View("admin/admin");
        $view->redirect("admin.html");

    }
}