<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * ProductSpecification Entity
 *
 * @property int $id
 * @property int $products_id
 * @property int $os
 * @property int $cpu
 * @property int $rear_camera
 * @property int $front_camera
 * @property int $memory
 * @property int $storage
 * @property int $weight
 * @property int $dimensions
 * @property int $screem
 * @property int $color
 * @property int $battery
 * @property int $memory_card
 * @property int $sim_card
 *
 * @property \App\Model\Entity\Product $product
 */
class ProductSpecification extends Entity
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
        'os' => true,
        'cpu' => true,
        'rear_camera' => true,
        'front_camera' => true,
        'memory' => true,
        'storage' => true,
        'weight' => true,
        'dimensions' => true,
        'screem' => true,
        'color' => true,
        'battery' => true,
        'memory_card' => true,
        'sim_card' => true,
        'product' => true
    ];
}
