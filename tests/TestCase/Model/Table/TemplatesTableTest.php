<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TemplatesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TemplatesTable Test Case
 */
class TemplatesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TemplatesTable
     */
    public $Templates;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.templates',
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
        'app.body',
        'app.designs',
        'app.header',
        'app.bodies',
        'app.footer',
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
        $config = TableRegistry::exists('Templates') ? [] : ['className' => 'App\Model\Table\TemplatesTable'];
        $this->Templates = TableRegistry::get('Templates', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Templates);

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
     * Test getalldata method
     *
     * @return void
     */
    public function testGetalldata()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
