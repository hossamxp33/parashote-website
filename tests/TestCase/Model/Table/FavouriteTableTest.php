<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\FavouriteTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\FavouriteTable Test Case
 */
class FavouriteTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\FavouriteTable
     */
    public $Favourite;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.favourite',
        'app.creator',
        'app.editor',
        'app.users',
        'app.products',
        'app.stores'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Favourite') ? [] : ['className' => 'App\Model\Table\FavouriteTable'];
        $this->Favourite = TableRegistry::get('Favourite', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Favourite);

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
