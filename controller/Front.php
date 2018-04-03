<?php
/**
 * Created by PhpStorm.
 * User: sambare
 * Date: 01/03/2018
 * Time: 20:41
 */

class Front
{

    /**
     * ControlerBlog constructor.
     */
    public function __construct()
    {
        $this->postsModel = new PostsManager();
    }


    public function homeFront($params)
    {
        $post = new PostsManager();
        $postts=$post->readAllPosts();
        //var_dump($postts);
        $logout = View::CONEXTION;
        $view = new View("readPost");
        $view->render(array("postts"=>$postts,"logout"=>$logout));

    }

    public function readComment($params= null)
    {
        //extract($params);
        $comments = new CommentsManager();
        //var_dump($comment);
        return $comments;
    }

    public function singlePost($params)
    {
        //var_dump($params);
        extract($params);
        $post = new PostsManager();
        $postt=$post->readById($id);
        $commentts = $this->readComment();
        $commentt = $commentts->readCommentsByPost($postt->getPostsId());
        //var_dump($commentt);
        //var_dump($postt);
        $view = new View("single_post");
        $view->render(array("postt"=>$postt,"commentt"=>$commentt));

    }

    public function editComment()
    {
        $values = $_POST["values"];
        $comment = new Comments($values);
        $manager = new CommentsManager();
        $manager->createComments($comment);
        $view = new View("single_post");
        $view->redirect("post.html/id/".$comment->getCommentsPostsId());

    }

    public function signalComments()
    {
        $value = $_GET["values"];
        var_dump($value);
        $comment= new Comments($value);
        var_dump($comment);
        $commentsSignal= new CommentsManager();
        $commentsSignal->signalComments($comment);
        $view = new View("single_post");
        $view->redirect("post.html/id/".$value["posts_id"]);

    }

    public function userLogin()
    {
        if(isset($_POST['username']) AND isset($_POST['password']) )
        {
            $name = $_POST['username'];
            $password = $_POST['password'];
            $name = stripcslashes($name);
            $password = stripcslashes($password);
            $password = sha1($password);
          //  var_dump($password);
            $manager = new AuthorsManager();
            $islog = $manager->isLogged($name,$password);
            //var_dump($islog);
            if ($islog)
            {
                $this->session()->write("logins",$islog);
                 View::redirect("admin.html");
            }else{
                Session::setFlash("nom d'utilisateur ou mot de passe incorrect","alert-danger");
                $message = Session::flash();
                $view = new View("login");
                $view->render(array("message"=>$message));
                die();
            }


        }
    }

    public function session()
    {
        $session = new Session();
        return $session;
    }

    public function conextion()
    {
        $view = new View("login");
        $view->render();
    }




}