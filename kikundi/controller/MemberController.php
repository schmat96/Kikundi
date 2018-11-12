<?php
/**
 * Created by PhpStorm.
 * User: vmadmin
 * Date: 05.11.2018
 * Time: 14:36
 */

class MemberController implements MembercontrollerImpl
{

    public function likeProject($member, $project)
    {
        // TODO: Implement likeProject() method.
    }

    public function approve($project, $member)
    {
        // TODO: Implement approve() method.
    }

    public function joinProjectPool($hash)
    {
        // TODO: Verify joinProjectPool() method.
        // possible solution if dispatcher gets used https://stackoverflow.com/questions/13837375/how-to-show-an-alert-box-in-php

        foreach ($_SESSION['allPools'] as &$projectPool) {
            if ($hash == $projectPool . id) {
                $projectPool . add(this);
                $_SESSION[''];
                return;

            }
        }
        echo '<script language="javascript">';
        echo 'alert("Given hash matches no existing projectpool")';
        echo '</script>';
    }
}