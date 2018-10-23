<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackagedurationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackagedurationsTable Test Case
 */
class PackagedurationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PackagedurationsTable
     */
    public $Packagedurations;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.packagedurations',
        'app.creator',
        'app.editor',
        'app.packages',
        'app.products',
        'app.productfeatures',
        'app.packagefeatures',
        'app.payments'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Packagedurations') ? [] : ['className' => 'App\Model\Table\PackagedurationsTable'];
        $this->Packagedurations = TableRegistry::get('Packagedurations', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Packagedurations);

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
