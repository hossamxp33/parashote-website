<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PhotographersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PhotographersTable Test Case
 */
class PhotographersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PhotographersTable
     */
    public $Photographers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.photographers',
        'app.creator',
        'app.editor',
        'app.stores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Photographers') ? [] : ['className' => 'App\Model\Table\PhotographersTable'];
        $this->Photographers = TableRegistry::get('Photographers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Photographers);

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
