<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SubaddressTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SubaddressTable Test Case
 */
class SubaddressTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SubaddressTable
     */
    public $Subaddress;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Subaddress',
        'app.Users'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Subaddress') ? [] : ['className' => SubaddressTable::class];
        $this->Subaddress = TableRegistry::getTableLocator()->get('Subaddress', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Subaddress);

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
