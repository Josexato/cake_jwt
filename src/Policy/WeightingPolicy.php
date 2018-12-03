<?php
namespace App\Policy;

use App\Model\Entity\Weighting;
use Authorization\IdentityInterface;

/**
 * Weighting policy
 */
class WeightingPolicy
{
    /**
     * Check if $user can create Weighting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Weighting $weighting
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Weighting $weighting)
    {
    }

    /**
     * Check if $user can update Weighting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Weighting $weighting
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Weighting $weighting)
    {
    }

    /**
     * Check if $user can delete Weighting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Weighting $weighting
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Weighting $weighting)
    {
    }

    /**
     * Check if $user can view Weighting
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Weighting $weighting
     * @return bool
     */
    public function canView(IdentityInterface $user, Weighting $weighting)
    {
    }
}
