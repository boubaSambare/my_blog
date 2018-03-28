<?php
/**
 * Created by PhpStorm.
 * User: sambare
 * Date: 18/03/2018
 * Time: 21:00
 */

class Session
{
    public function __construct()
    {
        if (!$_SESSION)
        {
            session_start() ;
        }
    }

    /**
     * @param null $message
     * @param string $type
     */
    public static function setFlash($message = null, $type= 'alert-success')
    {
        $_SESSION['flash'] = array(
            'message' => $message,
            'type' => $type
        );
    }

    /**
     * @return string
     */
    public static function flash()
    {
       if(isset($_SESSION['flash']['message']))
       {
            $html="<div class='alert-message  ".$_SESSION['flash']['type']. "'> <p>".$_SESSION['flash']['message']. '</p> </div>';
            $_SESSION['flash'] = array();
            return $html;
       }

    }

    public function write($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    public function readKey($key= null)
    {
        if ($key)
        {
            if (isset($_SESSION[$key]))
            {
                return $_SESSION[$key];
            }else{
                return $_SESSION;
            }
        }
    }

    public function isLogin()
    {
        return isset($_SESSION['login']->getAuthorsId );
    }
}