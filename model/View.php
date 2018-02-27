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
    public function render()
    {
        ob_start();
        require VIEW.$this->template.".php";

        $content = ob_get_clean();
        require VIEW."template.php";
    }



}