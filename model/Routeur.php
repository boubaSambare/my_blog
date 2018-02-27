<?php
/**
 * Created by PhpStorm.
 * User: sambare
 * Date: 27/02/2018
 * Time: 15:51
 */

class Routeur
{
    protected $request;

    /**
     * Routeur constructor.
     * @param $request
     */
   // public function __construct()
    //{
      //  $this->request = $request;
    //}

    public function render()
    {
        
        $controler = new ControlerBlog();
        $controler->readPost();
    }
}