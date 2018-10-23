<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SaiedsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SaiedsTable Test Case
 */
class SaiedsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SaiedsTable
     */
    public $Saieds;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.saieds',
        'app.creator',
        'app.user_groups',
        'app.login_tokens',
        'app.paymentway',
        'app.editor',
        'app.scheduled_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.users',
        'app.package',
        'app.packagefeatures',
        'app.packages',
        'app.subscriptionduration'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Saieds') ? [] : ['className' => 'App\Model\Table\SaiedsTable'];
        $this->Saieds = TableRegistry::get('Saieds', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Saieds);

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
