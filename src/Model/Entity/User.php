<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Authentication\IdentityInterface as AuthenticationIdentityInterface;
use Authorization\IdentityInterface as AuthorizationIdentityInterface;
/**
 * User Entity
 *
 * @property string $id
 * @property string $username
 * @property string $first_name
 * @property string $last_name
 * @property string $password
 * @property string $email
 *
 * @property \App\Model\Entity\Book[] $books
 */
class User extends Entity implements AuthenticationIdentityInterface, AuthorizationIdentityInterface
{
    /**
     * Authentication\IdentityInterface method
     */
    public function getIdentifier()
    {
        return $this->id;
    }

    /**
     * Authentication\IdentityInterface method
     */
    public function getOriginalData()
    {
        return $this;
    }

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'username' => true,
        'first_name' => true,
        'last_name' => true,
        'password' => true,
        'email' => true,
        'books' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password'
    ];

    /**
     * Check whether the current identity can perform an action.
     *
     * @param string $action The action/operation being performed.
     * @param mixed $resource The resource being operated on.
     * @return bool
     */
    public function can($action, $resource)
    {
        return $this->authorization->can($this, $action, $resource);
    }

    /**
     * Apply authorization scope conditions/restrictions.
     *
     * @param string $action The action/operation being performed.
     * @param mixed $resource The resource being operated on.
     * @return mixed The modified resource.
     */
    public function applyScope($action, $resource)
    {
        return $this->authorization->applyScope($this, $action, $resource);
    }
    /**
     * Setter to be used by the middleware.
     */
    public function setAuthorization($service)
    {
        $this->authorization = $service;

        return $this;
    }
}
