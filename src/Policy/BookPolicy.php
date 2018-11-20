<?php
namespace App\Policy;

use App\Model\Entity\Book;
use Authorization\IdentityInterface;

/**
 * Book policy
 */
class BookPolicy
{
    /**
     * Check if $user can create Book
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Book $book
     * @return bool
     */
    public function canCreate(IdentityInterface $user, Book $book)
    {
    }

    /**
     * Check if $user can update Book
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Book $book
     * @return bool
     */
    public function canUpdate(IdentityInterface $user, Book $book)
    {
    }

    /**
     * Check if $user can delete Book
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Book $book
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Book $book)
    {
    }

    /**
     * Check if $user can view Book
     *
     * @param Authorization\IdentityInterface $user The user.
     * @param App\Model\Entity\Book $book
     * @return bool
     */
    public function canView(IdentityInterface $user, Book $book)
    {
    }
}
