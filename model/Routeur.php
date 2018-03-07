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
                                "home.html" => array('controller' =>'Front','action' => 'homeFront'),
                                "post.html" => array('controller' =>'Front','action' => 'singlePost'),
                                "edit_post.html" => array('controller' =>'Front','action' => 'editPost'),
                                "comment.html" => array('controller' =>'Admin','action' => 'editComment'),
                                "delete.html" => array('controller' =>'Admin','action' => 'delete')
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