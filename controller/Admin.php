<?php
/**
 * Created by PhpStorm.
 * User: sambare
 * Date: 01/03/2018
 * Time: 20:42
 */

class Admin
{
    /**
     * Admin constructor.
     */
    public function __construct()
    {


            session_start() ;

        if (!isset($_SESSION['logins']))
        {
            Session::setFlash("Veillez vous connecter s'il vous plait","alert-danger");
            $message = Session::flash();
            $view = new View("login");
            $homePage = View::HOMEPAGE;
            $view->render(array("message"=>$message,"homePage"=>$homePage));
            die();
        }
    }
    public function adminFront($params)
    {
        $post = new PostsManager();
        $postts=$post->readAllPosts();
        $comment = $this->readCommentsSignale();
        $logout = View::DECONEXTION;
        //var_dump($postts);
        $view = new View("admin/posts");
        $view->render(array("postts"=>$postts,"comment"=>$comment,"logout"=>$logout));

    }
    public function addPost()
    {
        $imageName = $this->getImage();
        $values = $_POST["values"];
        $values+= ["posts_media"=>$imageName];
        $post = new Posts($values);
        $manager = new PostsManager();
        $manager->createPosts($post);
        View::redirect("admin.html");

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

    /**
     * @param $params
     */
    public function delete($params)
    {
        extract($params);
        Session::setFlash("Le chapitre a bien été suprimer");
        $message = Session::flash();
        $post= new PostsManager();
        $post->deletePosts($id);
        $postts=$post->readAllPosts();
        $comment = $this->readCommentsSignale();
        $view = new View("admin/posts");
        //$view->redirect("admin.html");
        $view->render(array('message'=>$message,"postts"=>$postts,"comment"=>$comment));
    }

    /**
     * @param $params
     */
    public function updatePost($params)
    {
        extract($params);
        $post = new PostsManager();
        $postt=$post->readById($id);
        $adminPage =View::ADMINPAGE;
        $view= new View("admin/edit_post");
        $view->render(array("postt"=>$postt,"adminPage"=>$adminPage));
    }

    public function postUpdate()
    {
        $values = $_POST["values"];
        $post = new Posts($values);
        $posts = new PostsManager();
        $posts->udaptePost($post);
        View::redirect("admin.html");

    }

    /**
     *
     */
    public function moderateComments ()
    {
        $value= $_POST["values"];
        var_dump($value);
        $comment= new Comments($value);
        $commentsSignal= new CommentsManager();
        $commentsSignal->moderateComments($comment);
        View::redirect("admin.html");
    }

    /**
     * @return array
     */
    private function readCommentsSignale()
    {
        $manager = new CommentsManager();
        $commentSignaled = $manager->readCommentsSignal();
        return $commentSignaled;
    }

    /**
     * @param $params
     */
    public function readSingleComment($params)
    {
        extract($params);
        $manager = new CommentsManager();
        $comments = $manager->readSingleComment($id);
        $view= new View("admin/edit_comment");
        $view->render(array("comments"=>$comments));
    }

    /**
     * @param $params
     */
    public function deleteComment($params)
    {
        extract($params);
        Session::setFlash("Le commentaire a bien été supprimer");
        $message = Session::flash();
        $comments= new CommentsManager();
        $comments->deleteComments($id);
        $comment = $comments->readCommentsSignal();
        $post= new PostsManager();
        $postts=$post->readAllPosts();
        $logout = View::DECONEXTION;
        $view = new View("admin/posts");
        $view->render(array('message'=>$message,"postts"=>$postts,"comment"=>$comment,"logout"=>$logout));
        //View::redirect("admin.html");
    }

    public function logout()
    {
        unset($_SESSION['logins']);
       View::redirect("");
    }
}