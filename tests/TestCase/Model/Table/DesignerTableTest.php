<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\DesignerTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\DesignerTable Test Case
 */
class DesignerTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\DesignerTable
     */
    public $Designer;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.designer',
        'app.creator',
        'app.editor'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Designer') ? [] : ['className' => 'App\Model\Table\DesignerTable'];
        $this->Designer = TableRegistry::get('Designer', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Designer);

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
