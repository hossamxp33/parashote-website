<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PaymentwayTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PaymentwayTable Test Case
 */
class PaymentwayTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\PaymentwayTable
     */
    public $Paymentway;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.paymentway',
        'app.creator',
        'app.user_groups',
        'app.login_tokens',
        'app.scheduled_email_recipients',
        'app.user_activities',
        'app.user_contacts',
        'app.user_details',
        'app.user_email_recipients',
        'app.user_email_signatures',
        'app.user_email_templates',
        'app.user_socials',
        'app.editor',
        'app.users',
        'app.package',
        'app.packagefeatures',
        'app.subscriptionduration',
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
        $config = TableRegistry::exists('Paymentway') ? [] : ['className' => 'App\Model\Table\PaymentwayTable'];
        $this->Paymentway = TableRegistry::get('Paymentway', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Paymentway);

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
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
