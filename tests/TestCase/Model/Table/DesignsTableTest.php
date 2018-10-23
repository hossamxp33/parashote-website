<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesignsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesignsTable Test Case
 */
class DesignsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesignsTable
     */
    public $Designs;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.designs',
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
        'app.storesettings',
        'app.payments',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
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
        $config = TableRegistry::exists('Designs') ? [] : ['className' => 'App\Model\Table\DesignsTable'];
        $this->Designs = TableRegistry::get('Designs', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Designs);

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
