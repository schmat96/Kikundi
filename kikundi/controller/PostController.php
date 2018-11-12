<?php
    class PostController {
        public function chooseFunction(){
            switch($_POST['postlabel']){
                case 'createProjectPool':
                    break;
                case 'createProject':
                    $this->createProject();
                    break;
                case 'joinProjectPool':
                    break;
                case 'likeProject':
                    break;
                case 'approve':
                    break;
                default:

            }
        }

        private function createProjectPool() {

        }

        private function createProject() {
            $maxMembers = $_POST['maxMembers'];
            $minMembers = $_POST['minMembers'];
            $difficulty = $_POST['difficulty'];
            $name = $_POST['name'];
            $description = $_POST['description'];
            $tags = $_POST['tags'];
            new Project($maxMembers, $minMembers, $difficulty, $name, $description, $tags);
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
    
?>