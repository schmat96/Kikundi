<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 18.11.2018
 * Time: 20:30
 */

 /**
  * Dispatcher class which handles http-Requests
  */
class Dispatcher
{
    /**
     * Variable to track slashes
     */
    private $pathDepth = 5;

    /**
     * Variable to be filled with the loaded html-file
     */
    private $html = '';

    /**
     * write file-contents of the provided filepath into the
     * html-variable
     */
    private function writeHtml($filePath) {
        $this->html = file_get_contents($filePath);
    }

    /**
     * constructor
     */
    public function __construct($pathDepth)
    {
        $this->pathDepth = $pathDepth;
    }

    /**
     * This function receives the target url and echoes the corresponding html template.
     * @param $url
     */
    public function displayRequestedPage($url) {
        $requestedPage = explode('/', $url)[$this->pathDepth];
        // pretty important
        // todo 1: add remaining/missing pages
        // todo 2: add correct requested url in form (html)

        // not important
        // todo 3: add variable/read admin status to differentiate between user and admin template
        // todo 4: improve naming and path selection


        switch(strtolower($requestedPage)) {
            case 'homeadmin':
                $this->writeHtml('../../view/src/admin/home.template.html');
                break;
            case 'newprojectpool':
                $this->writeHtml('../../view/src/admin/new-project-pool.template.html');
                break;
            case 'projectevaluation':
                $this->writeHtml('../../view/src/admin/project-pool-evaluation.template.html');
                break;
            case 'projectevaluationcard':
                $this->writeHtml('../../view/src/general-components/project-pool-evaluation-card.template.html');
                break;
            case 'createprojectidea':
                $this->writeHtml('../../view/src/user/create-project-idea.template.php');
                break;
            case 'homeuser':
                $this->writeHtml('../../view/src/user/home.template.html');
                break;
            default:
                $this->writeHtml('../../view/src/user/enter-project-pool.template.html');
                break;
        }

        echo $this->html;
    }

    public function getHtml(){
        return $this->html;
    }
}
