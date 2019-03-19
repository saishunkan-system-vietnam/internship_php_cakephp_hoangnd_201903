<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Specification Entity
 *
 * @property int $id
 * @property string $name
 * @property int $parent_id
 *
 * @property \App\Model\Entity\ParentSpecification $parent_specification
 * @property \App\Model\Entity\ChildSpecification[] $child_specifications
 */
class Specification extends Entity
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
        'name' => true,
        'parent_id' => true,
        'parent_specification' => true,
        'child_specifications' => true
    ];
}
