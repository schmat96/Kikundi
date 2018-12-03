<?php
/**
 * Created by PhpStorm.
 * User: Kevin Looser
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

    private $cookieDelimiter = '&';

    /**
     * Variable to be filled with the loaded html-file
     */
    private $html = '';

    private $projectpool;

    /**
     * write file-contents of the provided filepath into the
     * html-variable
     */
    private function writeHtml($filePath) {
        $this->html = file_get_contents($filePath);
    }

    public function setProjectPoolName($val) {
       $this->projectpool =  $val;
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
        $requestedPage2 = explode('?', $requestedPage)[0];
        // pretty important
        // todo 1: add remaining/missing pages
        // todo 2: add correct requested url in form (html)

        // not important
        // todo 3: add variable/read admin status to differentiate between user and admin template
        // todo 4: improve naming and path selection

        require_once ('../../ProjectController.php');

        switch(strtolower($requestedPage2)) {
            case 'homeadmin':
                if ($this->projectpool) {
                    setcookie('projectpool', $this->projectpool);
                    $this->writeHtml('../../view/src/admin/home.template.html');
                }
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
                if ($this->projectpool) {
                    setcookie('projectpool', $this->projectpool);
                    $this->writeHtml('../../view/src/user/create-project-idea.template.html');
                } else {
                    echo "For this section you must set the Projectpool!";
                }

                break;
            case 'homeuser':
                if ($this->projectpool) {
                    setcookie('projectpool', $this->projectpool);
                    $pool = ProjectController::getPoolByID($this->projectpool);
                    $members = '';
                    foreach ($pool->getMembers() as $member) {
                        $members = $members.$member->getName().$this->cookieDelimiter;
                    }
                    setcookie('members', $members);
                    $projects = '';
                    foreach ($pool->getProjects() as $project) {
                        $projects = $projects.$project->getName().$this->cookieDelimiter;
                    }
                    setcookie('projects', $projects);
                    $this->writeHtml('../../view/src/user/home.template.html');
                } else {
                    echo "For this section you must set the Projectpool!";
                }

                break;
            case 'userjoin':
                $this->writeHtml('../../view/src/user/enter-project-pool.template.html');
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
