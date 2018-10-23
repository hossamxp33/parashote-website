<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProgrammingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProgrammingsTable Test Case
 */
class ProgrammingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProgrammingsTable
     */
    public $Programmings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.programmings',
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
        'app.subscriptionduration',
        'app.categories'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Programmings') ? [] : ['className' => 'App\Model\Table\ProgrammingsTable'];
        $this->Programmings = TableRegistry::get('Programmings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Programmings);

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
