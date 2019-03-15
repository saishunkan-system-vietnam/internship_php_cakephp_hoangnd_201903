<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Chitietloaihang Entity
 *
 * @property int $id
 * @property string $tenchitietloaihang
 * @property int $loaihang_id
 *
 * @property \App\Model\Entity\Loaihang $loaihang
 * @property \App\Model\Entity\Mathang[] $mathang
 */
class Chitietloaihang extends Entity
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
        'tenchitietloaihang' => true,
        'loaihang_id' => true,
        'loaihang' => true,
        'mathang' => true
    ];
}
