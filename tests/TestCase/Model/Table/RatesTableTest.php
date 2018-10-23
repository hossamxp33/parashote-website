<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\RatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\RatesTable Test Case
 */
class RatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\RatesTable
     */
    public $Rates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.rates',
        'app.creator',
        'app.editor',
        'app.users',
        'app.owners',
        'app.machine_owners',
        'app.machine_details',
        'app.machines',
        'app.reservations'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Rates') ? [] : ['className' => 'App\Model\Table\RatesTable'];
        $this->Rates = TableRegistry::get('Rates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Rates);

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