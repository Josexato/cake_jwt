<?php
namespace App\Policy;

use App\Model\Table\BooksTable;
use Authorization\IdentityInterface;

/**
 * Books policy
 */
class BooksTablePolicy
{
    public function scopeIndex($user, $query)
    {
        return $query->where(['Books.user_id' => $user->id]);
    }

    public function canIndex(IdentityInterface $identity)
    {
        $identity['can_index']=true;
        return $identity['can_index'];
    }
}
