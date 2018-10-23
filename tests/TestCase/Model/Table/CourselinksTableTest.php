<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CourselinksTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CourselinksTable Test Case
 */
class CourselinksTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CourselinksTable
     */
    public $Courselinks;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.courselinks',
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
        'app.trainers',
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
        $config = TableRegistry::exists('Courselinks') ? [] : ['className' => 'App\Model\Table\CourselinksTable'];
        $this->Courselinks = TableRegistry::get('Courselinks', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Courselinks);

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
