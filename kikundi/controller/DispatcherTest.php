<?php
    require_once 'testing/Test.php';
    class DispatcherTest implements Test {

        private $url;
        private $dispatcher;

        public function __construct (){
            parent::__construct();
            $this->setUp();
            $this->testDisplayRequestedPage();
            $this->tearDown();

        }

        private function setUp(){
            $dispatcher = new Dispatcher(0);
        }

        private function tearDown(){

        }

        private function testDisplayRequestedPage(){
            $url = 'homeadmin';
            $dispatcher->displayRequestedPage($url);
            if(!assert($dispatcher->getHtml() === file_get_contents('../../view/src/admin/home.template.html')){
                parent::addError("testDisplayRequestedPage failed!");
            }
        }
    }
?>