<?php
/**
 * Created by Sambare.
 * User: sambare
 * Date: 27/02/2018
 * Time: 15:51
 */

class Routeur
{
    protected $request;
    protected $paths = array(
                                "" => array('controller' =>'Front','action' => 'homeFront'),
                                "post.html" => array('controller' =>'Front','action' => 'singlePost'),
                                "login.html" => array('controller' =>'Front','action' => 'userLogin'),
                                "conextion.html" => array('controller' =>'Front','action' => 'conextion'),
                                "edit.html" => array('controller' =>'Front','action' => 'editPost'),
                                "edit_comment.html" => array('controller' =>'Front','action' => 'editComment'),
                                "delete.html" => array('controller' =>'Admin','action' => 'delete'),
                                "admin.html" => array('controller' =>'Admin','action' => 'adminFront'),
                                "add_post.html" => array('controller' =>'Admin','action' => 'addPost'),
                                "add.html" => array('controller' =>'Admin','action' => 'add'),
                                "edit_post.html" => array('controller' =>'Admin','action' => 'updatePost'),
                                "update.html" => array('controller' =>'Admin','action' => 'postUpdate'),
                                "signale_comment.html" => array('controller' =>'Front','action' => 'signalComments'),
                                "moderer.html" => array('controller' =>'Admin','action' => 'moderateComments'),
                                "single_comment.html" => array('controller' =>'Admin','action' => 'readSingleComment'),
                                "delete_comment.html" => array('controller' =>'Admin','action' => 'deleteComment'),
                                "logout.html" => array('controller' =>'Admin','action' => 'logout'),
                            );
    /**
     * Routeur constructor.
     * @param $request
     */
    public function __construct($request)
    {
        $this->request = $request;
    }

    /**
     *
     */
    public function getPathName()
    {
        $request = $this->request;
        $elements = explode("/",$request);
        return $elements[0];
    }

    public function getParams()
    {
        $request = $this->request;
        $elements = explode("/",$request);
        unset($elements[0]);
        for ($i= 1; $i < count($elements); $i++)
        {
            $params[$elements[$i]] = $elements[$i+1];
            $i++;
        }
        if (!isset($params)) {$params = null;}
        return $params;
    }

    public function render()
    {
        require "./controller/Front.php";
        require "./controller/Admin.php";
        $request = $this->getPathName();
        $params = $this->getParams();
        if (key_exists($request,$this->paths))
        {
            $controler = $this->paths[$request]['controller'];
            $method = $this->paths[$request]['action'];
            $currentController = new $controler();
            $currentController->$method($params);


        }


    }
}