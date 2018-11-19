<?php
    require_once 'testing/Test.php';
    require_once 'controller/Dispatcher.php';
    class DispatcherTest extends Test {

        private $url;
        private $dispatcher;

        public function __construct (){
            parent::__construct();
            $this->setUp();
            $this->testDisplayRequestedPage();
            $this->tearDown();

        }

        private function setUp(){
            $this->dispatcher = new Dispatcher(0);
        }

        private function tearDown(){

        }

        private function testDisplayRequestedPage(){
            $this->url = 'homeadmin';
            $this->dispatcher->displayRequestedPage($this->url);
            if(!assert($this->dispatcher->getHtml() === file_get_contents('../../view/src/admin/home.template.html'))){
                parent::addError("testDisplayRequestedPage failed!");
            }
        }
    }
?>
