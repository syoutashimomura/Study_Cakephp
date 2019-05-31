<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\Boards2Table;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\Boards2Table Test Case
 */
class Boards2TableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\Boards2Table
     */
    public $Boards2;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Boards2',
        'app.People'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Boards2') ? [] : ['className' => Boards2Table::class];
        $this->Boards2 = TableRegistry::getTableLocator()->get('Boards2', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Boards2);

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
