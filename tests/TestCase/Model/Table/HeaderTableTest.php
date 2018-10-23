<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HeaderTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HeaderTable Test Case
 */
class HeaderTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\HeaderTable
     */
    public $Header;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.header',
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
        'app.models',
        'app.photographers',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.designs',
        'app.bodies',
        'app.footer',
        'app.templates',
        'app.body',
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
        $config = TableRegistry::exists('Header') ? [] : ['className' => 'App\Model\Table\HeaderTable'];
        $this->Header = TableRegistry::get('Header', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Header);

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
