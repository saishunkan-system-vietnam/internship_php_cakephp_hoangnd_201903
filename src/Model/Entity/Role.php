<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Role Entity
 *
 * @property int $id
 * @property int $role_details_id
 * @property int $users_id
 *
 * @property \App\Model\Entity\RoleDetail $role_detail
 * @property \App\Model\Entity\User $user
 */
class Role extends Entity
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
        'role_details_id' => true,
        'users_id' => true,
        'role_detail' => true,
        'user' => true
    ];
}
