<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductfavsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductfavsTable Test Case
 */
class ProductfavsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductfavsTable
     */
    public $Productfavs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.productfavs',
        'app.creator',
        'app.delivry_rate',
        'app.favourite',
        'app.editor',
        'app.orders',
        'app.store_rate',
        'app.users',
        'app.products',
        'app.subcats',
        'app.categories',
        'app.stores',
        'app.coupons',
        'app.cities',
        'app.countries',
        'app.logos',
        'app.logo_design',
        'app.models',
        'app.photographers',
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
        $config = TableRegistry::exists('Productfavs') ? [] : ['className' => 'App\Model\Table\ProductfavsTable'];
        $this->Productfavs = TableRegistry::get('Productfavs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Productfavs);

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