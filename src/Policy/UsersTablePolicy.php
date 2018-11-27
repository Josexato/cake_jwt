<?php
namespace App\Policy;

use App\Model\Table\UsersTable;
use Authorization\IdentityInterface;

/**
 * Users policy
 */
class UsersTablePolicy
{
    public function canIndex(IdentityInterface $identity)
    {
        $identity['can_index']=true;
        return $identity['can_index'];
    }
}
