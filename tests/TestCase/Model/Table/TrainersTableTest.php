<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\TrainersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\TrainersTable Test Case
 */
class TrainersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\TrainersTable
     */
    public $Trainers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.trainers',
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
        'app.packages',
        'app.courses',
        'app.coursecategories',
        'app.coursefeatures'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Trainers') ? [] : ['className' => 'App\Model\Table\TrainersTable'];
        $this->Trainers = TableRegistry::get('Trainers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Trainers);

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
