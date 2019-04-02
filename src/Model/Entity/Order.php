<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Order Entity
 *
 * @property int $id
 * @property \Cake\I18n\FrozenTime $date_time
 * @property int $status
 * @property string $note
 * @property int $subaddress_id
 *
 * @property \App\Model\Entity\Subaddres $subaddres
 */
class Order extends Entity
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
        'date_time' => true,
        'status' => true,
        'note' => true,
        'subaddress_id' => true,
        'subaddres' => true
    ];
}
