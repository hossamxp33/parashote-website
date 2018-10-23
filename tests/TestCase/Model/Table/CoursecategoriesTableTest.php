<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CoursecategoriesTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CoursecategoriesTable Test Case
 */
class CoursecategoriesTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\CoursecategoriesTable
     */
    public $Coursecategories;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.coursecategories',
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
        $config = TableRegistry::exists('Coursecategories') ? [] : ['className' => 'App\Model\Table\CoursecategoriesTable'];
        $this->Coursecategories = TableRegistry::get('Coursecategories', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Coursecategories);

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
