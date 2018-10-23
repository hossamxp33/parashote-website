<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DelivriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DelivriesTable Test Case
 */
class DelivriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DelivriesTable
     */
    public $Delivries;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.delivries',
        'app.creator',
        'app.editor',
        'app.personals',
        'app.orders'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Delivries') ? [] : ['className' => 'App\Model\Table\DelivriesTable'];
        $this->Delivries = TableRegistry::get('Delivries', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Delivries);

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
