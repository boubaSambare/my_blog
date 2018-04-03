<?php
/**
 *
 */
class Dbase
{
    protected $bd;
    protected $host      = "localhost";
    protected $login     = "root";
    protected $password  = "";
    public function __construct()
    {
        $bdd = new PDO('mysql:host='.$this->host.';dbname=blog_writer;charset=utf8', $this->login, $this->password, array(PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION));
        //$this->setDb($bdd);
        $this->bd = $bdd;
    }
    //public static function setDb(PDO $db)
    //{

// }
}