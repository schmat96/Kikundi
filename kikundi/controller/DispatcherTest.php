<?php
    require_once 'testing/Test.php';
    require_once 'controller/Dispatcher.php';

    /**
     * Testing class for the Dispatcher
     */
    class DispatcherTest extends Test {
        /**
         * url which will be injected into the dispatcher
         */
        private $url;

        /**
         * Instance of the dispatcher
         */
        private $dispatcher;

        /**
         * constructor
         */
        public function __construct (){
            parent::__construct();
            $this->setUp();
            $this->testDisplayRequestedPage();
            $this->tearDown();

        }
         /**
          * setup test, build preconditions
          */
        private function setUp(){
            $this->dispatcher = new Dispatcher(0);
        }

        /**
         * cleanup
         */
        private function tearDown(){

        }

        /**
         * test wether a requested page gets displayed or rerouted or not even shown
         */
        private function testDisplayRequestedPage(){
            $this->url = 'homeadmin';
            $this->dispatcher->displayRequestedPage($this->url);
            if(!assert($this->dispatcher->getHtml() === file_get_contents('../../view/src/admin/home.template.php'))){
                parent::addError("testDisplayRequestedPage failed!");
            }
        }
    }
?>
