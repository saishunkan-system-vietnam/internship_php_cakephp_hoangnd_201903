<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ProductSpecificationsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ProductSpecificationsTable Test Case
 */
class ProductSpecificationsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ProductSpecificationsTable
     */
    public $ProductSpecifications;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.ProductSpecifications',
        'app.Products',
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
        $config = TableRegistry::getTableLocator()->exists('ProductSpecifications') ? [] : ['className' => ProductSpecificationsTable::class];
        $this->ProductSpecifications = TableRegistry::getTableLocator()->get('ProductSpecifications', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->ProductSpecifications);

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
