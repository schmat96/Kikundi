<?php
/**
* author: Keya Kersting
* date: 05.11.2018
*/
require_once('../ProjectController.php');

    /**
     * Controller class to administrate and facilitate all POST-requests
     */
    class PostController {


        /**
         * Variable to store arguments provided in a GET-Request
         */
        private $provided;

        /**
         * Store something into the $provided-Variable to
         * make a POST afterwards
         */
        public function setPost($provided) {
            $this->provided = $provided;
        }

        public function getProvided() {
            return $this->provided;
        }


        /**
         * Chooses what to do with the provided postLabel value.
         * Everything below 3 lines of code may be added in the switch-case statement itself, everything up needs to have a own function
         */
        public function chooseFunction(){
            if (isset($this->provided['postLabel'])) {
                echo "You called the function <b> ".$this->provided['postLabel']." </b> if you need to know what this shit does follow it for yourself
                in kikundi/controller/PostController.php <br>";
                switch($this->provided['postLabel']){
                    case 'createProjectPool':
                        ProjectController::addProjectPool($this->provided['sessionID'], $this->provided['name'], $this->provided['adminName']);
                        setcookie('newCook', '69', 2019-9-11, '/');
                        break;
                    case 'registerMember':
                        $this->joinProjectPool();
                        break;
                    case 'createProject':
                        $this->createProject();
                        break;
                    case 'addTag':
                        TagController::saveTagInDb($this->provided['tag']);
                        break;
                    case 'checkTag':
                        echo "<h2>All the Tags starting with ".$this->provided['tag']."</h2>";
                        var_dump(TagController::searchInDb($this->provided['tag']));
                        break;
                    case 'joinProjectPool':
                        break;
                    case 'likeProject':
                        $this->likeProject();
                        break;
                    case 'approve':
                        break;
                    default:
                        echo "no post with that label found!";
                }
            } else {
                echo "You should not be here!";
            }

        }

        /**
         * Create a new ProjectPool from a request
         */
        private function createProjectPool() {
            //TODO
        }

        /**
         * create a new Project in a Pool
         */
        private function createProject() {

            require_once('../ProjectController.php');
            $maxMembers = $this->provided['maxMembers'];
            $minMembers = $this->provided['minMembers'];
            $difficulty = $this->provided['difficulty'];
            $name = $this->provided['name'];
            $description = $this->provided['description'];
            //TODO REMOVE ONCE FETCHED
            //$tags = $this->provided['tags'];
            setcookie('userId', "userId", 0, "/");
            // TODO FIX ISSUE HERE: you have to reload the page to get the result with a cookie set
            $tags = array(new Tag("cool"), new Tag("java"), new Tag("#notphp"));
            $project = new Project($maxMembers, $minMembers, $difficulty, $name, $description, $tags);
            foreach (ProjectController::getAllPools() as $pool) {
                if ($pool->hasID($this->provided['sessionID'])) {
                    $pool->addProject($project, $tags);
                    ProjectController::redirectToHomeAdmin($pool);
                }
            }
        }


        /**
         * A member can join an existing ProjectPool with this function
         */
        private function joinProjectPool() {

            $hashCode = $this->provided['hashCode'];
            $name = $this->provided['name'];
            $sessionID = 100;
//            $sessionID = $this->provided['sessionID'];
            $userId = ProjectController::getNotUsedID();
            $member = new Member($userId, $name, $sessionID, "Member");
            setcookie("userId", $userId, 0, "/");
            ProjectController::joinPool($member, $hashCode);
            //
        }

        /**
         * A memeber can like a Project in a Pool
         */
        private function likeProject() {
            foreach (ProjectController::getAllPools() as $pool) {
                $member = $pool->isMemberBySessionID($this->provided['sessionID']);
                if ($member!=NULL) {
                    foreach ($pool->getProjects() as $_project) {
                        if ($this->provided['project']===$_project->getName()) {
                            ProjectController::changeStatus($_project, $member, 'liked');
                        }
                    }
                }

            }



        }

        /**
         * The admin can approve members into the pool or for a project
         */
        private function approve() {

        }
    }


/**
 * This will call the PostController and set the Provided Array (either GET or POST)
 */

$pc = new PostController();
$pc->setPost($_GET);
$pc->chooseFunction();

?>
