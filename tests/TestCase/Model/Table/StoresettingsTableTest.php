<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\StoresettingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\StoresettingsTable Test Case
 */
class StoresettingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\StoresettingsTable
     */
    public $Storesettings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.storesettings',
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
        'app.logos',
        'app.coupons',
        'app.logodesigns',
        'app.menus',
        'app.models',
        'app.photographers',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.payments',
        'app.store_settings',
        'app.designs',
        'app.header',
        'app.templates',
        'app.body',
        'app.footer',
        'app.bodies',
        'app.slider'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Storesettings') ? [] : ['className' => 'App\Model\Table\StoresettingsTable'];
        $this->Storesettings = TableRegistry::get('Storesettings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Storesettings);

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
