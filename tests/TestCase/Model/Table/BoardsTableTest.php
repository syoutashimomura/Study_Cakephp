<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\BoardsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\BoardTable Test Case
 */
class BoardsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\BoardTable
     */
    public $Boards;
    // public $fixtures = [
    //     'app.boards',
    //     'app.people'
    // ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Boards') ? [] : ['className' => BoardsTable::class];
        $this->Boards = TableRegistry::getTableLocator()->get('Boards', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Boards);

        parent::tearDown();
    }

    /**
     * Test initial setup
     *
     * @return void
     */
    public function testInitialization()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    // public function testValidationDefault()
    // {
    // }

    /**
     * find Board test
     *
     * @return void
     */
    public function testBoardsTableFind()
    {
        $result = $this->Boards->find('all')->first();
        $this->assertFalse(empty($result));
        $this->assertTrue(is_a($result, 'App\Model\Entity\Board'));
        $this->assertEquals($result->id, 1001);
        $this->assertStringStartsWith('test title 1', $result->title);

    }

}
