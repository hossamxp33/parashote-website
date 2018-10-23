<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductfeaturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductfeaturesTable Test Case
 */
class ProductfeaturesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductfeaturesTable
     */
    public $Productfeatures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.productfeatures',
        'app.creator',
        'app.editor',
        'app.products',
        'app.packages',
        'app.packagedurations',
        'app.packagefeatures',
        'app.payments',
        'app.users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Productfeatures') ? [] : ['className' => 'App\Model\Table\ProductfeaturesTable'];
        $this->Productfeatures = TableRegistry::get('Productfeatures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Productfeatures);

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
