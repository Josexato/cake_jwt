<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\WeightingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\WeightingsTable Test Case
 */
class WeightingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\WeightingsTable
     */
    public $Weightings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.weightings',
        'app.words',
        'app.books'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Weightings') ? [] : ['className' => WeightingsTable::class];
        $this->Weightings = TableRegistry::getTableLocator()->get('Weightings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Weightings);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
