<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Weighting Entity
 *
 * @property string $id
 * @property string $value
 * @property string $word_id
 * @property string $book_id
 *
 * @property \App\Model\Entity\Word $word
 * @property \App\Model\Entity\Book $book
 */
class Weighting extends Entity
{

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
        'value' => true,
        'word_id' => true,
        'book_id' => true,
        'word' => true,
        'book' => true
    ];
}
