<?php
namespace App\Policy;

use App\Model\Table\WordsTable;
use Authorization\IdentityInterface;

/**
 * Words policy
 */
class WordsTablePolicy
{
    public function canAdd(IdentityInterface $identity)
    {
        return true;
    }
    public function canIndex(IdentityInterface $identity)
    {
        return true;
    }
}
