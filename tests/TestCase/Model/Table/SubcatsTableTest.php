<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubcatsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubcatsTable Test Case
 */
class SubcatsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubcatsTable
     */
    public $Subcats;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.subcats',
        'app.creator',
        'app.editor',
        'app.categories',
        'app.products',
        'app.stores',
        'app.coupons',
        'app.cities',
        'app.countries',
        'app.logos',
        'app.favourite',
        'app.users',
        'app.logo_design',
        'app.models',
        'app.photographers',
        'app.store_rate',
        'app.orders',
        'app.product_colors',
        'app.product_fav',
        'app.product_photos',
        'app.product_rate',
        'app.product_sizes'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Subcats') ? [] : ['className' => 'App\Model\Table\SubcatsTable'];
        $this->Subcats = TableRegistry::get('Subcats', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subcats);

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
