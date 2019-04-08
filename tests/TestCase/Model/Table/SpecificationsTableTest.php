<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\SpecificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\SpecificationsTable Test Case
 */
class SpecificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\SpecificationsTable
     */
    public $Specifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.Specifications'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('Specifications') ? [] : ['className' => SpecificationsTable::class];
        $this->Specifications = TableRegistry::getTableLocator()->get('Specifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Specifications);

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
