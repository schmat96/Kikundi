
<?php
/**
 * Created by Keya Kersting
 * User: vmadmin
 * Date: 19.11.2018
 * Time: 11:00
 */
require_once __DIR__.'/../controller/testing/Test.php';

class ProjectPoolTest extends Test {

     public function __construct(){
          parent::__construct();
          $this->testCreateProjectPool();
     }

     private function testCreateProjectPool(){
          $pp = new ProjectPool(100, "tester", "test_admin");
          if( !assert( !empty($pp) ) ){
               parent::addError("Creating a project pool failed!");
          }
     }

}
?>
