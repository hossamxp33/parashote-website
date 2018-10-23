<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentstoresTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentstoresTable Test Case
 */
class PaymentstoresTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentstoresTable
     */
    public $Paymentstores;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.paymentstores',
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
        'app.logodesigns',
        'app.designs',
        'app.header',
        'app.templates',
        'app.body',
        'app.footer',
        'app.bodies',
        'app.sliders',
        'app.storesettings',
        'app.payments',
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
        $config = TableRegistry::exists('Paymentstores') ? [] : ['className' => 'App\Model\Table\PaymentstoresTable'];
        $this->Paymentstores = TableRegistry::get('Paymentstores', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Paymentstores);

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
