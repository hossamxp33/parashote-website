<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\MenuactionsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\MenuactionsTable Test Case
 */
class MenuactionsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\MenuactionsTable
     */
    public $Menuactions;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.menuactions',
        'app.creator',
        'app.user_groups',
        'app.deliveryrates',
        'app.editor',
        'app.favourite',
        'app.users',
        'app.orders',
        'app.storerates',
        'app.stores',
        'app.cities',
        'app.countries',
        'app.subcats',
        'app.categories',
        'app.products',
        'app.offers',
        'app.productcolors',
        'app.productfavs',
        'app.productphotos',
        'app.productrates',
        'app.productsizes',
        'app.total_rating',
        'app.logodesigns',
        'app.designs',
        'app.header',
        'app.templates',
        'app.body',
        'app.footer',
        'app.sliders',
        'app.storesettings',
        'app.payments',
        'app.paymentstores',
        'app.coupons',
        'app.menus',
        'app.models',
        'app.photographers',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Menuactions') ? [] : ['className' => 'App\Model\Table\MenuactionsTable'];
        $this->Menuactions = TableRegistry::get('Menuactions', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Menuactions);

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
}
