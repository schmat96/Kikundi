<?php
    class PostController {

        private $provided;

        public function setPost($provided) {
            $this->provided = $provided;
        }


        public function chooseFunction(){
            if (isset($this->provided['postLabel'])) {
                echo "You called the function <b> ".$this->provided['postLabel']." </b> if you need to know what this shit does follow it yourself 
                you lazy ass in kikundi/controller/PostController.php <br>";
                switch($this->provided['postLabel']){
                    case 'createProjectPool':
                        require_once('../ProjectController.php');
                        ProjectController::addProjectPool($this->provided['sessionID'], $this->provided['name'], $this->provided['adminName']);
                        break;
                    case 'registerMember':
                        require_once('../ProjectController.php');
                        $hashCode = $this->provided['hashCode'];
                        $name = $this->provided['name'];
                        $sessionID = $this->provided['sessionID'];
                        $member = new Member(ProjectController::getNotUsedID(), $name, $sessionID, "Member");
                        ProjectController::joinPool($member, $hashCode);
                        break;
                    case 'createProject':
                        $this->createProject();
                        break;
                    case 'addTag':
                        require_once('../ProjectController.php');
                        TagController::saveTagInDb($this->provided['tag']);
                        break;
                    case 'checkTag':
                        require_once('../ProjectController.php');
                        echo "<br>";
                        var_dump(TagController::searchInDb($this->provided['tag']));
                        break;
                    case 'joinProjectPool':
                        break;
                    case 'likeProject':
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
            require_once('../model/Project.php');
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
                if ($pool->isMemberBySessionID($this->provided['sessionID'])) {
                    if ($pool->addProject($project, $tags)) {
                        echo "Project to ProjectPool added!";
                    }
                }
            }

        }

        private function joinProjectPool() {

        }

        private function likeProject() {

        }

        private function approve() {

        }
    }


    /*switch($_SESSION['postlabel']){
        case '':
            break;
    }*/
$pc = new PostController($provided);
$pc->setPost($_GET);
$pc->chooseFunction();
    
?>