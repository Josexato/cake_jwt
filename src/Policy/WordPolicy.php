<?php
namespace App\Policy;

use App\Model\Entity\Word;
use Authorization\IdentityInterface;
use Cake\Core\App;

/**
 * Word policy
 */
class WordPolicy
{
    /**
     * Check if $user can create Word
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Word $word
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Word $word)
    {
    }

    /**
     * Check if $user can update Word
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Word $word
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Word $word)
    {
    }

    /**
     * Check if $user can delete Word
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Word $word
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Word $word)
    {
    }

    /**
     * Check if $user can view Word
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Word $word
     * @return bool
     */
    public function canView(IdentityInterface $user, Word $word)
    {
        return true;
    }
}
