<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductGroup Entity
 *
 * @property int $id
 * @property int $products_id
 * @property int $groups_id
 *
 * @property \App\Model\Entity\Product $product
 * @property \App\Model\Entity\Group $group
 */
class ProductGroup extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'products_id' => true,
        'groups_id' => true,
        'product' => true,
        'group' => true
    ];
}
