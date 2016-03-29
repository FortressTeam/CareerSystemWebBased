<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * PersonalHistoryType Entity.
 *
 * @property int $id
 * @property string $personal_history_type_name
 * @property string $personal_history_type_description
 * @property \App\Model\Entity\PersonalHistory[] $personal_history
 */
class PersonalHistoryType extends Entity
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
        '*' => true,
        'id' => false,
    ];
}
