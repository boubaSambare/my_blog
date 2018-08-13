<?php
/**
 * Created by sambare.
 * User: sambare
 * Date: 27/02/2018
 *
 */

class View
{
    protected $template;
    const DECONEXTION =  '<a class="nav-link" href="'.HOST.'logout.html">Déconnexion</a>';
    const CONEXTION =  '<a class="nav-link" href="'.HOST.'conextion.html">Connexion</a>';
    const ADMINPAGE =  '<a class="nav-link" href="'.HOST.'admin.html">Admistration</a>';
    const HOMEPAGE =  ' <a class="nav-link" href="'.HOST.'">
                            Accueil
                            <span class="sr-only">(current)</span>
                        </a>';

    /**
     * View constructor.
     * @param  $template
     */
    public function __construct($template)
    {
        $this->template = $template;
    }

    /**
     *
     */
    public  function render($params = array())
    {
        extract($params);
        //var_dump($params);
        ob_start();
        require VIEW.$this->template.".php";

        $content = ob_get_clean();
        require VIEW."template.php";
    }

    /**
     * @param $paths
     */
    public static function redirect($paths)
    {
        header("location:".HOST.$paths);
        exit;
    }



}