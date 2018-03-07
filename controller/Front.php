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
        $view = new View("readPost");
        $view->render(array("postts"=>$postts));

    }

    public function readComment($params)
    {
        //extract($params);
        $comments = new CommentsManager();
        $comment= $comments->readCommentsByPost(1);
        var_dump($comment);
        return $comment;
    }

    public function singlePost($params)
    {
        //var_dump($params);
        extract($params);
        $post = new PostsManager();
        $postt=$post->readById($id);
        $commentt = $this->readComment($id);
        //var_dump($postt);
        $view = new View("single_post");
        $view->render(array("postt"=>$postt,"commentt"=>$commentt));

    }
}