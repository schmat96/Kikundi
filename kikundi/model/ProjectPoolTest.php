
<?php
/**
 * Created by Keya Kersting
 * User: vmadmin
 * Date: 19.11.2018
 * Time: 11:00
 */
require_once __DIR__.'/../controller/testing/Test.php';
/**
 * testing class to test ProjecPool
 */
class ProjectPoolTest extends Test {

     public function __construct(){
          parent::__construct();
          $this->testCreateProjectPool();
     }

     /**
      * Test wether a project pool can be created
      */
     private function testCreateProjectPool(){
          $pp = new ProjectPool(100, "tester", "test_admin");
          if( !assert( !empty($pp) ) ){
               parent::addError("Creating a project pool failed!");
          }
     }

}
?>
