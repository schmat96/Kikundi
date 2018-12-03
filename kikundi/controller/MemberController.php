<?php
/**
 * Created by PhpStorm.
 * User: Kevin Looser
 * Date: 05.11.2018
 * Time: 14:36
 */
/**
 * Class to administrate what methods a user of the website
 * can invoke
 */
class MemberController implements MembercontrollerImpl
{

    /**
     * A member can like a project with this function
     */
    public function likeProject($member, $project)
    {
        // TODO: Implement likeProject() method.
    }

    /**
     * an admin can approve another member for the project
     * and or pool
     */
    public function approve($project, $member)
    {
        // TODO: Implement approve() method.
    }
}
