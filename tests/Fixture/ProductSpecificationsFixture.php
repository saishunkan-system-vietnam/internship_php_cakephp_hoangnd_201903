<?php
namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ProductSpecificationsFixture
 *
 */
class ProductSpecificationsFixture extends TestFixture
{

    /**
     * Fields
     *
     * @var array
     */
    // @codingStandardsIgnoreStart
    public $fields = [
        'id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'products_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'specifications_id' => ['type' => 'integer', 'length' => 11, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_product_specifications_specificationsid' => ['type' => 'index', 'columns' => ['specifications_id'], 'length' => []],
            'fk_product_specifications_productsid' => ['type' => 'index', 'columns' => ['products_id'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id'], 'length' => []],
            'fk_product_specifications_productsid' => ['type' => 'foreign', 'columns' => ['products_id'], 'references' => ['products', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
            'fk_product_specifications_specificationsid' => ['type' => 'foreign', 'columns' => ['specifications_id'], 'references' => ['specifications', 'id'], 'update' => 'cascade', 'delete' => 'cascade', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_unicode_ci'
        ],
    ];
    // @codingStandardsIgnoreEnd

    /**
     * Init method
     *
     * @return void
     */
    public function init()
    {
        $this->records = [
            [
                'id' => 1,
                'products_id' => 1,
                'specifications_id' => 1
            ],
        ];
        parent::init();
    }
}
