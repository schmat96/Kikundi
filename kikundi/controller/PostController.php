<?php

require_once('../ProjectController.php');


    class PostController {

        private $provided;

        public function setPost($provided) {
            $this->provided = $provided;
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

        private function createProjectPool() {

        }

        private function createProject() {

            require_once('../ProjectController.php');
            $maxMembers = $this->provided['maxMembers'];
            $minMembers = $this->provided['minMembers'];
            $difficulty = $this->provided['difficulty'];
            $name = $this->provided['name'];
            $description = $this->provided['description'];
            //#TODO REMOVE ONCE FETCHED
            //$tags = $this->provided['tags'];
            $tags = array(new Tag("cool"), new Tag("java"), new Tag("#notphp"));
            $project = new Project($maxMembers, $minMembers, $difficulty, $name, $description, $tags);
            foreach (ProjectController::getAllPools() as $pool) {
                if ($pool->isMemberBySessionID($this->provided['sessionID'])!=NULL) {
                    if ($pool->addProject($project, $tags)) {
                        echo "Project to ProjectPool added!";
                    }
                }
            }

        }

        private function joinProjectPool() {

            $hashCode = $this->provided['hashCode'];
            $name = $this->provided['name'];
            $sessionID = 100;
//            $sessionID = $this->provided['sessionID'];
            $member = new Member(ProjectController::getNotUsedID(), $name, $sessionID, "Member");
            ProjectController::joinPool($member, $hashCode);
        }

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

        private function approve() {

        }
    }


/**
 * This will call the PostController and set the Provided Array (either GET or POST)
 */
$pc = new PostController($provided);
$pc->setPost($_GET);
$pc->chooseFunction();
    
?>