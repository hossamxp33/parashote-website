<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursetrainersTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursetrainersTable Test Case
 */
class CoursetrainersTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursetrainersTable
     */
    public $Coursetrainers;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coursetrainers',
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
        'app.subscriptionduration',
        'app.subscriptionduration',
        'app.trainers',
        'app.courses',
        'app.coursecategories',
        'app.programmings',
        'app.coursefeatures',
        'app.courselinks'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Coursetrainers') ? [] : ['className' => 'App\Model\Table\CoursetrainersTable'];
        $this->Coursetrainers = TableRegistry::get('Coursetrainers', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coursetrainers);

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
