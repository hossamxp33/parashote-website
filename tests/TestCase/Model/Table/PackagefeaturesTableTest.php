<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PackagefeaturesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PackagefeaturesTable Test Case
 */
class PackagefeaturesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PackagefeaturesTable
     */
    public $Packagefeatures;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.packagefeatures',
        'app.creator',
        'app.editor',
        'app.packages',
        'app.products',
        'app.productfeatures',
        'app.packagedurations',
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
        $config = TableRegistry::exists('Packagefeatures') ? [] : ['className' => 'App\Model\Table\PackagefeaturesTable'];
        $this->Packagefeatures = TableRegistry::get('Packagefeatures', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Packagefeatures);

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
