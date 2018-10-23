<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * WeightingsFixture
 *
 */
class WeightingsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'value' => ['type' => 'string', 'length' => 45, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null, 'fixed' => null],
        'word_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        'book_id' => ['type' => 'uuid', 'length' => null, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_weightings_words1_idx' => ['type' => 'index', 'columns' => ['word_id'], 'length' => []],
            'fk_weightings_books1_idx' => ['type' => 'index', 'columns' => ['book_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_weightings_books1' => ['type' => 'foreign', 'columns' => ['book_id'], 'references' => ['books', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_weightings_words1' => ['type' => 'foreign', 'columns' => ['word_id'], 'references' => ['words', 'id'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 'dd8e7ef8-d509-4b30-a1ff-b9eb899e99b4',
                'value' => 'Lorem ipsum dolor sit amet',
                'word_id' => '7e66a002-5ec1-49bc-9e43-b4ec31f637ca',
                'book_id' => 'dfb244e1-e964-4805-9617-a437976ca06e'
            ],
        ];
        parent::init();
    }
}
