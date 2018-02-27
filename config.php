<?php

/**
* 
*/
class AutoloadClass
{

    /**
     *
     */
    public static function register()
	{
		spl_autoload_register( array(__CLASS__  , "autoload"));
		$host = "http//".$_SERVER ["HTTP_HOST"]."/";
		$root = $_SERVER["DOCUMENT_ROOT"]."/";

		define('HOST', $host."my_blog/");
		define('ROOT', $root."my_blog/");
		define('CLASSES', ROOT."model/");
		define("VIEW", ROOT."view/");
		define("CONTROLER", ROOT."controller/");


	}

	public static function autoload($class)
	{
		require CLASSES.$class.".php";
	}

}
