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
        $comment = $this->readCommentsSignale();

        //var_dump($postts);
        $view = new View("admin/posts");
        $view->render(array("postts"=>$postts,"comment"=>$comment));

    }
    public function addPost()
    {
        $imageName = $this->getImage();
        $values = $_POST["values"];
        $values+= ["posts_media"=>$imageName];
        $post = new Posts($values);
        $manager = new PostsManager();
        $manager->createPosts($post);
        $view = new View("admin/add_posts");
        $view->redirect("admin.html");

    }

    public function getImage()
    {
        if (isset($_POST["submit"]))
        {
            //path to stock image
            $target = ROOTS."public/medias/".basename($_FILES['image']['name']);
            $image = $_FILES['image']['name'];
            move_uploaded_file($_FILES['image']['tmp_name'],$target);
        }
        return $image;
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
        $view->render(array("postt"=>$postt,));
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
    public function moderateComments ()
    {
        $value= $_POST["values"];
        var_dump($value);
        $comment= new Comments($value);
        $commentsSignal= new CommentsManager();
        $commentsSignal->moderateComments($comment);
        $view = new View("admin/admin");
        $view->redirect("admin.html");
    }

    private function readCommentsSignale()
    {
        $manager = new CommentsManager();
        $commentSignaled = $manager->readCommentsSignal();
        return $commentSignaled;
    }

    public function readSingleComment($params)
    {
        extract($params);
        $manager = new CommentsManager();
        $comments = $manager->readSingleComment($id);
        $view= new View("admin/edit_comment");
        $view->render(array("comments"=>$comments));
    }

    public function deleteComment($params)
    {
        extract($params);
        $comment= new CommentsManager();
        $comment->deleteComments($id);
        $view = new View("admin/admin");
        $view->redirect("admin.html");
    }
}