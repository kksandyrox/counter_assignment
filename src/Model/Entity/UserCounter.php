<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * UserCounter Entity
 *
 * @property int $id
 * @property int $user_id
 * @property int $counter_id
 * @property int $unit_id
 * @property int $quantity
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Counter $counter
 */
class UserCounter extends Entity
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
        'user_id' => true,
        'counter_id' => true,
        'unit_id' => true,
        'quantity' => true,
        'created' => true,
        'modified' => true,
        'user' => true,
        'counter' => true
    ];
}
